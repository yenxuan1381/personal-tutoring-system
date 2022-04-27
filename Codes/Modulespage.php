<?php
	use View\View;
    include 'index.php';
	session_start();
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Admin"))
	{
		header("Location:Loginpage.php");
	}
	
	$whichschool = $_SESSION['whichschool'];
	$module = new Model\module();
	$school = $module->get_school();
	$allmodule = $module->get_all_module();
	$specificmodule = $module->get_specific_module($whichschool);

	// Display "Module_view" view
	View::render("Module_view",compact(["whichschool","school","allmodule","specificmodule"]));
?>



	