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
                                        <h1>All Leads</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index.php"><i class="ti ti-home"></i></a>
                                                </li>
                                                <li class="breadcrumb-item">
                                                    Dashboard
                                                </li>
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Project Details</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <?php
                            
                                

                                $sqlsearch = mysqli_query($conn, "SELECT * FROM productlist WHERE status = '1'");
                                

                                ?>
                        <!-- start real estate contant -->
                        <div class="row magnific-wrapper">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <!--<h4 class="card-title">Project Details</h4>-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <?php
foreach($sqlsearch as $data){
                                        ?>
                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="view2.php?produc=<?php echo $data['product_id'] ?>&rowid=<?php echo $data['id'] ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:#D3D3D3;">
                                                <div class="gallery" >
                                                    
                                                    <!-- <img src="inc/folder.png" alt="" style="width:40%"> -->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#D3D3D3;border:none;padding:5px;border-radius:5px;font-size:25px;"><?php echo $data['product_name'] ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
<?php } ?>
                        
                                    </div>
                                </div>
                            </div>
                        </div>



                               
                        
                        <!-- end real estate contant -->
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