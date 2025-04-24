<?php
session_start();
    require_once "../db/conn.php";
    
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
                            
                                $produc = $_GET['name'];
                                $Folder_name = $_GET['Folder_name'];
                                $dbFolder_name = $_GET['qname'];
                                $rowid = $_GET['rowid'];
                                // echo $Folder_name;
                                

                                ?>
                                        <h4 class="card-title"><a href="makeSubFolder.php?qnam=<?php echo $Folder_name; ?>&proname=<?php echo $produc; ?>&rowid=<?php echo $rowid; ?>" style="background:#23a1d1; padding: 10px; border-radius:5px;">Add New Folder</a></h4>
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
                    
                       
<p><a href="javascript:void(0)" onclick="history.back();" title="Return to the previous page">« Go back</a></p>

                        
<div class="row">
                            <!-- start real estate contant -->
                        <div class="row magnific-wrapper">
                            <div class="col-12">
                                <div class="card card-statistics">

                                    <div class="row">

                                    
<table width="100%">
    <?php
 $sproductql = mysqli_query($conn, "select * from new_doc where row_id = '$rowid' and foldername = '$Folder_name'");
 $fd = mysqli_fetch_array($sproductql);
//  echo $fd['row_id'];
 if(!empty($fd['row_id'])){
     $ct = 1;
     foreach($sproductql as $Fdata){
?>
<tr>
    <td align="center" width="7%"><?php echo $ct++; ?></td>
    <td ><?php echo $Fdata['iimg']; ?></td>
    <td>
<div class="col-sm-6 col-12 col-md-4" >
                                        <a href="upload/<?php echo $Fdata['iimg']; ?>" style="padding:10px; background:#f3f3f3;">
                                            <div class="card-body" style=" border-radius:7px; background:f3f3f3;">
                                                <div class="gallery" style="background-color:#fff">
                                                    <!--<button onclick="history.back(+1)">Go Back</button>-->
                                                    <!--<img src="inc/folder.png" alt="" style="width:15%">-->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#FF0000;color:#fff;border:none;padding:10px 13px;border-radius:5px;font-size:20px;"><?php echo 'OPEN'; ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        </td>
                                        <td><div class="col-sm-6 col-12 col-md-4" >
                                        <a href="delete_newDoc.php?id=<?php echo $Fdata['id']; ?>" style="padding:10px; background:#f3f3f3;">
                                            <div class="card-body" style=" border-radius:7px; background:f3f3f3;">
                                                <div class="gallery" style="background-color:#fff">
                                                    <!--<button onclick="history.back(+1)">Go Back</button>-->
                                                    <!--<img src="inc/folder.png" alt="" style="width:15%">-->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#FF0000;color:#fff;border:none;padding:10px 13px;border-radius:5px;font-size:20px;"><?php echo 'Delete'; ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div></td>
                                        </tr>
<?php } ?>

</table>                                       

     <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="upload.php?qnam=<?php echo $Folder_name; ?>&proname=<?php echo $produc; ?>&rowID=<?php echo $rowid; ?>" style="padding:10px; background:#f3f3f3;">
                                            <div class="card-body" style=" border-radius:7px; background:f3f3f3;">
                                                <div class="gallery" style="background-color:#fff">
                                                    <!--<button onclick="history.back(+1)">Go Back</button>-->
                                                    <!--<img src="inc/folder.png" alt="" style="width:15%">-->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#23a1d1;color:#fff;border:none;padding:10px 13px;border-radius:5px;font-size:20px;"><?php echo "Upload New File"; ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>                                    

                                        
                                        
<?php
}else{
?>
 <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="upload.php?qnam=<?php echo $Folder_name; ?>&proname=<?php echo $produc; ?>&rowID=<?php echo $rowid; ?>" style="padding:10px; background:#f3f3f3;">
                                            <div class="card-body" style=" border-radius:7px; background:f3f3f3;">
                                                <div class="gallery" style="background-color:#fff">
                                                    <!--<button onclick="history.back(+1)">Go Back</button>-->
                                                    <!--<img src="inc/folder.png" alt="" style="width:15%">-->
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:#23a1d1;color:#fff;border:none;padding:10px 13px;border-radius:5px;font-size:20px;"><?php echo "Upload PDF"; ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        </div><?php } ?>

                                        

<?php
    $sqlFolder = mysqli_query($conn, "SELECT * FROM makeSubFolder WHERE client_id = '$produc' AND folderundar = '$Folder_name'");
    foreach($sqlFolder as $row){ ?>

                                    <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="makeFolderView.php?id=<?php echo $row['id'] ?>&rowid=<?php echo $row['row_id'] ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;width:auto;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:14px;"><?php echo $row['foldername'] ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>

<?php    }
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