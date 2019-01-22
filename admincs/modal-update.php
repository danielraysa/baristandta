<?php
include "../connection.php";
$id = $_GET['ID'];
$qu = mysqli_query($koneksi, "SELECT p.id_pendaftaran, p1.asal_perusahaan, p.nama_produk, p.jenis_produk, p.tanggal_penyerahan, p1.nama_pengunjung FROM pendaftaran p JOIN pengunjung p1 ON p.id_pendaftaran = p1.id_pengunjung WHERE p.id_pendaftaran = '".$id."'");
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
            <label for="email_address_2">Nama Pengunjung</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_pengunjung" class="form-control" value="<?php echo $fet['nama_pengunjung']; ?>" placeholder="Nama Pengunjung">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn btn-link waves-effect" name="update">SAVE</button>
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCEL</button>
</div>
</form>