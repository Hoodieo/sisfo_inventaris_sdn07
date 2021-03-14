<?php
session_start();
require_once'includes/functions.php';

$username = $_POST['username'];
$password = $_POST['password'];

// jika salah satu field kosong
if (empty($_POST['username']) || empty($_POST['password'])) {
  	echo "<script>alert('Username dan password wajib diisi!')</script>";
    redirect_js("login");
}else{
// cek username dan password
  $user = $db->get_row("SELECT * FROM tb_pengguna WHERE username='$username' AND password='$password'");
  // jika username dan password cocok set sesi
  if ($user) {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['status'] = $user->status;

  	    redirect_js("admin/index");
    }else{
        // jika username dan password tidak cocok
        echo "<script>alert('Username atau password salah!')</script>";
    	redirect_js("login");
	}
}

