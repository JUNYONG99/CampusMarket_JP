<?php 
session_start();
require "php/db_connect.php";
$user_id = empty($_REQUEST["user_id"]) ? '' : $_REQUEST["user_id"];
if(!isset($_SESSION['unique_id'])) {
  echo "ログインが必要なサービスです。 ログインしてください。'); location.href='login.php'; </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- integrated css -->
    <link rel="stylesheet" href="./assets/css/common.css" />
    <!-- header/footer css-->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <!--user chat css -->
    <link rel="stylesheet" href="./assets/css/chat.css">
    <!--user update form css -->
    <link rel="stylesheet" href="./assets/css/my.css">
    <!-- font-awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <body>
    <div class="wrapper">
    <header class="header">
        <div class="inner_container">
          <div class="main_menu">
            <div class="logo_box">
              <a href="index.php">
                <img src="./assets/images/logo.png" alt="logo" />
              </a>
            </div>
            <ul class="main_gnb">
              <li><a href="product.php?cate=book">専攻 / 教養教材</a></li>
              <li><a href="product.php?cate=tool">実習道具</a></li>
            </ul>
            <div class="search_box">
              <form action="product.php" method="GET">
              <input type="text" placeholder="検索キーワードを入力してください。" name="search" />
              <div class="search_img">
              <input type="image" style="width: 52px;
                                         height: 52px;
                                         display: flex;
                                         margin: -48px;
                                         background: none;
                                         margin-left: -20px;"src="./assets/images/search.png" alt="検索" class="icon">
              </div>
              </form>
            </div>
            <div class="icon_box">
                <!-- login check -->
            <?php
                  if(isset($_SESSION['unique_id'])) {
                  $sql = mysqli_query($conn, "SELECT * FROM member WHERE unique_id = {$_SESSION['unique_id']}");
                  if(mysqli_num_rows($sql) > 0) {
                  $row = mysqli_fetch_assoc($sql);
                  $profile = $row['profile'];

                  //login display
            ?>     
              <div class="plus_chat">
                <p>+1</p>
              </div>
              <div class="icon_img chat">
                <a href="chat.php">
                  <img src="./assets/images/chat.png" alt="chat" />
                </a>
              </div>
              <div class="icon_img person">
                <a href="my.php">
                <img src="<?php echo "php/$profile"; ?>" style="width: 58px; height:58px; object-fit:cover; border-radius: 50%;" />
                </a>
              </div>
              <div class="icon_txt_login">
                <a href="#">
                  <p class="icon_name"><?php echo $row['name'] ?></p>
                </a>
              </div>
              <?php
                  }

                } else {
                  //logout display
              ?>
              <div class="plus_chat">
                <p>+1</p>
              </div>
              <div class="icon_img chat">
                <a href="chat.php">
                  <img src="./assets/images/chat.png" alt="chat" />
                </a>
              </div>
              <div class="icon_img person">
                <a href="my.php">
                  <img src="./assets/images/person.png" alt="person" />
                </a>
              </div>
              <div class="icon_txt">
                <a href="login.php">
                  <p class="icon_name">ログイン</p>
                </a>
              </div>
              <?php 
                }
              ?>
            </div>
          </div>
        </div>
      </header>

      <section class="chat_section">
      <div class="inner_container">
        <div class="chat_flex_box">
          <div class="chat_left">
            <div class="chat_consumer">
              <div class="consumer_flex">
                <div class="chat_img">
                  <img src="<?php echo "php/$profile"; ?>" style="width:74px; height:74px; object-fit:cover; margin-right: 22px; border-radius: 50%;">
                </div>
                <div class="chat_info">
                  <p class="info_name"><?php echo $row['name']?></p>
                  <div class="logout">
                    <a href="php/logout.php?logout_id=<?php echo $_SESSION['unique_id']?>">
                    <img src="./assets/images/logout.png" alt="logout" >
                    <p>ログアウト</p>
                    </a>
                </div>
                </div>
              </div>
            </div>

    <section class="section">
      <div class="whole_chart">
         <div class="left_list_box">
            <ul>
              <li class="dep1"><a href="javascript:(0)" class="li01">販売内容</a>
                <ul class="dep2">
                  <li class="sub_dep2"><a href="my_buy.php">全体</a></li>
                  <li class="sub_dep2"><a href="my_buy.php?state=ing">販売中</a></li>
                  <li class="sub_dep2"><a href="my_buy.php?state=over">販売完了</a></li>
                </ul>
              </li>
                <ul>
                  <li class="dep1"><a href="#">会員情報修正</a></li>
                </ul>
            </ul>
         </div>
          </section>
    </div>
            <div class="chat_list">
        
            </div>
          <div class="chat_right">
                 <div class="user_my1">
                        <span>会員情報修正</span>
                 </div>
                 <div class="user_myimg1">
                 <form action="php/update_user.php" method="POST" enctype="multipart/form-data">
                  <label for="proImg">
                     <img id="profilePreview" src="./assets/images/file_img.jpg">  
                  </label>
                  <input type="file" id="proImg" name="profile" accept='image/jpeg,image/gif,image/png'>
                 </div>
<script type="text/javascript">
/* profileImg */
function readImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();

        if( $("#proImg").val() != "" ){
          var ext = $('#proImg').val().split('.').pop().toLowerCase();
  	   if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
  	     alert('이メージファイルを選択してください。');
         $("proImg").val(""); 
  	     return false;
 	      }
    }
        
        reader.onload = (e) => {
            const previewImage = document.getElementById('profilePreview');
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('proImg').addEventListener('change', (e) => {
    readImage(e.target);
})
</script>      
                 <span style="margin-left: 658px;">プロフィール</span>
                 <div class="login-form">
                        <span class="nick">ニックネーム</span>
                        <input type="text" name="nickname" class="text-field" placeholder="変更するニックネームを入力してください。">
                        <span class="number">パスワード</span>
                        <input type="password" name="password" class="text-field" placeholder="新しいパスワードを入力してください。">
                        <input type="submit" value="変更" class="submit-btn">
                    </form>
                 </div>
              </div>
          </div>
        </div>
     </div>
    </section>
    
    <footer class="footer_chat">
    <div class="inner_container">
      <div class="footer_flex">
        <div class="footer_logo">
          <img src="./assets/images/logo.png" alt="footer_logo" />
        </div>
        <div class="footer_address">
          <div class="footer_txt_position">
            <p>
              メール : aapp76sun@gmail.com<br /><br />
              Copyright 2022 . All Rights Reserved
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  </div>
  <!-- Channel Plugin Scripts -->
  <script src="./assets/js/channel_plugin_connect.js"></script>
  <!-- left content slider js -->
  <script src="./assets/js/campus.js"></script>
</body>
</html>