<?php
session_start();

?>
<html>
	<head>
		<title>.: SIAKAD - YPP Darul Huda :.</title>
		<link rel="stylesheet" href="config/siakadstyle.css" type="text/css">
		<link rel="shortcut icon" href="../favicon.ico">
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
			<div id="login">
				<img id="login-logo" src="images/login-logo.jpg" width="97" height="105" hspace="10" align="left">
				<form method="POST" action="ceklogin.php">
				<fieldset>
					<label>username</label>	<input type="text" name="username" size="19">
					<label>password</label>	<input type="password" name="password" size="19">
					<label>level</label>		<select name="level">
											<option value="tk">Siswa TK</option>
											<option value="mi">Siswa MI</option>
											<option value="mts">Siswa MTs</option>
											<option value="ma">Siswa MA</option>
											<option value="guru">Guru</option>
											<option value="admin">Admin</option></select>
					<label><img src="antispam.php"></label><input type="text" name="kode" size="7">
					<input type="submit" value="Login">
				</fieldset>				
				</form>
			</div>
			<h3>SIAKAD-YPPDH</h3>
			<p>Sistem Informasi Akademik YPP. Darul Huda<br>TK - MI - MTs - MA - TPA - MD - THORIQOH</p>
			</div>
			
			<div id="footer">
				<p>YPP. Darul Huda Wonodadi Blitar 2011</p></div>
			<div style="text-align: center; font-size: 0.75em;">Designed by : <a href="http://www.facebook.com/liffanza">liffanza</a>.
				Theme by : <a href="http://www.freewebtemplates.com/">free website templates</a>.</div>
		</div>		
	</body>
</html>