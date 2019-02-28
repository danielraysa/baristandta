<?php
    session_start();
    date_default_timezone_set("Asia/Jakarta");
    include "../connection.php";
    if(isset($_POST['id_list'])){
        //$id = $_POST['id_list'];
        //$select = mysqli_query($koneksi, "SELECT distinct(p.id_pengunjung), p.nama_pengunjung, p.asal_perusahaan, cs.message, cs.date_sent FROM chat_system cs JOIN pengunjung p ON cs.username = p.id_pengunjung ORDER BY cs.date_sent DESC");
        $select = mysqli_query($koneksi, "SELECT p.id_pengunjung, p.nama_pengunjung, p.asal_perusahaan FROM chat_system cs JOIN pengunjung p ON cs.username = p.id_pengunjung GROUP BY p.id_pengunjung");
        while($chat = mysqli_fetch_array($select)) {
            ?>
            <div class="chat_list" id="chat_entry" data-chat="<?php echo $chat['id_pengunjung']; ?>">
                <div class="chat_people">
                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                    </div>
                    <div class="chat_ib">
                        <h5><?php echo $chat['nama_pengunjung']; ?><span class="chat_date">Dec 25</span></h5>
                        <p><?php echo substr($chat['asal_perusahaan'], 0, 50); ?></p>
                    </div>
                </div>
            </div>
        <?php
        }
    }
    if(isset($_POST['id_chat'])){
        $id = $_POST['id_chat'];
        $select = mysqli_query($koneksi, "SELECT * FROM chat_system WHERE username = '".$id."' OR receiver = '".$id."'");
        while($chat = mysqli_fetch_array($select)) {
            if($chat['username'] == $id) {
            ?>
            <div class="incoming_msg">
                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                        alt="sunil"> </div>
                <div class="received_msg">
                    <div class="received_withd_msg">
                        <p><?php echo $chat['message']; ?></p>
                        <span class="time_date"> 11:01 AM | June 9</span>
                    </div>
                </div>
            </div>
            <?php 
            }
            else {
            ?>
            <div class="outgoing_msg">
                <div class="sent_msg">
                    <p><?php echo $chat['message']; ?></p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>
        <?php
            }
        }
    }
    if(isset($_POST['text'])){
        $sender = $_SESSION['id_pegawai'];
        $id = $_POST['id'];
        $text = $_POST['text'];
        $date = date('Y-m-d H:i:s');
        $query = mysqli_query($koneksi, "INSERT INTO chat_system (username, receiver, message, date_sent) VALUES ('".$sender."', '".$id."', '".$text."', '".$date."')");
        $select = mysqli_query($koneksi, "SELECT * FROM chat_system WHERE username = '".$id."' OR receiver = '".$id."'");
        while($chat = mysqli_fetch_array($select)) {
            if($chat['username'] == $id) {
            ?>
            <div class="incoming_msg">
                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                        alt="sunil"> </div>
                <div class="received_msg">
                    <div class="received_withd_msg">
                        <p><?php echo $chat['message']; ?></p>
                        <span class="time_date"> 11:01 AM | June 9</span>
                    </div>
                </div>
            </div>
            <?php 
            }
            else {
            ?>
            <div class="outgoing_msg">
                <div class="sent_msg">
                    <p><?php echo $chat['message']; ?></p>
                    <span class="time_date"> 11:01 AM | June 9</span>
                </div>
            </div>
        <?php
            }
        }
    }

?>