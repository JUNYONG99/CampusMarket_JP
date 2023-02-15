<?php
session_start();
if(isset($_SESSION['unique_id'])) {
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CM ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- integrated css -->
    <link rel="stylesheet" href="./assets/css/common.css" />
    <!-- login form css-->
    <link rel="stylesheet" href="./assets/css/login.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="#">
                    <span>
                    <a href="index.php">
                    <h2 class="text-center" style="margin-bottom:30px; color: #477eff;">
                    <strong>CampusMarket</strong></h2>
                    </a>
                    </span>
                    
                   
                        <div class="error_text" >
                         <!-- error text -->
                        </div>
                 
                
                    <div class="form-group">
                        <input class="form-control" type="text" name="email" placeholder="メール">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="パスワード">
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot_password.php">パスワードを忘れましたか？</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="ログイン">
                    </div>
                    <div class="link login-link text-center">まだアカウントをお持ちではありませんか？ <a href="join.php" class="sign_info_text">会員登録をする</a></div>
                </form>
            </div>
        </div>
    </div>
    <!-- ajax login.js -->
    <script src="js/login.js"></script>
</body>
</html>