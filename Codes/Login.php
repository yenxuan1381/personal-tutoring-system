<?php
	// check if the login form was submitted, isset() checks whether the data exists
	if(isset($_POST['loginsubmit']))
	{
		// initialise connection
		include_once('Connection.php');

		//set login attempt if not set
		// echo $_SESSION['attempt'];
		    if(!isset($_SESSION['attempt']))
		    {
		        $_SESSION['attempt'] = 0;
            }

		    if ($_SESSION['attempt'] == 3)
		    {
				$wait =  ($_SESSION['attempt_again'] - time())/60;
		        $_SESSION['error'] = 'Attempt limit reached. Please try again in '.ceil($wait).' minutes.';
		    }
		    else
		    {
		    // stops running and display error if connection error occurs
		        if(mysqli_connect_error())
    		    {
	    		    die('Connection Error('.mysqli_connect_errno().')'.mysqli_connect_error());
		        }
    		    else
	    	    {
		        // construct SQL statement
		            if($_POST['id'] != "")
    		        {
	    	            $userid = $_POST['id'];
		                $userpassword = $_POST['password'];

	    	            // sanitise user input
		                $sanitized_userid = mysqli_real_escape_string($conn, $userid);
                        $sanitized_password = mysqli_real_escape_string($conn, $userpassword);
                        //$hash = password_hash($sanitized_password, PASSWORD_DEFAULT); // Secure password hash

                        $administratorstable = "SELECT * FROM `administrators` WHERE `Admin ID` = '".$sanitized_userid."'";
                        $seniortutorstable = "SELECT * FROM `senior tutors` WHERE `Lect ID` = '".$sanitized_userid."'";
                        $tutorstable = "SELECT * FROM `tutors` WHERE `Lect ID` = '".$sanitized_userid."'";
                        $studentstable ="SELECT * FROM `students` WHERE `Student Id` = '".$sanitized_userid."'";

                        $isadmin = mysqli_query($conn, $administratorstable) or die("Administrator error");
                        $isseniortutor = mysqli_query($conn, $seniortutorstable) or die("Senior tutor error");
                        $istutor = mysqli_query($conn, $tutorstable) or die("Tutor error");
                        $isstudent = mysqli_query($conn, $studentstable) or die("Student error");

                        //check if administrator staff
                        if (mysqli_num_rows($isadmin)){
                            $admindetail = mysqli_fetch_array($isadmin, MYSQLI_ASSOC);

                            if($sanitized_password == $admindetail['Password'])
                            {
                                $st = 2;
                                $_SESSION['success'] = 'Login successful';
                                //unset our attempt
                                unset($_SESSION['attempt']);
                            }
                            else
                            {
                                echo '<script>window.alert("Error: Password does not match!");</script>';
                                $_SESSION['error'] = 'Password incorrect';
                	            //this is where we put our 3 attempt limit
                	            $_SESSION['attempt'] += 1;
                	            //set the time to allow login if third attempt is reach
                	            if($_SESSION['attempt'] == 3)
                	            {
                	                $_SESSION['attempt_again'] = time() + (5*60);
                		        }
                	        }
                        }
                        //check if senior tutor
                        elseif (mysqli_num_rows($isseniortutor))
                        {
                            $tutordetail = mysqli_fetch_array($istutor, MYSQLI_ASSOC);
                            if($sanitized_password == $tutordetail['Password'])
                            {
                                $st = 1;
                	            $_SESSION['success'] = 'Login successful';
                	            //unset our attempt
                	            unset($_SESSION['attempt']);
                	        }
                            else
                            {
                                echo '<script>window.alert("Error: Password does not match!");</script>';
                	            $_SESSIOM['error'] = 'Password incorrect';
                	            //this is where we put our 3 attempt limit
                                $_SESSION['attempt'] += 1;
                                //set the time to allow login if third attempt is reach
                                if($_SESSION['attempt'] == 3)
                                {
                                    $_SESSION['attempt_again'] = time() + (5*60);
                	            }
                            }
                        }
                        //check if normal tutor
                        elseif (mysqli_num_rows($istutor))
                        {
                            $tutordetail = mysqli_fetch_array($istutor, MYSQLI_ASSOC);
                            if($sanitized_password == $tutordetail['Password'])
                            {
                                $st = 0;
                	            $_SESSION['success'] = 'Login successful';
                	            //unset our attempt
                	            unset($_SESSION['attempt']);
                            }
                            else
                            {
                                echo '<script>window.alert("Error: Password does not match!");</script>';
                                $_SESSION['error'] = 'Password incorrect';
                                //this is where we put our 3 attempt limit
                                $_SESSION['attempt'] += 1;
                                //set the time to allow login if third attempt is reach
                                if($_SESSION['attempt'] == 3)
                                {
                                    $_SESSION['attempt_again'] = time() + (5*60);
                                    //note 5*60 = 5mins, 60*60 = 1hr, to set to 2hrs change it to 2*60*60
                                }
                            }
                        }
                        //check if student
                        elseif (mysqli_num_rows($isstudent))
                        {
                            $studentdetail = mysqli_fetch_array($isstudent, MYSQLI_ASSOC);
                            if($sanitized_password == $studentdetail['Password'])
                            {
                                $st = 3;
                                $_SESSION['success'] = 'Login successful';
                	            //unset our attempt
                	            unset($_SESSION['attempt']);
                            }
                            else
                            {
                                echo '<script>window.alert("Error: Password does not match!");</script>';
                                $_SESSION['error'] = 'Password incorrect';
                                //this is where we put our 3 attempt limit
                                $_SESSION['attempt'] += 1;
                                //set the time to allow login if third attempt is reach
                                if($_SESSION['attempt'] == 3)
                                {
                                    $_SESSION['attempt_again'] = time() + (5*60);
                                }
                            }
                        }
                        else
                        {
                            echo '<script>window.alert("Error: ID does not exist!");</script>';
                            $_SESSION['error'] = 'No account with that username';
                        }
                    }
                    else
                    {
                        echo '<script>window.alert("Error: ID cannot be blank!");</script>';
                        $_SESSION['error'] = 'ID Cannot be blank';
                    }
                }
            }
        }


?>
