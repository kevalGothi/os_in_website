<?php
session_start();
require_once "../db/conn.php"; // Need DB connection

// --- START: Security - Check if user is logged in ---
// Replace this with your actual session login check
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    $_SESSION['paste_message'] = "Error: Access denied. Please log in.";
    header("Location: login.php"); // Redirect to your login page
    exit;
}
// --- END: Security Check ---


// --- START: Get and Validate Destination Parameters ---
if (!isset($_GET['dest_rowid']) || !isset($_GET['dest_foldername']) || !is_numeric($_GET['dest_rowid'])) {
    // Avoid setting session message here as it might overwrite copy message if user directly navigates
    // Just exit or redirect silently, or show a generic error page.
    die("Error: Invalid paste destination parameters provided.");
}

$destRowId = (int)$_GET['dest_rowid'];
$destFolderName = $_GET['dest_foldername']; // Keep as string

// Optional but Recommended: Add validation to check if $destRowId is a valid project ID the user can access
// Example: Check if $destRowId exists in your productlist table.
// $check_project_sql = "SELECT 1 FROM productlist WHERE id = ?"; // Adjust table/column names
// ... prepare, bind, execute, check rows ... if not found, set error and exit.

// --- END: Get and Validate Destination Parameters ---


// --- START: Check Session for Copied File ---
if (!isset($_SESSION['copied_items']) || empty($_SESSION['copied_items']) || $_SESSION['copied_items']['type'] !== 'file') {
    $_SESSION['paste_message'] = "Error: No file selected in the clipboard to paste.";
    // Redirect back to destination using parameters from GET
    header("Location: name.php?name=" . $destRowId . "&Folder_name=" . urlencode($destFolderName) . "&rowid=" . $destRowId);
    exit;
}

$copiedItem = $_SESSION['copied_items'];
$originalItemId = $copiedItem['id']; // ID of the original file record in new_doc
// --- END: Check Session for Copied File ---


// --- START: File Copy Logic ---
$originalFileName = null;
$success = false; // Flag for overall success

// 1. Get Original File Details (Filename) using Prepared Statement
$sql_get_original = "SELECT iimg FROM new_doc WHERE id = ?";
$stmt_get_original = mysqli_prepare($conn, $sql_get_original);

if ($stmt_get_original) {
    mysqli_stmt_bind_param($stmt_get_original, "i", $originalItemId);
    if (mysqli_stmt_execute($stmt_get_original)) {
        $result_original = mysqli_stmt_get_result($stmt_get_original);
        $originalFileRecord = mysqli_fetch_assoc($result_original);
        if ($originalFileRecord && !empty($originalFileRecord['iimg'])) {
            $originalFileName = $originalFileRecord['iimg'];
        } else {
            $_SESSION['paste_message'] = "Error pasting: Original file record not found or filename is missing (ID: " . $originalItemId . ").";
        }
    } else {
        $_SESSION['paste_message'] = "Error pasting: Failed to execute query for original filename.";
        error_log("Paste Action Error: Execute failed for getting original filename: " . mysqli_stmt_error($stmt_get_original));
    }
    mysqli_stmt_close($stmt_get_original);
} else {
    $_SESSION['paste_message'] = "Error pasting: Failed to prepare query for original filename.";
    error_log("Paste Action Error: Prepare failed for getting original filename: " . mysqli_error($conn));
}


// Proceed only if we got the original filename
if ($originalFileName !== null) {

    $uploadDirectory = '../upload/'; // Define your upload directory path
    $originalFilePath = $uploadDirectory . $originalFileName;

    // 2. Check if Original Physical File Exists
    if (file_exists($originalFilePath)) {

        // 3. Determine New Filename (Handle Conflicts)
        $newFileName = $originalFileName;
        $newFilePath = $uploadDirectory . $newFileName;
        $counter = 1;

        // Prepare statement to check for filename conflict in DB (prepare ONCE before loop)
        $checkSql = "SELECT 1 FROM new_doc WHERE row_id = ? AND foldername = ? AND iimg = ? LIMIT 1";
        $checkStmt = mysqli_prepare($conn, $checkSql);

        if ($checkStmt) {
            // Loop while filename exists physically OR in DB for the destination
            while (file_exists($newFilePath) || (mysqli_stmt_bind_param($checkStmt, "iss", $destRowId, $destFolderName, $newFileName) && mysqli_stmt_execute($checkStmt) && mysqli_stmt_store_result($checkStmt) && mysqli_stmt_num_rows($checkStmt) > 0)) {
                $path_parts = pathinfo($originalFileName); // Use original name for parts
                $base = $path_parts['filename'];
                $ext = isset($path_parts['extension']) ? '.' . $path_parts['extension'] : '';
                $newFileName = $base . '_copy' . $counter . $ext;
                $newFilePath = $uploadDirectory . $newFileName;
                $counter++;
                 mysqli_stmt_free_result($checkStmt); // Free result before next bind/execute in loop
            }
            mysqli_stmt_close($checkStmt); // Close the check statement after the loop
        } else {
            $_SESSION['paste_message'] = "Error pasting: Failed to prepare name check query.";
            error_log("Paste Action Error: Prepare failed for name check: " . mysqli_error($conn));
            $newFileName = null; // Prevent further processing
        }


        // Proceed only if we have a final filename (name check didn't fail critically)
        if ($newFileName !== null) {

            // 4. Copy the Physical File
            if (copy($originalFilePath, $newFilePath)) {

                // 5. Insert New Database Record using Prepared Statement
                $insertSql = "INSERT INTO new_doc (row_id, foldername, iimg) VALUES (?, ?, ?)";
                $insertStmt = mysqli_prepare($conn, $insertSql);

                if ($insertStmt) {
                    mysqli_stmt_bind_param($insertStmt, "iss", $destRowId, $destFolderName, $newFileName);
                    if (mysqli_stmt_execute($insertStmt)) {
                        $success = true; // Set success flag
                        $_SESSION['paste_message'] = "File '" . htmlspecialchars($originalFileName) . "' pasted successfully as '" . htmlspecialchars($newFileName) . "'.";
                    } else {
                        $_SESSION['paste_message'] = "Error pasting: Database record could not be created after file copy.";
                        error_log("Paste Action Error: Execute failed for insert query: " . mysqli_stmt_error($insertStmt));
                        // CRITICAL: Try to delete the copied file if DB insert failed
                        if (!@unlink($newFilePath)) {
                             error_log("Paste Action Error: Failed to unlink orphaned file copy: " . $newFilePath);
                        }
                    }
                    mysqli_stmt_close($insertStmt);
                } else {
                    $_SESSION['paste_message'] = "Error pasting: Failed to prepare insert query.";
                    error_log("Paste Action Error: Prepare failed for insert query: " . mysqli_error($conn));
                     // CRITICAL: Try to delete the copied file if DB prepare failed
                     if (!@unlink($newFilePath)) {
                          error_log("Paste Action Error: Failed to unlink orphaned file copy: " . $newFilePath);
                     }
                }

            } else {
                $_SESSION['paste_message'] = "Error pasting: Could not copy the physical file.";
                error_log("Paste Action Error: PHP copy() failed from " . $originalFilePath . " to " . $newFilePath);
            }
        } // End if $newFileName !== null

    } else {
        $_SESSION['paste_message'] = "Error pasting: Original physical file not found at " . htmlspecialchars($originalFilePath) . ". Cannot paste.";
        error_log("Paste Action Error: Original physical file not found: " . $originalFilePath);
    }

} // End if $originalFileName !== null

// --- END: File Copy Logic ---


// --- START: Clean up Session ---
// Always remove the item from the session clipboard after attempting paste
unset($_SESSION['copied_items']);
// --- END: Clean up Session ---


// --- START: Redirect back to destination ---
header("Location: name.php?name=" . $destRowId . "&Folder_name=" . urlencode($destFolderName) . "&rowid=" . $destRowId);
exit;
// --- END: Redirect ---

?>