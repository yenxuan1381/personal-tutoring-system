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
	$counter = 1;
	// Change import file type (student list or tutor list)
	if(isset($_POST['student'])){
		$counter = 1;
	}else if(isset($_POST['tutor'])){
		$counter = 2;
	}
	// Submit file when the form is submitted
    if(isset($_POST['submitfile'])){
		if($counter ==1){
			$file->submit_file_student();
		}
		if($counter == 2){
			$file->submit_file_tutor();
		}
        
    }

	// Display "Import_view" view
	View::render("Import_view",compact(["userid"]));
?>

