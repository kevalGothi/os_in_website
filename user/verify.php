<?php
    include "../db/conn.php";
    $pid1 = $_GET['id'];
    $product_id =  rand(10,100);
    // echo $product_id;
    $pid = "RAM/". date("Y/F/d/h/i") . "-". $product_id;
    // echo $pid;
    
    $sql = mysqli_query($conn, "UPDATE productlist SET product_id = '$pid' , status = '1' WHERE id = '$pid1'");
    if($sql){
        echo "Successfully Verify";
        echo "<script>window.location.href = 'all_list.php';</script>";
    }
?>