<!DOCTYPE html>
<html lang="en">
<head>
	<title>Enquiry Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST">
					<span class="login100-form-logo">
						<img src="../user/assets/logo1.jpg" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Enquiry Form
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="pname" placeholder="Service Name" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="yname" placeholder="Your Name" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="tel" name="phone" placeholder="Phone Number" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email Id" required>
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					

					

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="submit">
							Submit
						</button>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	
<?php
	include "../db/conn.php";
	
	// error_reporting(0);

    if(
        isset($_POST['submit'])
    ){
        $pname = $_POST['pname'];
        $yname = $_POST['yname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $sql = mysqli_query($conn, " INSERT INTO productlist (Name, product_name, phone, email, status) VALUES ('$yname' , '$pname' , '$phone' , '$email' , '0')");
        if($sql){
            
            // echo "<script>window.location.href='../user/';</script>";
            echo "<script>alert('Successfully Add on Data Please Wait For Admin Verify!!!');</script>";
        }else{
            // echo "<script>alert('Please Enter Correct Value');</script>";
        }

    }
?>

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>