<?php $filename = basename(__FILE__); ?>
<?php include "header.php"; ?>
<?php include "navbar.php"; ?>
<?php include "sidebar.php"; ?>
<link href="message.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h3 class=" text-center">Messaging</h3>
            </div>
            <div class="messaging">
                <div class="inbox_msg">
                    <div class="inbox_people">
                        <div class="headind_srch">
                            <div class="recent_heading">
                                <h4>Recent</h4>
                            </div>
                            <!--<div class="srch_bar">
                                <div class="stylish-input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </span> 
                                    <input type="text" class="search-bar" placeholder="Search">
                                </div>
                            </div>-->
                        </div>
                        <div class="inbox_chat" id="chat_list">
                            <?php
                            
                                $query = mysqli_query($koneksi, "SELECT distinct(p.id_pengunjung), p.nama_pengunjung, p.asal_perusahaan, cs.message, cs.date_sent FROM chat_system cs JOIN pengunjung p ON cs.username = p.id_pengunjung ORDER BY cs.date_sent DESC");
                                //$query = mysqli_query($koneksi, "SELECT p.nama_pengunjung, p.asal_perusahaan FROM chat_system cs JOIN pengunjung p ON cs.username = p.id_pengunjung GROUP BY p.id_pengunjung");
                                while($chat = mysqli_fetch_array($query)){
                            ?> 
                            <!--<div class="chat_list active_chat"></div> -->
                            <div class="chat_list" data-chat="<?php echo $chat['id_pengunjung']; ?>">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
                                    </div>
                                    <div class="chat_ib">
                                        <h5><?php echo $chat['nama_pengunjung']; ?><span class="chat_date">Dec 25</span></h5>
                                        <p><?php echo substr($chat['message'], 0, 50); ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="mesgs">
                        <div class="msg_history" id="chat_history">
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Test which is a new approach to have all
                                            solutions</p>
                                        <span class="time_date"> 11:01 AM | June 9</span>
                                    </div>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>Test which is a new approach to have all
                                        solutions</p>
                                    <span class="time_date"> 11:01 AM | June 9</span>
                                </div>
                            </div>
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>Test, which is a new approach to have</p>
                                        <span class="time_date"> 11:01 AM | Yesterday</span>
                                    </div>
                                </div>
                            </div>
                            <div class="outgoing_msg">
                                <div class="sent_msg">
                                    <p>Apollo University, Delhi, India Test</p>
                                    <span class="time_date"> 11:01 AM | Today</span>
                                </div>
                            </div>
                            <div class="incoming_msg">
                                <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                        alt="sunil"> </div>
                                <div class="received_msg">
                                    <div class="received_withd_msg">
                                        <p>We work directly with our designers and suppliers,
                                            and sell direct to you, which means quality, exclusive
                                            products, at a price anyone can afford.</p>
                                        <span class="time_date"> 11:01 AM | Today</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="type_msg">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" id="textChat" placeholder="Type a message" />
                                <button class="msg_send_btn" id="sendChat" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <p class="text-center top_spac"> Design by <a target="_blank" href="#">Sunil Rajput</a></p> -->

            </div>
        </div>
        
    </div>
</section>

<?php include "footer.php"; ?>