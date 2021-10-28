<?php
    if(isset($_POST['btnUpdate'])){
        $manv=$_POST["txtMaNv"];
        $tennv=$_POST['txtHoTen'];
        $chucvu=$_POST['txtChucVu'];
        $mayban=$_POST['txtMayBan'];
        $email=$_POST['txtEmail'];
        $sodidong=$_POST['txtMobile'];
        $maDV       =$_POST['sltMaDV'];
        //Ket noi csdl
        include('../config/db.php');
        //Truy van
        $sql="UPDATE db_nhanvien SET tennv='$tennv',
        chucvu='$chucvu',mayban='$mayban',email='$email',sodidong='$sodidong',madv='$maDV' where manv='$manv' ";

        if(mysqli_query($conn,$sql)==TRUE){
            echo 'Cập nhật thành công';
            header('Location: index.php');
        }else{
            echo 'Cập nhật thất bại';
        }
        //Dong ket noi
        mysqli_close($conn);
    }
?>