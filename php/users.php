<?php 
session_start();
include_once  "db_connect.php";
$outgoing_id = $_SESSION['unique_id'];
$sql = mysqli_query($conn, "SELECT * FROM member WHERE NOT unique_id = {$outgoing_id}");
$output = "";
if(mysqli_num_rows($sql) == 1){
    $output .= "チャットする相手がいません。";
} else if(mysqli_num_rows($sql) > 0) {
    include "data.php";
}
echo $output;
?>