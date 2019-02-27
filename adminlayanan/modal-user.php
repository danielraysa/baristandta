<?php
include "../connection.php";
$id = $_GET['ID'];
$qu = mysqli_query($koneksi, "SELECT id_pengunjung, id_password FROM pengunjung WHERE id_pengunjung = '".$id."'");
$fet = mysqli_fetch_array($qu);

?>
<form action="form-action.php" method="post">
<div class="modal-header">
    <h4 class="modal-title">Data User Login</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">ID Pendaftaran</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="id_pendaftaran" class="form-control" value="<?php echo $fet['id_pengunjung']; ?>" placeholder="ID Pendaftaran" readonly>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-5 form-control-label">
            <label for="email_address_2">Password</label>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="nama_perusahaan" id="password" class="form-control" value="<?php echo $fet['id_password']; ?>" placeholder="Password" readonly>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
</div>
</form>