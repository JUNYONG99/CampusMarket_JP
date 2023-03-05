<?php 
session_start();
require "php/db_connect.php";
if(!isset($_SESSION['unique_id'])) {
  echo "<script>alert('ログインが必要なサービスです。 ログインしてください。'); location.href='login.php'; </script>";
}
     $num = empty($_REQUEST["num"]) ? null : $_REQUEST["num"];
     $title = "";
     $cate = "book";
     $depart = "depart";
     $major = "major";
     $price = "";
     $content ="";
     $state = "";
     $action = "board_insert.php";

     if ($num) { 
          $sql = mysqli_query($conn, "SELECT * FROM product WHERE num = $num");
              if(mysqli_num_rows($sql) > 0) {
                      $row = mysqli_fetch_assoc($sql);
                      $title = $row["title"];
                      $cate = $row["cate"];
                      $major = $row['major'];
                      $price = $row["price"];
                      $content = $row["content"];
                      $state = $row["state"];
                      $action = "board_update.php?num=$num";
                    }
   
    }
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
              <li><a href="product.php?cate=tool ">実習道具</a></li>
            </ul>
            <div class="search_box">
              <input type="text" placeholder="検索キーワードを入力してください。" />
              <div class="search_img">
                <button>
                  <span class="icon"><i class="fa fa-search"></i></span>
                </button>
              </div>
            </div>
            <div class="icon_box">
              <?php
                    $sql = mysqli_query($conn, "SELECT * FROM member WHERE unique_id = {$_SESSION['unique_id']}");
                    if(mysqli_num_rows($sql) > 0) {
                      $row = mysqli_fetch_assoc($sql);
                      $profile = $row['profile'];
                    }
                    
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
            </div>
          </div>
        </div>
      </header>
      </nav>
      <!-- メイン -->
    <main>
  		<section>
  			<article id="item_wrap">
          <!-- ページ名 -->
  				<div class="item_title">商品情報入力</div>
          <!-- 入力領域 -->
  				<form action="php/<?=$action?>" method="post" class="item_form" enctype="multipart/form-data">
            <input type="text" value="<?=$num?>" name="num" style="visibility : hidden; display : none;">
					<ul id="write_form">
						<li id="file_li">
							<div class="img_wrap">
              <label for="mainImg">
                <img id="mainPreview" src="./assets/images/file_img.JPG">
              </label>
              <input type="file" id="mainImg" name="main" accept='image/jpeg,image/gif,image/png'> 
              </div>
<script type="text/javascript">
/* main_img */
function readImage(input) {
 
    if (input.files && input.files[0]) {
     
      if( $("#mainImg").val() != "" ){
          var ext = $('#mainImg').val().split('.').pop().toLowerCase();
  	   if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
  	     alert('イメージファイルを選択してください。');
         $("#mainImg").val(""); 
  	     return false;
 	      }
    }
        const reader = new FileReader();
        
        reader.onload = (e) => {
            const previewImage = document.getElementById('mainPreview');
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
        const fileName = input.files.name;

   

   }
}


document.getElementById('mainImg').addEventListener('change', (e) => {
    readImage(e.target);
});

</script>

              <span class="upload_fileList">
              </span>
              <span class="fileList">
              <div class="img_wrap">
              <label for="sub_1">
                <img id="subPage1" src="./assets//images/file_img.JPG"  >
              </label>
              <input type="file" id="sub_1" name="sub_1" accept='image/jpeg,image/gif,image/png' >
              </div>
<script type="text/javascript">
/* sub_1 */
function subImage1(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        if( $("#sub_1").val() != "" ){
          var ext = $('#sub_1').val().split('.').pop().toLowerCase();
  	   if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
  	     alert('イメージファイルを選択してください。');
         $("#sub_1").val(""); 
  	     return false;
 	      }
    }
        reader.onload = (e) => {
            const previewImage = document.getElementById('subPage1');
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('sub_1').addEventListener('change', (e) => {
    subImage1(e.target);
})
</script>              
              <div class="img_wrap">
              <label for="sub_2">
                <img id="subPage2" src="./assets//images/file_img.JPG"  >
              </label>
              <input type="file" id="sub_2" name="sub_2" accept='image/jpeg,image/gif,image/png'>
              </div>

<script type="text/javascript">
/* sub_2 */
function subImage2(input) {
    if (input.files && input.files[0]) {

      if( $("#sub_2").val() != "" ){
          var ext = $('#sub_2').val().split('.').pop().toLowerCase();
  	   if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
  	     alert('イメージファイルを選択してください。');
         $("#sub_2").val(""); 
  	     return false;
 	      }
    }
        const reader = new FileReader();
        
        reader.onload = (e) => {
            const previewImage = document.getElementById('subPage2');
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('sub_2').addEventListener('change', (e) => {
    subImage2(e.target);
})
</script>    
              <div class="img_wrap">
              <label for="sub_3">
                <img id="subPage3" src="./assets//images/file_img.JPG"  >
              </label>
              <input type="file" id="sub_3" name="sub_3" accept='image/jpeg,image/gif,image/png'>
              </div>
<script type="text/javascript">
/* sub_3 */
function subImage3(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        
        if( $("#sub_3").val() != "" ){
          var ext = $('#sub_3').val().split('.').pop().toLowerCase();
  	   if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
  	     alert('イメージファイルを選択してください。');
         $("#sub_3").val(""); 
  	     return false;
 	      }
    }
        reader.onload = (e) => {
            const previewImage = document.getElementById('subPage3');
            previewImage.src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

document.getElementById('sub_3').addEventListener('change', (e) => {
    subImage3(e.target);
})
</script>    

              </span>

              
						</li>
            <ul id="write_form">
						<li>
							<div style="margin-left : 12px;" class="item_text">販売状態</div>
							<select class="state_select" type="text" name="state">
								<option value="販売中" >販売中</option>
								<option value="販売完了">販売完了</option>
							</select>
						</li>
						<li>
							<div style="margin-left : 12px;" class="item_text">商品名</div>
							<input class="title_write" type="text" name="title" value="<?= $title?>"
							placeholder="商品名を入力してください。" onfocus="this.placeholder=''" onblur="this.placeholder='商品名を入力してください。'">
						</li>
						<li>
    					<div style="margin-left : 12px;" class="item_text">カテゴリー</div>
							<span id="category_select">
								<input id="book" type="radio" name="cate" value="book" <?php if(!$num) { echo "checked"; }?>><label for="book"><span>専攻/教養教材</span></label>&emsp;
								<input id="tool" type="radio" name="cate" value="tool"><label for="tool"><span>実習道具</span></label>
							</span>
						</li>
                        <li>
							<div style="margin-left : 12px;" class="item_text">学科</div>
							<span id="category_select">
								<select class="state_select" name="depart" type="text" onchange="categoryChange(this)">
	                                  <option value="depart">学部</option>
                                    <option value="a">産業デザイン学部</option>
	                                  <option value="b">生命環境学部</option>
	                                  <option value="c">情報メディア学部</option>
                                    <option value="d">ビジネス実務学部</option>
                                    <option value="e">保健医療学部</option>
                                    <option value="f">空間システム学部</option>
                </select>

                <select id="good" class="state_select" type="text" name="major" >
                                    <option value="major">学科</option>
                </select>                  
							</span>
						</li>
						<li>
							<div style="margin-left : 12px;" class="item_text">価格</div>
              <span id="price_unit">¥ </span>
							<input class="price_write" type="text" name="price" value="<?= $price?>"
							placeholder="数字だけ入力してください。 " onfocus="this.placeholder=''" onblur="this.placeholder='数字だけ入力してください。'">
						</li>
						<li id="explain_li">
							<div style="margin-left : 12px;" class="item_text explain_write_title">詳細説明</div>
							<textarea class="explain_write" type="text" name="content" rows="8" 
								placeholder="商品説明を入力してください。 "
								onfocus="this.placeholder=''"
								onblur="this.placeholder='商品説明を入力してください。 '"><?=$content?></textarea>
						</li>
					</ul>
					<!--버튼-->
					<div class="board_btns">
          <button class="button_cancel" type="button" onClick="location.href='product.php?cate=book'">キャンセル</button>
					<input type="submit" style="color: #fff;
                                      border-radius: 6px;
                                      padding:10px;
                                      width: 160px;
                                      height: 60px;
                                      padding-left: 10px;" value="登録">
					</div>
				</form> <!--join_form END-->
  			</article>
    
  		</section>
	  </main>
    <br><br>
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
<!-- select tag option value js -->
<script src="./assets/js/select_option.js"></script>
<!-- file upload preview js -->
<script src="./assets/js/file.js"></script>

</body>
</html>


