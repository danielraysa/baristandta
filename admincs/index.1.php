    <?php include "header.php"; ?>
    <?php include "navbar.php"; ?>
    <?php include "sidebar.php"; ?>

    <section class="content">
        <div class="container-fluid">
        <div class="block-header">
                <center><div class="font-bold font-32">Pelayanan Customer Service </p>
                <div class="font-bold font-32">Balai Riset dan Standaridisasi Industri Surabaya</p></center>
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
            <?php 
                if (isset($_GET['success'])) {
            ?>
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Data berhasil ditambahkan
            </div>
            <?php
                }
                if (isset($_GET['error'])) {
            ?>
            <div class="alert bg-green alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                data pelayanan disimpan
            </div>
            <?php
                }
            ?>
            
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                        </div>
                        <div class="body">
                            <form>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Nama Pengunjung" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Asal Perusahaan" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Tuliskan Keluhan/ Pertanyaan Pengunjung..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">

                                    <button type="submit" class="btn btn-primary waves-effect">Simpan Data Pelayanan</button>

                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
            <div class="row clearfix">
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <center><div class="font-24">Sisa Waktu Pelayanan</div> <b class="font-30"><span id="time">15:00</span></b></center>

                            <script>
                            
                            //clearInterval(timerID);
                            //document.getElementById("demo").innerHTML = "EXPIRED";
                            
                            function startTimer(duration, display) {
                            var timer = duration, minutes, seconds;
                            setInterval(function () {
                                minutes = parseInt(timer / 60, 10)
                                seconds = parseInt(timer % 60, 10);

                                minutes = minutes < 10 ? "0" + minutes : minutes;
                                seconds = seconds < 10 ? "0" + seconds : seconds;

                                display.textContent = minutes + ":" + seconds;

                                if (--timer < 0) {
                                    //window.alert("Expired");
                                    swal({
                                        title: "Durasi Pelayanan Untuk Pengunjung Sudah Habis",
                                        type: "warning",
                                        showCancelButton: false,
                                        confirmButtonText: "OK"
                                    });
                                    timer = duration;
                                }
                            }, 1000);
                        }

                        window.onload = function () {
                            var fiveMinutes = 60 * 15,
                                display = document.querySelector('#time');
                            startTimer(fiveMinutes, display);
                        };
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
