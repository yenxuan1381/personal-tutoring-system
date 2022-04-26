<?php
	use View\View;
    include 'index.php';
	session_start();

	include_once('Connection.php');
	
	error_reporting(0);
	
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Admin"))
	{
		header("Location:Loginpage.php");
	}
	
	$add = $_POST['add'];
	$edit = $_POST['edit'];
	$delete = $_POST['delete'];
	$oldcode = $_POST['modulecode'];
	$code = $_POST['code'];
	$acadplan = $_POST['acadplan'];
	$school = $_POST['school'];
	$codebeforeedit = $_POST['codebeforeedit'];
	$module = new Model\module();
	
	if(!($oldcode == null))
	{
		$oldmodule = $module->get_previous_module($oldcode);
	}
	if(isset($add))
	{
		$module->add_module($code,$acadplan,$school);
	}
	else if(isset($edit))
	{
		$module->edit_module($code,$acadplan,$school,$codebeforeedit);

	}
	else if(isset($delete))
	{
		$module->delete_module($codebeforeedit);
	}
	View::render("Moduleadd_view",compact(["oldmodule","add","delete","edit","oldcode"]));

?>

