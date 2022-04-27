<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <!-- Add jquery to get response from user -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/tutorchat.css">
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
                        url: "send_message.php",
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
                url: 'send_message.php',
                type: 'POST',
                async: false,
                data: {
                    id: $id,
                    res: 1,
                },
                success: function(response) {
                    $('#message').html(response);
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
            <!-- Navigation Bar -->
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
                    <div id="message">
                        
                    </div>
                    <!-- Form to retrieve message input -->
                    <form class="form">
                        <input type="text" id="msg" name="title" placeholder="Write your message..."><br></br>
                        <input type="hidden" value="<?php echo $row['chat_room_id']; ?>" id= 1>
                        <button type="button" id="send_msg">Send</button>
                    </form>
                </div>
                <!-- Drop down to change chat room -->
                <div class="dropdown">
                    <ion-icon name="chatbubbles"></ion-icon>
                    <div class="dropdown-content">
                        <ul>
                            <li>
                                <form method="POST">
                                    <input type="hidden" name="General">
                                    <button type="submit">
                                    <span class="channel">General Tutors</span>
                                </form>
                            </li>
                            <li>
                                <form method="POST">
                                    <input type="hidden" name="CSTutors">
                                    <button type="submit">
                                    <span class="channel">Computer Science Tutors</span>
                                </form>    
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>











