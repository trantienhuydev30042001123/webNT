<!DOCTYPE html>
<?php 
session_start();
$con = new MySQLi("localhost","root","","db_bandogo")
?>
<html>
<head>
	<meta charset="utf-8">
	<title>website-PHP</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<section id="wrapper">
	<header><?php include"views/layout/header.php";?></header>
	<nav class="menu-top"><?php include"views/layout/menu-top.php"?></nav>
	<aside  style="background: #00FF00;"><?php include"views/layout/left.php";?></aside>
	<article>
		<?php include"routes.php";?>
	</article>
	<aside style="background: #00FF00;"><?php include"views/layout/right.php";?></aside>
</section>
</body>
</html>