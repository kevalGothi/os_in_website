<?php
include "../db/conn.php";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'value' is set in the POST request
    if (isset($_POST['value'])) {
        $value = htmlspecialchars($_POST['value']); // Sanitize the input value
        
        // Example processing based on the selected value
        
        // echo $value;
        
// Fetch the phone number from the database
$sql = mysqli_query($conn, "SELECT * FROM newProfile WHERE id = '$value'");
$fetch = mysqli_fetch_array($sql);

// Check if the fetch was successful
if ($fetch) {
    $number = htmlspecialchars($fetch["email"]); // Sanitize the phone number
} else {
    $number = ''; // Default value if no record is found
}
?>


<?php
    } else {
        echo "No value received.";
    }
} else {
    echo "Invalid request.";
}
?>
