<?php 
  $aset = $db->get_row("SELECT * FROM tb_penggunaan_aset WHERE id=$_GET[id]");
?>  
<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Edit Data Penggunaan Sarpras</h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
                    <?php if($_POST) include 'aksi.php'; ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row ">
                            <label for="nama" class="col-2 col-form-label">Penanggung Jawab</label>
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= $aset->penanggung_jawab ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah" class="col-2 col-form-label">Jumlah (QTY)</label>
                            <div class="col-md-2">
                              <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off" required min="0" value="<?= $aset->qty ?>" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-2 col-form-label">Status</label>
                            <div class="col-md-2">
                              <select name="status" class="form-control">
                                <option value="Dipinjamkan">Dipinjamkan</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                                </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_serahkan" class="col-2 col-form-label">Tanggal Diserahkan</label>
                            <div class="col-md-2">
                              <input type="date" class="form-control" id="tgl_serahkan" name="tgl_serahkan" autocomplete="off" value="<?= $aset->tgl_serahkan ?>"  required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_kembali" class="col-2 col-form-label">Tanggal Dikembalikan</label>
                            <div class="col-md-2">
                              <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali" value="<?= $aset->tgl_kembali ?>"  autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-2 col-form-label">Keterangan</label>
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?= $aset->keterangan ?>"  autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="aset" class="col-2 col-form-label">Sarpras</label>
                            <div class="col-md-3">
                              <select name="aset" class="form-control">
                                <?= getAsetOption($aset->id_aset) ?>
                                </option>
                              </select>
                            </div>
                        </div>

                        <div class="buttons">
                            <a href="index?m=penggunaan" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>    
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>