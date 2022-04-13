<?php include 'sendEmail.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <title>Nottingham Tutor 2.0</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="contactus.css">
    </head>
    <body>
        <aside>
            <div class="header">
                <div class="logo">
                    <img src="./image/logo1.png" alt="" >
                    <span class="title">Nottingham Tutor 2.0</span>
                </div>
                <div class="hidden">
                    <img src="./image/icon.png" alt="">
                </div>
            </div>
            <div class="menu">
                <ul>
                    <li>
                        <a href="StudentView.php">
                          <ion-icon name="home"></ion-icon>
                          <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="UserInformationStudent.php?studentID=<?php echo $userid ?>">
                            <ion-icon name="person"></ion-icon>
                            <span class="title">Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="Appointmentview.php">
                            <ion-icon name="calendar"></ion-icon>
                            <span class="title">Appointment</span>
                        </a>
                    </li>
                    <li>
                        <a href="Announcement.php?studentID=<?php echo $userid ?>">
                            <ion-icon name="mail"></ion-icon>
                            <span class="title">Announcement</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <ion-icon name="chatbubble-ellipses"></ion-icon>
                            <span class="title">Message</span>
                        </a>
                    </li>
                    <li>
                        <a href="ContactTuteepage.php">
							          <ion-icon name="help-circle"></ion-icon>
                            <span class="title">Contact Us</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="logout">
                <a href="#">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <main>
            <div class="background">
                <div class="background-image"></div>
                <div class="title-container">
                    <span class="title">Contact Us</span>
                </div>
                <div class="content-container">
                <?php echo $notify; ?>
                <form class="contact" method="post"> 
                    <label for="name">Full Name</label><br>
                    <input type="text" name="name" placeholder="Your Name.." autocomplete="none">
                    <?php echo $NameError; ?>
                    <br>
                    <label for="email">Email</label><br>
                    <input type="text" name="email" placeholder="Your Email..">
                    <?php echo $EmailError;?>
                    <br>
                    <label for="message">Message</label><br>
                    <textarea name="message" placeholder="Your Message.."></textarea><br>
                    <input type="submit" name="submit" class="send-btn" value="Send">
                </form>
                    

                </div>
                <div class="back-button">
                    <a href="StudentView.php">
                        <ion-icon name="arrow-back"></ion-icon>
                    </a>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
