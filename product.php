<!-- session start and DB connect-->
<?php
  session_start();
  require "php/db_connect.php";

  $cate = empty($_REQUEST["cate"]) ? "free" : $_REQUEST["cate"]; // 受け取った値が本なのか実習ツールなのか確認
  $major = empty($_REQUEST["major"]) ? null : $_REQUEST["major"]; // 受け取った値 学科 確認
  $sort =  empty($_REQUEST["sort"]) ? "num" : $_REQUEST["sort"]; // 整列

	$search = empty($_REQUEST["search"]) ? "" : $_REQUEST["search"]; // 入力した検索語

	$numLines = 9; 
	$numLinks = 3; 

	$page = empty($_REQUEST["page"]) ? 1 : $_REQUEST["page"]; 
	$start = ($page - 1) * $numLines; 

  $writer_name = empty($_REQUEST["user"]) ? "" : $_REQUEST["user"];

	if ($cate == "book") { /* 本の時　*/
		$title = '専攻 / 教養教材';
    if(isset($major)) { 
      if($sort == "row_price") {
        $product = mysqli_query($conn, "select * from product where cate='book' and major = '$major' order by price asc limit $start, $numLines");
      } else {
        $product = mysqli_query($conn, "select * from product where cate='book' and major = '$major' order by $sort desc limit $start, $numLines");
      }
     
    } else {
       if($sort == "row_price") {
        $product = mysqli_query($conn, "select * from product where cate='book' order by price asc limit $start, $numLines");
       } else {
        $product = mysqli_query($conn, "select * from product where cate='book' order by $sort desc limit $start, $numLines");
       }
    }
	

	} else if ($cate == "tool"){
    $title = '実習道具';
		if(isset($major)) { 
      if($sort == "row_price") {
        $product = mysqli_query($conn, "select * from product where cate='tool' and major = '$major' order by price asc limit $start, $numLines");
      } else {
        $product = mysqli_query($conn, "select * from product where cate='tool' and major = '$major' order by $sort desc limit $start, $numLines");
      }
     
    } else {
       if($sort == "row_price") {
        $product = mysqli_query($conn, "select * from product where cate='tool' order by price asc limit $start, $numLines");
       } else {
        $product = mysqli_query($conn, "select * from product where cate='tool' order by $sort desc limit $start, $numLines");
       }
    }

	} else if($cate == "user") {
    $title = $writer_name." 様の他の商品";
    $find_unique_id = mysqli_query($conn, "select * from member where name = '$writer_name'");
    $correct = mysqli_fetch_assoc($find_unique_id);
    $find = $correct['unique_id'];

      if($sort == "row_price") {
        $product = mysqli_query($conn, "select * from product where member_id = $find order by price asc limit $start, $numLines");
       } else {
        $product = mysqli_query($conn, "select * from product where member_id = $find order by $sort desc limit $start, $numLines");
       }

  }else {
  
    if ($search == ""){
      echo "<script>alert('検索キーワードを入力してください。'); history.back();</script>";
    } else {
      $title = "検索結果" ;
      if($sort == "row_price") {
        $product = mysqli_query($conn,"select * from product where title like '%$search%' or content like '%$search%' order by price asc limit $start, $numLines");
      } else {
        $product = mysqli_query($conn,"select * from product where title like '%$search%' or content like '%$search%' order by $sort desc limit $start, $numLines");
      }
      
    }
  }

	?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CM 商品</title>
    <!-- integrated css -->
    <link rel="stylesheet" href="./assets/css/common.css" />
    <!-- header/footer css-->
    <link rel="stylesheet" href="./assets/css/style.css" />
    <!-- font-awesome-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
  </head>
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
              <input type="text" placeholder="検索キーワードを入力してください。" name="search" value="<?=$search?>" />
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

      <section class="section">
        <div class="inner_container">
          <div class="main_title">
            <h1><?php echo $title; ?><?php if($major) { echo " > $major"; }?></h1>
            <div class="mint_box">
              <?php if($search) {
              ?>
                 <h2 style="padding:44px;">キーワード <span style="color: #477EFF;">"<?php echo $search; ?>"</span></h2>
              <?php
              } else if($writer_name) {
              ?>
                 <h2 style="padding:44px;">"<?php echo $writer_name; ?>" 様の他の商品</h2>
              <?php
              }
              ?>
            </div>
          </div>
          <div class="filter_array_flex">
            <div class="filter">
            </div>
            <div class="array">
              <div class="toggle_btn">
                <img src="./assets/images/array.png" alt="array" />
                <p>整列</p>
              </div>
              <div class="array_click">
                <div class="array_wrap">

                <?php
                  if($search) {
                ?>
                
                    <p><a href="product.php?&cate=<?php echo $cate; ?>&search=<?php echo $search?>&sort=reg_date">最新順</a></p>
                    <p><a href="product.php?&cate=<?php echo $cate; ?>&search=<?php echo $search?>&sort=row_price">価格: 低い順<</a></p>
                    <p><a href="product.php?&cate=<?php echo $cate; ?>&search=<?php echo $search?>&sort=price">가価格: 高い順<</a></p>
                <?php
                  } else if($writer_name){
                ?>
                    <p><a href="product.php?&cate=<?php echo $cate; ?>&user=<?php echo $writer_name?>&sort=reg_date">最新順</a></p>
                    <p><a href="product.php?&cate=<?php echo $cate; ?>&user=<?php echo $writer_name?>&sort=row_price">価格: 低い順</a></p>
                    <p><a href="product.php?&cate=<?php echo $cate; ?>&user=<?php echo $writer_name?>&sort=price">価格: 高い順</a></p>
                <?php
                  }else {
                ?>
                    <p><a href="product.php?cate=<?php echo $cate; ?><?php if($major) { echo "&major=$major";}?>&sort=reg_date">最新順</a></p>
                    <p><a href="product.php?cate=<?php echo $cate; ?><?php if($major) { echo "&major=$major";}?>&sort=row_price">価格: 低い順</a></p>
                    <p><a href="product.php?cate=<?php echo $cate; ?><?php if($major) { echo "&major=$major";}?>&sort=price">価格: 高い順</a></p>
                <?php   
                  }
                ?>
                 
                </div>
              </div>
            </div>
          </div>
          <div class="whole_chart">
            <div class="left_list_box">
              <ul>
                <li class="dep1">
                  <a href="javascript:(0)" class="li01">専攻 / 教養教材</a>
                  <ul class="dep2">
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >産業デザイン学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=映像デザイン科">映像デザイン科</a></li>
                        <li>
                          <a href="product.php?cate=book&major=視覚デザイン科">視覚デザイン科</a>
                        </li>
                        <li><a href="product.php?cate=book&major=ファッションデザイン科">ファッションデザイン科</a></li>
                        <li><a href="product.php?cate=book&major=繊維衣裳コーディネート科">繊維衣裳コーディネート科</a></li>
                        <li><a href="product.php?cate=book&major=Eスポーツ科">Eスポーツ科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li">生命環境学部</a>
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=環境造園科">環境造園科</a></li>
                        <li><a href="product.php?cate=book&major=ガーデニング専攻">ガーデニング専攻</a></li>
                        <li><a href="product.php?cate=book&major=フローリスト専攻">フローリスト専攻</a></li>
                        <li><a href="product.php?cate=book&major=庭園文化産業専攻">庭園文化産業専攻</a></li>
                        <li><a href="product.php?cate=book&major=ペット科">ペット科</a></li>
                        <li><a href="product.php?cate=book&major=バイオ生命科学科">バイオ生命科学科</a></li>
                        <li><a href="product.php?cate=book&major=幼児教育科">幼児教育科</a></li>
                        <li><a href="product.php?cate=book&major=食品栄養学科">食品栄養学科</a></li>
                        <li><a href="product.php?cate=book&major=ホテル外食ベーカリー科">ホテル外食ベーカリー科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >情報メディア学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=写真映像メディア科">写真映像メディア科</a></li>
                        <li>
                          <a href="product.php?cate=book&major=グラフィックコミュニケーション科">グラフィックコミュニケーション科</a>
                        </li>
                        <li><a href="product.php?cate=book&major=メディアコンテンツ科">メディアコンテンツ科</a></li>
                        <li><a href="product.php?cate=book&major=ITソフトウェア科">ITソフトウェア科</a></li>
                        <li><a href="product.php?cate=book&major=AIソフトウェア科">AIソフトウェア科</a></li>
                        <li><a href="product.php?cate=book&major=情報通信保安課">情報通信保安課</a></li>
                        <li><a href="product.php?cate=book&major=VRゲームコンテンツ科">VRゲームコンテンツ科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >ビジネス実務学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=マーケティング学科">マーケティング学科</a></li>
                        <li><a href="product.php?cate=book&major=スマート事務経営科">スマート事務経営科</a></li>
                        <li><a href="product.php?cate=book&major=세税務会計課">税務会計科</a></li>
                        <li><a href="product.php?cate=book&major=ホテル観光課">ホテル観光科</a></li>
                        <li><a href="product.php?cate=book&major=観光サービス中国語科">観光サービス中国語科</a></li>
                        <li><a href="product.php?cate=book&major=航空サービス科">航空サービス科</a></li>
                        <li><a href="product.php?cate=book&major=社会福祉科">社会福祉科</a></li>
                        <li><a href="product.php?cate=book&major=保育福祉科">保育福祉科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li">保健医療学部</a>
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=物理療法学科">物理療法学科</a></li>
                        <li><a href="product.php?cate=book&major=放射線学科">放射線学科</a></li>
                        <li><a href="product.php?cate=book&major=歯技工学科">歯技工学科</a></li>
                        <li><a href="product.php?cate=book&major=歯科衛生学科">歯科衛生学科</a></li>
                        <li><a href="product.php?cate=book&major=ビューティーケア科">ビューティーケア科</a></li>
                        <li><a href="product.php?cate=book&major=保健医療行政学科">保健医療行政学科</a></li>
                        <li><a href="product.php?cate=book&major=スポーツリハビリテーション科">スポーツリハビリテーション科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >空間システム学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=スマート建設情報科">スマート建設情報科</a></li>
                        <li><a href="product.php?cate=book&major=知的空間情報学科">知的空間情報学科</a></li>
                        <li><a href="product.php?cate=book&major=室内建築科">室内建築科</a></li>
                        <li><a href="product.php?cate=book&major=建築学科">建築学科</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li class="dep1">
                  <a href="javascript:(0)" class="li01">実習道具</a>
                  <ul class="dep2">
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >産業デザイン学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=映像デザイン科">映像デザイン科</a></li>
                        <li>
                          <a href="product.php?cate=book&major=視覚デザイン科">視覚デザイン科</a>
                        </li>
                        <li><a href="product.php?cate=book&major=ファッションデザイン科">ファッションデザイン科</a></li>
                        <li><a href="product.php?cate=book&major=繊維衣裳コーディネート科">繊維衣裳コーディネート科</a></li>
                        <li><a href="product.php?cate=book&major=Eスポーツ科">Eスポーツ科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li">生命環境学部</a>
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=環境造園科">環境造園科</a></li>
                        <li><a href="product.php?cate=book&major=ガーデニング専攻">ガーデニング専攻</a></li>
                        <li><a href="product.php?cate=book&major=フローリスト専攻">フローリスト専攻</a></li>
                        <li><a href="product.php?cate=book&major=庭園文化産業専攻">庭園文化産業専攻</a></li>
                        <li><a href="product.php?cate=book&major=ペット科">ペット科</a></li>
                        <li><a href="product.php?cate=book&major=バイオ生命科学科">バイオ生命科学科</a></li>
                        <li><a href="product.php?cate=book&major=幼児教育科">幼児教育科</a></li>
                        <li><a href="product.php?cate=book&major=食品栄養学科">食品栄養学科</a></li>
                        <li><a href="product.php?cate=book&major=ホテル外食ベーカリー科">ホテル外食ベーカリー科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >情報メディア学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=写真映像メディア科">写真映像メディア科</a></li>
                        <li>
                          <a href="product.php?cate=book&major=グラフィックコミュニケーション科">グラフィックコミュニケーション科</a>
                        </li>
                        <li><a href="product.php?cate=book&major=メディアコンテンツ科">メディアコンテンツ科</a></li>
                        <li><a href="product.php?cate=book&major=ITソフトウェア科">ITソフトウェア科</a></li>
                        <li><a href="product.php?cate=book&major=AIソフトウェア科">AIソフトウェア科</a></li>
                        <li><a href="product.php?cate=book&major=情報通信保安課">情報通信保安課</a></li>
                        <li><a href="product.php?cate=book&major=VRゲームコンテンツ科">VRゲームコンテンツ科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >ビジネス実務学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=マーケティング学科">マーケティング学科</a></li>
                        <li><a href="product.php?cate=book&major=スマート事務経営科">スマート事務経営科</a></li>
                        <li><a href="product.php?cate=book&major=세税務会計課">税務会計課</a></li>
                        <li><a href="product.php?cate=book&major=ホテル観光課">ホテル観光課</a></li>
                        <li><a href="product.php?cate=book&major=観光サービス中国語科">観光サービス中国語科</a></li>
                        <li><a href="product.php?cate=book&major=航空サービス科">航空サービス科</a></li>
                        <li><a href="product.php?cate=book&major=社会福祉科">社会福祉科</a></li>
                        <li><a href="product.php?cate=book&major=保育福祉科">保育福祉科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li">保健医療学部</a>
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=物理療法学科">物理療法学科</a></li>
                        <li><a href="product.php?cate=book&major=放射線学科">放射線学科</a></li>
                        <li><a href="product.php?cate=book&major=歯技工学科">歯技工学科</a></li>
                        <li><a href="product.php?cate=book&major=歯科衛生学科">歯科衛生学科</a></li>
                        <li><a href="product.php?cate=book&major=ビューティーケア科">ビューティーケア科</a></li>
                        <li><a href="product.php?cate=book&major=保健医療行政学科">保健医療行政学科</a></li>
                        <li><a href="product.php?cate=book&major=スポーツリハビリテーション科">スポーツリハビリテーション科</a></li>
                      </ul>
                    </li>
                    <li class="sub_dep2">
                      <a href="javascript:(0)" class="dep2_li"
                        >空間システム学部</a
                      >
                      <ul class="dep3">
                        <li><a href="product.php?cate=book&major=スマート建設情報科">スマート建設情報科</a></li>
                        <li><a href="product.php?cate=book&major=知的空間情報学科">知的空間情報学科</a></li>
                        <li><a href="product.php?cate=book&major=室内建築科">室内建築科</a></li>
                        <li><a href="product.php?cate=book&major=建築学科">建築学科</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
              <div class="purchase_btn">
                <a href="product_submit.php"><p>商品登録</p></a>
              </div>
            </div>
            <div class="right_list_box">
              <table>
                <colgroup>
                  <col width="33.33%" />
                  <col width="33.33%" />
                  <col width="33.33%" />
                </colgroup>
              <ul class="product_form">
            <?php
                 $result_count = 0;
                 while($row = mysqli_fetch_assoc($product)) {
                  $img_find_count = mysqli_query($conn, "select count(*) from file as F, product as P where F.f_num = P.num and P.num = ".$row['num']."");
                  $img_find_num = mysqli_fetch_assoc($img_find_count);
                  if ($img_find_num == 0){
                    $file_src = './assets/images/chatbot_profile_white.jpg';
                  } else {
                    $img_find = mysqli_query($conn, "select * from file as F, product as P where F.f_num = P.num and P.num = ".$row['num']."");
                    if($img_one= mysqli_fetch_assoc($img_find )){
                      $file_src = "php/".$img_one["main"];
                    }
                  }
             ?>

                    <li class="cell" style="width:33.33%; height:600px;">
                    <div class="book_img_box">
                      <a href="product_view.php?num=<?php echo $row['num']?>">
                      <img src="<?php echo $file_src ?>"  style="width:260px; height:380px; object-fit: cover;" />
                    </div>
                    <div class="book_desc">
                      <p class="name"><?php echo $row['title'] ?></p>
                      <p class="price">￥<?php echo number_format($row['price']) ?></p>
                    </div>
                      </a>
                    </li>
            <?php   
            $result_count++;
            } 

            if($cate == 'free' && !$result_count) {
            ?>
              <h2 style="padding: 130px; text-align: center;">条件に一致する商品は見つかりませんでした。</h2>
            <?php
            }
            ?>
                </ul>
              </table>

        <?php
				$firstLink = floor(($page - 1) / $numLinks) * $numLinks + 1;
				$lastLink = $firstLink + $numLinks - 1;
        if ($cate == 'free') {
          $page_query = mysqli_query($conn, "select * from product where title like '%$search%' or content like '%$search%'");
          $numRecords = mysqli_num_rows($page_query);
        } else if($cate== "user") {
          $page_query = mysqli_query($conn, "select * from product where member_id = $find");
          $numRecords = mysqli_num_rows($page_query);   
        }else {
				 
          if($major) {
            $page_query = mysqli_query($conn, "select * from product where cate='$cate' and major='$major'");
            $numRecords = mysqli_num_rows($page_query);   
          } else {
            $page_query = mysqli_query($conn, "select * from product where cate='$cate'");
            $numRecords = mysqli_num_rows($page_query);
          }

        }

        
      
				$numPages = ceil($numRecords/$numLines); 
				if ($lastLink > $numPages) {
					$lastLink = $numPages;
				}

				?>
              <div class="page_btn">
        <?php
              if($firstLink > 1) {
        ?>
                <div class="btn_img">
                <a href="product.php?cate=<?php echo $cate; ?><?php if($major) { echo "&major=$major";}?>&sort=<?php echo $sort ?><?php if($search) { echo "&search=$search";}?><?php if($writer_name) { echo "&user=$writer_name";}?>&page=<?=$firstLink - $numLinks?>" >
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
                <li <?=($i == $page) ? "style='background: #d9d9d9;  border-radius: 15px; '" : " " ?>> <a href="product.php?cate=<?php echo $cate; ?><?php if($major) { echo "&major=$major";}?><?php if($search) { echo "&search=$search";}?><?php if($writer_name) { echo "&user=$writer_name";}?>&sort=<?php echo $sort ?>&page=<?php echo $i; ?>" ><?=($i == $page) ? "$i" : $i ?></a></li>        
        <?php
              } 
        ?>        </ul>
                </div>

        <?php
              if($lastLink < $numPages) {
        ?>
              <div class="btn_img">
                  <a href="product.php?cate=<?php echo $cate; ?><?php if($major) { echo "&major=$major";}?><?php if($search) { echo "&search=$search";}?><?php if($writer_name) { echo "&user=$writer_name";}?>&sort=<?php echo $sort ?>&page=<?=$firstLink + $numLinks?>" >
                    <img src="./assets/images/next_btn.png" alt="next_btn" />
                  </a>
              </div>
        <?php  
              }

        ?>
                
              </div>
            </div>
          </div>
        </div>
      </section>

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
    <!-- right content slide -->
    <script src="./assets/js/campus.js"></script>
  </body>
</html>
