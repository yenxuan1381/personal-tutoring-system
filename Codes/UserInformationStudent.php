<?php

    use View\View;
    include 'index.php';
	session_start();
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Student") and ($_SESSION['category'] != "Tutor")))
	{
		header("Location:Loginpage.php");
	}
    if ($_SESSION['category'] == "Student")
    {
        $userid = $_GET['studentID']?? "";
    }
	if ($_SESSION['category'] == "Tutor")
    {
        if(isset($_GET['tuteeid'])){
            $userid = $_GET['tuteeid'];
        }
    }
	$student = new Model\Student($userid);
	$student_info = $student->get_student_info();
	$academicPlan = $student->get_academicPlan();
	$StudentID = $student->get_student_id();
    if(isset($_POST['Personal_Goal']))
    {
        $student->set_personalgoal();
    }

    if(isset($_POST['Remark'])){
        $student->set_remark();
    }

	if(isset($_POST['First_Name'])){
        $student->set_studentinfo();
	}

    if(isset($_POST['Academic_Plan_Code'])){
        $student->set_academic();
    }

    View::render("Student_profile",compact(["student_info","academicPlan","StudentID"]));
    
?>


