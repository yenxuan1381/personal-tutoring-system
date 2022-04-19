<?php
session_start();

include_once('Connection.php');

// If haven't login, then change to login page
if ((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor")) {
	header("Location:Loginpage.php");
}
$userid = $_SESSION['userid'];


	
	
	if(ISSET($_POST['add'])){
		if($_POST['task'] != ""){
			$task = $_POST['task'];
			
			$conn->query("INSERT INTO `task` VALUES('','$userid','$task', 'In Progress')");
			header('location:Todolist.php');
		}
	}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="todolist.css">
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
            <div class="background">
                <div class="background-image"></div>
                <div class="title-container">
                    <span class="title">To-Do List</span>
                </div>
            </div>
            <div class="content-container">
                <form method="POST" action="">
					<input type="text" class="add-task" name="task" placeholder="Add New Task.." />
					<button class="task-button" name="add">Add Task</button>	
				</form>
                <ul>
                    <?php
						require 'Connection.php';
						$query = $conn->query("SELECT * FROM `task` WHERE `Lect ID` = '$userid' ORDER BY `task_id` ASC");
						$count = 1;
						while ($fetch = $query->fetch_array()) {
					?>
                        <li>
                            <div class="Task-info">
                                <div class="dolist">
                                    <span class="detail"><?php echo $count++ ?></span>
                                    <span class="task"><?php echo $fetch['task'] ?></span>
                                    <span class="status"><?php echo $fetch['status'] ?></span>
                                    <?php
									if ($fetch['status'] != "Completed") {
										echo
										'<span class="complete-task"><a href="update_task.php?task_id=' . $fetch['task_id'] . '" ><ion-icon name="checkmark-outline"></ion-icon></a></span> ';
									}
									?>
                                    <span class="delete-task"><a href="delete_query.php?task_id=<?php echo $fetch['task_id'] ?>"><ion-icon name="trash"></ion-icon></a></span>
                                </div>
                            </div>
                        </li>
                    <?php
						}
					?>
                </ul>
            </div>
            <div class="back-button">
                <a href="UserInformationTutors.php?LectID=<?php echo $userid ?>">
                    <ion-icon name="arrow-back"></ion-icon>
                </a>
            </div>
        </main>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>