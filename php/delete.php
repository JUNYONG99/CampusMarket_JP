<?php
session_start();
require "db_connect.php";

$num = $_REQUEST["num"];

$product_delete = mysqli_query($conn, "DELETE FROM product WHERE num = $num");
$file_delete = mysqli_query($conn, "DELETE FROM file where f_num = $num");


echo "<script>alert('商品を削除しました。'); location.href=('../product.php?cate=book');</script>";
?>
