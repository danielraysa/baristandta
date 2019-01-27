    <?php $filename = basename(__FILE__); ?>
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
                                    <input type="text" id="nama_pengunjung" class="form-control" placeholder="Nama Pengunjung" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="asal_perusahaan" class="form-control" placeholder="Asal Perusahaan" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" id="data_keluhan"  class="form-control no-resize" placeholder="Tuliskan Keluhan/ Pertanyaan Pengunjung..."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" id="btnservice" class="btn btn-primary waves-effect">Simpan Data Pelayanan</button>
                                <!-- <button type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#myModal">Buka Rating</button> -->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
            <!-- Modal Rating -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Rating Pelayanan</h4>
                        </div>
                        <div class="modal-body">
                        <style>
                            .rating {
                            display: inline-block;
                            position: relative;
                            height: 50px;
                            line-height: 50px;
                            font-size: 50px;
                            }

                            .rating label {
                            position: absolute;
                            top: 0;
                            left: 0;
                            height: 100%;
                            cursor: pointer;
                            }

                            .rating label:last-child {
                            position: static;
                            }

                            .rating label:nth-child(1) {
                            z-index: 5;
                            }

                            .rating label:nth-child(2) {
                            z-index: 4;
                            }

                            .rating label:nth-child(3) {
                            z-index: 3;
                            }

                            .rating label:nth-child(4) {
                            z-index: 2;
                            }

                            .rating label:nth-child(5) {
                            z-index: 1;
                            }

                            .rating label input {
                            position: absolute;
                            top: 0;
                            left: 0;
                            opacity: 0;
                            }

                            .rating label .icon {
                            float: left;
                            color: transparent;
                            }

                            .rating label:last-child .icon {
                            color: #000;
                            }

                            .rating:not(:hover) label input:checked ~ .icon,
                            .rating:hover label:hover input ~ .icon {
                            color: #f00;
                            }

                            .rating label input:focus:not(:checked) ~ .icon:last-child {
                            color: #000;
                            text-shadow: 0 0 5px #f00;
                            }
                        </style>
                        <form class="rating">
                            <div class="form-group">
                                <label>
                                    <input type="radio" id="stars" name="stars" value="1" />
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" id="stars" name="stars" value="2" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" id="stars" name="stars" value="3" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>   
                                </label>
                                <label>
                                    <input type="radio" id="stars" name="stars" value="4" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                                <label>
                                    <input type="radio" id="stars" name="stars" value="5" />
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                    <span class="icon">★</span>
                                </label>
                            </div>
                            </form>
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" id="keterangan" class="form-control no-resize" placeholder="Keterangan..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="saveRating" class="btn btn-link waves-effect" data-dismiss="modal" name="save-rating">SAVE</button>
                        </div>
                    </div>
                </div>
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
                                var start = Date.now(),
                                    diff,
                                    minutes,
                                    seconds;
                                function timer() {
                                    // get the number of seconds that have elapsed since 
                                    // startTimer() was called
                                    diff = duration - (((Date.now() - start) / 1000) | 0);

                                    // does the same job as parseInt truncates the float
                                    minutes = (diff / 60) | 0;
                                    seconds = (diff % 60) | 0;

                                    minutes = minutes < 10 ? "0" + minutes : minutes;
                                    seconds = seconds < 10 ? "0" + seconds : seconds;

                                    display.textContent = minutes + ":" + seconds; 

                                    if (diff <= 0) {
                                        // add one second so that the count down starts at the full duration
                                        // example 05:00 not 04:59
                                        //start = Date.now() + 1000;
                                    }
                                };
                                // we don't want to wait a full second before the timer starts
                                timer();
                                setInterval(timer, 1000);
                            }

                            window.onload = function () {
                                var fiveMinutes = 60 * 0.05,
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
