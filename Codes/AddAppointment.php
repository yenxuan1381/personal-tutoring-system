<?php
	use View\View;
    include 'index.php';
    session_start();

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}

    $userid = $_SESSION['userid'];
    $tutor = new Model\Tutor($userid);
    $tutor_info = $tutor->get_tutor_info();
    $tutor_studentlist = $tutor->get_studentList();
	$date= $_GET['date'];
    $appointment = new Model\meeting($tutor_info['Name'],$date);

	// Run "add_appointment" function when the form is submitted
	if(isset($_POST['student'])){
		$appointment->add_appointment($tutor_info['Name'],$date);
	}

	// Display "Add_Appointment_view" view
	View::render("Add_Appointment_view",compact(["tutor_studentlist","date"]));

?>
