<div class="page-wrapper">
<div class="page-breadcrumb">
    <div class="row align-items-center">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="page-title mb-0 p-0">Ganti Password</h3>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
<div class="col-md-6">
    <?php if($_POST) include 'aksi.php'; ?>

    <form method="POST">
         <div class="form-group row">
            <label for="password_old" class="col-sm-4 col-form-label">Password Lama</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password_old" name="password_old">
            </div>
         </div>
         <div class="form-group row">
            <label for="password_new" class="col-sm-4 col-form-label">Password Baru</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password_new" name="password_new">
            </div>
         </div>
         <div class="form-group row">
            <label for="password_confirm" class="col-sm-4 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-8">
              <input type="password" class="form-control" id="password_confirm" name="password_confirm">
            </div>
         </div>
         <div class="form-group ml-1">
            <button type="submit" class="btn btn-primary">Simpan</button>
         </div>
    </form>
</div>

                </div>
            </div>
        </div>
    </div>
</div>