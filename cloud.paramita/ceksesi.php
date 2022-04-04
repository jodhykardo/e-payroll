<?php
session_start();
if(!isset ($_SESSION['username'])) {
	echo "<script>alert('$_SESSION[nama]');
    javascript:history.go(-1)</script>";
	include "index.php";
	exit;
    }
?>