<?php
    use View\View;
    include 'index.php';
    session_start();

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Tutor") and ($_SESSION['category'] != "Student")))
	{
		header("Location:Loginpage.php");
	}

    if(isset($_GET['date'])){
        $date= $_GET['date'];
    }else{
        $date = 27;
    }
	$userid = $_SESSION['userid'];
	if($_SESSION['category']=="Student"){
        $student = new Model\Student($userid);
        $student_info = $student->get_student_info();
        $appointment = new Model\meeting($student_info['Full Name'],$date);
        $result = $appointment->get_student_appointment();
	}
	elseif($_SESSION['category']=="Tutor"){
        $tutor = new Model\Tutor($userid);
        $tutor_info = $tutor->get_tutor_info();
        $appointment = new Model\meeting($tutor_info['Name'],$date);
        $result = $appointment->get_tutor_appointment();
	}

	if(isset($_POST['delete'])){
		$appointment->delete_appointment();
	}

	View::render("Appointment_view",compact(["result","date"]));
?>


