<?php

while($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
             OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id}
             OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0) {
        $result = $row2['msg'];
    } else {
        $result = "送信されたメッセージがありません";
    }
    
    (strlen($result) > 28) ? $msg = iconv_substr($result, 0, 28, "utf-8").'...' : $msg = $result;
    
    //check user is online or offline
    ($row['active'] == "オフライン") ? $offline = "offline" : $offline = "";

    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'"><div class="user_list user01">
                <div class="user_image_box">
                  <img src="php/'.$row['profile'].'" " style="width: 50px; height:50px; object-fit: cover; border-radius:50%;">
                </div>
                <div class="user_name_time">
                  <div class="name_time_flex">
                    <div class="user_name">
                      <p>'.$row['name'].'</p>
                    </div>
                  </div>
                  <div class="desc_icon_flex">
                    <div class="chat_desc">
                      <p>'.$msg.'</p>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                  </div>
                </div>
              </div></a>';
}

?>