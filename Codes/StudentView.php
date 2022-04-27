<?php
//start of PHP script
    use View\View;
    include 'index.php';
	session_start();
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Student"))
	{
		header("Location:Loginpage.php");
	}

	// Storing the student ID that the student entered at the log in page in the studentid variable
	$userid = $_SESSION['userid'];
    $student = new Model\Student($userid);
	$student_info = $student->get_student_info();
	$academicPlan = $student->get_academicPlan();
    $tutor_info = $student->get_tutor_info();
    $studentsUnderSameTutor = $student->get_studentList();

	// Display "Student_home" view
    View::render("Student_home",compact(["student_info","academicPlan","tutor_info","studentsUnderSameTutor"]));

 ?>
