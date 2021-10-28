
<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/Exception.php';
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';


    function sendmail($recipient){
    $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
            $mail->isSMTP();// gửi mail SMTP
            $mail->Host = 'smtp.gmail.com';// Set the SMTP server to send through
            $mail->SMTPAuth = true;// Enable SMTP authentication
            $mail->Username = 'thold6789@gmail.com';// SMTP username
            $mail->Password = 'laweavumjgzqjgep'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('thold6789@gmail.com', 'ED - Kích hoạt tài khoản');

            $mail->addReplyTo('thold6789@gmail.com', 'ED - Kích hoạt tài khoản');
            
            $mail->addAddress($recipient); // Add a recipient(Thay bằng tên biến chứa Email đăng kí tài khoản)
            
            // // Attachments
            // // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
            // $mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $tieude = '[Đăng kí tài khoản] Kích hoạt tài khoản để sử dụng';
            $mail->Subject = $tieude;

            // $str=rand();
            // $code = md5($str);

            
            // Mail body content 
            $bodyContent = '<p>Chào mừng bạn đến với ED</b></h1>'; 
            $bodyContent .= '<p>Bạn vui lòng nhấp vào đường link dưới đây để kích hoạt tài khoản: </p>'; 
            $bodyContent .= '<p><a href = "http://localhost:8080/dbdhtl/activation.php?account='.$recipient.'&code='.$code.'" > Click here </p>';
            
            $mail->Body = $bodyContent;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            if($mail->send()){
                echo 'Thư đã được gửi đi';
            }else{
                echo 'Lỗi. Thư chưa gửi được';
            }  

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>