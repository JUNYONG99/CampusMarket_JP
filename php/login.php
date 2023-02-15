<?php 
 session_start();
 include_once "db_connect.php";
 $email = mysqli_real_escape_string($conn, $_POST['email']);
 $password = mysqli_real_escape_string($conn, $_POST['password']);

 $check_email = "SELECT * FROM member WHERE email = '{$email}' ";
 $res = mysqli_query($conn, $check_email);
 if(!empty($email) && !empty($password)) {
    //メールとパスワードの両方に値がある場合は、

    if(mysqli_num_rows($res) > 0){
        //登録済みのメールがある場合
        $row = mysqli_fetch_assoc($res);
        $active = "オンライン";
        $log_update = mysqli_query($conn, "UPDATE member SET active = '{$active}' WHERE unique_id = {$row['unique_id']}");
        $fetch_pass = $row['password'];
    
        if(password_verify($password, $fetch_pass)){
            //メールとパスワードが一致する場合
            $_SESSION['email'] = $email;
            $status = $row['status'];
            
            if($status == 'verified'){
              //OTP認証に成功した場合
    
              //out put index display SESSION
              $_SESSION['unique_id'] = $row['unique_id'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['profile'] = $row['profile'];
    
              echo "success";
    
            }else{
                echo "fail";
            }
    
        }else{
            echo "メールまたはパスワードが一致しません。";
        }
    
    }else{
        echo "登録されていないアカウントです - 会員登録をしてください。";
    }
 } else {
    echo "すべての入力値が必要です。";
 }
 

?>