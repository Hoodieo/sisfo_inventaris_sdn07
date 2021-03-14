<h3 class="text-center">Gereja Keluarga Kudus Pontianak</h3>
<h4 class="text-center mb-3">Registrasi pengguna baru</h4>

<!-- Tampilkan jika ada error saat register -->
<?php if (isset($_COOKIE['notifikasi'])): ?>
<div class="row">
  <div class="col"><div class="alert alert-danger alert-dismissible fade show mx-auto" style="width: 35rem;" role="alert">
    <?= $_COOKIE['notifikasi']; ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div></div>
</div>
<?php setcookie('notifikasi','', time()); endif; ?>

<div class="d-flex justify-content-center">
<div class="card col-md-6 mb-5">
  <div class="card-body">
    <?php if($_POST) include 'aksi.php';; ?>
    <form method="POST" enctype="multipart/form-data">
      <div class="form-group">
          <label for="organisasi">Nama Organisasi</label>
          <input type="text" class="form-control" id="organisasi" name="organisasi" required autocomplete="off">
        </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="nama_lengkap">Nama Lengkap</label>
          <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required autocomplete="off">
        </div>
        <div class="form-group col-md-6">
          <label for="no_telp">No Telepon/Hp</label>
          <input type="text" class="form-control" id="no_telp" name="no_telp" required autocomplete="off">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-6">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" required autocomplete="off">
        </div>
        <div class="form-group col-md-6">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required autocomplete="off">
        </div>  
      </div>
      <div class="form-group">
        <label for="surat">Surat Organisasi</label>
        <input type="file" class="form-control" id="surat" name="surat" required autocomplete="off">
        <small id="surat" class="text-muted">Upload file berupa foto berformat (.jpg, .jpeg, .png) dengan ukuran max 2MB</small>
      </div>
      <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>
  </div>

  <span class="mb-4 ml-4"><a href="index?m=login" class="text-primary">Login</a></span>
</div>
</div>