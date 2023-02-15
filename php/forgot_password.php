<?php
session_start();
require "db_connect.php";
$email = "";
$email_f = "";
$name = "";
$errors = array();

 //if user click continue button in forgot password form
 if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check_email = "SELECT * FROM member WHERE email='$email'";
    $run_sql = mysqli_query($conn, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(999999, 111111);
        $insert_code = "UPDATE member SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($conn, $insert_code);
        if($run_query){
            $subject = "パスワード変更";
            $message = "パスワード変更 : 認証番号 $code";
            $sender = "From: june7933@g.shingu.ac.kr";
            if(mail($email, $subject, $message, $sender)){
                $info = "メールに認証番号を送りました。 - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: reset_code.php');
                exit();
            }else{
                $errors['otp-error'] = "認証番号の送信に失敗しました。";
            }
        }else{
            $errors['db-error'] = "不明な誤り";
        }
    }else{
        $errors['email'] = "メールが存在しません。";
    }
}

?>