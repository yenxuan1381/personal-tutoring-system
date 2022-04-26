<?php
//start of PHP script
	use View\View;
	include 'index.php';
	session_start();
	// If haven't login, then change to login page
	if ((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor")) {
		header("Location:Loginpage.php");
	}

	//storing the Lecture ID that the tutor entered at the log in page in the tutorid variable
	$userid = $_SESSION['userid'];
	$isSeniorTutor = $_SESSION['st'];
	$changeList = $_SESSION['all'];
	$tutor = new Model\Tutor($userid);
	$tutor_info = $tutor->get_tutor_info();
	$student_list = $tutor->get_studentList();
	$all_list = $tutor->get_allList();
	$tutor_list = $tutor->get_tutor_list();

	// Check if changed view
	if (isset($_POST['switch'])) {
		$tutor->changeList();
	}

	// Check if changed tutor
	if(isset($_POST['tutoridfinal']))
	{
		$tutor->changeTutor();
	}

	View::render("Tutor_home",compact(["tutor_info","student_list","all_list","tutor_list","isSeniorTutor","changeList"]));

?>
