<!doctype html>

<html>
	<head>
		<meta charset="utf-8">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
		<title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/login_view.css">
	</head>

	<body>

		<section>

			<div class="container">
				<div class="login-form">
					<h1>NottsTutor</h1>
					<form method="post" action="" id="login">
						<input type="text" name="id" id="id" placeholder="ID">
						<input type="password" name="password" id="password" placeholder="Password">
						<input type="submit" name="loginsubmit" value="Login">
					</form>
					<a href="forgotPassword.php">Forgot Password?</a>
				</div>
				<img src="./image/unmclogo.png" alt="UNMC logo">
			</div>

		</section>

		<form method="post" action="Tutorpage.php" id="tutorlogin">
		</form>

		<form method="post" action="Importpage.php" id="importdata">
		</form>

		<form method="post" action="StudentView.php" id="studentlogin">
		</form>


<?php

    if(isset($_SESSION['error']))
    	{
    	    ?>
        	<div class="alert alert-danger text-center" style="">
        	<?php echo '<script>window.alert("'.$_SESSION['error'].'");</script>';?>
        	</div>
        	<?php
        	unset($_SESSION['error']);
        }

    if(isset($_SESSION['success']))
        {
            ?>
            <div class="alert alert-success text-center" style="">
        	<?php echo '<script>window.alert("'.$_SESSION['success'].'");</script>';?>
        	</div>
            <?php
            unset($_SESSION['success']);
        }

	if($st != -1)
	{
		$_SESSION['userid'] = $_POST['id'];
		if($st == 2)
		{
			$_SESSION['category'] = "Admin";
			$_SESSION['whichschool'] = "all";
			echo '<script>document.getElementById("importdata").submit();</script>';
		}
		elseif ($st == 3) 
		{
			$_SESSION['category'] = "Student";
			echo '<script>document.getElementById("studentlogin").submit();</script>';
		}
		else
		{
			$_SESSION['category'] = "Tutor";
			$_SESSION['st'] = $st;
			$_SESSION['all'] = 0;
			echo '<script>document.getElementById("tutorlogin").submit();</script>';
		}
	}
	else
	{
		// session_unset();
	}

?>

	</body>

</html>