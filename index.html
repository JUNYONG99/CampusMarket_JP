<!-- session start and DB connect-->
<?php 
session_start();
require "php/db_connect.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- integrated css -->
    <link rel="stylesheet" href="./assets/css/common.css" />
    <!-- header/footer css-->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <!-- main page css-->
    <link rel="stylesheet" href="./assets/css/main.css" />
    <!-- font-awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
  </head>
  <body>
    <!-- header -->
    <header class="header">
      <div class="inner_container">
        <div class="main_menu_color">
          <div class="logo_box">
            <a href="index.php">
              <img src="./assets/images/logo-white.png" alt="logo" />
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
                    <img src="./assets/images/chat_white.png" alt="chat" />
                  </a>
                </div>
                <div class="icon_img person">
                  <a href="my.php">
                    <img src="<?php echo "php/$profile"; ?>" style="width: 58px; height:58px; object-fit:cover; border-radius: 50%;" />
                  </a>
                </div>
                <div class="icon_txt_login">
                  <a href="#">
                    <p class="icon_name" style="color: white;"><?php echo $row['name'] ?></p>
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
                    <img src="./assets/images/chat_white.png" alt="chat" />
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

    <!-- MainPage -->
    <div class="mainPage">
      <img src="assets/images/main_banner.jpg" alt=""  style="width: 100%"/>
    </div>
    <div class="chatPage">
      <img src="assets/images/chat_section.jpg" alt="" style="width: 100%"/>
    </div>
    <div class="sellPage">
      <img src="assets/images/product_section.jpg" alt="" style="width: 100%"/>
    </div>

    <div class="slide_wrapper">
      <ul class="slides">
        <ul class="product_list">
          <?php
           $query = mysqli_query($conn, "select * from product ORDER BY RAND() limit 9 ");
           while( $product = mysqli_fetch_assoc($query)) {
            //商品データ
            $p_num = $product['num'];
            $title = $product['title'];
            $price = $product['price'];

            //商品イメージデータ
            $search_img = mysqli_query($conn, "select * from file where f_num = $p_num");
            $find_img = mysqli_fetch_assoc($search_img);
            $img = $find_img['main'];
            ?>
          <li>
            <dl>
              <dt class="h"><a href="product_view.php?num=<?php echo $p_num; ?>"><?php echo $title; ?></a></dt>
              <dd class="img">
                <a href="product_view.php?num=<?php echo $p_num; ?>"><img src="<?php echo "php/$img"; ?>" alt="" /></a>
              </dd>
              <dd class="price">¥<?php echo number_format($price); ?></dd>
            </dl>
          </li>
            
            <?php
             }
            ?>
        </ul>
      </ul>
    </div>
    <footer class="footer">
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
    <p class="controls">
      <button class="prev">
        <img src="assets/images/main_slides_btn_prev.png" alt="" />
      </button>
      <button class="next">
        <img src="assets/images/main_slides_btn_next.png" alt="" />
      </button>
    </p>
     
    <!-- Channel Plugin Scripts -->
    <script src="./assets/js/channel_plugin_connect.js"></script>
    <!-- slide js link-->
    <script src="assets/js/main.js"></script>
  </body>
</html>
