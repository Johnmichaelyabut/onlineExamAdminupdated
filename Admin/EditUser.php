<?php 
	require_once 'config.php';
	require_once 'UserDAO.php';
	require_once 'UserDAOHandler.php';
	session_start();
	$id = (isset($_GET['id'])) ? $_GET['id'] : false;

	$sql = new UserDAOHandler();
	$result = $sql->EditUser($id);
	$_SESSION['F_name'] = $result['fname'];
	$_SESSION['L_name'] = $result['lname'];
	$_SESSION['EMAIL'] = $result['email'];
	$_SESSION['PASSWORD'] = $result['pass'];
 ?>
 <html>
	 <head>
	 	<title>Admin Page</title>
	 	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	 	<link rel="stylesheet" type="text/css" href="../css/style.css">
	 	<link rel="stylesheet" type="text/css" href="../css/style1.css">
 
	 </head>
	 <?php include '../Assets/Banner3.php';?>
	 <body>
	 	<div id = "back" class = "span well container">
	 		<div class = "page-header">
	 			<h2><center><font face = "serif">User</font></center></h2>
	 		</div>
	 		<div>
	 			<form method = "POST" action = "UpdateUser.php">
	 				<input hidden name = "id" value = "<?=$id?>">
					<div>
						<input type = "text" id = "fname" name = "F_name" placeholder = "Firstname: <?=$result['fname']?>">	 				
						<input type = "text" id = "lname" name = "L_name" placeholder = "Lastname: <?=$result['lname']?>">
					</div>	 				
	 				<div>
	 					<input type = "email" id ="email" name = "EMAIL" placeholder = "Email: <?=$result['email']?>">
	 				</div>
	 				<div>
	 					<input type = "password" id ="pass" name = "PASSWORD" placeholder = "Password: <?=$result['pass']?>">
	 				</div>
	 			<div class = " offset2">
	 				<button class = "btn btn-info save" id = "act" style = "margin-left:-40px;">Save</button></form>
	 				
	 			</div>
	 			<a href="UserFront.php"><button class = "btn btn-danger" id = "act1" style = "margin-top:-20px">Discard</button></a>
	 		</div>
	 	</div>
	 </body>
	 <?php include '../Assets/footer.php';?>
 </html>