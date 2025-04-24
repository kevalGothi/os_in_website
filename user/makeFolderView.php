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
                                        <!--<h1>All Leads</h1>-->
                                        <?php
                            
                                $rowid = $_GET['rowid'];
                                // echo $Folder_name;
                                $id = $_GET['id'];
                                

                                ?>
                                        <!--<h4 class="card-title"><a href="makeFolder.php?proID=<?php echo $produc; ?>&folderName=<?php echo $Folder_name; ?>" style="background:#23a1d1; padding: 10px; border-radius:5px;">Make A Folder</a></h4>-->
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
                    
                       

                        
<div class="row">
                            <!-- start real estate contant -->
                        <div class="row magnific-wrapper">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <!--<div class="card-header">-->
                                    <!--    <div class="card-heading">-->
                                    <!--        <h4 class="card-title">Confirm List</h4>-->
                                    <!--    </div>-->
                                    <!--</div>-->
<p><a href="javascript:void(0)" onclick="history.back();" title="Return to the previous page">« Go back</a></p>

                                    <div class="row">

                                    
                                       
<?php
$sproductql = mysqli_query($conn, "SELECT * FROM makeSubFolderDoc WHERE row_id = '$rowid' && sub_row_id = '$id'");
$ctf = 1;
foreach ($sproductql as $data){
?>
<table width="100%" style="padding:20px 50px;">
    <tr>
    <td></td>
    <td><?php echo $ctf++; ?></td>
    <td>
        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="https://parshwastudio.in/user/upload/<?php echo $data['img'] ?>" style="padding:10px; background:#f3f3f3;">
                                            <div class="card-body" style=" border-radius:7px; background:f3f3f3;">
                                                <div class="gallery" style="">
                                                    <!--<button onclick="history.back(+1)">Go Back</button>-->
                                                    <!--<img src="inc/folder.png" alt="" style="width:15%">-->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#FF0000;color:#fff;border:none;padding:10px 13px;border-radius:5px;font-size:20px;"><?php echo 'OPEN'; ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
    </td>
    <td>
        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="deletesubfolder.php?id=<?php echo $data['id'] ?>" style="padding:10px; background:#f3f3f3;">
                                            <div class="card-body" style=" border-radius:7px; background:f3f3f3;">
                                                <div class="gallery" style="">
                                                    <!--<button onclick="history.back(+1)">Go Back</button>-->
                                                    <!--<img src="inc/folder.png" alt="" style="width:15%">-->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#FF0000;color:#fff;border:none;padding:10px 13px;border-radius:5px;font-size:20px;"><?php echo 'Delete'; ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
    </td>
</tr>  
</table>                                      

                                       
                                        
<?php
}
?>
 <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="uploadsubdoc.php?id=<?php echo $id; ?>&rowID=<?php echo $rowid; ?>" style="padding:10px; background:#f3f3f3;">
                                            <div class="card-body" style=" border-radius:7px; background:f3f3f3;">
                                                <div class="gallery" style="background-color:#fff">
                                                    <!--<button onclick="history.back(+1)">Go Back</button>-->
                                                    <!--<img src="inc/folder.png" alt="" style="width:15%">-->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#23a1d1;color:#fff;border:none;padding:10px 13px;border-radius:5px;font-size:20px;"><?php echo "Upload PDF"; ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        </div>
                                        

<?php
    // $sqlFolder = mysqli_query($conn, "SELECT * FROM makeafolder WHERE product_id = '$produc' AND underFoldername = '$Folder_name'");
    // foreach($sqlFolder as $row){ 
    ?>

                                    <!--<div class="col-sm-6 col-12 col-md-4" >-->
                                    <!--    <a href="makeFolderView.php?img_name=<?php echo $row['img'] ?>&id=<?php echo $row['id'] ?>" style="padding:10px;">-->
                                    <!--        <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">-->
                                    <!--            <div class="gallery" >-->
                                                    
                                    <!--                <img src="inc/folder.png" alt="" style="width:12%">-->
                                                    
                                                    
                                    <!--                    <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo $row['folderName'] ?></button>-->
                                                    
                                    <!--            </div>-->
                                    <!--        </div>-->
                                    <!--        </a>-->
                                    <!--    </div>-->

<?php    
        
    // }
?>

     


                                        
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