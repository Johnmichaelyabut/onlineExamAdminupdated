<?php 
	require_once 'config.php';
	require_once 'UserDAO.php';
	require_once 'UserDAOHandler.php';

	session_start();
	$value = 0;
	$id = (isset($_POST['id'])) ? $_POST['id'] : false;
	$F_name = $_POST['F_name'];
	if (empty($F_name)) {
		$F_name = $_SESSION['F_name'];
		$value++;
	}
	$L_name = $_POST['L_name'];
	if (empty($L_name)) {
		$L_name = $_SESSION['L_name'];
		$value++;
	}
	$EMAIL = $_POST['EMAIL'];
	if (empty($EMAIL)) {
		$EMAIL = $_SESSION['EMAIL'];
		$value++;
	}
	$PASSWORD = $_POST['PASSWORD'];
	if (empty($PASSWORD)) {
		$PASSWORD = $_SESSION['PASSWORD'];
		$value++;
	}
	if($value <= 3){
		$sql = new UserDAOHandler();
		$result = $sql->UpdateUser($id, $F_name, $L_name, $EMAIL, $PASSWORD);
		$message = $result['message'];

		if ($result === true) {
			echo "<script>alert('Successfully Updated the user number ".$F_name.$L_name."!!');window.location.href='UserFront.php'</script>";
		}else{
			echo "<script>alert('$message');window.location.href='UserFront.php'</script>";
		}
	}
	else{
		echo "<script>alert('Invalid Update.. You need to changed atleast 1 of the data!!');window.location.href='UserFront.php'</script>";
	}
 ?>
