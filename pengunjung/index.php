    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <center><div class="font-bold font-32">Tahapan Sertifikasi Anda Saat Ini</p></center>
            </div>
            <!--
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-lg bg-pink waves-effect waves-light">LEFT</button>
                        <button type="button" class="btn btn-lg bg-pink waves-effect waves-light">MIDDLE</button>
                        <button type="button" class="btn btn-lg bg-pink waves-effect waves-light">RIGHT</button>
                    </div>
                </div>
            </div> -->
            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 1") echo "bg-teal"; ?> hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">android</i>
                        </div>
                        <div class="content">
                            <div class="font-bold font-20">TAHAP 1</div>
                            <div class="font-bold font-15">Pengumpulan Uji Produk</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 2") echo "bg-teal"; ?> hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="font-bold font-20">TAHAP 2</div>
                            <?php
                            if ($_SESSION['id_layanan'] == "LYN001") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Kimia dan Lingkungan</div>
                            <?php
                            }
                            if ($_SESSION['id_layanan'] == "LYN002") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Teknis Pengujian dan Kalibrasi</div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 3") echo "bg-teal"; ?> hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">devices</i>
                        </div>
                        <div class="content">
                            <div class="font-bold font-20">TAHAP 3</div>
                            <?php
                            if ($_SESSION['id_layanan'] == "LYN001") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Pengujian Mutu</div>
                            <?php
                            }
                            if ($_SESSION['id_layanan'] == "LYN002") {
                            ?>
                            <div class="font-bold font-15">Laboratorium Fisika dan Lingkungan</div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="info-box-3 <?php if ($_SESSION['status_tahapan'] == "Tahap 4") echo "bg-teal"; ?> hover-expand-effect">
                            <div class="icon">
                                <i class="material-icons">playlist_add_check</i>
                            </div>
                            <div class="content">
                                <div class="font-bold font-20">TAHAP 4</div>
                                <div class="font-bold font-15">Keputusan Sertifikasi</div>
                            </div>
                        </div>
                </div>
                
            </div>
            <!-- #END# Widgets -->
            

            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Produk Disertifikasi</h2>
                        </div>
                        <div class="body">
                            
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">ID Pengunjung</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-5">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="id_pendaftaran" name="id_pendaftaran" class="form-control" value="<?php echo $_SESSION['id_pengunjung']; ?>" placeholder="ID Pengunjung" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Perusahaan</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_perusahaan" name="nama_perusahaan" class="form-control" value="<?php echo $fet['asal_perusahaan']; ?>" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Jenis Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="jenis_produk" name="jenis_produk" value="<?php echo $fet['jenis_produk']; ?>" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Nama Produk</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $fet['nama_produk']; ?>" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"> Jenis Sertifikasi</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="nama_layanan" name="nama_layanan" value="<?php echo $fet['nama_layanan']; ?>" class="form-control" placeholder="" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $data = mysqli_query($koneksi,"SELECT a.id_pendaftaran, p.tanggal_sertifikasi FROM antrian a JOIN produk p ON p.no_antrian = a.no_antrian WHERE a.id_pendaftaran = '".$_SESSION['id_pengunjung']."'");
                                if(mysqli_num_rows($data) == 1) {
                                    $baris = mysqli_fetch_array($data);
                                    setlocale(LC_TIME, "id_ID");
                                    date_default_timezone_set("Asia/Jakarta");
                                    $date = $baris['tanggal_sertifikasi'];
                                    $newdate = date('d F Y', strtotime("$date +1 day"));
                                ?>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                        <label for="password_2"> Tanggal Sertifikasi untuk diambil</label>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="tanggal_sertifikasi" name="tanggal_sertifikasi" value="<?php echo $newdate; ?>" class="form-control" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="form-action.php" method="post">
                            <div class="modal-header">
                                <h4 class="modal-title">Ubah Password</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">ID Pendaftaran</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" name="id_pendaftaran" id="id_password" class="form-control" value="<?php echo $_SESSION['id_pengunjung']; ?>" placeholder="ID Pendaftaran" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Password Lama</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="pass_lama" class="form-control" placeholder="Password lama" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
                                        <label for="email_address_2">Password Baru</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="password" id="pass_baru" class="form-control" maxlength="10" placeholder="Password baru (max. 10 karakter)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" id="btnUpdate" name="update">SAVE</button>
                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--Start of Tawk.to Script-->
                <!--
                <script type="text/javascript">
                    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
                        (function(){
                            var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                            s1.async=true;
                            s1.src='https://embed.tawk.to/5c7740cfa726ff2eea59d217/default';
                            s1.charset='UTF-8';
                            s1.setAttribute('crossorigin','*');
                            s0.parentNode.insertBefore(s1,s0);
                    })();
                </script> -->
                <!--End of Tawk.to Script-->
                
                <div class="panel panel-chat">
                    <div class="panel-heading">
                        <a href="#" class="chatMinimize" onclick="return false"><span>Chat with Admin CS</span></a>
                        <a href="#" class="chatMinimize" onclick="return false"><i class="glyphicon glyphicon-remove"></i></a>
                        <div class="clearFix"></div>
                    </div>
                    <div class="panel-body" id="chat_history">
                        <?php
                            $select = mysqli_query($koneksi, "SELECT * FROM chat_system WHERE username = '".$_SESSION['id_pengunjung']."' OR receiver = '".$_SESSION['id_pengunjung']."'");
                            while($chat = mysqli_fetch_array($select)) {
                                if($chat['username'] == $_SESSION['id_pengunjung']) {
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
                    ?>
                    </div>
                    <div class="panel-footer">
                        <div class="input-group">
                            <textarea name="textMessage" id="textChat" cols="0" rows="0"></textarea>
                            <button type="button" id="sendChat" class="btn btn-primary btn-block">Send</button>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
