<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Tambah Data Pengajuan Sarpras Baru</h3>
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
                            <label for="nama" class="col-2 col-form-label">Nama Sarpras</label>
                            <div class="col-md-4">
                              <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="jumlah" class="col-2 col-form-label">Jumlah</label>
                            <div class="col-md-3">
                              <input type="number" class="form-control" id="jumlah" name="jumlah" autocomplete="off" required min="1" value="1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="keterangan" class="col-2 col-form-label">Keterangan</label>
                            <div class="col-md-4">
                                <textarea class="form-control" id="keterangan" name="keterangan" autocomplete="off"></textarea>
                            </div>
                        </div>

                        <div class="buttons">
                            <a href="index?m=pengajuan_aset" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>    
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>