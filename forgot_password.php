<?php require_once "php/forgot_password.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMパスワード探す</title>
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
                <form action="forgot_password.php" method="POST" autocomplete="">
                    <h2 class="text-center"><b>パスワ-ドを探す</b></h2>
                    <p class="text-center">登録したメールを入力してください。</p>
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="メールを入力してください。" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="check-email" value="パスワード探す">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>