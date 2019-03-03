<?php
include "../connection.php";
$id = $_GET['ID'];
$qu = mysqli_query($koneksi, "SELECT a.no_antrian, a.id_pendaftaran, a.id_layanan, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, l.nama_layanan, a.status FROM antrian a JOIN pendaftaran p on a.id_pendaftaran = p.id_pendaftaran JOIN layanan l ON a.id_layanan = l.id_layanan JOIN pengunjung p1 ON a.id_pendaftaran = p1.id_pengunjung WHERE a.id_pendaftaran = '".$id."'");
$fet = mysqli_fetch_array($qu);

?>
<form action="form-action.php" method="post">
<div class="modal-header">
    <h4 class="modal-title">Data Pendaftaran Produk</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">ID Pendaftaran</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="id_pendaftaran" class="form-control" value="<?php echo $fet['id_pendaftaran']; ?>" placeholder="ID Pendaftaran" readonly>
                    <input type="hidden" name="no_antrian" class="form-control" value="<?php echo $fet['no_antrian']; ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Nama Perusahaan</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_perusahaan" id="hasil1" class="form-control" value="<?php echo $fet['asal_perusahaan']; ?>" placeholder="Nama Perusahaan">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Nama Produk</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_produk" id="hasil2" class="form-control" value="<?php echo $fet['nama_produk']; ?>" placeholder="Nama Produk">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Jenis Produk</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="jenis_produk" id="hasil3" class="form-control" value="<?php echo $fet['jenis_produk']; ?>" placeholder="Jenis Produk" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Jenis Layanan Sertifikasi</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="jenis_sertifikasi" id="hasil3" class="form-control" value="<?php echo $fet['nama_layanan']; ?>" placeholder="Nama Layanan" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Status Sertifikasi Saat Ini</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <select name="status_sertifikasi" id="status_tahapan" class="bootstrap-select form-control show-tick">
                <?php
                $status = $fet['status'];
                if($status == "Tahap 1") {
                    ?>
                    <option value="Tahap 1">Tahap 1 - Pengumpulan Uji Produk</option>
                    <?php
                    if ($fet['id_layanan'] == "LYN001") {
                    ?>
                    <option value="Tahap 2">Tahap 2 - Laboratorium Kimia dan Lingkungan</option>
                    <option value="Tahap 3" disabled>Tahap 3 - Laboratorium Pengujian Mutu</option>
                    <?php
                    }
                    if ($fet['id_layanan'] == "LYN002") {
                    ?>
                    <option value="Tahap 2">Tahap 2 - Laboratorium Teknis Pengujian dan Kalibrasi</option>
                    <option value="Tahap 3" disabled>Tahap 3 - Laboratorium Fisika dan Lingkungan</option>
                    <?php
                    }
                    ?>
                    <option value="Tahap 4" disabled>Tahap 4 - Keputusan Sertifikasi</option>
                    <?php
                }
                if($status == "Tahap 2") {
                    ?>
                    <option value="Tahap 1" disabled>Tahap 1 - Pengumpulan Uji Produk</option>
                    <?php
                    if ($fet['id_layanan'] == "LYN001") {
                    ?>
                    <option value="Tahap 2">Tahap 2 - Laboratorium Kimia dan Lingkungan</option>
                    <option value="Tahap 3">Tahap 3 - Laboratorium Pengujian Mutu</option>
                    <?php
                    }
                    if ($fet['id_layanan'] == "LYN002") {
                    ?>
                    <option value="Tahap 2">Tahap 2 - Laboratorium Teknis Pengujian dan Kalibrasi</option>
                    <option value="Tahap 3">Tahap 3 - Laboratorium Fisika dan Lingkungan</option>
                    <?php
                    }
                    ?>
                    <option value="Tahap 4" disabled>Tahap 4 - Keputusan Sertifikasi</option>
                    <?php
                }
                if($status == "Tahap 3") {
                    ?>
                    <option value="Tahap 1" disabled>Tahap 1 - Pengumpulan Uji Produk</option>
                    <?php
                    if ($fet['id_layanan'] == "LYN001") {
                    ?>
                    <option value="Tahap 2" disabled>Tahap 2 - Laboratorium Kimia dan Lingkungan</option>
                    <option value="Tahap 3">Tahap 3 - Laboratorium Pengujian Mutu</option>
                    <?php
                    }
                    if ($fet['id_layanan'] == "LYN002") {
                    ?>
                    <option value="Tahap 2" disabled>Tahap 2 - Laboratorium Teknis Pengujian dan Kalibrasi</option>
                    <option value="Tahap 3">Tahap 3 - Laboratorium Fisika dan Lingkungan</option>
                    <?php
                    }
                    ?>
                    <option value="Tahap 4">Tahap 4 - Keputusan Sertifikasi</option>
                    <?php
                }
                ?>
                </select>
            </div>
        </div>
    </div>
    <script>
    var variable = "<?php echo $fet['status']; ?>";
    $('#status_tahapan').val(variable);
    //alert($("#status_tahapan")[0].selectedIndex);
    if(variable == "Tahap 1") {
        $("#status_tahapan option[value='Tahap 3']").prop("disabled","disabled"); 
        $("#status_tahapan option[value='Tahap 4']").prop("disabled","disabled");
        $('#status_tahapan').selectpicker('refresh');
    }
    if(variable == "Tahap 2") {
        $("#status_tahapan option[value='Tahap 1']").prop("disabled","disabled");
        $("#status_tahapan option[value='Tahap 4']").prop("disabled","disabled");
        $('#status_tahapan').selectpicker('refresh');
    }
    if(variable == "Tahap 3") {
        $("#status_tahapan option[value='Tahap 1']").prop("disabled","disabled");
        $("#status_tahapan option[value='Tahap 2']").prop("disabled","disabled");
        $('#status_tahapan').selectpicker('refresh');
    }
    </script>
    
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-link waves-effect" name="update">SAVE</button>
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
</div>
</form>