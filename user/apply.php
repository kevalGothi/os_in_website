<?php
    require_once "../db/conn.php";
    session_start();
    $username = $_SESSION['usernam'];
    $passs = $_SESSION['pass'];

// echo $usernam;
    if($username == true && $passs == true){

?>
<?php $page = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); ?>
<?php include "inc/header.php"; ?>
<style>
    a,i,td{
        color: black;
    }
    .bg-grey{
        background-color: grey;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Event listener for the dropdown change
            $("#myDropdown").on("change", function() {
                var selectedValue = $(this).val(); // Get the selected value
                
                $.ajax({
                    url: "process.php", // The PHP script to handle the AJAX request
                    type: "POST",
                    data: { value: selectedValue }, // Send the selected value
                    success: function(response) {
                        // Handle the response from the PHP script
                        $("#result").html(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur
                        $("#result").html("An error occurred: " + error);
                    }
                });
                $.ajax({
                    url: "process2.php", // The PHP script to handle the AJAX request
                    type: "POST",
                    data: { value: selectedValue }, // Send the selected value
                    success: function(response) {
                        // Handle the response from the PHP script
                        $("#result1").html(response);
                    },
                    error: function(xhr, status, error) {
                        // Handle any errors that occur
                        $("#result1").html("An error occurred: " + error);
                    }
                });
            });
        });
    </script>
<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <!-- <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div> -->
            <!-- end pre-loader -->
            <!-- begin app-header -->
            <?php include "inc/topNavbar.php"; ?>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
<?php include "inc/sideNavbar.php"; ?>
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>New Enquiry Form</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.html"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Forms
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">New Enquiry Form</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <!--<h4 class="card-title">New Enquiry Form</h4>-->
                                        </div>
                                    </div>
                                    <div class="card-body">


            
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Project Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="pname" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Agency Name</label>
                                                <div class="col-sm-10">
                                                <?php
// Ensure you have a valid database connection
// $conn = mysqli_connect('host', 'user', 'password', 'database');

$selectedValue = isset($_GET['aname']) ? $_GET['aname'] : 'disable'; // Default to 'disable' if 'aname' is not set

// Query to fetch data
$ssk = mysqli_query($conn, "SELECT * FROM newProfile");

// Check for query errors
if (!$ssk) {
    die('Query failed: ' . mysqli_error($conn));
}
?>

<select name="ynamea" class="form-control autonumber" id="myDropdown" required>
    <option value="disable" <?php echo $selectedValue === 'disable' ? 'selected' : ''; ?>>Select</option>
    <?php
    foreach($ssk as $data) {
        $isSelected = $selectedValue == $data['id'] ? 'selected' : '';
        echo '<option value="' . htmlspecialchars($data['id']) . '" ' . $isSelected . '>' . htmlspecialchars($data['name']) . '</option>';
       
    }
    ?>
</select>

                                                </div>
                                            </div>
                                            <div class="form-group row" id="result2"> 
                                            </div>
                                            <div class="form-group row" id="result"> 
                                            </div>

                                            <div class="form-group row" id=""> 
                                                <div class="page-title mb-2 mb-sm-0">
                                        <h4 class="card-title"><a href="new_profile.php" style="background:#23a1d1; padding: 10px; border-radius:5px;">Add New Agency</a></h4>
                                    </div>
                                            </div>

                                            

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Location</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="location" class="form-control autonumber" required>
                                                </div>
                                            </div> 

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Client Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="agencyName" class="form-control autonumber" required>
                                                </div>
                                            </div>

                                            <!--<div class="form-group row">-->
                                            <!--    <label class="col-sm-2 col-form-label" style="color:#000;">Agency phone  No</label>-->
                                            <!--    <div class="col-sm-10">-->
                                            <!--        <input type="text" placeholder="" id="" name="phone" class="form-control autonumber" required>-->
                                            <!--    </div>-->
                                            <!--</div> -->

                                            <!--<div class="form-group row">-->
                                            <!--    <label class="col-sm-2 col-form-label" style="color:#000;">Email</label>-->
                                            <!--    <div class="col-sm-10">-->
                                            <!--        <input type="email" placeholder="" id="" name="email" class="form-control autonumber" required>-->
                                            <!--    </div>-->
                                            <!--</div>-->

                                            
                                            <div class="form-group row">
                                                
                                                <div class="" >
                                                    <input type="submit" placeholder="" value="Submit" id="percentageUS3decNeg" class="form-control autonumber" name="submit" style="background:grey;color:#fff;">
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        
                                        include "../db/conn.php";
                                        
                                        // error_reporting(0);
                                    
                                        if(
                                            isset($_POST['submit'])
                                        ){
                                            $pname = $_POST['pname'];
                                            $ynamea = $_POST['ynamea'];
                                            // $clientd = $_POST['yname'];
                                            $phone = $_POST['phone'];
                                            $agencyName  = $_POST['agencyName'];
                                            $location = $_POST['location'];
                                            // echo $ynamea;
                                            $sclientql = mysqli_query($conn, "select * from newProfile where id = '$ynamea'");
                                            $clientfetch = mysqli_fetch_array($sclientql);
                                            $clientName = $clientfetch['name'];
                                            // echo $clientName;
                                    
                                            $sql = mysqli_query($conn, " INSERT INTO productlist (Name, client_id, product_name, phone, email, location, agencyName, status) VALUES ('$clientName' , '$ynamea' , '$pname' , '$phone' , '$email' , '$location' , '$agencyName' , '0')");
                                            if($sql){
                                                
                                                // echo "<script>window.location.href='../user/';</script>";
                                                echo "<script>alert('Successfully Add on Data Please Wait For Admin Verify!!!');</script>";
                                            }else{
                                                // echo "<script>alert('Please Enter Correct Value');</script>";
                                            }
                                    
                                        }

    ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>
                <!-- end app-main -->
            </div>
            <!-- end app-container -->
 <?php include "inc/footer.php"; ?>

<?php
    }else{
        echo "<h1>Error This File is Not Available</h1>";
    }
?>