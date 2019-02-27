<form action="" method="get" role="form">
    <div class="modal-header">
        <h4 class="modal-title">Filter Data</h4>
    </div>
    <div class="modal-body">
        <label>Tanggal Awal</label>
        <input name="tanggal_awal" type="date" id="tanggal_awal" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
        <label>Tanggal Akhir</label>
        <input name="tanggal_akhir" type="date" id="tanggal_akhir" class="form-control" style='margin-bottom: 20px;' required autocomplete='off' />
    </div>
    <div class="modal-footer">
        <button type="submit" name="cari_tanggal" class="btn btn-warning">Filter</button>
        <button type="reset" class="btn btn-danger">Batal</button>
    </div>
</form>   
