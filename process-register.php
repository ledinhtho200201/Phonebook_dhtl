<!-- Register.php gui theo PT POST >  process-register.php truy van tu mang $_POST -->
<!-- Xem hinh thu cua mang truoc khi xu li no -->

<?php
    include('sendmail.php');
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;

    // require 'phpmailer/Exception.php';
    // require 'phpmailer/PHPMailer.php';
    // require 'phpmailer/SMTP.php';

// echo '<pre>';
// echo print_r($_POST);
// echo '</pre>';

    //Nhan gia tri tu Form register gui sang:
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    //Kiem tra pass1 === pass2 (JS ktra luon)
    //Quy trinh 4 buoc:
    // Buoc 01:
    include('config/db.php');

    //Buoc 02: Thuc hien cac truy van
    //2.1 Kiem tra xem email nay da ton tai chua
    $sql_1="SELECT * FROM users WHERE email='$email'";
    $result_1 = mysqli_query($conn,$sql_1);
    
    if(mysqli_num_rows($result_1) > 0){
        //echo'Email da ton tai';
        $value = 'existed';
        header("Location:register.php?response=$value");
    }else{
        echo'vaoday';
        //2.2 Neu khong ton ai thi moi LUU
        // Băm mật khẩu
        $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
            $str=rand();
            $code = md5($str);
        //Lưu bản ghi đăng kí vào CSDL
        $sql_2 = "INSERT INTO users(first_name, last_name, email, password,activation) 
        VALUES('$first_name','$last_name','$email','$pass_hash','$code')";
        $result_2 = mysqli_query($conn,$sql_2); // Vi lenh thuc hien la insert nen ket qua tra ve cua $result_2 neu co laf SO BAN GHI CHEN THANH CONG(SO NGUYEN)

        // Gửi email tới địa chỉ email đã đăng kí
        //Server trung gian gửi nhận email (sd tài khoản Gmail làm trung gian) & sử dụng thư viện gửi Email
        //Keyword: PHP sendmail from localhost with gmail

        //Phản hồi lại trang đăng kí
        if($result_2>0){
            
            sendmail($email);
            echo "Ban da dang ki thanh cong";
            $value="successfully";
            header("Location:register.php?response=$value");
        }
    }


?>