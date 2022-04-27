<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/Student_home.css">
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
                <a href="Loginpage.php">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
        <main>
            <div class="upper">
                <div class="Tutor">
                    <div class="Tutor_picture">
                        <img src="./image/profile.jpeg" alt="">
                    </div>
                    <div class="Tutor_detail">
                        <h3>Your Tutor:</h3>
                        <h1><?php echo $tutor_info['Name'] ?></h1>
                        <h3><?php echo $tutor_info['email'] ?></h3>
                        <h3><?php echo $tutor_info['School'] ?></h3>
                        <h3><?php echo $tutor_info['office'] ?></h3>
                    </div>
                </div>
            </div>
            <div class="nav">
                <a href="Appointmentview.php">
                    <span class="title">Appointment</span>
                </a>
            </div>
            <div class="lower">
                <div class="search">
                    <input type="text" id="myInput" onkeyup="filterSearch()" placeholder="Search Student...">
                    <ion-icon name="search-outline"></ion-icon>
                </div>
                <div class="table">
                    <h4>List of students under the same tutor</h4>
					<table id="myTable" class="fl-table">
                        <tr class="top" height="40px">
							<th><strong>ID</strong></th>
							<th><strong>First Name</strong></th>
							<th><strong>Last Name</strong></th>
							<th><strong>Academic Plan</strong></th>
						</tr>
						<!--Placing the student data into the rows of the table -->
						<tbody>
						<?php
						$studentsList = $studentsUnderSameTutor;
						while ($rows = mysqli_fetch_array($studentsList,MYSQLI_ASSOC)) {
							?>

							<tr>
							<?php
							echo '<td>'.$rows['Student Id'].'</td>';
							echo '<td>'.$rows['First Name'].'</td>';
							echo '<td>'.$rows['Last Name'].'</td>';
							echo '<td>'.$rows['Academic Plan'].'</td>';
							?>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>

					<!-- Hidden form that echoes (returns) the user id -->
					<form method="post" action="UserInformationStudent.php">
						<input type="hidden" name="studentID" id="studentID" value="<?php echo $userid; ?>" />
					</form>
				</div>
			</div>
		</main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>

<script>
function filterSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        // td = tr[i].getElementsByTagName("td")[0];
        alltags = tr[i].getElementsByTagName("td");
        isFound = false;
        for(j=0; j< alltags.length; j++) {
          td = alltags[j];
          if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                  tr[i].style.display = "";
                  j = alltags.length;
                  isFound = true;
              }
            }       
          }
          if(!isFound && tr[i].className !== "top") {
            tr[i].style.display = "none";
          }
        }
    }
</script>