<?php
session_start();
require_once "../db/conn.php"; // Needed for validation query

// --- START: Security - Check if user is logged in ---
// Replace this with your actual session login check
if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] !== true) {
    // You could set an error message in session here if you want
    $_SESSION['copy_message'] = "Error: Access denied. Please log in.";
    header("Location: login.php"); // Redirect to your login page
    exit;
}
// --- END: Security Check ---


// --- START: Parameter Validation ---
if (!isset($_GET['id']) || !isset($_GET['type']) || !isset($_GET['source_rowid']) || !isset($_GET['source_foldername']) || !is_numeric($_GET['id']) || !is_numeric($_GET['source_rowid'])) {
    $_SESSION['copy_message'] = "Error: Invalid parameters provided for copy action.";
    header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'index.php')); // Redirect back
    exit;
}

$itemId = (int)$_GET['id']; // Cast to integer
$itemType = $_GET['type'];
$sourceRowId = (int)$_GET['source_rowid']; // Cast to integer
$sourceFolderName = $_GET['source_foldername']; // Keep as string
// --- END: Parameter Validation ---


// --- START: Check if type is 'file' ---
if ($itemType !== 'file') {
    $_SESSION['copy_message'] = "Error: Only files can be copied.";
    header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'index.php')); // Redirect back
    exit;
}
// --- END: Check if type is 'file' ---


// --- START: Security - Validate the file belongs to the source ---
$valid = false;
$sql_validate = "SELECT 1 FROM new_doc WHERE id = ? AND row_id = ? AND foldername = ?";
$stmt_validate = mysqli_prepare($conn, $sql_validate);

if ($stmt_validate) {
    mysqli_stmt_bind_param($stmt_validate, "iis", $itemId, $sourceRowId, $sourceFolderName);
    if (mysqli_stmt_execute($stmt_validate)) {
        mysqli_stmt_store_result($stmt_validate);
        if (mysqli_stmt_num_rows($stmt_validate) === 1) {
            $valid = true; // File exists and belongs to the specified source
        }
    } else {
        error_log("Copy Action Error: Failed to execute validation query: " . mysqli_stmt_error($stmt_validate));
    }
    mysqli_stmt_close($stmt_validate);
} else {
    error_log("Copy Action Error: Failed to prepare validation query: " . mysqli_error($conn));
}

if (!$valid) {
     $_SESSION['copy_message'] = "Error: The specified file does not exist or cannot be copied from this location.";
     header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
     exit;
}
// --- END: Security - Validate the file belongs to the source ---


// --- START: Store item details in session ---
// Overwrite any previously copied item
$_SESSION['copied_items'] = [
    'id' => $itemId,
    'type' => $itemType, // Should always be 'file' now
    'source_rowid' => $sourceRowId,
    'source_foldername' => $sourceFolderName,
];

$_SESSION['copy_message'] = "File ready to be pasted."; // Success feedback
// --- END: Store item details in session ---


// --- START: Redirect back to the previous page ---
$redirectUrl = $_SERVER['HTTP_REFERER'] ?? 'index.php'; // Use referer or fallback
header("Location: " . $redirectUrl);
exit;
// --- END: Redirect ---

?>