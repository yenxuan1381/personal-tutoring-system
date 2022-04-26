<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/contactus.css">
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
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
