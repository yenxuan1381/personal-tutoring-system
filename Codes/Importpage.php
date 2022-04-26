<?php
	use View\View;
    include 'index.php';
    session_start();
	
	include('Connection.php');
	
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Admin"))
	{
		header("Location:Loginpage.php");
	}
	$userid = $_SESSION['userid'];
    $file = new Model\file_csv();
    if(isset($_POST['submitfile'])){
        $file->submit_file();
    }
	View::render("Import_view",compact(["userid"]));
?>

