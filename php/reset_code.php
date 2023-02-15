<?php
session_start();
require "db_connect.php";
$email = "";
$email_f = "";
$name = "";
$errors = array();

    //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM member WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "新しいパスワードを入力してください。";
            $_SESSION['info'] = $info;
            header('location: new_password.php');
            exit();
        }else{
            $errors['otp-error'] = "認証番号が正しくありません。";
        }
    }
?>