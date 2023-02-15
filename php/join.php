<?php
session_start();
require "db_connect.php";
$email = "";
$email_f = "";
$name = "";
$errors = array();

//if user signup button
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email_f = mysqli_real_escape_string($conn, $_POST['email_f']);
    $email_l = mysqli_real_escape_string($conn, $_POST['email_l']);
    $email = $email_f.$email_l;
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "パスワードが一致しません。";
    }
    $email_check = "SELECT * FROM member WHERE email = '$email'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "このメールはすでに登録されているアカウントです。";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $random_id = rand(time(), 1000000);
        $status = "notverified";
        $active = "オフライン";
        $profile = "./files/person.png";
        $insert_data = "INSERT INTO member (unique_id, name, email, password, code, status, active, profile)
                        values($random_id, '$name', '$email', '$encpass', '$code', '$status', '$active', '$profile' )";
        $data_check = mysqli_query($conn, $insert_data);
        if($data_check){
            $subject = "キャンパスマーケット会員認証コード";
            $message = "認証コード: $code";
            $sender = "From: june7933@g.shingu.ac.kr";
            if(mail($email, $subject, $message, $sender)){
                $info = "メールに認証番号を送りました - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                
                header('location: user_otp.php');
                exit();
            }else{
                $errors['otp-error'] = "認証コードの送信に失敗しました。";
            }
        }else{
            $errors['db-error'] = "DB- Error";
        }
    }

}

?>