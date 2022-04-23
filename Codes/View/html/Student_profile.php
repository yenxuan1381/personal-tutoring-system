<!-- start of the HTML script for the student view page  -->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="profile.css">
    </head>
    <body>
	<aside>
            <div class="header">
                <div class="logo">
                    <img src="./image/logo1.png" alt="" >
                    <span class="title">NOTTSTUTOR</span>
                </div>
                <div class="hidden">
                    <img src="./image/icon.png" alt="">
                </div>
            </div>
            <div class="menu">
                <?php 
                    if($_SESSION['category'] == "Student") {
                        require_once "sidebar_student.php";
                    }
                    else if($_SESSION['category'] == "Tutor"){
                        require_once "sidebar_tutor.php";
                    }
                ?>
            </div>
            <div class="logout">
                <a href="Loginpage.php">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <main>
            <div class="upper_profile">
                <div class="profile_detail">
                    <div class="photo">
                        <img src="./image/profile.jpeg" alt="">
                    </div>
                    <div class="profile_name">
                        <?php
                            if($_SESSION['category'] == "Tutor")
                            {
                                echo '<h3>Student Profile:</h3>';
                            }else{
                                echo '<h3>My Profile:</h3>';
                            }
                        ?>
                        <h1><?php echo $student_info['First Name']?></h1>
                        <h4><?php echo $student_info['Last Name']?></h4>
                    </div>
                    <span class="role">Student</span>
                </div>
            </div>
                <div id="pop-out">
                    <div class="lower-title-1">
                        <span class="sub-title">Edit Personal Goal</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post" name="form1">
                        <textarea name="Personal_Goal" placeholder="Your Personal Goal.."></textarea><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
                <div id="pop-out1">
                    <div class="lower-title-1">
                        <span class="sub-title">Personal Information</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove1()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post">
                        <label for="First_Name">First Name:</label><br>
                        <input type="text" name="First_Name" value="<?php echo $student_info['First Name'] ?>"><br><br>
                        <label for="Last_Name">Last Name: </label><br>
                        <input type="text" name="Last_Name" value="<?php echo $student_info['Last Name'] ?>"><br><br>
                        <label for="Nationality">Nationality:</label><br>
                        <input type="text" name="Nationality" value="<?php echo $student_info['Nationality'] ?>"><br><br>
                        <label for="Email">Email:</label><br>
                        <input type="text" name="Email" value="<?php echo $student_info['Email Address'] ?>"><br><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
                <div id="pop-out2">
                <div class="lower-title-1">
                        <span class="sub-title">Academic Information</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove2()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post">
                        <label for="Academic_Plan_Code">Academic Plan Code:</label><br>
                        <input type="text" name="Academic_Plan_Code" value="<?php echo $student_info['Academic Plan Code'] ?>"><br><br>
                        <label for="Level">Level:</label><br>
                        <input type="text" name="Level" value="<?php echo $student_info['Level'] ?>"><br><br>
                        <label for="Current_Year">Current Year:</label><br>
                        <input type="text" name="Current_Year" value="<?php echo $student_info['Current Year'] ?>"><br><br>
                        <label for="Registration_Date">Registration Date:</label><br>
                        <input type="text" name="Registration_Date" value="<?php echo $student_info['Registration Date'] ?>"><br><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
                <div id="pop-out3">
                    <div class="lower-title-1">
                        <span class="sub-title">Edit Remark</span>
                        <div class="edit_goal"> 
                            <button class="edit1" onclick="remove3()"><ion-icon name="close"></ion-icon></button>
                        </div>
                    </div>
                    <form method="post" name="form1">
                        <textarea name="Remark" placeholder="Add Remarks Here..."></textarea><br>
                        <input type="submit" value="Confirm">
                    </form>
                </div>
            <div class="lower_profile">
                <div class="info">
                    <div class="lower-title-1">
                        <span class="sub-title">Personal Information</span>
                        <div class="edit_goal"> 
                            <?php
                                if ($_SESSION['category'] == "Student")
                                {
                                    echo '<button class="edit1" onclick="pop1()"><ion-icon name="create"></ion-icon></button>';
                                }
                            ?>
                        </div>
                    </div>
					<strong>Student ID: <br></strong> <?php echo $StudentID ?> </br>
					<strong>First Name: <br></strong> <?php echo $student_info['First Name'] ?> </br>
					<strong>Last Name: <br></strong> <?php echo $student_info['Last Name'] ?> </br>
					<strong>Nationality: <br></strong> <?php echo $student_info['Nationality'] ?> </br>
					<strong>Email: <br></strong> <?php echo $student_info['Email Address'] ?> </br>
                </div>
                <div class="academic">
                    <div class="lower-title-1">
                        <span class="sub-title">Academic Information</span>
                        <div class="edit_goal"> 
                            <?php
                                if ($_SESSION['category'] == "Tutor")
                                {
                                    echo '<button class="edit1" onclick="pop2()"><ion-icon name="create"></ion-icon></button>';
                                }
                            ?>
                        </div>
                    </div>
					<strong>Academic Plan Code: <br></strong> <?php echo $student_info['Academic Plan Code'] ?> </br>
					<strong>Academic Plan: <br></strong> <?php echo $academicPlan['Academic Plan'] ?> </br>
					<strong>Level: <br></strong> <?php echo $student_info['Level'] ?> </br>
					<strong>Current Year: <br></strong> <?php echo $student_info['Current Year'] ?> </br>
					<strong>Registration Date: <br></strong> <?php echo $student_info['Registration Date'] ?> </br>
                </div>
                <div class="goal_and_remark">
                    <div class="personal-goal">
                        <div class="lower-title-1">
                            <span class="sub-title">Personal Goal</span>
                            <div class="edit_goal"> 
                                <?php
                                    if ($_SESSION['category'] == "Student")
                                    {
                                        echo '<button class="edit1" onclick="pop()"><ion-icon name="create"></ion-icon></button>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php echo $student_info['Personal Goals'] ?>
                    </div>
                    <div class="remark">
                        <div class="lower-title-1">
                            <span class="sub-title">Remark</span>
                            <div class="edit_goal"> 
                                <?php
                                    if ($_SESSION['category'] == "Tutor")
                                    {
                                        echo '<button class="edit1" onclick="pop3()"><ion-icon name="create"></ion-icon></button>';
                                    }
                                ?>
                            </div>
                        </div>
                        <?php echo $student_info['remarks']?>
                    </div>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
        function pop() {
            document.getElementById("pop-out").style.visibility = "visible";
        }
        function remove() {
            document.getElementById("pop-out").style.visibility = "hidden";
        }

        function pop1() {
            document.getElementById("pop-out1").style.visibility = "visible";
        }
        function remove1() {
            document.getElementById("pop-out1").style.visibility = "hidden";
        }

        function pop2() {
            document.getElementById("pop-out2").style.visibility = "visible";
        }
        function remove2() {
            document.getElementById("pop-out2").style.visibility = "hidden";
        }
        function pop3() {
            document.getElementById("pop-out3").style.visibility = "visible";
        }
        function remove3() {
            document.getElementById("pop-out3").style.visibility = "hidden";
        }


    </script>
    </body>
</html>
<!-- End of HTML script -->