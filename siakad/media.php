<?php
session_start();
if(empty($_SESSION[nama_user]) AND empty($_SESSION[pass_user])){
echo "<center>Anda belum <b>LOGIN</b>. Untuk mengakses halaman admin, silahkan <b>LOGIN</b> terlebih dahulu.<br>";
echo "<a href=index.php>LOGIN</a></center>";
}
else{
?>

<html>
	<head>
		<title>.: SIAKAD - YPP Darul Huda :.</title>
		<link rel="stylesheet" href="config/siakadstyle.css" type="text/css">
		<link rel="stylesheet" href="config/js/themes/smoothness/jquery.ui.all.css">
		<script src="config/js/jquery-1.5.1.js"></script>
		<script src="config/js/ui/jquery.ui.core.js"></script>
		<script src="config/js/ui/jquery.ui.widget.js"></script>
		<link rel="shortcut icon" href="../favicon.ico">
		<script src="config/js/ddaccordion.js"></script>
		<link rel="stylesheet" href="config/js/demos.css">
		<script type="text/javascript">
ddaccordion.init({
	headerclass: "menuheaders", //Shared CSS class name of headers group
	contentclass: "menucontents", //Shared CSS class name of contents group
	revealtype: "clickgo", //Reveal content when user clicks or onmouseover the header? Valid value: "click", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content.
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["unselected", "selected"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["none", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: 500, //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
			<h3>SIAKAD-YPPDH</h3>
			<p>Sistem Informasi Akademik YPP. Darul Huda<br>TK - MI - MTs - MA - TPA - MD - THORIQOH</p>
			</div>
			<div id="content">
			<table>
				<tr><td id="menu">
				<div class="arrowsidemenu">

					<div><a href="?opt=home" title="Home">Home</a></div>
					<?php 
					if ($_SESSION[leveluser]=='admin'){
						echo "<div class=menuheaders><a href='#'>Data Siswa</a></div>
								<ul class=menucontents>
									<li><a href=?opt=siswa>Input Siswa</a></li>
									<li><a href=?opt=siswa&cmd=tk>Siswa TK</a></li>
									<li><a href=?opt=siswa&cmd=mi>Siswa MI</a></li>
									<li><a href=?opt=siswa&cmd=mts>Siswa MTs</a></li>
									<li><a href=?opt=siswa&cmd=ma>Siswa MA</a></li>
								</ul>
							<div class=menuheaders><a href='#'>Data Guru</a></div>
								<ul class=menucontents>
									<li><a href=?opt=guru>Input Guru</a></li>
									<li><a href=?opt=guru&cmd=tk>Guru TK</a></li>
									<li><a href=?opt=guru&cmd=mi>Guru MI</a></li>
									<li><a href=?opt=guru&cmd=mts>Guru MTs</a></li>
									<li><a href=?opt=guru&cmd=ma>Guru MA</a></li>
								</ul>
							<div><a href=?opt=karyawan>Data Karyawan</a></div>
							<div class=menuheaders><a href='#'>Kurikulum</a></div>
								<ul class=menucontents>
									<li><a href=?opt=matpel&cmd=tk>TK</a></li>
									<li><a href=?opt=matpel&cmd=mi>MI</a></li>
									<li><a href=?opt=matpel&cmd=mts>MTs</a></li>
									<li><a href=?opt=matpel&cmd=ma>MA</a></li>
								</ul>
							<div class=menuheaders><a href='#'>Ekstra Kurikuler</a></div>
								<ul class=menucontents>
									<li><a href=?opt=ekstra>Kegiatan</a></li>
									<li><a href=?opt=ekstra&cmd=tk>TK</a></li>
									<li><a href=?opt=ekstra&cmd=mi>MI</a></li>
									<li><a href=?opt=ekstra&cmd=mts>MTs</a></li>
									<li><a href=?opt=ekstra&cmd=ma>MA</a></li>
								</ul>
							<div class=menuheaders><a href='#'>Jadwal Pelajaran</a></div>
								<ul class=menucontents>
									<li><a href=?opt=jadwal&cmd=tk>Jadwal TK</a></li>
									<li><a href=?opt=jadwal&cmd=mi>Jadwal MI</a></li>
									<li><a href=?opt=jadwal&cmd=mts>Jadwal MTs</a></li>
									<li><a href=?opt=jadwal&cmd=ma>Jadwal MA</a></li>
								</ul>
							<div class=menuheaders><a href='#'>Absensi</a></div>
								<ul class=menucontents>
									<li><a href=?opt=absensi&cmd=tk>Siswa TK</a></li>
									<li><a href=?opt=absensi&cmd=mi>Siswa MI</a></li>
									<li><a href=?opt=absensi&cmd=mts>Siswa MTs</a></li>
									<li><a href=?opt=absensi&cmd=ma>Siswa MA</a></li>
								</ul>
							<div class=menuheaders><a href='#'>Nilai Siswa</a></div>
								<ul class=menucontents>
									<li><a href=?opt=nilai&cmd=tk>Siswa TK</a></li>
									<li><a href=?opt=nilai&cmd=mi>Siswa MI</a></li>
									<li><a href=?opt=nilai&cmd=mts>Siswa MTs</a></li>
									<li><a href=?opt=nilai&cmd=ma>Siswa MA</a></li>
								</ul>
							<div class=menuheaders><a href='#'>User</a></div>
								<ul class=menucontents>
									<li><a href=?opt=user&cmd=guru>Guru</a></li>
									<li><a href=?opt=user&cmd=admin>Admin</a></li>
								</ul>
							<div><a href=?opt=angkatan>Angkatan</a></div>
							<div><a href=?opt=kelas>Data Kelas</a></div>";
					}
					elseif($_SESSION[leveluser]=='guru'){
						echo "<div><a href=?opt=profil_guru>Profil</a></div>
						<div><a href=?opt=input_nilai>Input Nilai</a></div>
						<div><a href=?opt=input_ekstra>Ekstra Kurikuler</a></div>";
					}
					else{
						echo "<div><a href=?opt=profil_siswa>Profil</a></div>";
					} 
						?>
					<div><a href="logout.php">Logout</a></div>
				</div>
				</td><td id="isi"><?php include "content.php"; ?></td></tr>
			</table></div>
			<div id="footer">
				<p>YPP. Darul Huda Wonodadi Blitar 2011</p></div>
			<div style="text-align: center; font-size: 0.75em;">Designed by : <a href="http://www.facebook.com/liffanza">liffanza</a>.
				Theme by : <a href="http://www.freewebtemplates.com/">free website templates</a>.</div>
		</div>
	</body>
</html>

<?php
}
?>