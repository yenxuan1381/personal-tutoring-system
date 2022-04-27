<?php
	use View\View;
    include 'index.php';
	session_start();
	

	if(isset($_SESSION['attempt_again']))
    	{
    	    $now = time();
			// if the time is over, allow user to login again
    	    if($now >= $_SESSION['attempt_again'])
    	    {
    	        unset($_SESSION['attempt']);
    	        unset($_SESSION['attempt_again']);
    	    }
        }
	$st = -1;
	
	include('Login.php');

	// Display "Login_view" view
	View::render("Login_view",compact(["_SESSION","st"]));
?>


