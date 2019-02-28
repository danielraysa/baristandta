<?php

    date_default_timezone_set("Asia/Jakarta");
    include "../connection.php";
    if(isset($_POST['id_chat'])){
        $id = $_POST['id_chat'];
        $select = mysqli_query($koneksi, "SELECT * FROM chat_system WHERE username = '".$id."' OR receiver = '".$id."'");
        while($chat = mysqli_fetch_array($select)) {
            if($chat['username'] == $id) {
            ?>
            <div class="messageMe">
            <img src="../report/ICON/pengunjung.png" alt=""/>
                <span><?php echo $chat['message']; ?></span>
                <div class="clearFix"></div>
            </div>
            <?php 
            }
            else {
            ?>
            <div class="messageHer">
                <img src="../report/ICON/cs.jpg" alt=""/>
                <span><?php echo $chat['message']; ?></span>
                <div class="clearFix"></div>
            </div>
        <?php
            }
        }
    }
    if(isset($_POST['text'])){
        $id = $_POST['id'];
        $text = $_POST['text'];
        $date = date('Y-m-d H:i:s');
        $query = mysqli_query($koneksi, "INSERT INTO chat_system (username, message, date_sent) VALUES ('".$id."', '".$text."', '".$date."')");
        $select = mysqli_query($koneksi, "SELECT * FROM chat_system WHERE username = '".$id."' OR receiver = '".$id."'");
        while($chat = mysqli_fetch_array($select)) {
            if($chat['username'] == $id) {
            ?>
            <div class="messageMe">
            <img src="../report/ICON/pengunjung.png" alt=""/>
                <span><?php echo $chat['message']; ?></span>
                <div class="clearFix"></div>
            </div>
            <?php 
            }
            else {
            ?>
            <div class="messageHer">
                <img src="../report/ICON/cs.jpg" alt=""/>
                <span><?php echo $chat['message']; ?></span>
                <div class="clearFix"></div>
            </div>
        <?php
            }
        }
    }
    if(isset($_POST['lama'])) {
        $id = $_POST['id'];
        $pass_lama = $_POST['lama'];
        $pass_baru = $_POST['baru'];
        $query = mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE id_pengunjung = '".$id."' AND id_password = '".$pass_lama."'");
        if(mysqli_num_rows($query) == 1) {
            $update = mysqli_query($koneksi, "UPDATE pengunjung SET id_password = '".$pass_baru."' WHERE id_pengunjung = '".$id."'");
            echo true;
        }
        else {
            echo false;
        }
    }

?>