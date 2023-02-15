<?php
session_start();
include_once "db_connect.php";
$outgoing_id = $_SESSION['unique_id'];
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$output = "";
$sql = mysqli_query($conn, "SELECT * FROM member WHERE NOT unique_id = {$outgoing_id} AND (name LIKE '%{$searchTerm}%')");
if(mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {
    $output .= "お探しのユーザーは現在存在しません。"; 
}
echo $output;

 ?>