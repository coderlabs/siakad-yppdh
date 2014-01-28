<?php
include "../config/koneksi.php";
session_start();
if (empty($_SESSION[namauser]) AND empty($_SESSION[passuser])){
  echo "<center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=index.php><b>LOGIN</b></a></center>";
}
else{
?>
<html>
	<head>
		<title>:: Admin YPP Darul Huda ::</title>
		<link href="../config/adminstyle.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="../favicon.ico">
		<script src="../js/nicEdit.js" type="text/javascript"></script>
		<script type="text/javascript">
		bkLib.onDomLoaded(function(){nicEditors.allTextAreas()});</script>
	</head>
	<body>
		<div id="header">
		<div id="logo"><h1>.: YPP. Darul Huda :.</h1><h3>Wonodadi-Blitar</h3></div>
		<div id="content">
			<div id="sidebar">
				<ul>
					<li><a href=?opt=home>&#187; Home</a></li>
					<?php
						$menu=mysql_query("SELECT * FROM modul ORDER BY id_modul ASC");
						while($r=mysql_fetch_array($menu)){
							echo "<li><a href='$r[link]'>&#187; $r[nama_modul]</a></li>";
						}
					?>
					<li><a href=logout.php>&#187; Logout</a></li>
				</ul>
			</div><div id="isi">
				<?php
					include "content.php";
				?>
			</div>
		</div>
		<div id="footer">
			Copyright &copy; 2011 YPP. Darul Huda
		</div>
		</div>
	</body>
</html>
<?php
}
?>