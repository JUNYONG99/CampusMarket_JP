<?php
session_start();
require "db_connect.php";
$num = $_REQUEST["num"];

$userName = $_SESSION["name"];
$userEmail = $_SESSION["email"];
$unique_id = $_SESSION["unique_id"];

$save_path="./files/".$unique_id."/";

$state = mysqli_real_escape_string($conn, $_POST['state']);
$title = mysqli_real_escape_string($conn, $_POST['title']);
$cate = mysqli_real_escape_string($conn, $_POST['cate']);
$depart = mysqli_real_escape_string($conn, $_POST['depart']);
$major = mysqli_real_escape_string($conn, $_POST['major']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$content = mysqli_real_escape_string($conn, $_POST['content']);
$reg_date = date("Y-m-d H:i:s");

if($major == "major") {
    echo "<script>
    alert('すべての入力値が必要です。');
    history.back();
    </script>";
    return;
 }

 if ( $price && $title && $state && $cate && $content) {
  
    if (!is_numeric($price)) {
      ?>
      <script>
        alert("価格は数字のみ入力できます。");
        history.back();
      </script>
      <?php
    }
     $reg_time = date("Y-m-d H:i:s");

     $sql = "update product set title='$title', cate='$cate', department='$depart', major='$major', state='$state', price=$price, content='$content', reg_date='$reg_date' where num=$num";
     $update_data = mysqli_query($conn, $sql);

     
            
            //main
            if($_FILES["main"]["name"] !== "") {
              $mainImg_tmp = $_FILES["main"]["tmp_name"];
              $mainImg  = $save_path.$_FILES["main"]["name"];
              move_uploaded_file($mainImg_tmp, $mainImg);
            } else {
              $mainImg = "./files/chatbot_profile_white.jpg";
            }
            //sub_1
            if($_FILES["sub_1"]["name"] !== "") {
              $sub_1_tmp = $_FILES["sub_1"]["tmp_name"];
              $subImg_1 = $save_path.$_FILES["sub_1"]["name"];
              move_uploaded_file($sub_1_tmp , $subImg_1);
            } else {
              $subImg_1 = "./files/chatbot_profile_white.jpg";
            }
             //sub_2
             if($_FILES["sub_2"]["name"] !== "") {
              $sub_2_tmp = $_FILES["sub_2"]["tmp_name"];
              $subImg_2  = $save_path.$_FILES["sub_2"]["name"];
              move_uploaded_file($sub_2_tmp , $subImg_2);
            } else {
              $subImg_2 = "./files/chatbot_profile_white.jpg";
            }
             //sub_3
             if($_FILES["sub_3"]["name"] !== "") {
              $sub_3_tmp = $_FILES["sub_3"]["tmp_name"];
              $subImg_3  = $save_path.$_FILES["sub_3"]["name"];
              move_uploaded_file($sub_3_tmp , $subImg_3);
            } else {
              $subImg_3 = "./files/chatbot_profile_white.jpg";
            }
            
            $sql3 = "update file set main='$mainImg', sub_1='$subImg_1',  sub_2='$subImg_2',  sub_3='$subImg_3' where f_num = $num";
            $file_input = mysqli_query($conn, $sql3);
        }
        
        ?>
        <script>
          alert("修正されました。");
          location.replace("../product_view.php?num=<?=$num?>");
        </script>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
</head>
<body>
<script>
alert('すべての入力値が必要です。');
history.back();
</script>

</body>
</html>
