<?php
	use View\View;
    include 'index.php';
	session_start();
	// echo isset($_SESSION['attempt']) ? $_SESSION['attempt'] : '';

	if(isset($_SESSION['attempt_again']))
    	{
    	    $now = time();
    	    if($now >= $_SESSION['attempt_again'])
    	    {
    	        unset($_SESSION['attempt']);
    	        unset($_SESSION['attempt_again']);
    	    }
        }
	$st = -1;
	
	include('Login.php');
	View::render("Login_view",compact(["_SESSION","st"]));
?>


