<?php 
	require_once 'config.php';
	require_once 'QuestionDAO.php';
	require_once 'QuestionDAOHandler.php';

	session_start();
	$value = 0;
	$id = (isset($_POST['id'])) ? $_POST['id'] : false;
	$question = $_POST['question'];
	if (empty($question)) {
		$question = $_SESSION['question'];
		$value++;
	}
	$a = $_POST['a'];
	if (empty($a)) {
		$a = $_SESSION['A'];
		$value++;
	}
	$b = $_POST['b'];
	if (empty($b)) {
		$b = $_SESSION['B'];
		$value++;
	}
	$c = $_POST['c'];
	if (empty($c)) {
		$c = $_SESSION['C'];
		$value++;
	}
	$d = $_POST['d'];
	if (empty($d)) {
		$d = $_SESSION['D'];
		$value++;
	}
	$answer = $_POST['answer'];
	if (empty($answer)) {
		$answer = $_SESSION['answer'];
		$value++;
	}
	if($value <= 5){
		$sql = new QuestionDAOHandler();
		$result = $sql->UpdateQuestion($id, $question, $a, $b, $c, $d, $answer);
		if ($result === true) {
			echo "<script>alert('Successfully Updated the question number ".$id."!!');window.location.href='questions.php'</script>";
		}else{
			echo "<script>alert('Invalid Answer!!');window.location.href='questions.php'</script>";
		}
	}
	else{
		echo "<script>alert('Invalid Update.. You need to changed atleast 1 of the data!!');window.location.href='questions.php'</script>";
	}
 ?>
