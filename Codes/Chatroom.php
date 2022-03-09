<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="default.css">
    <link rel="stylesheet" href="ChatRoom.css">
    <!-- Add jquery to get response from user -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
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
                    $('#result').html(response);
                }
            });
        }
    </script>
    <title> Tutor Messenger </title>
</head>

<body>
    <!-- Start Menu -->
    <div class="nav-btn">Menu</div>
    <div class="container">
        <div class="sidebar">

            <nav>
                <a href="#">Nottingham <span>Tutor System</span></a>
                <ul>
                    <li><a href="tutorpage.php">Tutees</a></li>
                    <li><a href="Search.php">Search</a></li>
                    <li><a href="Loginpage.php">Log Out</a></li>
                </ul>

            </nav>
        </div>

        <!-- End Menu -->
        <!-- Star of Chat Room -->
        <div class="main-content">
            <h3><b>Tutor Chat Rooms</b></h3><br>
            <b>Available Chat Rooms<b><br>
                    <select name="selectroom" onchange="location = this.value;">
                        <option value="#">General Tutors</option>
                        <option value="#">Computer Science Tutors</option>
                    </select>
                    <br><br>
                    <table id="chat_room">

                        <tr>
                            <td>
                                <div id="result" style="overflow-y:scroll; height:300px; width: 720px;"></div>
                                <form class="form">
                                    <!--<input type="text" id="msg">--><br />
                                    <textarea id="msg" rows="5" cols="80" style="font-size: 12pt"></textarea><br />
                                    <input type="hidden" value="<?php echo $row['chat_room_id']; ?>" id= 1>
                                    <button type="button" id="send_msg">Send</button>
                                </form>
                            </td>
                        </tr>

                    </table>

        </div>
    </div>
    <!-- End of Chat room -->

</body>

</html>