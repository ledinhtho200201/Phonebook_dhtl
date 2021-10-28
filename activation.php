<?php
    echo 'chaothao';
    include('config/db.php');
    if(isset($_GET['account']))
    {
        //Truy van lay du lieu user co email
        $email=$_GET['account'];
        echo $_GET['code'];
        $act = $_GET['code'];
        echo $email;

        $sql1 = "SELECT * FROM users WHERE  email = '$email'";
        $query=mysqli_query($conn,$sql1);
        if(mysqli_num_rows($query) > 0)
        {
            echo "chay den day";
            $row = mysqli_fetch_assoc($query);
            echo '<pre>';
            echo print_r($row);
            echo '</pre>';
            if($row['activation']==$act)
            {
                echo 'ok';
                $sql2="UPDATE users SET status='1' WHERE email= '$email' ";
                $query1=mysqli_query($conn,$sql2);
            }
        }
    }
?> 
