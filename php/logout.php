<?php
session_start();
if(isset($_SESSION['unique_id'])) {
    include_once "db_connect.php";
    $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
    if(isset($logout_id)) {
        $active = "オフライン";
        $sql = mysqli_query($conn, "UPDATE member SET active = '{$active}' WHERE unique_id = {$logout_id}");
        if($sql) {
            session_unset();
            session_destroy();
            header("location: ../index.php");
        }
    } else {
        header("location: ../index.php");
    }

} else {
    header("location: ../login.php");
}
?>