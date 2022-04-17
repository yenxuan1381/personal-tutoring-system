<?php
	include ('Connection.php');
	session_start();
	$userid = $_SESSION['userid'];
	//query to get tutor's name
	$tutorNameQuery = 'SELECT tutors.`Name` FROM `tutors` WHERE `Lect ID` = '.$userid.'';
	$getTutorName = mysqli_query($conn, $tutorNameQuery) or die("Error fetching tutor's name.");
	$name = mysqli_fetch_array($getTutorName, MYSQLI_ASSOC);
	
	if(isset($_POST['msg'])){		
		$msg = addslashes($_POST['msg']);
		$id = $_POST['id'];
		mysqli_query($conn,"insert into `general_chat` (chat_room_id, chat_msg, username, chat_date) 
		values (2, '$msg' , '".$name['Name']."', '$date')") or die(mysqli_error($conn));
	}
?>
<?php
	if(isset($_POST['res'])){
		$id = 2;
	?>
	<?php
	//Choose Chat Room id and display
		$query=mysqli_query($conn,"select * from `general_chat` where chat_room_id= 2 order by chat_date asc") or die(mysqli_error($conn));
		while($row=mysqli_fetch_array($query)){
	?>	
		<div>
			<?php echo $row['chat_date']; ?><br>
			<?php echo $row['username'].': ' ; ?>
			<?php echo $row['chat_msg']; ?><br>
		</div>
		<br>
	<?php
		}
	}	
?>