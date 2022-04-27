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
    
    // Check if category is student or tutor
    if($_SESSION['category']=="Student"){
        $student = new Model\Student($userid);
        $tutor_info = $student->get_tutor_info();
	}
    elseif($_SESSION['category']=="Tutor"){
        $tutor = new Model\Tutor($userid);
        $tutor_info = $tutor->get_tutor_info();
    }
    $announcement = new Model\announcement($tutor_info['Name'],0);
    $result = $announcement->get_announcement_list();

    // Run "delete_announcement" function when the form is submitted
    if(isset($_POST['delete'])){
		$announcement->delete_announcement();
	}
    // Display "Announcement_list" view
    View::render("Announcement_list",compact(["result"]));
?>



