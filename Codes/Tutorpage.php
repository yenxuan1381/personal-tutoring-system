<?php
session_start();

include_once('Connection.php');

// If haven't login, then change to login page
if ((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Tutor")) {
	header("Location:Loginpage.php");
}

// Check if changed view
if (isset($_POST['switch'])) {
	if ($_SESSION['all']) {
		$_SESSION['all'] = 0;
	} else {
		$_SESSION['all'] = 1;
	}
}

// Holds the tutor ID, whether is a senior tutor
// and current view whether it's all tutors or just their own tutors (If for senior tutor)
$userid = $_SESSION['userid'];
$isseniortutor = $_SESSION['st'];
$alltuteeslist = $_SESSION['all'];

// Query to look for the current school association
$schoolquery = mysqli_query($conn, 'SELECT School FROM `tutors` WHERE `Lect ID` = ' . $userid) or die('school error');
$school = mysqli_fetch_array($schoolquery, MYSQLI_ASSOC);

// Query to look for the tutees of their specific tutees or all tutees under the same school
$theirtutees = mysqli_query($conn, 'SELECT * FROM `students` WHERE `Tutor Id` = ' . $userid) or die('their tutees error');
$alltutees = mysqli_query($conn, 'SELECT * FROM `students` INNER JOIN `academic plan codes` ON `students`.`Academic Plan Code` = `academic plan codes`.`Code` INNER JOIN `tutors` ON `students`.`Tutor Id` = `tutors`.`Lect ID` WHERE `academic plan codes`.School LIKE "' . $school['School'] . '"') or die('all tutees error' . mysqli_error($conn));

//List of tutors under the same school
$schooltutors = 'SELECT * FROM `tutors` WHERE School LIKE "' . $school['School'] . '"';
$changedatalist = mysqli_query($conn, $schooltutors);

//query to get tutor's name
$tutorNameQuery = 'SELECT tutors.`Name` FROM `tutors` WHERE `Lect ID` = ' . $userid . '';
$getTutorName = mysqli_query($conn, $tutorNameQuery) or die("Error fetching tutor's name.");
$name = mysqli_fetch_array($getTutorName, MYSQLI_ASSOC);

//query to get tutor's School
$tutorSchoolQuery = 'SELECT tutors.`School` FROM `tutors` WHERE `Lect ID` = ' . $userid . '';
$getTutorSchool = mysqli_query($conn, $tutorSchoolQuery) or die("Error fetching tutor's school.");
$school = mysqli_fetch_array($getTutorSchool, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="tutorhome.css">
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
                    <span class="title">
						<?php
							if ($alltuteeslist) {
								echo '<h3><b>Senior Tutor Page of ' . $name['Name'] . '</b></h3>';
								echo '<h3><b> Your School: </b>' . $school['School'] . '</h3';
							} else {
								echo '<h3><b>Tutor Page of ' . $name['Name'] . '</b></h3>';
								echo '<h3><b> Your School: </b>' . $school['School'] . '</h3';
							}
						?>
					</span>
                </div>
                <div class="content-container">
					<div class="search-container">
						<form action="" method="post">
							<label for="search">Search: </label>
							<input type="text" id="searchbar" name="search" placeholder="Student ID or Name" onkeyup="showRowsBySearch(this.value)">
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<label for="year">View:</label>
							<select name="year" id="year" onchange="showRowsByFilter(this.value)">
								<option value="-1">All</option>
								<option value="0">Foundation</option>
								<option value="1">Undergraduate Year 1</option>
								<option value="2">Undergraduate Year 2</option>
								<option value="3">Undergraduate Year 3</option>
								<option value="4">Undergraduate Year 4</option>
								<option value="6">Postgraduate Taught</option>
								<option value="7">Postgraduate Research</option>
							</select>
						</form>
					</div>
					<div class="panel-wrapper">
						<div class="panel-head">
							<!-- Start Table -->

							<div id="StudentsInfo" class="table-wrapper">
								<table class="fl-table">
									<thead>
										<tr>
											<th>Student ID</th>
											<th>Student Full Name</th>
											<?php
											if ($alltuteeslist) {
												echo '<th>Tutor</th>';
												echo '<th>Change Tutor</th>';
											}
											?>
										</tr>
									</thead>
									<tbody>
										<?php
										if ($alltuteeslist) {
											$displaylist = $alltutees;
										} else {
											$displaylist = $theirtutees;
										}
										while ($rows = mysqli_fetch_array($displaylist, MYSQLI_ASSOC)) {
										?>
											<tr>
												<?php
												// main student's information
												echo '<td><a onclick="gototuteepage(' . $rows['Student Id'] . ')" style="cursor: pointer">' . $rows['Student Id'] . '</a></td>';
												echo '<td>' . $rows['Full Name'] . '</td>';

												// if is list of all tutees, display tutors and changing option
												if ($alltuteeslist) {
													echo '<td>' . $rows['Name'] . '</td>';
													echo '<td>
											<form id="' . $rows['Student Id'] . '" action="#changetutor" method="POST">
												<input type="hidden" name="studentid" value="' . $rows['Student Id'] . '"/>
												<input type="hidden" name="fname" value="' . $rows['Full Name'] . '"/>
												<input type="hidden" name="tutorid" value="' . $rows['Tutor Id'] . '"/>

												<input class="changeTutor" type="submit" value="Change Tutor" />
											</form>
										</td>';
												}
												?>
											</tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>

						<form action="" method="POST" id="changelistview">
							<?php
							if ($isseniortutor) {
								if ($alltuteeslist) {
									echo '<input style="height: 30px; width: 140px; margin-top: 10px;" class="button" type="button" value="See Personal Tutees" onclick="changelist()" />';
								} else {
									echo '<input style="height: 30px; width: 100px; margin-top: 10px;" class="button" type="button" value="See All Tutees" onclick="changelist()" />';
								}
							}
							?>
							<input type="hidden" id="switch" name="switch" value="" />
						</form>

						<!-- form to pass around tutee page info -->
						<form method="GET" id="tuteedata" action="UserInformationStudent.php">
							<input type="hidden" id="tuteeid" name="tuteeid" value="" />
						</form>
					</div>
					<div id="changetutor" class="overlay">
						<div class="popupchange">
							<center>
								<table style="margin-top: 100%">
									<tr>
										<td>
											<h3 style="margin-top: 20%">Change to which tutor?</h3>
										</td>
										<td><a class="close" href="#">&times;<br /></a></td>
									</tr>
									<tr>
										<td colspan="2">
											<form action="#confirmchange" method="POST">
												Name:&nbsp;&nbsp;<strong><?php echo $_POST['fname']; ?></strong>
												<br /><br />
												<label>
													Tutor:&nbsp;&nbsp;
												</label>
												<input list="tutorid" name="tutoridfinal" placeholder="<?php echo $_POST['tutorid']; ?>" required="required">
												<datalist id="tutorid">
													<?php
													while ($rows = mysqli_fetch_array($changedatalist)) {
														if ($rows['Lect ID'] != $_POST['tutorid']) {
													?>
															<option value="<?php echo $rows['Lect ID']; ?>"><?php echo $rows['Name']; ?></option>
													<?php
														}
													}
													?>
												</datalist>
												<br /><br />
												<label>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<input type="hidden" name="studentidfinal" value="<?php echo $_POST['studentid']; ?>" />
													<input type="submit" value="Confirm" />
												</label>
											</form>
										</td>
									</tr>
								</table>
							</center>
						</div>
					</div>


					<div id="confirmchange" class="overlay">
						<div class="popupconfirm">
							<table>
								<tr>
									<td>
										<h3>Confirmation</h3>
									</td>
									<td><a class="close" href="#">&times;<br /></a></td>
								</tr>
								<tr>
									<td colspan="2" align="center">
										<?php
										include('TutorChange.php');
										?>
										<form id="confirm" action="#" method="POST">
											<input type="submit" value="Ok" />
										</form>
									</td>
								</tr>
							</table>
						</div>
					</div>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    	<script>
				function changelist() {
					document.getElementById("switch").value = 1;
					document.getElementById("changelistview").submit();
				}
			</script>

			<script>
				function gototuteepage(id) {
					document.getElementById("tuteeid").value = id;
					document.getElementById("tuteedata").submit();
				}
			</script>

			<script>
				var input = document.getElementById("searchbar");
				input.addEventListener("keydown", function(event) {
					if (event.keyCode === 13) {
						event.preventDefault();
					}
				});
			</script>

			<script>
				function showRowsBySearch(str) {
					var filtervalue = document.getElementById("year").value;

					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("StudentsInfo").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET", "SearchedTutee.php?search=" + str + "&filter=" + filtervalue, true);
					xmlhttp.send();
				}
			</script>

			<script>
				function showRowsByFilter(filtervalue) {
					var str = document.getElementById("searchbar").value;

					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("StudentsInfo").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET", "SearchedTutee.php?search=" + str + "&filter=" + filtervalue, true);
					xmlhttp.send();
				}
			</script>
	</body>
</html>