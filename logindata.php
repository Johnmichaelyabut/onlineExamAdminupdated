<?php 
	require_once 'config.php';
	require_once 'OEXDAO.php';
	require_once 'OEXDAOHandler.php';
	session_start();
	$_user = $_POST['user'];
	$_pass2 =sha1($_POST['pass']);
	$insert1 = new OEXDAOHandler();
	$answer = $insert1->loginInfo($_user, $_pass2);
	$_SESSION['fname'] = $answer['fname'];
	$_SESSION['lname'] = $answer['lname'];
	$_SESSION['id'] = $answer['id'];
	if($answer > 0){
		echo "<script>alert('Your Now Successfully login!!')</script>";
	}else{

		echo "<script>alert('Invalid Username or Password!');window.location.href='index.php'</script>";
	}
	
 ?>
 <html>
	<head>
		<title>Online Examination</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<body>
		<?php include "Assets/Banner3.php"; ?>
		<div>
			<div class="container well span" id = "submit">
				<div class = "page-header">
					<center>
						<h3><u><?=$_SESSION['fname'];?> <?=$_SESSION['lname'];?></u></h3>
						<h5>Today's Examinee</h5>
					</center>
				</div>

				<div class = "page-header"><center><h3> Your successfully Log-on to <br>LVCC Online Examination<br> Do you want to start your Examination now?</h3></center>
				</div>
				<?php  
					echo"<form method = 'POST' action = 'questionaireHidden.php'>";
					echo "<input type = 'hidden' class = 'hide' name = 'id' value = '".$_SESSION['id']."'>";
					echo "<input type = 'hidden' class = 'hide' name = 'lname' value = '".$_SESSION['lname']."'>";
					echo "<input type = 'hidden' class = 'hide' name = 'fname' value = '".$_SESSION['fname']."'>";
					echo "<input type = 'submit' class = 'btn btn-primary' id = 'yes'value = 'Yes' style = 'float: center;height: 30px;width: 200px;margin-left: 90px;'>";
					echo "<a href = 'ExamineePage.php'><input type = 'button' class = 'btn btn-primary' id = 'now'value = 'No' style = 'float: center;height: 30px;width: 200px;margin-left: 10px;'></a>";
					echo "</form>";
				?>
			</div>
		</div>
		<div id = "foot">
				<?php include 'Assets/footer.php'; ?>
		</div>
	</body>
</html>