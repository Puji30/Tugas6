<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=dokter&page=save" method="POST">
    <div class="col-md-6">
            <div class="form-group">
            <label for="">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" required value="<?=(isset($_POST['nama_pegawai']))?$_POST['nama_pegawai']:'';?>" class="form-control">
                <input type="hidden" name="id_pegawai"  value="<?=(isset($_POST['id_pegawai']))?$_POST['id_pegawai']:'';?>" class="form-control">
                <span class="text-danger"><?=(isset($err['nama_pegawai']))?$err['nama_pegawai']:'';?></span>
            </div>
            <div class="form-group">
            <label for="">Alamat</label>
                <input type="number" name="alm_pegawai" value="<?=(isset($_POST['alm_pegawai']))?$_POST['alm_pegawai']:'';?>" class="form-control">
                <span class="text-danger"><?=(isset($err['alm_pegawai']))?$err['alm_pegawai']:'';?></span>
            </div>
            <div class="form-group">
            <label for="">No Telp</label>
                <input type="number" name="no_telp_pegawai" value="<?=(isset($_POST['no_telp_pegawai']))?$_POST['no_telp_pegawai']:'';?>" class="form-control">
                <span class="text-danger"><?=(isset($err['no_telp_pegawai']))?$err['no_telp_pegawai']:'';?></span>
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="">Spesialisasi</label>
                <select name="id_spesialisasi" class="form-control" required id="" >
                <option value="">Pilih Spesialisasi</option>
                    <?php if($spesialisasi != NULL){
                        foreach($spesialisasi as $row){?>
                            <option <?=(isset($_POST['id_spesialisasi']) && $_POST['id_spesialisasi']==$row['id_spesialisasi'] )?"selected":'';?> value="<?=$row['id_spesialisasi'];?>"> <?=$row['id_spesialisasi'];?></option>
                        <?php }
                    }?>
                </select>
                <span class="text-danger"><?=(isset($err['id_spesialisasi']))?$err['id_spesialisasi']:'';?></span>
        </div>
    </div>
    <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>