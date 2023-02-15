<?php
session_start();
require "db_connect.php";
$email = "";
$email_f = "";
$name = "";
$errors = array();

 //if user click change password button
 if(isset($_POST['change-password'])){
    $_SESSION['info'] = "";
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "パスワードが一致しません。";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE member SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($conn, $update_pass);
        if($run_query){
            $info = "パスワードの変更が完了しました。 新しいパスワードでログインしてください。";
            $_SESSION['info'] = $info;
            header('Location: password_changed.php');
        }else{
            $errors['db-error'] = "パスワード変更失敗";
        }
    }
}

//if login now button click
if(isset($_POST['login-now'])){
    header('Location: login.php');
}

?>