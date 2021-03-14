<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Tambah Data Sarpras</h3>
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
                            <label for="nama_aset" class="col-2 col-form-label">Nama Sarpras</label>
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="nama_aset" name="nama_aset" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nilai" class="col-2 col-form-label">Nilai Sarpras (Rp.)</label>
                            <div class="col-md-3">
                              <input type="number" class="form-control" id="nilai" name="nilai" autocomplete="off" required min="0" value="0">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis" class="col-2 col-form-label">Jenis</label>
                            <div class="col-md-3">
                              <select name="jenis" class="form-control">
                                <option value="Sarana">Sarana</option>
                                <option value="Prasarana">Prasarana</option>
                                </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah" class="col-2 col-form-label">Jumlah (QTY)</label>
                            <div class="col-md-3">
                              <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off" required min="1" value="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="sumber_aset" class="col-2 col-form-label">Sumber Sarpras</label>
                            <div class="col-md-3">
                              <select name="sumber_aset" class="form-control">
                                <option value="APBN">APBN</option>
                                <option value="APBD">APBD</option>
                                <option value="BOS">BOS</option>
                                <option value="Komite">Komite</option>
                                </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kepemilikan" class="col-2 col-form-label">Kepemilikan</label>
                            <div class="col-md-3">
                              <select name="kepemilikan" class="form-control">
                                <option value="Pribadi">Pribadi</option>
                                <option value="Pinjaman">Pinjaman</option>
                                </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kondisi" class="col-2 col-form-label">Kondisi Sarpras</label>
                            <div class="col-md-3">
                              <select name="kondisi" class="form-control">
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Berat">Rusak Berat</option>
                                <option value="Rusak Total">Rusak Total</option>
                                </option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status" class="col-2 col-form-label">Status Penggunaan</label>
                            <div class="col-md-3">
                              <select name="status" class="form-control">
                                <option value="Digunakan">Digunakan</option>
                                <option value="Diperbaiki">Diperbaiki</option>
                                <option value="Diarsipkan">Diarsipkan</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group row">
                              <label for="foto"  class="col-2 col-form-label">Foto Sarpras</label>
                              <div class="col-md-3">
                                  <input type="file" class="form-control" id="foto" name="foto" autocomplete="off">
                              </div>
                              
                        </div>

                        <div class="buttons">
                            <a href="index?m=aset" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>    
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>