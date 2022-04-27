<?php
	use View\View;
    include 'index.php';
    session_start();

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Tutor") and ($_SESSION['category'] != "Student")))
	{
		header("Location:Loginpage.php");
	}

	$userid = $_SESSION['userid'];
	
	if(isset($_POST['id'])){
		$_SESSION['announcementid'] = $_POST['id'];
	}

	// Store announcementid variable obtained from GET method
	$announcementid = $_GET['announcementid'];
	// Check if the category is student or tutor
	if($_SESSION['category']=="Student"){
        $student = new Model\Student($userid);
        $student_info = $student->get_student_info();
		$announcement = new Model\announcement($student_info['Full Name'],$announcementid);
	}
    elseif($_SESSION['category']=="Tutor"){
        $tutor = new Model\Tutor($userid);
        $tutor_info = $tutor->get_tutor_info();
		$announcement = new Model\announcement($tutor_info['Name'],$announcementid);
    }
	
	$result = $announcement->get_announcement();
	$result1 = $announcement->get_comment();
	
	// Run "add_comment" function when the form is submitted
	if(isset($_POST['text'])){
		$announcement->add_comment();
	}

	View::render("Announcement_view",compact(["result","result1"]));
?>

