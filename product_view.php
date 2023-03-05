<?php 
session_start();
require "php/db_connect.php";

$num = empty($_REQUEST["num"]) ? '' : $_REQUEST["num"];
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
    <!--product submit/detail form css -->
    <link rel="stylesheet" href="./assets/css/item.css">
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
     <!-- メイン -->   

  <?php
   $sql2 = mysqli_query($conn, "select * from product where num = $num");   
   $row2 = mysqli_fetch_assoc($sql2);

   //商品データ
   $title = $row2['title'];
   $state = $row2['state'];
   $price = $row2['price'];
   $content = $row2['content'];

   $memberId = $row2['member_id']; //作成者 unique_id

   $sql3 = mysqli_query($conn, "select * from member where unique_id = $memberId");   
   $row3 = mysqli_fetch_assoc($sql3);
   

   //作成者データ
   $writer = $row3['name']; 
   $writerProfile = $row3['profile']; 
   $unique_id = $row3['unique_id'];


   $sql4 = mysqli_query($conn, "select * from file where f_num = $num");   
   $row4 = mysqli_fetch_assoc($sql4);
  

   //イメージデータ
   $mainImg = $row4['main'];
   $subImg_1 = $row4['sub_1'];
   $subImg_2 = $row4['sub_2'];
   $subImg_3 = $row4['sub_3'];

  
  
  
  ?>
   <main>
   <section id="board_view_wrap">
		<!-- イメージ -->
     <section id="board_view_img_wrap">
		 <div id="board_img_wrap">
      <div class="slides">
			<div class="view_img" ><img src="<?php echo "php/$mainImg"; ?>" alt="" style="width: 488px;"></div>
      <?php
      if ($subImg_1 == "./files/chatbot_profile_white.jpg") {
          
      } else {
      ?>
      <div class="view_img" ><img src="<?php echo "php/$subImg_1"; ?>" alt="" style="width: 488px;"></div>
      <?php
      }
      ?>
      <?php
      if ($subImg_2 == "./files/chatbot_profile_white.jpg") {
          
      } else {
      ?>
      <div class="view_img" ><img src="<?php echo "php$subImg_2"; ?>" alt="" style="width: 488px;"></div>
      <?php
      }
      ?>
      <?php
      if ($subImg_3 == "./files/chatbot_profile_white.jpg") {
          
      } else {
      ?>
      <div class="view_img" ><img src="<?php echo "php/$subImg_3"; ?>" alt="" style="width: 488px;"></div>
      <?php
      }
      ?>
      
	 		</div>
		  </div>
    </section>
		<!-- 商品情報 -->
		<section id="board_view_info_wrap">
    <?php 
      if(isset($_SESSION['unique_id']) && $unique_id == $_SESSION['unique_id']) {
    ?>
       <div style="margin-left: 530px;" onclick="location.href ='php/delete.php?num=<?=$num?>'"><i class="fa fa-times" aria-hidden="true" style="font-size: 24px; cursor: pointer;"></i></div>
    <?php
      }
    ?>
		<div class="view_title"><?php echo $title; ?></div>
      
      <?php
       if($state == "販売完了") {
      ?>
        <div class="view_info view_state" style="background: #ffa6a6;">
        <?php echo $state; ?>
        </div>
      <?php
       } else {
      ?>
        <div class="view_info view_state"><?php echo $state; ?></div>
      <?php
       }
      ?>
			<div class="view_info"><span>販売者</span><span class="view_right"><?php echo $writer; ?></span></div>
			<div class="view_info"><span>価格</span><span class="view_right">¥ <?php echo number_format($price); ?></span></div>
      <?php
       if(isset($_SESSION['unique_id']) && $unique_id == $_SESSION['unique_id']) {
      ?>
         <div class="chatting_update" onclick="location.href ='product_submit.php?num=<?php echo $num;?>'">修正</div>
         
      <?php
       } else {
      ?>
         <div class="chatting" onclick="location.href ='chat.php?user_id=<?php echo $unique_id;?>'">チャット</div>
      <?php
       }
      ?>
    </section>

		<!--イメージスライド -->
		<section id="board_view_slide_wrap">
			<div class="board_slide_btn">
      <button type="button" id="left_btn"><img src="./assets/images/left_button.png" alt=""></button>
			<div class="slide_imgs"><img src="<?php echo "php/$mainImg"; ?>" alt="" /></div>
      <?php
      if($subImg_1 == "./files/chatbot_profile_white.jpg") {
         
      } else {
      ?>
      <div class="slide_imgs"><img src="<?php echo "php/$subImg_1"; ?>" alt="" /></div>
      <?php
      }
      ?>
      <?php
      if($subImg_2 == "./files/chatbot_profile_white.jpg") {
      
      } else {
      ?>
      <div class="slide_imgs"><img src="<?php echo "php/$subImg_2"; ?>" alt="" /></div>
      <?php
      }
      ?>
      <?php
      if($subImg_3 == "./files/chatbot_profile_white.jpg") {
      
      } else {
      ?>
      <div class="slide_imgs"><img src="<?php echo "php/$subImg_3"; ?>"alt="" /></div>
      <?php
      }
      ?>
 			<button type="button" id="right_btn"><img src="./assets/images/right_button.png" alt=""></button>
      </div>
		</section>
       
    <!-- 区分 -->
    <div class="line"></div>
       
		<!-- 商品情報説明 -->
       
		<section id="board_view_explain_wrap">      
			<article class="explain_title">詳細説明
            <p>
             <?php
               echo $content; 
             ?>
            </p>
      </article>
			
            <aside class="explain_title2">販売者情報<br>
            <div class="seller">
            <img src="<?php echo "php/$writerProfile "; ?>" class="seller_img"  align=middle style="object-fit: cover; border-radius: 50%;">
            <span><?php echo $writer; ?></span>
            </div>   
            
            <p><a href="product.php?cate=user&user=<?php echo $writer ?>"> 他の商品 > </a></p>
            <br><br>    

            
            <div class="other_product">
            <?php
            $sql5 = mysqli_query($conn, "select * from product where member_id = $unique_id and not num in ('$num') ORDER BY RAND() limit 4 ");  
            while($row5 = mysqli_fetch_assoc($sql5)) {

              $img_found = $row5['num'];
              $img_query = mysqli_query($conn,"select * from file where f_num = $img_found");
              $img_correct =  mysqli_fetch_assoc($img_query);
              $other_num = $img_correct['f_num'];
              

            ?>
            
                <div class="slide_imgs"><a href="product_view.php?num=<?php echo $other_num; ?> "><img src="<?php echo "php/{$img_correct['main']} "?>" alt=""  style="width: 80px; height: 80px;"/></a></div>
            <?php
            }
            ?>
			      
			      
            </div>
                
          
            </aside>
            
         </section>
        
            
            
            
           
				     </section>
   </main>
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
  </div>
   
<!-- Channel Plugin Scripts -->
<script src="./assets/js/channel_plugin_connect.js"></script>
<script src="./assets/js/item_slider.js"></script>

</body>
</html>

