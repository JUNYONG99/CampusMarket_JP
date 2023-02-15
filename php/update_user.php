<?php
session_start();
require "db_connect.php";
$update_user = $_SESSION['unique_id'];

$nickName = mysqli_real_escape_string($conn, $_POST['nickname']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$encpass = password_hash($password, PASSWORD_BCRYPT);

$save_path="./files/".$update_user."/profile/";

  if(!is_dir($save_path)){
    mkdir($save_path, 0777, true);
  };


if($nickName && $password) {

    if($_FILES["profile"]["name"] !== "") {
        $profileImg_tmp = $_FILES["profile"]["tmp_name"];
        $profileImg  = $save_path.$_FILES["profile"]["name"];
        move_uploaded_file($profileImg_tmp, $profileImg);
      } else {
        $profileImg = "./files/person.png";
      }

      $sql = mysqli_query($conn, "UPDATE member SET name='$nickName', password='$encpass', profile='$profileImg' WHERE unique_id = $update_user ");
?>

            <script>
              alert("会員情報が修正されました。");
              location.replace("../my.php");
            </script>
<?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<script>
    alert('すべての入力値が必要です。');
    //history.back();
</script>

</body>
</html>
