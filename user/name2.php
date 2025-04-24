<?php
session_start();
require_once "../db/conn.php"; // Ensure DB connection is established here ($conn)

// --- Database Connection Check ---
if (!$conn || $conn->connect_error) {
    // Log the error securely, don't show details to the user
    error_log("Database Connection Error in name.php: " . ($conn ? $conn->connect_error : 'Unknown error'));
    // Display a generic error message
    die("<html><body><h1>Error</h1><p>Could not connect to the database. Please try again later or contact support.</p></body></html>");
}

// --- Security: Check if user is logged in ---
// ******** IMPORTANT: REPLACE THIS SECTION ********
// This is a placeholder. Implement your secure session validation logic here.
// Example using a session flag set during login:
$isUserLoggedIn = (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] === true);
// Make sure $_SESSION['is_logged_in'] is set reliably in your login script.
// ***********************************************

// if (!$isUserLoggedIn) {
//     // Set a message for the login page (optional)
//     $_SESSION['alert_message'] = ['type' => 'warning', 'text' => 'Please log in to access the requested page.'];
//     header("Location: login.php"); // Redirect to your login page
//     exit;
// }
// --- End Security Check ---


// --- Feedback Message Handling (Retrieve from Session) ---
$feedbackMessage = '';
if (isset($_SESSION['alert_message'])) {
    $alertType = $_SESSION['alert_message']['type'] ?? 'info'; // Default to info
    $alertText = $_SESSION['alert_message']['text'] ?? 'Action completed.';
    // Basic sanitization for alert type to prevent XSS via session manipulation
    $allowedAlertTypes = ['danger', 'success', 'warning', 'info', 'primary', 'secondary', 'light', 'dark'];
    $alertType = in_array($alertType, $allowedAlertTypes) ? $alertType : 'info';

    $feedbackMessage = '<div class="alert alert-' . $alertType . ' alert-dismissible fade show" role="alert">'
                  . htmlspecialchars($alertText) // Display text safely
                  . '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>' // Use ×
                  . '</div>';
    unset($_SESSION['alert_message']); // Display message only once
}
// --- End Feedback Message Handling ---


// --- Get and Validate GET Parameters ---
$produc = filter_input(INPUT_GET, 'name', FILTER_VALIDATE_INT);
$rowid = filter_input(INPUT_GET, 'rowid', FILTER_VALIDATE_INT);
$Folder_name = $_GET['Folder_name'] ?? null; // Get raw, check for null below

// Check if filtering failed or value is null
if ($produc === false || $produc === null || $rowid === false || $rowid === null || $Folder_name === null) {
    // Redirecting is generally better than die() for user experience
    $_SESSION['alert_message'] = ['type' => 'danger', 'text' => 'Error: Invalid or missing page parameters were provided.'];
    // Redirect to a sensible default page, like the project list
    header("Location: demo2.php"); // Adjust redirect destination if needed
    exit;
}
// --- End GET Parameter Validation ---

// Define upload directory (adjust path if necessary)
$uploadDirectory = '../upload/';

?>
<?php $page = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1); ?>
<?php include "inc/header.php"; ?>
<style>
    /* Minimal styles - move to CSS if possible */
    .table td, .table th { vertical-align: middle; padding: 0.6rem 0.5rem; } /* Adjust padding */
    .action-btn { margin: 0 2px; } /* Spacing for action buttons */

    .folder-card {
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px; /* Softer shadow */
        border-radius: 8px; /* Slightly more rounded */
        background: #ffffff; /* White background */
        border: 1px solid #e9ecef; /* Light border */
        padding: 15px;
        margin-bottom: 20px;
        text-align: center;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        display: block; /* Make the whole card area linkable */
        color: #495057; /* Default text color */
        text-decoration: none; /* Remove underline from link */
    }
    .folder-card:hover {
        transform: translateY(-4px);
        box-shadow: rgba(0, 0, 0, 0.15) 0px 8px 16px;
        color: #0056b3; /* Darker link color on hover */
    }
    .folder-card img { width: 38px; /* Adjust icon size */ margin-bottom: 12px; }
    .folder-card span { /* Style the folder name */
        font-size: 0.95rem; /* Slightly larger text */
        font-weight: 500; /* Medium weight */
        display: block;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .breadcrumb { background-color: transparent; padding-left: 0; } /* Cleaner breadcrumbs */
</style>
<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <?php include "inc/topNavbar.php"; ?>
            <!-- begin app-container -->
            <div class="app-container">
                <?php include "inc/sideNavbar.php"; ?>
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row: Page Title and Actions -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <!-- Page Title & Action Buttons -->
                                    <div class="page-title mb-2 mb-sm-0 flex-grow-1">
                                        <h1 class="mb-1" title="<?php echo htmlspecialchars($Folder_name); ?>">
                                            <?php echo htmlspecialchars(strlen($Folder_name) > 35 ? substr($Folder_name, 0, 32).'...' : $Folder_name); ?>
                                        </h1>
                                        <div class="mt-2">
                                            <a href="makeSubFolder.php?qnam=<?php echo urlencode($Folder_name); ?>&proname=<?php echo $produc; ?>&rowid=<?php echo $rowid; ?>" class="btn btn-primary btn-sm mr-2 mb-1"><i class="fa fa-plus mr-1"></i> Add Folder</a>
                                            <a href="upload.php?qnam=<?php echo urlencode($Folder_name); ?>&proname=<?php echo $produc; ?>&rowID=<?php echo $rowid; ?>" class="btn btn-info btn-sm mr-2 mb-1"><i class="fa fa-upload mr-1"></i> Upload File</a>
                                            <?php
                                            // Show Paste Button if a file is in the session clipboard
                                            if (isset($_SESSION['copied_items']) && !empty($_SESSION['copied_items']) && $_SESSION['copied_items']['type'] === 'file'):
                                            ?>
                                                <a href="paste_action.php?dest_rowid=<?php echo $rowid; ?>&dest_foldername=<?php echo urlencode($Folder_name); ?>" class="btn btn-success btn-sm mb-1"><i class="fa fa-paste mr-1"></i> Paste File</a>
                                            <?php
                                            endif;
                                            ?>
                                        </div>
                                    </div>
                                    <!-- Breadcrumbs -->
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.php" title="Dashboard"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    <a href="demo2.php">Projects</a>
                                                </li>
                                                 <li class="breadcrumb-item">
                                                    <a href="view2.php?produc=<?php echo $produc; ?>&rowid=<?php echo $rowid; ?>">Project Folders</a>
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">
                                                    <?php echo htmlspecialchars(strlen($Folder_name) > 20 ? substr($Folder_name, 0, 17).'...' : $Folder_name); ?>
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row: Page Title and Actions -->

                        <!-- START: Display Feedback Messages -->
                        <div class="row">
                            <div class="col-12">
                                <?php echo $feedbackMessage; // Display combined feedback message ?>
                            </div>
                        </div>
                        <!-- END: Display Feedback Messages -->

                        <!-- Go Back Link -->
                        <a href="javascript:void(0)" onclick="history.back();" title="Return to the previous page" class="btn btn-sm btn-outline-secondary mb-3"><i class="fa fa-arrow-left mr-1"></i> Go back</a>


                        <!-- START: File Listing Card -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <h4 class="card-title"><i class="fa fa-file-alt mr-2"></i>Files</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th width="5%">#</th>
                                                        <th>Filename</th>
                                                        <th width="25%">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // --- Use Prepared Statement to fetch files ---
                                                    $sql_files = "SELECT id, iimg FROM new_doc WHERE row_id = ? AND foldername = ?";
                                                    $stmt_files = mysqli_prepare($conn, $sql_files);
                                                    $filesFound = false;
                                                    $dbErrorFiles = false; // Flag for DB error

                                                    if ($stmt_files) {
                                                        mysqli_stmt_bind_param($stmt_files, "is", $rowid, $Folder_name);
                                                        if (mysqli_stmt_execute($stmt_files)) {
                                                            $sproductql_result = mysqli_stmt_get_result($stmt_files);
                                                            $ct = 1; // Counter for row number

                                                            if (mysqli_num_rows($sproductql_result) > 0) {
                                                                $filesFound = true;
                                                                while ($Fdata = mysqli_fetch_assoc($sproductql_result)) {
                                                                    $safeFilenameJS = htmlspecialchars(addslashes($Fdata['iimg'])); // Prepare filename for JS confirm dialog
                                                                    ?>
                                                                    <tr>
                                                                        <td><?php echo $ct++; ?></td>
                                                                        <td><?php echo htmlspecialchars($Fdata['iimg']); ?></td>
                                                                        <td>
                                                                            <!-- OPEN Action -->
                                                                            <a href="<?php echo $uploadDirectory . urlencode($Fdata['iimg']); ?>" target="_blank" class="btn btn-sm btn-outline-primary action-btn" title="Open File">
                                                                                <i class="fa fa-external-link-alt"></i> Open
                                                                            </a>
                                                                            <!-- DELETE Action -->
                                                                            <a href="delete_newDoc.php?id=<?php echo $Fdata['id']; ?>" class="btn btn-sm btn-outline-danger action-btn" onclick="return confirm('Are you sure you want to delete this file: <?php echo $safeFilenameJS; ?>?');" title="Delete File">
                                                                                <i class="fa fa-trash-alt"></i> Delete
                                                                            </a>
                                                                            <!-- COPY Action -->
                                                                            <a href="copy_action.php?id=<?php echo $Fdata['id']; ?>&type=file&source_rowid=<?php echo $rowid; ?>&source_foldername=<?php echo urlencode($Folder_name); ?>" class="btn btn-sm btn-outline-warning action-btn" title="Copy File">
                                                                                 <i class="fa fa-copy"></i> Copy
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                                                                } // End while
                                                            } // End if num_rows > 0
                                                        } else {
                                                            $dbErrorFiles = true;
                                                            error_log("Error executing file list query in name.php: " . mysqli_stmt_error($stmt_files));
                                                        }
                                                        mysqli_stmt_close($stmt_files); // Close the statement
                                                    } else {
                                                        $dbErrorFiles = true;
                                                        error_log("Error preparing file list query in name.php: " . mysqli_error($conn));
                                                    }

                                                    // Display appropriate message if no files or if DB error occurred
                                                    if ($dbErrorFiles) {
                                                        echo '<tr><td colspan="3" class="text-danger text-center">Could not retrieve file list due to a database error. Please try again later.</td></tr>';
                                                    } elseif (!$filesFound) {
                                                         echo '<tr><td colspan="3" class="text-center">No files found in this folder.</td></tr>';
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END: File Listing Card -->


                        <!-- START: Sub-folder Listing Section -->
                         <div class="row mt-4">
                            <div class="col-12 mb-2">
                                <h4><i class="fa fa-folder mr-2"></i>Sub-folders</h4>
                            </div>
                         </div>
                         <div class="row">
                            <?php
                            // --- Use Prepared Statement to fetch sub-folders ---
                            // ***** VERIFY THIS QUERY LOGIC *****
                            // Assumes makeSubFolder.client_id should match $produc (the 'name' parameter)
                            // Assumes makeSubFolder.folderundar should match $Folder_name (the current folder name)
                            $sqlFolder = "SELECT id, foldername, row_id FROM makeSubFolder WHERE client_id = ? AND folderundar = ?";
                            $stmtFolder = mysqli_prepare($conn, $sqlFolder);
                            $foldersFound = false;
                            $dbErrorFolders = false; // Flag for DB error

                            if ($stmtFolder) {
                                // Bind $produc based on the assumption above. If it should be $rowid, change 'i' to 'i' and bind $rowid.
                                mysqli_stmt_bind_param($stmtFolder, "is", $produc, $Folder_name);
                                if (mysqli_stmt_execute($stmtFolder)) {
                                    $folderResult = mysqli_stmt_get_result($stmtFolder);
                                    if (mysqli_num_rows($folderResult) > 0) {
                                        $foldersFound = true;
                                        while ($row = mysqli_fetch_assoc($folderResult)) {
                                            // ***** VERIFY LINK PARAMETERS *****
                                            // Creates link like: name.php?name=$produc&Folder_name=SubFolderName&rowid=$SubFolderRowId
                                            // Ensure these parameters correctly identify the context for the *next* page load.
                                            $subFolderLink = sprintf(
                                                "name.php?name=%d&Folder_name=%s&rowid=%d",
                                                $produc, // Pass the main project ID ($produc) again?
                                                urlencode($row['foldername']), // Pass the sub-folder's name
                                                $row['row_id'] // Pass the row_id stored *in* the subfolder record? Or should it be the current $rowid?
                                            );
                                            ?>
                                            <div class="col-sm-6 col-md-4 col-lg-3 mb-3"> <!-- Added mb-3 -->
                                                 <a href="<?php echo $subFolderLink; ?>" class="folder-card" title="Open folder: <?php echo htmlspecialchars($row['foldername']); ?>">
                                                    <img src="inc/folder.png" alt="Folder Icon">
                                                    <span><?php echo htmlspecialchars($row['foldername']); ?></span>
                                                 </a>
                                            </div>
                                            <?php
                                        } // End while
                                    } // End if num_rows > 0
                                } else {
                                     $dbErrorFolders = true;
                                     error_log("Error executing sub-folder list query in name.php: " . mysqli_stmt_error($stmtFolder));
                                }
                                mysqli_stmt_close($stmtFolder);
                            } else {
                                 $dbErrorFolders = true;
                                 error_log("Error preparing sub-folder list query in name.php: " . mysqli_error($conn));
                            }

                             // Display appropriate message if no folders or if DB error occurred
                            if ($dbErrorFolders) {
                                echo '<div class="col-12"><p class="text-danger">Could not retrieve sub-folder list due to a database error.</p></div>';
                            } elseif (!$foldersFound) {
                                echo '<div class="col-12"><p>No sub-folders found in this folder.</p></div>';
                            }
                            ?>
                        </div>
                        <!-- END: Sub-folder Listing Section -->


                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
            <?php include "inc/footer.php"; ?>
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <?php
        // Include JS Files from footer if not already done by footer.php
        // Example: <script src="assets/js/vendors.js"></script>
        // Example: <script src="assets/js/app.js"></script>
    ?>
</body>
</html>
<?php
// Final check: Close the database connection if it's open and not persistent
if ($conn) {
    mysqli_close($conn);
}
?>