<?php
session_start();
if(isset($_SESSION['unique_id'])) {
    include_once "db_connect.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $sql = "SELECT * FROM messages
            LEFT JOIN member ON member.unique_id = messages.outgoing_msg_id
            WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
            OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0) {
        
        while($row = mysqli_fetch_assoc($query)) {
            $profile = $row['profile'];
            if($row['outgoing_msg_id'] === $outgoing_id) { //発信者
                $output .= '<div class="first_chat chatting_content">
                                <p>'. $row['msg'] .'</p>
                              <div class="first_chat_img chatting_img_box">
                                 <img src="php/'.$profile.'" style="width: 60px; height: 60px; border-radius: 50%; object-fit:cover;">
                              </div>
                            </div>';
            
            } else { //メッセージ受信
                $output .= '<div class="second_chat chatting_content">
                              <div class="second_chat_img chatting_img_box">
                                <img src="php/'.$profile.'" style="width: 60px; height: 60px; border-radius: 50%; object-fit:cover;">
                              </div>
                                 <p>'. $row['msg'] .'</p>
                            </div>';
            }

        }
        echo $output;
    }



} else {
    header("../login.php");
}

?>