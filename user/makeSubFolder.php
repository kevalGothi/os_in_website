<?php
    require_once "../db/conn.php";
    session_start();
    $usernam = $_SESSION['usernam'];
    $passs = $_SESSION['pass'];
    
// echo $usernam;
    if($usernam == true && $passs == true){

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
                                        <h1>New Folder</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">New Folder</li>
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
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="foldername" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            

                                            

                                            <!--<div class="form-group row">-->
                                            <!--    <label class="col-sm-2 col-form-label" style="color:#000;">File</label>-->
                                            <!--    <div class="col-sm-10">-->
                                            <!--        <input type="file" placeholder="" id="" name="img[]" multiple class="form-control autonumber" required>-->
                                            <!--    </div>-->
                                            <!--</div> -->

                                            


                                            
                                            <div class="form-group row">
                                                
                                                <div class="" >
                                                    <input type="submit" placeholder="" value="Submit" id="percentageUS3decNeg" class="form-control autonumber" name="submit" style="background:grey;color:#fff;">
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        
                                        include "../db/conn.php";
                                    
                                        if(
                                            isset($_POST['submit'])
                                        ){
                                            // $proID = $_GET['proID'];
                                            $folderNameUnder = $_GET['qnam'];
                                            $rowid = $_GET['rowid'];
                                            $proid = $_GET['proname'];
                                            // echo $proID . "/" . $proid;

                                            $foldername = $_POST['foldername'];
                                            

                                            
                                                
                                                $ssinsert = mysqli_query($conn, "INSERT INTO makeSubFolder (client_id, row_id, foldername, folderundar) VALUES ('$proid' , '$rowid' , '$foldername' , '$folderNameUnder')");
                                            
                                            
                                    
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