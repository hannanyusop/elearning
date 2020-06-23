<?php

require "config.php";
session_start();


if(isset($_SESSION['role'])){

	#check if admin
	if($_SESSION['role'] != 'PARENT'){

		#decline authentication
		session_destroy(); #delete all session;
		echo "<script>alert('Invalid role! Redirect to login page.');window.location='login.php';</script>";
	}

	#check if admin exist
	$auth_q = $db->query("SELECT * FROM parent WHERE email='$_SESSION[email]'");

	$auth = $auth_q->fetch_assoc();

	if(!$auth){
		session_destroy(); #delete all session;
		echo "<script>alert('Ops! Auth rejected! No data found!');window.location='login.php';</script>";
	}

}else{

	#decline authentication
	echo "<script>alert('No session found! Please relogin.');window.location='login.php';</script>";
}

?> 