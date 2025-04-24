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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">All Leads</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!-- start real estate contant -->
                    
                        <form action="" method="POST">
                            <input type="text" placeholder="Product Number" name="produc">
                            <input type="submit" value="Submit" name="submit">
                        </form>

                        <?php
                            if(isset($_POST['submit'])){
                                $produc = $_POST['produc'];

                                $sqlsearch = mysqli_query($conn, "SELECT * FROM enquirydocumnet WHERE productNumber = '$produc'");
                                foreach($sqlsearch as $data){

                                ?>
<div class="row">
                            <div class="col-xxl-8 m-b-30">
                                <div class="card card-statistics h-100 m-b-0">
                                    <div class="card-header d-flex justify-content-between">
                                        <div class="card-heading">
                                            <h4 class="card-title">All Leads </h4>
                                        </div>
                                        <div class="dropdown">
                                            <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fe fe-more-horizontal"></i>
                                            </a>
                                            <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                                                <a href="staff-form-create.php">All Leads</a>
                                                <h6 class="mb-1 mt-3">Export</h6>
                                                <a class="dropdown-item" href="#"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export to PDF</a>
                                                <a class="dropdown-item" href="#"><i class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead class="bg-light">
                                                    <tr>
                                                    <th>ID</th>
                                                        <th>Enquiry Number</th>
                                                        <!-- <th>IMAGE</th> -->
                                                        <th>List Draw</th>
                                                        <th>Completion Certificate </th>
                                                        <th>As Build Draw</th>
                                                        <th>Stability Certificate</th>
                                                        <th>Invoice</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-muted mb-0">
                                                    <tr>
                                                        <td><?php echo $data['id']; ?></td>
                                                        <td><?php echo $data['productNumber'];  ?></td>
                                                        
                                                        <td>
                                                            <a href="upload/<?php echo $data['listDraw']; ?>" style="color:blue;"><?php echo $data['listDraw']; ?></a>
                                                        </td>

                                                        <td>
                                                            <a href="upload/<?php echo $data['completionCert']; ?>" style="color:blue;"><?php echo $data['completionCert']; ?></a>
                                                        </td>

                                                        <td>
                                                            <a href="upload/<?php echo $data['asBuildDraw']; ?>" style="color:blue;"><?php echo $data['asBuildDraw']; ?></a>
                                                        </td>

                                                        <td>
                                                            <a href="upload/<?php echo $data['StabilityCer']; ?>" style="color:blue;"><?php echo $data['StabilityCer']; ?></a>
                                                        </td>

                                                        <td>
                                                            <a href="upload/<?php echo $data['invoice']; ?>" style="color:blue;"><?php echo $data['invoice']; ?></a>
                                                        </td>
                                                        
                                                        
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <?php
                            }
                        }
                        ?>
                        
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