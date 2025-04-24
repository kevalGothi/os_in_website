<?php
    require_once "../db/conn.php";
    $id = $_GET['id'];
    
    $sql = mysqli_query($conn, "DELETE FROM makeSubFolderDoc WHERE id = '$id'");
    if($sql){
        echo "<script>alert('Successfully Delete Data')</script>";
    }
    
?>