<?php
	use View\View;
    include 'index.php';
	include ('Connection.php');
	session_start();
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}

	$userid = $_SESSION['userid'];
	$tutor = new Model\Tutor($userid);
    $tutor_info = $tutor->get_tutor_info();
	$chatroom = new Model\chatroom();
	$chatroom->set_room($_SESSION['room']);
	if(isset($_POST['msg'])){		
		$chatroom->send_message($tutor_info['Name'],$date);
	}
	
	if(isset($_POST['res'])){
		$id = 1;
		$message = $chatroom->read_message();
		while($row = mysqli_fetch_array($message, MYSQLI_ASSOC)) {
		?>
		<div>
			<?php echo $row['chat_date']; ?><br>
			<?php echo $row['username'].': ' ; ?>
			<?php echo $row['chat_msg']; ?><br><br>
		</div>
		<?php } 
	}	
?>