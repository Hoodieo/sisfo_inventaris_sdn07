<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Tambah Data Pengguna</h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <!-- Tampilkan jika ada error saat register -->
<?php if (isset($_COOKIE['notifikasi'])): ?>
<div class="row">
  <div class="col"><div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?= $_COOKIE['notifikasi']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div></div>
</div>
<?php setcookie('notifikasi','', time()); endif; ?>
                    
                    <?php if($_POST) include 'aksi.php'; ?>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row ">
                            <label for="username" class="col-2 col-form-label">Username</label>
                            <div class="col-md-3">
                              <input type="text" class="form-control" id="username" name="username" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <label for="password" class="col-2 col-form-label">Password</label>
                            <div class="col-md-3">
                              <input type="password" class="form-control" id="password" name="password" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <label for="password2" class="col-2 col-form-label">Konfirmasi Password</label>
                            <div class="col-md-3">
                              <input type="password" class="form-control" id="password2" name="password2" autocomplete="off" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="col-2 col-form-label">Status</label>
                            <div class="col-md-3">
                              <select name="status" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Kepala Sekolah">Kepala Sekolah</option>
                                <option value="Waka Sarpras">Waka Sarpras</option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Guru">Guru</option>
                                </option>
                              </select>
                            </div>
                        </div>

                        <div class="buttons">
                            <a href="index?m=pengguna" class="btn btn-secondary mr-2">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>    
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>