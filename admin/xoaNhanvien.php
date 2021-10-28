<?php
    $manv=$_GET["manv"];
    // Buoc 1: Ket noi Server
    require("../config/db.php");
    // Buoc 2: Khai bao truy van
    $sql= "DELETE FROM db_nhanvien WHERE manv=$manv";

    if(mysqli_query($conn,$sql)==TRUE){
        echo "thanhcong";
        header('Location: index.php');
    }else{
        echo "Xóa thất bại!";
    }
?>