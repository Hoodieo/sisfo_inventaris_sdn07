<div class="row">
	<div class="col">
		<h3 class="mb-3">Profil</h3>

		<?php if (isset($_COOKIE['notifikasi'])): ?>
			<div class="col-md-6 mx-0">
				<div class="alert alert-success alert-dismissible fade show" role="alert">
				 <?= $_COOKIE['notifikasi']; ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>	
			</div>
		<?php setcookie('notifikasi','', time()); endif; ?>

		<?php 
		// Ambil data pengguna dari tb_pengguna
		$user = $db->get_row("SELECT * FROM tb_pengguna WHERE id='$_SESSION[id_user]'");
		?>
		
		<div class="col-md-6">
			<?php if($_POST) include 'aksi.php'?>
			 <form method="POST" enctype="multipart/form-data">
			 <input type="hidden" name="id" value="<?= $user->id ?>">
			 <div class="form-group">
			    <label for="organisasi">Nama Organisasi</label>
			    <input type="text" class="form-control" id="organisasi" name="organisasi" value="<?= $user->nama_organisasi; ?>" autocomplete="off" required>
			 </div>
			 <div class="form-group">
			    <label for="nama_lengkap">Nama Lengkap</label>
			    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="<?= $user->nama_lengkap; ?>" autocomplete="off" required>
			 </div>
			 <div class="form-group">
			    <label for="username">Username</label>
			    <input type="text" class="form-control" id="username" name="username" value="<?= $user->username; ?>" autocomplete="off" required>
			 </div>
			 <div class="form-group">
			    <label for="no_telp">No Telepon/Hp</label>
			    <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $user->no_telp; ?>"  autocomplete="off" required>
			 </div>
			 <div class="form-group">
		        <label for="surat">Surat Organisasi</label>
		        <input type="file" class="form-control" id="surat" name="surat">
		        <small id="surat" class="text-muted">Upload file berupa foto berformat (.jpg, .jpeg, .png) dengan ukuran max 2MB</small>
		      </div>
		      <input type="hidden" name="tmp_surat" value="<?= $user->surat_organisasi; ?>">
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Simpan</button>	
			</div>
			</form>
		</div>		 
	</div>
</div>
