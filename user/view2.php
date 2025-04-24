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
                    
                       <p><a href="javascript:void(0)" onclick="history.back();" title="Return to the previous page">« Go back</a></p>

                        <?php
                            
                                $produc = $_GET['produc'];
                                $rowid = $_GET['rowid'];

                                // $sqlsearch = mysqli_query($conn, "SELECT * FROM enquirydocumnet WHERE productNumber = '$produc'");
                                // foreach($sqlsearch as $data){

                                ?>
<div class="row">
                            <!-- start real estate contant -->
                        <div class="row magnific-wrapper">
                            <div class="col-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <div class="card-heading">
                                            <!--<h4 class="card-title"><a href="makeFolder.php?proID=<?php echo $produc; ?>" style="background:#23a1d1; padding: 10px; border-radius:5px;">Make A Folder</a></h4-->
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="name.php?name=<?php echo $produc ?>&Folder_name=<?php echo 'Architectural Drawing' ?>&qname=<?php echo 'listDraw' ?>&rowid=<?php echo $rowid ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo "Architectural Drawing" ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                       

                                        

                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="name.php?name=<?php echo $produc ?>&Folder_name=<?php echo 'Structural Drawing' ?>&qname=<?php echo 'completionCert' ?>&rowid=<?php echo $rowid ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo "Structural Drawing" ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        

                                        

                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="name.php?name=<?php echo $produc ?>&Folder_name=<?php echo 'Site Visit Report' ?>&qname=<?php echo 'asBuildDraw' ?>&rowid=<?php echo $rowid ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo "Site Visit Report " ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        

                                        

                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="name.php?name=<?php echo $produc ?>&Folder_name=<?php echo 'Boq' ?>&qname=<?php echo 'StabilityCer' ?>&rowid=<?php echo $rowid ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo "Boq" ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        

                                      

                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="name.php?name=<?php echo $produc ?>&Folder_name=<?php echo 'Invoice' ?>&qname=<?php echo 'invoice' ?>&rowid=<?php echo $rowid ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo "Invoice " ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>

                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="name.php?name=<?php echo $produc ?>&Folder_name=<?php echo 'PO' ?>&qname=<?php echo 'po' ?>&rowid=<?php echo $rowid ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo "PO " ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>

                                        <div class="col-sm-6 col-12 col-md-4" >
                                        <a href="name.php?name=<?php echo $produc ?>&Folder_name=<?php echo 'Structuralstability' ?>&qname=<?php echo 'structuralstability' ?>&rowid=<?php echo $rowid ?>" style="padding:10px;">
                                            <div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px; border-radius:7px; background:grey;">
                                                <div class="gallery" >
                                                    
                                                    <img src="inc/folder.png" alt="" style="width:12%">
                                                    
                                                    
                                                        <button style="margin-top:15px; background-color:grey;border:none;padding:5px;border-radius:5px;font-size:18px;"><?php echo "Structuralstability " ?></button>
                                                    
                                                </div>
                                            </div>
                                            </a>
                                        </div>



                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <?php
                            
                        // }
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