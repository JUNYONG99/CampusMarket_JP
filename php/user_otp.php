<?php
session_start();
require "db_connect.php";
$email = "";
$email_f = "";
$name = "";
$errors = array();

//if user click verification code submit button
 if(isset($_POST['check'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
    $check_code = "SELECT * FROM member WHERE code = $otp_code";
    $code_res = mysqli_query($conn, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;
        $status = 'verified';
        $update_otp = "UPDATE member SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($conn, $update_otp);
        if($update_res){
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            header('location: login.php');
            exit();
        }else{
            $errors['otp-error'] = "認証失敗";
        }
    }else{
        $errors['otp-error'] = "認証番号が正しくありません。";
    }
}

?>