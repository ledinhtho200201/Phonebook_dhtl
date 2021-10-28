<?php
    //Kiem tra co dung la nguoi dung da thuc hien nhan luu tren form chua
    if(isset($_POST['btnSave'])){
        //Lay gia tri tren form luu vao cac bien
        $tenNV      =$_POST['txtHoTen'];
        $chucVu     =$_POST['txtChucVu'];
        $mayBan     =$_POST['txtMayBan'];
        $email      =$_POST['txtEmail'];
        $soDiDong   =$_POST['txtMobile'];
        $maDV       =$_POST['sltMaDV'];
        //Thuc hien quy trinh 3 buoc:
        // Buoc 1: Ket noi Server
        require("../config/db.php");
        // Buoc 2: Khai báo truy vấn
        $sql = "INSERT INTO db_nhanvien(tennv,chucvu,mayban,email,sodidong,madv)
        VALUES('$tenNV','$chucVu','$mayBan','$email','$soDiDong','$maDV')";

            echo $sql."<br>";

        if(mysqli_query($conn,$sql)==TRUE){
            echo "Thêm thành công";
            header('Location: index.php');
        }else{
            echo "Chưa thêm đc...";
        }
    }
        // Buoc 3: Đóng kết nối
        mysqli_close($conn);
?>