<?php
include_once('Connection.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="vieport" content="width=device-width, initial-scale=1.0" />
    <title>Nottingham Tutor 2.0</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" type="text/css" href="search.css" />
</head>

<body>
    <aside>
        <div class="header">
            <div class="logo">
                <img src="./image/logo1.png" alt="" />
                <span class="title">Nottingham Tutor 2.0</span>
            </div>
            <div class="hidden">
                <img src="./image/icon.png" alt="" />
            </div>
        </div>
        <div class="menu">
            <ul>
                <li>
                    <a href="UserInformationTutors.php">
                        <ion-icon name="person"></ion-icon>
                        <span class="title">Profile</span>
                    </a>
                </li>
                <li>
                    <a href="TutorTimeslot.php">
                        <ion-icon name="calendar"></ion-icon>
                        <span class="title">Appointment</span>
                    </a>
                </li>
                <li>
                    <a href="Announcement.php">
                        <ion-icon name="mail"></ion-icon>
                        <span class="title">Announcement</span>
                    </a>
                </li>
                <li>
                    <a href="Chatroom.php">
                        <ion-icon name="chatbubble-ellipses"></ion-icon>
                        <span class="title">Message</span>
                    </a>
                </li>
                <li>
                    <a href="search.php">
                        <ion-icon name="search"></ion-icon>
                        <span class="title">Search</span>
                    </a>
                </li>
            </ul>
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
                <span class="title">Search</span>
            </div>
            <div class="search-container">
                <div class="search-bar-year">
                    <div class="main-content">
                        <!-- Start Panel -->
                        <div class="panel-wrapper">
                            <div class="panel-head">
                                <!-- Start Table -->


                                <form action="" method="post">
                                    <input type="text" name="search" placeholder="Student ID or Name">
                                    <input style="height: 25px; width: 50px;" type="submit" value="Search">
                                </form>

                                <?php
                                if (isset($_POST['search'])) {
                                    $searchq = $_POST['search'];
                                    //Finds string or int close to what was searched
                                    $query = mysqli_query($conn, "SELECT * FROM `students` WHERE `Student Id` LIKE '%$searchq%' OR `First Name` LIKE '%$searchq%' OR `Last Name` LIKE '%$searchq%' OR `Full Name` LIKE '%$searchq%'") or die("could not search!");
                                    $count = mysqli_num_rows($query);
                                    if ($count == 0) {
                                        $output = 'There were no search results!'; // This line doesnt work ?????
                                    } else {
                                        while ($row = mysqli_fetch_array($query)) {
                                            $fname = $row['Full Name'];    //Retrieves students Full Name
                                            $id = $row['Student Id'];      //Retrieves Student id
                                            $email = $row['Email Address']; //Retrieves email

                                            echo '<br />' . $id . ': ' . $fname . ' - ' . $email . '<br />'; // Prints 'Student Id' : 'Full Name' - 'email'



                                        }
                                    }
                                }
                                ?>
                                <!-- End Table -->
                            </div>
                        </div>
                        <!-- End Panel -->
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>