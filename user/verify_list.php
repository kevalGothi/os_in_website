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
                                        <h1>All Verify Leads</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">All Verify Leads</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- start real estate contant -->
                    

                        <div class="row">
                            <div class="col-xxl-8 m-b-30">
                                <div class="card card-statistics h-100 m-b-0">
                                    
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <!-- <th>IMAGE</th> -->
                                                        <th>Service</th>
                                                        <th>Enquiry Number </th>
                                                        <th>Email ID</th>
                                                        <th>Operation</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-muted mb-0">
<?php
    require_once "../db/conn.php";
    $sql = mysqli_query($conn, "SELECT * FROM productlist WHERE status = '1'");
    foreach($sql as $data){
?>
                                                    <tr>
                                                        <td><?php echo $data['id']; ?></td>
                                                        <td><?php echo $data['Name'];  ?></td>
                                                        <!-- <td>
                                                            <div class="bg-img">
                                                                <img class="img-fluid rounded" src="../assets/images/products/" alt="">
                                                            </div>
                                                            
                                                        </td> -->
                                                        <td><?php echo $data['product_name']; ?></td>
                                                        <td><?php echo $data['product_id']; ?></td>
                                                        <td><?php echo $data['email']; ?></td>
                                                        <td><span class="badge badge-success ">
                                                            <?php
                                                                
                                                                    echo "Verify";
                                                                
                                                            ?>
                                                        </span></td>
                                                        <td>
                                                            <a href="upload_product.php?id=<?php echo $data['id']; ?>&product_id=<?php echo $data['product_id']; ?>" class="mr-2" style="background:green; padding:7px; border-radius:5px; "><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" style="color:#fff;">Upload</i></a>
                                                            
                                                        </td>
                                                    </tr>
<?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
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