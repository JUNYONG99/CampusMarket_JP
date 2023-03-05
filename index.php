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
  <!-- font-awesome 6.3.0 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- font css -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body>
  <!-- header -->
  <header class="header">
    <div class="inner_container">
      <div class="main_menu_color">
        <div class="logo_box">
          <a href="index.php">
            <img src="./assets/images/re_logo.jpg" alt="logo" height="80px" />
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
              <button><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
          </form>
        </div>
        <div class="icon_box">
          <!-- login check -->
          <?php
          if (isset($_SESSION['unique_id'])) {

            $sql = mysqli_query($conn, "SELECT * FROM member WHERE unique_id = {$_SESSION['unique_id']}");
            if (mysqli_num_rows($sql) > 0) {
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
    <div class="main-introduce">
      <h1>大学生向けの<br>中古品取引サイト</h1>
      <p>同じ学生同士で必要な書籍や実習道具<br>を簡単に取引しましょう!</p>
    </div>
    <img src="./assets/images/main_charater.png" alt="">
  </div>
  <!-- // MainPage -->
  <!-- chatPage -->
  <div class="chatPage">
    <img src="./assets/images/chat-introduce.png" alt="" />
    <div class="bell">
      <img src="./assets/images/chat-bell.png" alt="" />
    </div>
    <div class="chat-introduce">
      <h1>リアルタイムチャット</h1>
      <p>チャットを利用して、スムーズな<br>取引やコミュニケーションをしてみましょう。</p>
    </div>
  </div>
  <!-- // chatPage -->
  <!-- sellPage -->
  <div class="sellPage">
    <div class="sell-introduce">
      <h1>自分の商品を簡単に<br>登録してみましょう</h1>
      <p>簡単に商品を登録して取引を進めてみましょう!</p>
    </div>
    <img src="./assets/images/sell-introduce.png" alt="">
    <div class="mouse-click">
      <i class="fa-solid fa-arrow-pointer"></i>
    </div>
  </div>
  <!-- // sellPage -->
  <div class="slide_wrapper">
    <ul class="slides">
      <ul class="product_list">
        <?php
        $query = mysqli_query($conn, "select * from product ORDER BY RAND() limit 9 ");
        while ($product = mysqli_fetch_assoc($query)) {
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