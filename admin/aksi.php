<?php
session_start();
require_once '../includes/functions.php';

// Profil - Ganti Password
if ($mod=='ganti_password'){
	// Jika salah satu field kosong
	if (empty($_POST['password_old']) || empty($_POST['password_new']) || empty($_POST['password_confirm'])) {
		echo "<script>alert('Semua field harus diisi!')</script>";
		redirect_js("index?m=ganti_password");
	}else{
		// jika semua field diisi -> cek user dan passnya
		$user = $db->get_row("SELECT * FROM tb_pengguna WHERE id=$_SESSION[user_id]");
		// jika password cocok
		if ($user->password == $_POST['password_old']) {
			// cek kesamaan password
			if ($_POST['password_new']==$_POST['password_confirm']) {
				// update password
				$db->query("UPDATE tb_pengguna SET password='$_POST[password_new]' WHERE id=$user->id");
				echo "<script>alert('Password berhasil diubah!')</script>";
			}else{
				echo "<script>alert('Password tidak sama!')</script>";
			}
		}else{
			echo "<script>alert('Password salah!')</script>";
			
		}
	}
	redirect_js("index?m=ganti_password");
}


// TAMBAH DATA PENGGUNA
elseif ($mod=='pengguna_tambah') {
	$username = strtolower($_POST['username']);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];
	$status = $_POST['status'];

	if (empty($username) || empty($password) || empty($password2) || empty($status)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=pengguna_tambah");
	}else{

		$user = $db->get_row("SELECT * from tb_pengguna WHERE username='$username'");

		if ($user) {
			echo "<script>alert('Username tidak tersedia. Gunakan username lain.')</script>";
			redirect_js("index?m=pengguna_tambah");
			exit();
		}
		if ($password != $password2) {
			echo "<script>alert('Password tidak sama')</script>";
			redirect_js("index?m=pengguna_tambah");
			exit();
		}
		
		$db->query("INSERT INTO tb_pengguna(id, username, password, status) VALUES (NULL, '$username', '$password', '$status')");

		echo "<script>alert('Data berhasil disimpan')</script>";
		redirect_js("index?m=pengguna");
	}	
}

// EDIT DATA PENGGUNA
elseif ($act=='pengguna_reset_password') {
	$id = $_GET['id'];
	$username = strtolower($_GET['username']);

	$db->query("UPDATE tb_pengguna SET password='12345' WHERE id=$id AND username='$username'");
	echo "<script>alert('Password pengguna berhasil direset!')</script>";
	redirect_js("index?m=pengguna");	
}

// HAPUS DATA PENGGUNA
elseif ($act=='pengguna_hapus') {
		$db->query("DELETE FROM tb_pengguna WHERE id=$_GET[id]");
		echo "<script>alert('Data berhasil dihapus')</script>";
		redirect_js("index?m=pengguna");
}


// TAMBAH, EDIT, HAPUS --- DATA ASET
elseif ($mod=='aset_tambah' || $mod=='aset_edit' || $act=='aset_hapus' ) {
	$id = $_GET['id'];
	$nama_aset = ucwords($_POST['nama_aset']);
	$jenis = $_POST['jenis'];
	$jumlah = $_POST['jumlah'];
	$nilai = $_POST['nilai'];
	$sumber_aset = $_POST['sumber_aset'];
	$kepemilikan = $_POST['kepemilikan'];
	$kondisi = $_POST['kondisi'];
	$status = $_POST['status'];
	$foto = ($act=='aset_hapus') ? '' : uploadFoto();

	$tabel = 'tb_aset';

	// VALIDASI EMPTY VALUE
	if ($mod=='aset_tambah' || $mod=='aset_edit') {
		if (empty($nama_aset) || empty($nilai)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=$mod");
		exit();
		}	
	}

	// TAMBAH DATA
	if ($mod=='aset_tambah') {
		$db->query("INSERT INTO $tabel(id, nama_aset, foto, jenis, qty, nilai_aset, sumber_aset, kepemilikan, kondisi, status_penggunaan) VALUES (NULL, '$nama_aset', '$foto', '$jenis', $jumlah, $nilai, '$sumber_aset', '$kepemilikan', '$kondisi', '$status')");
		echo "<script>alert('Data berhasil disimpan')</script>";

	// EDIT DATA
	}elseif ($mod=='aset_edit') {
		$db->query("UPDATE $tabel SET nama_aset='$nama_aset', foto='$foto', jenis='$jenis', qty=$jumlah, nilai_aset=$nilai, sumber_aset='$sumber_aset', kepemilikan='$kepemilikan', kondisi='$kondisi', status_penggunaan='$status' WHERE id=$id");
		echo "<script>alert('Data berhasil disimpan')</script>";

	// HAPUS DATA
	}elseif ($act=='aset_hapus') {
		$db->query("DELETE FROM $tabel WHERE id=$id");
		echo "<script>alert('Data berhasil dihapus')</script>";
	}	
	redirect_js("index?m=aset");
}


// TAMBAH, EDIT, HAPUS --- DATA PENGGUNAAN ASET
elseif ($mod=='penggunaan_tambah' || $mod=='penggunaan_edit' || $act=='penggunaan_hapus' || $act=='penggunaan_setuju' || $act=='penggunaan_tolak') {
	$id = $_GET['id'];
	$penanggung_jawab = ucwords($_POST['nama']);
	$jumlah = $_POST['jumlah'];
	$status = $_POST['status'];
	$tgl_serahkan = $_POST['tgl_serahkan'];
	$tgl_kembali = $_POST['tgl_kembali'];
	$keterangan = $_POST['keterangan'];
	$id_aset = $_POST['aset'];
	$id_user = $_SESSION['user_id'];

	$tabel = 'tb_penggunaan_aset';

	// VALIDASI EMPTY VALUE
	if ($mod=='penggunaan_tambah' || $mod=='penggunaan_edit') {
		if (empty($penanggung_jawab) || empty($jumlah)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=$mod");
		exit();
		}	
	}

	// TAMBAH DATA
	if ($mod=='penggunaan_tambah') {
		if ($_SESSION['status'] == 'Guru') {
			$db->query("INSERT INTO $tabel(id, penanggung_jawab, qty, status, tgl_serahkan, tgl_kembali, keterangan, id_aset, id_user) VALUES (NULL,'$penanggung_jawab',$jumlah,'Diproses',NULL,NULL,'$keterangan',$id_aset,$id_user)");
		}else{
			if ($_POST['tgl_kembali'] == '') {
				$db->query("INSERT INTO $tabel(id, penanggung_jawab, qty, status, tgl_serahkan, tgl_kembali, keterangan, id_aset, id_user) VALUES (NULL,'$penanggung_jawab',$jumlah,'$status','$tgl_serahkan',NULL,'$keterangan',$id_aset,$id_user)");
			}else{
				$db->query("INSERT INTO $tabel(id, penanggung_jawab, qty, status, tgl_serahkan, tgl_kembali, keterangan, id_aset, id_user) VALUES (NULL,'$penanggung_jawab',$jumlah,'$status','$tgl_serahkan','$tgl_kembali','$keterangan',$id_aset,$id_user)");
			}
		}
		echo "<script>alert('Data berhasil disimpan')</script>";

	// EDIT DATA
	}elseif ($mod=='penggunaan_edit') {
		if ($_POST['tgl_kembali'] == '') {
			$db->query("UPDATE $tabel SET penanggung_jawab='$penanggung_jawab', qty=$jumlah, status='$status', tgl_serahkan='$tgl_serahkan', tgl_kembali=NULL, keterangan='$keterangan', id_aset='$id_aset' WHERE id=$id");
		}else{
			$db->query("UPDATE $tabel SET penanggung_jawab='$penanggung_jawab', qty=$jumlah, status='$status', tgl_serahkan='$tgl_serahkan', tgl_kembali='$tgl_kembali', keterangan='$keterangan', id_aset='$id_aset' WHERE id=$id");
		}
		echo "<script>alert('Data berhasil diupdate')</script>";

	// HAPUS DATA
	}elseif ($act=='penggunaan_hapus') {
		$db->query("DELETE FROM $tabel WHERE id=$id");
		echo "<script>alert('Data berhasil dihapus')</script>";	
	

	// UPDATE STATUS PENGGUNAAN SARPRAS
	}elseif ($act=='penggunaan_setuju' || $act=='penggunaan_tolak') {
		$status = ($act=='penggunaan_setuju') ? 'Dipinjamkan' : 'Ditolak';
		$tgl_serahkan = date('Y-m-d');
		$db->query("UPDATE $tabel SET status='$status', tgl_serahkan='$tgl_serahkan' WHERE id=$id");
		echo "<script>alert('Berhasil diupdate')</script>";
		redirect_js("index?m=penggunaan_verifikasi");
		exit();
	}

	redirect_js("index?m=penggunaan");
}


// TAMBAH, EDIT, HAPUS --- DATA PENGAJUAN ASET
elseif ($mod=='pengajuan_aset_tambah' || $mod=='pengajuan_aset_edit' || $act=='pengajuan_aset_hapus' ) {
	$id = $_GET['id'];
	$nama_aset = ucwords($_POST['nama']);
	$jumlah = $_POST['jumlah'];
	$tgl_diajukan = date('Y/m/d');
	$keterangan = $_POST['keterangan'];
	$status = $_POST['status'];

	$tabel = 'tb_pengajuan_aset';

	// VALIDASI EMPTY VALUE
	if ($mod=='pengajuan_aset_tambah' || $mod=='pengajuan_aset_edit') {
		if (empty($nama_aset) || empty($jumlah)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=$mod");
		exit();
		}	
	}

	// TAMBAH DATA
	if ($mod=='pengajuan_aset_tambah') {
		$db->query("INSERT INTO $tabel(id, nama_aset, qty, tgl_diajukan, keterangan, status) VALUES (NULL, '$nama_aset', $jumlah, '$tgl_diajukan', '$keterangan', 'Diajukan')");
		echo "<script>alert('Data berhasil disimpan')</script>";

	// EDIT DATA
	}elseif ($mod=='pengajuan_aset_edit') {
		$db->query("UPDATE $tabel SET nama_aset='$nama_aset', qty=$jumlah, tgl_diajukan='$tgl_diajukan', keterangan='$keterangan', status='$status' WHERE id=$id");
		echo "<script>alert('Data berhasil diupdate')</script>";

	// HAPUS DATA
	}elseif ($act=='pengajuan_aset_hapus') {
		$db->query("DELETE FROM $tabel WHERE id=$id");
		echo "<script>alert('Data berhasil dihapus')</script>";
	}	
	redirect_js("index?m=pengajuan_aset");
}