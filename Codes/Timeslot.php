<?php

	session_start();

	//to connect the page to the database
	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Student"))
	{
		header("Location:Loginpage.php");
	}

	//storing the student ID that the student entered at the log in page in the studentid variable
	$userid = $_SESSION['userid'];
	$getUserID = mysqli_query($conn, "SELECT `Full Name` FROM students WHERE `Student Id` = '$userid'");
	$userID = mysqli_fetch_array($getUserID,MYSQLI_ASSOC);
	$name = $userID['Full Name'];

	// an sql query to get the tutor ID
	$getTutorID = mysqli_query($conn, 'SELECT tutors.`Lect ID` FROM tutors JOIN students ON students.`Tutor Id` = tutors.`Lect ID` WHERE students.`Student Id`= ' .$userid) or die('Error Fetching Tutor ID');
	//fetching the tutor ID received from the query
	$tutorID = mysqli_fetch_array($getTutorID,MYSQLI_ASSOC);
	$tutorid = $tutorID['Lect ID'];
	
	
	if(isset($_POST["day"])){
		$day = $_POST["day"];
		
	}

	if(isset($_POST["timeslot"])){
		$timeslot = $_POST["timeslot"];
	
		$sql = "SELECT `$timeslot` FROM `$day` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		
		
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				if($row[$timeslot]!=""){
					echo '<script>alert("Booking not available")</script>';
				}
				else{
					$sql1 = "UPDATE `$day` SET `$timeslot`='$name' WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
					if(mysqli_query($conn, $sql1)){
    						header("Location:Timeslot.php");
					} 
					else {
    						echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
					}	
				}
			}
		}
				
	}
	

?>

<html>
  <head>
    <style>
      
      #days {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
      }

      #days td, #days th {
        border: 0.5px solid rgb(14, 1, 1);
        padding: 50px;
      }

      #days th{
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: middle;
        background-color: #0072ff;
        color: white;
      }


      #days th.special_cell1{
        background-color: white;
      }

      #days td.special_cell{
        background-color: #0072ff;
        color: white;
        text-align: center;
      }

    
    </style>

  </head>
  <body>
    <h1> Timetable </h1>
    <table id="days">
      <tr>
        <th class="special_cell1"></th>
        <th>09:00 - 10:00</th>
        <th>10:00 - 11:00</th>
        <th>11:00 - 12:00</th>
        <th>14:00 - 15:00</th>
      </tr>
      <tr>
        <td class="special_cell">
          Monday
        </td>
        <?php
		$sql2 = "SELECT * FROM `monday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		$result = $conn->query($sql2);
		while($row = $result->fetch_assoc()) {
   			echo "<td>".$row["timeslot1"]."</td><td>".$row["timeslot2"]."</td><td>".$row["timeslot3"]."</td><td>".$row["timeslot4"]."</td>";
		}
	?> 
      </tr>
      <tr>
        <td class="special_cell">
          Tuesday
        </td>
        <?php
		$sql3 = "SELECT * FROM `tuesday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		$result = $conn->query($sql3);
		while($row = $result->fetch_assoc()) {
   			echo "<td>".$row["timeslot1"]."</td><td>".$row["timeslot2"]."</td><td>".$row["timeslot3"]."</td><td>".$row["timeslot4"]."</td>";
		}
	?> 
      </tr>
      <tr>
        <td class="special_cell">
          Wednesday
        </td>
        <?php
		$sql4 = "SELECT * FROM `wednesday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		$result = $conn->query($sql4);
		while($row = $result->fetch_assoc()) {
   			echo "<td>".$row["timeslot1"]."</td><td>".$row["timeslot2"]."</td><td>".$row["timeslot3"]."</td><td>".$row["timeslot4"]."</td>";
		}
	?> 
      </tr>

      <tr>
        <td class="special_cell">
          Thursday
        </td>
        <?php
		$sql5 = "SELECT * FROM `thursday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		$result = $conn->query($sql5);
		while($row = $result->fetch_assoc()) {
   			echo "<td>".$row["timeslot1"]."</td><td>".$row["timeslot2"]."</td><td>".$row["timeslot3"]."</td><td>".$row["timeslot4"]."</td>";
		}
	?> 
      </tr>
      <tr>
        <td class="special_cell">
          Friday
        </td>
        <?php
		$sql6 = "SELECT * FROM `friday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		$result = $conn->query($sql6);
		while($row = $result->fetch_assoc()) {
   			echo "<td>".$row["timeslot1"]."</td><td>".$row["timeslot2"]."</td><td>".$row["timeslot3"]."</td><td>".$row["timeslot4"]."</td>";
		}
	?> 
      </tr>
      <tr>
        <td class="special_cell">
          Saturday
        </td>
        <?php
		$sql7 = "SELECT * FROM `saturday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		$result = $conn->query($sql7);
		while($row = $result->fetch_assoc()) {
   			echo "<td>".$row["timeslot1"]."</td><td>".$row["timeslot2"]."</td><td>".$row["timeslot3"]."</td><td>".$row["timeslot4"]."</td>";
		}
	?> 
      </tr>
      <tr>
        <td class="special_cell">
          Sunday
        </td>
        <?php
		$sql8 = "SELECT * FROM `sunday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$tutorid')";
		$result = $conn->query($sql8);
		while($row = $result->fetch_assoc()) {
   			echo "<td>".$row["timeslot1"]."</td><td>".$row["timeslot2"]."</td><td>".$row["timeslot3"]."</td><td>".$row["timeslot4"]."</td>";
		}
	?> 
      </tr>
    </table>

    <form name="form1" id="form1" method="post">
    Day: <select name="day" id="day">
	<option value="" >Select day</option>
	<option value="monday timeslot" >Monday</option>
	<option value="tuesday timeslot" >Tuesday</option>
	<option value="wednesday timeslot" >Wednesday</option>
	<option value="thursday timeslot" >Thursday</option>
	<option value="friday timeslot" >Friday</option>
	<option value="saturday timeslot" >Saturday</option>
	<option value="sunday timeslot" >Sunday</option>
      </select>
    <br><br>
    Timeslot: <select name="timeslot" id="timeslot">
    	<option value="" selected="selected">Select timeslot</option>
	<option value="timeslot1" >09:00 - 10:00</option>
	<option value="timeslot2" >10:00 - 11:00</option>
	<option value="timeslot3" >11:00 - 12:00</option>
	<option value="timeslot4" >14:00 - 15:00</option>	
      </select>
    <br><br>
    <input type="submit" value="Book now">
   </form>
  </body>
</html>




