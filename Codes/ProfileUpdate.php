<?php
include 'Connection.php';
if (isset($_POST['submit'])) {
    $userid = $_POST['studentID'] ?? "";
    $firstName = $_POST['firstName'] ?? "";
    $lastName = $_POST['lastName'] ?? "";
    $nationality = $_POST['nationality'] ?? "";
    $email = $_POST['email'] ?? "";
    $perosnalGoals = $_POST['personalGoals'] ?? "";
    $query = "UPDATE students SET `First Name` = '" . $firstName . "',
                      `Last Name` = '" . $lastName . "', `Nationality` = '".$nationality."', `Email Address` = '" . $email ."', `Personal Goals` = '" . $perosnalGoals ."' WHERE `Student Id` = '" . $userid . "'";
    if (mysqli_query($conn, $query)) {
  echo "<script type='text/javascript'>  alert('Profile Updated Successfull.'); ";
  echo "window.location = 'USerInformationStudent.php?studentID=". $userid."'";
  echo "</script>";
} else {
 // echo "Error updating record: " . mysqli_error($conn);
  echo "<script type='text/javascript'>  alert('Error updating record'); ";
  echo "window.location = 'ProfileEdit.php?studentID=". $userid."'";
  echo "</script>";
}
    ?>
    
  <?php  
}
?>
