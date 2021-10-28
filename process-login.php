<!-- Register.php gui theo PT POST >  process-register.php truy van tu mang $_POST -->
<!-- Xem hinh thu cua mang truoc khi xu li no -->

<?php
// echo '<pre>';
// echo print_r($_POST);
// echo '</pre>';
?>

<?php
    session_start();
    //Nhan gia tri tu Form register gui sang:
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    //Quy trinh 4 buoc:
    // Buoc 01:
    include('config/db.php');

    //Buoc 02: Thuc hien cac truy van
    //2.1 Kiem tra xem email nay da ton tai chua
    $sql_1="SELECT * FROM users WHERE email='$email'";
    $result_1 = mysqli_query($conn,$sql_1);
    
    if(mysqli_num_rows($result_1) > 0){
        $row=mysqli_fetch_assoc($result_1);
        $pass_saved = $row['password'];

        if(password_verify($pass,$pass_saved)){
            echo 'mat khau dung';
            //Neu khop nhau > tuc la dang nhap thanh cong  > chuyen vao trang quan tri
            $_SESSION['login_ok'] = $email;
            header("Location:admin/index.php");
        }else{
            echo 'mat khau ';
            $response = 'failed_password';
            header("Location:login.php?response=$response");
        }
    }else{
        $response = 'failed_email';
        header("Location:login.php?response=$response");
    }


?>