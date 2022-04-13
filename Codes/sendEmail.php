<?php
use PHPMailer\PHPMailer\PHPMailer;
//Require PHPmailer to use it
require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';
include_once('Connection.php');
session_start();
	// If haven't login, then change to login page
if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Student"))
{
		header("Location:Loginpage.php");
}

	//storing the student ID that the student entered at the log in page in the studentid variable
$userid = $_SESSION['userid'];

$mail = new PHPMailer(true);

$notify = '';
$NameError="";
$EmailError="";

//Test user input function
function Test_User_Input($Data){
  return $Data;
}
// End of test user input

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
    /* Form Validation */
    if(empty($_POST["name"])){
        $NameError="* Name is required";
    }
    else{
        $Name=Test_User_Input($_POST["name"]);
        //Check valid name input
        if (!preg_match("/^[a-zA-Z-' ]*$/",$Name)) {
            $NameError = "* Only letters and white space allowed";
          }
    }
    if(empty($_POST["email"])){
        $EmailError="* Email is required";
    }
    else{
        $Email=Test_User_Input($_POST["email"]);
        //Check valid email input
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $EmailError = "* Invalid email format";
          }
        }
    
  if(!empty($_POST['name']) && !empty($_POST['email']) && filter_var($Email, FILTER_VALIDATE_EMAIL)==true && preg_match("/^[a-zA-Z-' ]*$/",$Name)==true){
    try{
      $mail->isSMTP(); 
      $mail->Host = 'smtp.gmail.com'; 
      $mail->SMTPAuth = true;
      $mail->Username = 'segroup2b.contact@gmail.com'; // Gmail address for SMTP server
      $mail->Password = 'ljrvlegossrqwfhw'; // Gmail address Password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      $mail->Port = '587';

      $mail->setFrom('segroup2b.contact@gmail.com'); // Gmail address for SMTP server
      $mail->addAddress('segroup2b.contact@gmail.com');  //Add address

      $mail->isHTML(true); //set email format to HTML
      /*Content in the Email */
      $mail->Subject = 'Message from Notts Tutor';
      $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $message</h3>";
      /*End of content in the Email */
      $mail->send(); //Send Email
      $notify = '<div class="notify-success">
                  <span>
                  Message Sent! Thank you for contacting us. 
                  </span>
                  </div>'; //Display Success Message
    } catch (Exception $e){
      $notify = '<div class="notify-error">
                  <span>'.$e->getMessage().'</span>
                </div>'; //Display Error Message
    }

  }else{
   $notify='<div class="notify-error">
                 Error! Please complete the form again 
                </div>'; //Display complete form again message
  }
}
?>
