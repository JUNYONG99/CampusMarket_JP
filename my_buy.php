<?php 
session_start();
require "php/db_connect.php";
if(!isset($_SESSION['unique_id'])) {
  echo "<script>alert('로그인 후 이용해주세요. '); location.href='login.php'; </script>";
}

$state = empty($_REQUEST["state"]) ? "" : $_REQUEST["state"];


$numLines = 4; // 見せる投稿数
$numLinks = 3; // 1ページに表示するページリンク数

$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"]; // ページ番号指定
$start = ($page - 1) * $numLines; // 見せるレコード番号

if($state == "ing") {
  $sql2 = mysqli_query($conn, "SELECT * FROM product WHERE member_id = {$_SESSION['unique_id']} and state='販売中' limit $start, $numLines");
} else if($state == "over") {
  $sql2 = mysqli_query($conn, "SELECT * FROM product WHERE member_id = {$_SESSION['unique_id']} and state='販売完了' limit $start, $numLines");
} else {
  $sql2 = mysqli_query($conn, "SELECT * FROM product WHERE member_id = {$_SESSION['unique_id']} limit $start, $numLines");
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
    <!--my_buy form css -->
    <link rel="stylesheet" href="./assets/css/my.css">
    <!-- font-awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <!-- font css -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
        rel="stylesheet">
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
              <li class="dep1"><a href="javascript:(0)" class="li01">販売内訳</a>
                <ul class="dep2">
                  <li class="sub_dep2"><a href="my_buy.php">全体</a></li>
                  <li class="sub_dep2"><a href="my_buy.php?state=ing">販売中</a></li>
                  <li class="sub_dep2"><a href="my_buy.php?state=over">販売完了</a></li>
                </ul>
              </li>
                <ul>
                  <li class="dep1"><a href="update_user.php">会員情報修正</a></li>
                </ul>
            </ul>
         </div>
          </section>
          <div class="chat_list">

          </div>
       </div>
        <div class="chat_right">
          <ul>
          <?php
           
            while($product= mysqli_fetch_assoc($sql2)) {
              $product_num = $product['num'];
              $price = $product['price'];

              $sql3 = mysqli_query($conn, "SELECT * FROM file WHERE f_num = $product_num");
              $find = mysqli_fetch_assoc($sql3);
              $p_img = $find['main'];

              
          ?>
               <a href="product_view.php?num=<?php echo $product_num; ?>">
                <div class= "item sell"> 
                     <ul class="selling">
                         <li class="selling1"><img src="<?php echo "php/$p_img"; ?>" style="width:70px; height: 100px; object-fit: cover;"></li>
                         <li class="selling2"><?=$product['title']?></li>
                         <li class="selling4"><?php echo "￥ ".number_format($price);?></li>
                         <?php
                         if($product['state'] == "販売完了") {
                         ?>
                          <li class="selling3_red"><?=$product['state']?></li>
                         <?php
                         } else {
                         ?>
                           <li class="selling3"><?=$product['state']?></li>
                         <?php
                         }
                         ?>
                         
                     </ul>
               <hr class="hr1">
             </div>
             </a>
          <?php
            } 
          ?>
             <?php
				$firstLink = floor(($page - 1) / $numLinks) * $numLinks + 1;
				$lastLink = $firstLink + $numLinks - 1;
        if($state == "ing") {
          $page_query = mysqli_query($conn,  "SELECT * FROM product WHERE member_id = {$_SESSION['unique_id']} and state='販売中'");
          $numRecords = mysqli_num_rows($page_query);
        } else if($state == "over") {
          $page_query = mysqli_query($conn,  "SELECT * FROM product WHERE member_id = {$_SESSION['unique_id']} and state='販売完了' ");
          $numRecords = mysqli_num_rows($page_query);
        } else {
          $page_query = mysqli_query($conn,  "SELECT * FROM product WHERE member_id = {$_SESSION['unique_id']}");
          $numRecords = mysqli_num_rows($page_query);
        }
       
        
      
				$numPages = ceil($numRecords/$numLines); //商品テーブルレコード数
				if ($lastLink > $numPages) {
					$lastLink = $numPages;
				}

				?>
              <div class="page_btn">
        <?php
              if($firstLink > 1) {
        ?>
                <div class="btn_img">
                <a href="my_buy.php?<?php if($state) { echo "state=$state&"; }?>page=<?=$firstLink - $numLinks?>" >
                    <img src="./assets/images/prev_btn.png" alt="prev_btn" />
                </a>
                </div>

        <?php
              }
        ?>
                <div class="page_num">
                  <ul>   
        <?php
              for ($i = $firstLink; $i <= $lastLink; $i++) {
        ?>
                <li <?=($i == $page) ? "style='background: #d9d9d9;  border-radius: 15px; '" : " " ?>> <a href="my_buy.php?<?php if($state) { echo "state=$state&"; }?>page=<?php echo $i; ?>"><?=($i == $page) ? "$i" : $i ?></a></li>        
        <?php
              } 
        ?>        </ul>
                </div>

        <?php
              if($lastLink < $numPages) {
        ?>
              <div class="btn_img">
                  <a href="my_buy.php?<?php if($state) { echo "state=$state&"; }?>page=<?=$firstLink + $numLinks?>">
                    <img src="./assets/images/next_btn.png" alt="next_btn" />
                  </a>
              </div>
        <?php  
              }

        ?>
                
              </div>
          
           
          </ul>
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