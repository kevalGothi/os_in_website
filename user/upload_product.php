<?php

    require_once "../db/conn.php";
    session_start();
    $usernam = $_SESSION['usernam'];
    $passs = $_SESSION['pass'];

// echo $usernam;
    if($usernam == true && $passs == true){

?>
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
                                        <h1>Taniya Document Upload</h1>
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
                                                <li class="breadcrumb-item active text-primary" aria-current="page">Document Upload</li>
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
                                            <h4 class="card-title">Document Upload</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Architectural Drawing</label>
                                                <div class="col-sm-10">
                                                    <input type="file" placeholder="" id="" name="listDraw" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Architectural Drawing Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="ArchitecturalDrawingFolder" value="Architectural Drawing" class="form-control autonumber" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Structural Drawing </label>
                                                <div class="col-sm-10">
                                                    <input type="file" placeholder="" id="" name="completionCert" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Structural Drawing Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="StructuralDrawingFolder" value="Structural Drawing" class="form-control autonumber" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Site Visit Report</label>
                                                <div class="col-sm-10">
                                                    <input type="file" placeholder="" id="" name="asBuildDraw" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Site Visit Report Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="SiteVisitReportFolder" value="Site Visit Report" class="form-control autonumber" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Boq</label>
                                                <div class="col-sm-10">
                                                    <input type="file" placeholder="" id="" name="StabilityCer" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Boq Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="BoqFolder" value="Boq" class="form-control autonumber" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">PO</label>
                                                <div class="col-sm-10">
                                                    <input type="file" placeholder="" id="" name="po" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">PO Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="POFolder" value="PO" class="form-control autonumber" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Invoice</label>
                                                <div class="col-sm-10">
                                                    <input type="file" placeholder="" id="" name="invoice" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Invoice Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="InvoiceFolder" value="Invoice" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">structural stability</label>
                                                <div class="col-sm-10">
                                                    <input type="file" placeholder="" id="" name="structuralstability" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label" style="color:#000;">Structural Stability Folder Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" placeholder="" id="" name="StructuralstabilityFolder" value="Structural Stability" class="form-control autonumber" required>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            <div class="form-group row">
                                                
                                                <div class="" >
                                                    <input type="submit" placeholder="" value="Submit" id="percentageUS3decNeg" class="form-control autonumber" name="submit" style="background:grey;color:#fff;">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
<?php
    if(isset($_POST['submit'])){
        $folder  = "upload/";
        $listDraw = $_FILES['listDraw']['name'];
        $listDrawtemp = $_FILES['listDraw']['tmp_name'];
        $f = $folder.$listDraw;

        $completionCert = $_FILES['completionCert']['name'];
        $completionCerttemp = $_FILES['completionCert']['tmp_name'];
        $f1 = $folder.$completionCert;

        $asBuildDraw = $_FILES['asBuildDraw']['name'];
        $asBuildDrawtemp = $_FILES['asBuildDraw']['tmp_name'];
        $f2 = $folder.$asBuildDraw;

        $StabilityCer = $_FILES['StabilityCer']['name'];
        $StabilityCertemp = $_FILES['StabilityCer']['tmp_name'];
        $f3 = $folder.$StabilityCer;

        $invoice = $_FILES['invoice']['name'];
        $invoicetemp = $_FILES['invoice']['tmp_name'];
        $f4 = $folder.$invoice;

        $po = $_FILES['po']['name'];
        $potemp = $_FILES['po']['tmp_name'];
        $f5 = $folder.$po;

        $structuralstability = $_FILES['structuralstability']['name'];
        $structuralstabilitytemp = $_FILES['structuralstability']['tmp_name'];
        $f6 = $folder.$structuralstability;
        
        $ArchitecturalDrawingFolder = $_POST['ArchitecturalDrawingFolder'];
        $StructuralDrawingFolder = $_POST['StructuralDrawingFolder'];
        $SiteVisitReportFolder = $_POST['SiteVisitReportFolder'];
        $BoqFolder = $_POST['BoqFolder'];
        $InvoiceFolder = $_POST['InvoiceFolder'];
        $POFolder = $_POST['POFolder'];
        $StructuralstabilityFolder = $_POST['StructuralstabilityFolder'];

        if(move_uploaded_file($listDrawtemp,$f)){
            if(move_uploaded_file($completionCerttemp, $f1)){
                if(move_uploaded_file($asBuildDrawtemp, $f2)){
                    if(move_uploaded_file($StabilityCertemp, $f3)){
                        if(move_uploaded_file($invoicetemp, $f4)){
                            if(move_uploaded_file($po, $f5)){
                                if(move_uploaded_file($structuralstability, $f6)){
                                    echo "<script>alert('File Uploaded In folder');</script>";
                                }
                            }
                            
                        }
                    }
                }
            }
        }
        $enquiryID = $_GET['id'];
        $productNumber = $_GET['product_id'];
        $sss = mysqli_query($conn,"select * from enquiryDocumnet where productNumber = '$productNumber'");

        if(mysqli_num_rows($sss) > 0){
            $sqlinsert = mysqli_query($conn, "UPDATE enquiryDocumnet SET listDraw = '$listDraw', ArchitecturalDrawingFolder = '$ArchitecturalDrawingFolder' , completionCert = '$completionCert', StructuralDrawingFolder = '$StructuralDrawingFolder' , asBuildDraw = '$asBuildDraw', SiteVisitReportFolder = '$SiteVisitReportFolder' , StabilityCer = '$StabilityCer', BoqFolder = '$BoqFolder' , invoice = '$invoice', InvoiceFolder = '$InvoiceFolder', po = '$po', POFolder = '$POFolder', structuralstability = '$structuralstability', StructuralstabilityFolder = '$StructuralstabilityFolder', status = '1' WHERE enquiryID = '$enquiryID' AND productNumber = '$productNumber'");

            if($sqlinsert){
                echo "<script>alert('File Uploaded In Database');</script>";
            }
        }else{

       

        $sqlinsert = mysqli_query($conn, "INSERT INTO enquiryDocumnet (enquiryID, productNumber, listDraw, ArchitecturalDrawingFolder, completionCert, StructuralDrawingFolder, asBuildDraw, SiteVisitReportFolder, StabilityCer, BoqFolder, invoice, InvoiceFolder, po, POFolder, structuralstability, StructuralstabilityFolder, status) VALUES ('$enquiryID' , '$productNumber' , '$listDraw' , '$ArchitecturalDrawingFolder' , '$completionCert' , '$StructuralDrawingFolder' , '$asBuildDraw' , '$SiteVisitReportFolder' , '$StabilityCer' , '$BoqFolder' , '$invoice' , '$InvoiceFolder' , '$po' , '$POFolder' , '$structuralstability' , '$StructuralstabilityFolder' , '1')");

        if($sqlinsert){
            echo "<script>alert('File Uploaded In Database');</script>";
        }
    }
    }
?>
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