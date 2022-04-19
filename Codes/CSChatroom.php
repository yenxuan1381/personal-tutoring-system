<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor"))
	{
		header("Location:Loginpage.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <!-- Add jquery to get response from user -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="tutorchat.css">
        <script type="text/javascript">
       
        $(document).ready(function() { //using send button
            displayResult();
            /* Send Message	*/

            $('#send_msg').on('click', function() {
                if ($('#msg').val() == "") {
                    alert('Please write message first');
                } else {
                    $msg = $('#msg').val();
                    $id = $('#id').val();
                    $.ajax({
                        type: "POST",
                        url: "SendCSchat.php",
                        data: {
                            msg: $msg,
                            id: $id,
                        },
                        success: function() {
                            displayResult();
                            $('#msg').val(''); //clears the textarea after submit
                        }
                    });
                }
            });
            /* END */
        });

        function displayResult() {
            $id = $('#id').val();
            $.ajax({
                url: 'SendCSchat.php',
                type: 'POST',
                async: false,
                data: {
                    id: $id,
                    res: 2,
                },
                success: function(response) {
                    $('#result').html(response);
                }
            });
        }
    </script>
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
            </div>
            <div class="logout">
                <a href="loginpage.php">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <main>
            <div class="background">
                <div class="background-image"></div>
                <div class="title-container">
                    <span class="title">Tutor Messenger</span>
                </div>
                <div class="content-container">
                    <form class="form">
                        <div id="result"></div>
                        
                        <input type="text" id="msg" name="title" placeholder="Write your message..."><br></br>
                        <input type="hidden" value="<?php echo $row['chat_room_id']; ?>" id= 2>
                        <button type="button" id="send_msg">Send</button>
                    </form>
                    
                </div>
                <div class="dropdown">
                    <ion-icon name="chatbubbles"></ion-icon>
                    <div class="dropdown-content">
                        <ul>
                            <li>
                                <a href = "Chatroom.php">
                                    <span class="channel">General Tutors</span>
                                </a>
                            </li>
                            <li>
                                <a href = "CSChatroom.php">
                                    <span class="channel">Computer Science Tutors</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="back-button">
                    <a href="announcement.php">
                        <ion-icon name="arrow-back"></ion-icon>
                    </a>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>


