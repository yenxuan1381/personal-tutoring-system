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
    $announcement = new Model\announcement($tutor_info['Name'],0);

	if(isset($_POST['title'])){
		$announcement->add_announcement($tutor_info['Name']);
	}

	View::render("Announcement_add",compact(["tutor_info"]));

?>