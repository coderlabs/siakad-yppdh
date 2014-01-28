<?php
include "config/koneksi.php";
$level='$_POST[level]';
if($_POST[level]=='admin'){
$login=mysql_query("SELECT * FROM siakad_admin WHERE username='$_POST[username]' AND password='$_POST[password]'");
}
elseif($_POST[level]=='tk'){
$login=mysql_query("SELECT id_siswa,password FROM siswa_tk WHERE id_siswa='$_POST[username]' AND password='$_POST[password]'");
}
elseif($_POST[level]=='mi'){
$login=mysql_query("SELECT id_siswa,password FROM siswa_mi WHERE id_siswa='$_POST[username]' AND password='$_POST[password]'");
}
elseif($_POST[level]=='mts'){
$login=mysql_query("SELECT id_siswa,password FROM siswa_mts WHERE id_siswa='$_POST[username]' AND password='$_POST[password]'");
}
elseif($_POST[level]=='ma'){
$login=mysql_query("SELECT id_siswa,password FROM siswa_ma WHERE id_siswa='$_POST[username]' AND password='$_POST[password]'");
}
elseif($_POST[level]=='guru'){
$login=mysql_query("SELECT * FROM siakad_guru WHERE username='$_POST[username]' AND password='$_POST[password]'");
}
$k=mysql_num_rows($login);
$r=mysql_fetch_array($login);

//jika username & password ditemukan
if($k>0){
	session_start();
		
	$string=$_POST[kode];
	if(strtoupper($string) == $_SESSION[kodeRandom]){
		session_register("nama_user");
		session_register("pass_user");
		session_register("leveluser");
		
	
		if($_POST[level]=='admin'){
			$_SESSION[nama_user] = $r[username];
		}
		elseif($_POST[level]=='guru'){
			session_register("tingkat");
			$_SESSION[nama_user] = $r[nama_guru];
			$_SESSION[tingkat] = $r[level];
		}
		else{
			$_SESSION[nama_user] = $r[id_siswa];
		}
	
		$_SESSION[pass_user] = $r[password];
		$_SESSION[leveluser] = $_POST[level];
	
		header('location:media.php?opt=home');
	}
}else {
	header('location:index.php');
}
?>