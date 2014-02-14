<?php 
	require_once 'config.php';
	require_once 'OEXDAO.php';
	require_once 'OEXDAOHandler.php';
	session_start();
	$_fname = $_POST['fname'];
	$_lname = $_POST['lname'];
	$_email = $_POST['email'];
	$_pass = sha1($_POST['pass']); 	

	$insert = new OEXDAOHandler();
	$answer = $insert->insertExamineeData($_fname, $_lname, $_email, $_pass);
	$message = $answer['message'];
	if($answer){
		echo "<script>alert('$message');window.location.href='index.php'</script>";
	}else{
		echo "<script>alert('error');window.location.href='index.php'</script>";
	}

 ?>