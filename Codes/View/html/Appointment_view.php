<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/announcement.css">
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
                    <?php 
                        if($_SESSION['category']=="Student"){
                            echo"<span class='title'>My Appointment</span>";
                        }
                        else if($_SESSION['category']=="Tutor"){
                            echo"<span class='title'><pre>Appointment  on   $date</pre></span>";
                        }
                    ?>
                    
                </div>
                <div class="content-container">
                    <ul>
                        <?php {while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                        <li>
                            <div class="Announcement-info">
                                <?php 
                                    if($_SESSION['category']=="Student"){
                                        echo"
                                            <a href='#'>
                                                <span class='detail'>Tutor:" ,$row["tutor_name"],"</span>
                                                <span class='date'>Date:",$row["date"],"</span>
                                                <span class='time1'>",$row["start_time"],"-</span>
                                                <span class='time2'>",$row["end_time"],"</span>
                                            </a>
                                        ";
                                    }
                                    else if($_SESSION['category']=="Tutor"){
                                        echo"
                                            <a href='#'>
                                                <span class='detail'>Student:" ,$row["student_name"],"</span>
                                                <span class='from'>",$row["start_time"],"-</span>
                                                <span class='from'>",$row["end_time"],"</span>
                                            </a>
                                        ";
                                    }
                                ?>
                            </div>
                        <?php if($_SESSION['category']=="Tutor"){ ?>
                            <div class="delete-announcement">
                                <form method="post" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
									<input type="hidden" name="delete">
									<input type="hidden" name="id" value="<?php echo $row["meeting_id"]?>">
									<button type="submit" >
                                        <ion-icon name="trash"></ion-icon>
                                    </input>
								</form> 
                                    
                                
                            </div>
                        <?php } ?>
                        </li> 
                        <?php } }?>                
                    </ul>
                </div>
				
                <?php if($_SESSION['category']=="Tutor"){ ?>
                <div class="function-icon">
                    <a href="AddAppointment.php?date=<?php echo"$date"?>">
                        <ion-icon name="add-circle"></ion-icon>
                    </a>
                </div>
                <?php } ?>
                <?php if($_SESSION['category']=="Tutor"){ ?>
				<div class="back-button">
                    <a href="appointment.php">
                        <ion-icon name="arrow-back"></ion-icon>
                    </a>
                </div>
                <?php } ?>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>