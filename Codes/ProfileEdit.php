
<?php
include 'Connection.php';
$userid = $_GET['studentID'] ?? "";

// if(!empty($_POST['submit'])){
//   $userid = $_POST['studentID'];
//   $_SESSION['studentID'] = $userid;
// }

$getStudentID = $userid;

$firstNameQuery = 'SELECT `First Name`,`Last Name`,`Nationality`,`Email Address`,`Personal Goals` FROM `students` WHERE `Student Id` = ' . $userid . '';
$getStudentFirstName = mysqli_query($conn, $firstNameQuery) or die("Error fetching student's first name.");
$row = mysqli_fetch_array($getStudentFirstName, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en-US">
    <head>
        <title>Update User Profile</title> 
        <link rel="stylesheet" href="default.css">
    </head>
    <body>

        <!-- Start Menu -->
        <div class="nav-btn">Menu</div>
        <div class="container">
            <div class="sidebar">

                <nav>
                    <a href="#">Nottingham <span>Tutor System</span></a>
                    <ul>
                        <li><a href="StudentView.php">List</a></li>
                        <li><a href="Loginpage.php">Log Out</a></li>
                    </ul>

                </nav>

            </div>
            <!-- End Menu -->
            <div class="main-content">
                <div class="panel-wrapper">
                    <div class="panel-head">
                        <label class="header">Update User Profile</label>
                        <div class="profile-input-field" align="center">
                            <h4 align="center">Please Fill-out All Fields</h4>
                            <form method="post" action="ProfileUpdate.php" >
                                <div class="form-group">
                                    <label>First Name:   </label>
                                    <input type="text" class="form-control" name="firstName" style="width:20em; margin-left: 35px" placeholder="Enter your First Name" value="<?php echo $row['First Name']; ?>" required />
                                </div>
                                <div class="form-group">
                                    <label>Last Name:   </label>
                                    <input type="text" class="form-control" name="lastName" style="width:20em; margin-left: 35px" placeholder="Enter your Last Name" required value="<?php echo $row['Last Name']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label>Nationality:   </label>
                                    <input type="text" class="form-control" name="nationality" style="width:20em; margin-left: 35px" placeholder="Enter your Nationality" value="<?php echo $row['Nationality']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label>Email Address:   </label>
                                    <input type="text" class="form-control" name="email" style="width:20em;" required placeholder="Enter your Email Address" value="<?php echo $row['Email Address']; ?>" required/>
                                </div>
                                <div class="form-group">
                                    <label>Personal Goals:   </label>
                                    <input type="text" class="form-control" name="personalGoals" style="width:20em;" required placeholder="Enter your Personal Goal" value="<?php echo $row['Personal Goals']; ?>" required/>
                                </div>
                                    <div class="form-group">
                                        <br/>
                                        <input type="submit" name="submit" value="Update" class="btn btn-primary" style="width:15em;height: 3.5em"><br><br>
                                </div>
                                  <?php echo " <input type='hidden' name='studentID' value='".$userid."'/>"; ?>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
    </body>
</html>
