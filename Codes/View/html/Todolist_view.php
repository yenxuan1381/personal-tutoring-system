<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/todolist.css">
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
						$count = 1;
						while ($fetch = mysqli_fetch_array($getlist, MYSQLI_ASSOC)) {
					?>
                        <li>
                            <div class="Task-info">
                                <div class="dolist">
                                    <span class="detail"><?php echo $count++ ?></span>
                                    <span class="task"><?php echo $fetch['task'] ?></span>
                                    <span class="status"><?php echo $fetch['status'] ?></span>
                                    <div class="update-task">
                                        <form method="post">
                                            <input type="hidden" name="update">
                                            <input type="hidden" name="status">
                                            <input type="hidden" name="id" value="<?php echo $fetch["task_id"]?>">
                                                <button type="submit">
                                                <ion-icon name="checkmark-outline"></ion-icon>
                                            </input>
                                        </form>
                                    </div>
                                    <div class="delete-task">
                                        <form method="post" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                                            <input type="hidden" name="delete">
                                            <input type="hidden" name="id" value="<?php echo $fetch["task_id"]?>">
                                                <button type="submit">
                                                <ion-icon name="trash"></ion-icon>
                                        </input>
                                        </form> 
                                    </div>
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