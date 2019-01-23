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
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-12">
                    <div class="card">
                        <div class="header">
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-hover dashboard-task-infos">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Task</th>
                                            <th>Status</th>
                                            <th>Manager</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Task A</td>
                                            <td><span class="label bg-green">Doing</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Task B</td>
                                            <td><span class="label bg-blue">To Do</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Task C</td>
                                            <td><span class="label bg-light-blue">On Hold</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>Task D</td>
                                            <td><span class="label bg-orange">Wait Approvel</span></td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Task E</td>
                                            <td>
                                                <span class="label bg-red">Suspended</span>
                                            </td>
                                            <td>John Doe</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Task Info -->
                
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
