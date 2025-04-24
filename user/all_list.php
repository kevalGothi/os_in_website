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
                                        <h1>All Project</h1>
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
                                    
<style>
    body {
    font-family: sans-serif
}
.dialog-ovelay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0, 0, 0, 0.50);
    z-index: 999999
}
.dialog-ovelay .dialog {
    width: 400px;
    margin: 100px auto 0;
    background-color: #fff;
    box-shadow: 0 0 20px rgba(0,0,0,.2);
    border-radius: 3px;
    overflow: hidden
}
.dialog-ovelay .dialog header {
    padding: 10px 8px;
    background-color: #f6f7f9;
    border-bottom: 1px solid #e5e5e5
}
.dialog-ovelay .dialog header h3 {
    font-size: 14px;
    margin: 0;
    color: #555;
    display: inline-block
}
.dialog-ovelay .dialog header .fa-close {
    float: right;
    color: #c4c5c7;
    cursor: pointer;
    transition: all .5s ease;
    padding: 0 2px;
    border-radius: 1px    
}
.dialog-ovelay .dialog header .fa-close:hover {
    color: #b9b9b9
}
.dialog-ovelay .dialog header .fa-close:active {
    box-shadow: 0 0 5px #673AB7;
    color: #a2a2a2
}
.dialog-ovelay .dialog .dialog-msg {
    padding: 12px 10px
}
.dialog-ovelay .dialog .dialog-msg p{
    margin: 0;
    font-size: 15px;
    color: #333
}
.dialog-ovelay .dialog footer {
    border-top: 1px solid #e5e5e5;
    padding: 8px 10px
}
.dialog-ovelay .dialog footer .controls {
    direction: rtl
}
.dialog-ovelay .dialog footer .controls .button {
    padding: 5px 15px;
    border-radius: 3px
}
.button {
  cursor: pointer
}
.button-default {
    
    
    color: #5D5D5D;
}
.button-danger {
    background-color: #f44336;
    border: 1px solid #d32f2f;
    color: #f5f5f5
}
.link {
  padding: 5px 10px;
  cursor: pointer
}
</style>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <!-- <th>IMAGE</th> -->
                                                        <th>Service</th>
                                                        <th>Operation</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="text-muted mb-0">
<?php
    require_once "../db/conn.php";
    $sql = mysqli_query($conn, "SELECT * FROM productlist");
    foreach($sql as $data){
?>
                                                    <tr>
                                                        <td><?php echo $data['id']; ?></td>
                                                        <td><?php echo $data['product_name'];  ?></td>
                                                        <!-- <td>
                                                            <div class="bg-img">
                                                                <img class="img-fluid rounded" src="../assets/images/products/" alt="">
                                                            </div>
                                                            
                                                        </td> -->
                                                        <td><?php echo $data['Name']; ?></td>
                                                        <td><span class="badge badge-success ">
                                                            <?php
                                                                if($data['status'] == 0){
                                                                    echo "Hold";
                                                                }
                                                                elseif($data['status'] == 1){
                                                                    echo "Confirm";
                                                                }
                                                                elseif($data['status'] == 2){
                                                                    echo "Rejected";
                                                                }
                                                            ?>
                                                        </span></td>
                                                        <td>
                                                            <?php 
                                                                if($data['status'] == 1){ ?>
<a href="edit.php?id=<?php echo $data['id']; ?>" style="background:red; padding:7px; border-radius:5px; "><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" style="color:#fff;">Edit</i></a>
                                                            <?php    }else{ ?>
                                                                <a href="verify.php?id=<?php echo $data['id']; ?>" class="mr-2 " style="background:green; padding:7px; border-radius:5px; "><i class="fa fa-pencil button-default link" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" style="color:#000;">Confirm</i></a>
                                                            
                                                            <a href="#" style="background:red; padding:7px; border-radius:5px; "><i class="fa fa-trash" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" style="color:#fff;">Reject</i></a>
                                                            <?php }
                                                            
                                                            ?>
                                                            
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