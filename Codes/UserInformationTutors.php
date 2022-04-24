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
    $tutor = new Model\Tutor($userid);
    $tutor_info = $tutor->get_tutor_info();

    View::render("Tutor_profile",compact(["tutor_info","isSeniorTutor"]));
 ?>


