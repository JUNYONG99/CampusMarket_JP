<?php
session_start();
if(isset($_SESSION['unique_id'])) {
    include_once "db_connect.php";
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $sql = "SELECT * FROM member WHERE unique_id = $incoming_id";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $output .= '<img src="php/'.$row['profile'].'" style="width: 74px; height:74px; padding: 8px; border-radius:50%; object-fit:cover;">';
    
        echo $output;
    }



} else {
    header("../login.php");
}

?>