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
        if($row['active'] == "オンライン") {
           
            $output .= '<p class="status_name">'.$row['name'].'</p>
                        <p class="status_content">'.$row['active'].'</p>';
        } else {
            $output .= '<p class="status_name">'.$row['name'].'</p>
                        <p class="status_content">'.$row['active'].'</p>';
        }

        echo $output;
    }



} else {
    header("../login.php");
}

?>