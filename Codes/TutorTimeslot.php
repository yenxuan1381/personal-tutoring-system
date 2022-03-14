<?php

session_start();

//to connect the page to the database
include_once('Connection.php');

// If haven't login, then change to login page
if ((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor")) {
  header("Location:Loginpage.php");
}

//storing the student ID that the student entered at the log in page in the studentid variable
$userid = $_SESSION['userid'];
$getUserID = mysqli_query($conn, "SELECT `Name` FROM tutors WHERE `Lect ID` = '$userid'");
$userID = mysqli_fetch_array($getUserID, MYSQLI_ASSOC);
$name = $userID['Name'];


if (isset($_POST['submit'])) {

  if (isset($_POST["day"])) {
    $day = $_POST["day"];

    $query = "UPDATE `$day` SET timeslot1 = NULL, timeslot2 = NULL, timeslot3 = NULL, timeslot4 = NULL";
    if (mysqli_query($conn, $query)) {
      header("Location:Tutorpage.php");
    } else {
      echo "ERROR: Could not execute $sql. " . mysqli_error($link);
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

    #days td,
    #days th {
      border: 0.5px solid rgb(14, 1, 1);
      padding: 50px;
    }

    #days th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: middle;
      background-color: #0072ff;
      color: white;
    }


    #days th.special_cell1 {
      background-color: white;
    }

    #days td.special_cell {
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
      $sql2 = "SELECT * FROM `monday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$userid')";
      $result = $conn->query($sql2);
      while ($row = $result->fetch_assoc()) {
        echo "<td>" . $row["timeslot1"] . "</td><td>" . $row["timeslot2"] . "</td><td>" . $row["timeslot3"] . "</td><td>" . $row["timeslot4"] . "</td>";
      }
      ?>
    </tr>
    <tr>
      <td class="special_cell">
        Tuesday
      </td>
      <?php
      $sql3 = "SELECT * FROM `tuesday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$userid')";
      $result = $conn->query($sql3);
      while ($row = $result->fetch_assoc()) {
        echo "<td>" . $row["timeslot1"] . "</td><td>" . $row["timeslot2"] . "</td><td>" . $row["timeslot3"] . "</td><td>" . $row["timeslot4"] . "</td>";
      }
      ?>
    </tr>
    <tr>
      <td class="special_cell">
        Wednesday
      </td>
      <?php
      $sql4 = "SELECT * FROM `wednesday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$userid')";
      $result = $conn->query($sql4);
      while ($row = $result->fetch_assoc()) {
        echo "<td>" . $row["timeslot1"] . "</td><td>" . $row["timeslot2"] . "</td><td>" . $row["timeslot3"] . "</td><td>" . $row["timeslot4"] . "</td>";
      }
      ?>
    </tr>

    <tr>
      <td class="special_cell">
        Thursday
      </td>
      <?php
      $sql5 = "SELECT * FROM `thursday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$userid')";
      $result = $conn->query($sql5);
      while ($row = $result->fetch_assoc()) {
        echo "<td>" . $row["timeslot1"] . "</td><td>" . $row["timeslot2"] . "</td><td>" . $row["timeslot3"] . "</td><td>" . $row["timeslot4"] . "</td>";
      }
      ?>
    </tr>
    <tr>
      <td class="special_cell">
        Friday
      </td>
      <?php
      $sql6 = "SELECT * FROM `friday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$userid')";
      $result = $conn->query($sql6);
      while ($row = $result->fetch_assoc()) {
        echo "<td>" . $row["timeslot1"] . "</td><td>" . $row["timeslot2"] . "</td><td>" . $row["timeslot3"] . "</td><td>" . $row["timeslot4"] . "</td>";
      }
      ?>
    </tr>
    <tr>
      <td class="special_cell">
        Saturday
      </td>
      <?php
      $sql7 = "SELECT * FROM `saturday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$userid')";
      $result = $conn->query($sql7);
      while ($row = $result->fetch_assoc()) {
        echo "<td>" . $row["timeslot1"] . "</td><td>" . $row["timeslot2"] . "</td><td>" . $row["timeslot3"] . "</td><td>" . $row["timeslot4"] . "</td>";
      }
      ?>
    </tr>
    <tr>
      <td class="special_cell">
        Sunday
      </td>
      <?php
      $sql8 = "SELECT * FROM `sunday timeslot` WHERE appointment_id=(SELECT appointment_id FROM appointment WHERE `Lect ID` = '$userid')";
      $result = $conn->query($sql8);
      while ($row = $result->fetch_assoc()) {
        echo "<td>" . $row["timeslot1"] . "</td><td>" . $row["timeslot2"] . "</td><td>" . $row["timeslot3"] . "</td><td>" . $row["timeslot4"] . "</td>";
      }
      ?>
    </tr>
  </table>

  <form name="form1" id="form1" method="post">
    Day: <select name="day" id="day">
      <option value="">Select day</option>
      <option value="monday timeslot">Clear Monday Appointments</option>
      <option value="tuesday timeslot">Clear Tuesday Appointments</option>
      <option value="wednesday timeslot">Clear Wednesday Appointments</option>
      <option value="thursday timeslot">Clear Thursday Appointments</option>
      <option value="friday timeslot">Clear Friday Appointments</option>
      <option value="saturday timeslot">Clear Saturday Appointments</option>
      <option value="sunday timeslot">Clear Sunday Appointments</option>
    </select>
    <br><br>
    <input type="submit" name="submit" value="Clear Appointment">
  </form>
</body>

</html>