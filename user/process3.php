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
    $number = htmlspecialchars($fetch["location"]); // Sanitize the phone number
} else {
    $number = ''; // Default value if no record is found
}
?>


    <label class="col-sm-2 col-form-label" style="color:#000;">Location</label>
<div class="col-sm-10">
    <input type="text" placeholder="<?php echo $number; ?>" value="<?php echo $number; ?>" id="" name="location" class="form-control autonumber" required>
</div>

<?php
    } else {
        echo "No value received.";
    }
} else {
    echo "Invalid request.";
}
?>
