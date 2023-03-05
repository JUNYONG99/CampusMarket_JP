<?php require_once "php/join.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CM 新規会員登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <!-- integrated css -->
      <link rel="stylesheet" href="./assets/css/common.css" />
    <!-- login form css-->
    <link rel="stylesheet" href="./assets/css/login.css">
    <!-- font css -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="join.php" method="POST" autocomplete="">
                    <h2 class="text-center" style="margin-bottom: 30px; font-weight: bold;">新規会員登録</h2>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="ニックネーム" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                       <div class="email_detail">
                        <input class="form-control" type="text" name="email_f" placeholder="メール" required value="<?php echo $email_f ?>">
                        <input class="form-control" type="text" name="email_l" required value="@g.shingu.ac.kr" readonly>
                       </div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="パスワード" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="パスワード確認" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="会員登録">
                    </div>
                    <div class="link login-link text-center">すでにアカウントをお持ちですか？ <a href="login.php" class="login_info_text">ログインする</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>