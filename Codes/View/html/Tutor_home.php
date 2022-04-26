<!DOCTYPE html>
<html lang="en">

    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/Tutor_home.css">
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
							if ($isSeniorTutor) {
								echo '<h3><b>Senior Tutor Page of ' . $tutor_info['Name'] . '</b></h3>';
								echo '<h3><b> Your School: </b>' . $tutor_info['School'] . '</h3';
							} else {
								echo '<h3><b>Tutor Page of ' . $tutor_info['Name'] . '</b></h3>';
								echo '<h3><b> Your School: </b>' . $tutor_info['School'] . '</h3';
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
											if ($changeList) {
												echo '<th>Tutor</th>';
												echo '<th>Change Tutor</th>';
											}
											?>
										</tr>
									</thead>
									<tbody>
										<?php
										if ($changeList) {
                                            $displaylist = $all_list;
										} else {
											$displaylist = $student_list;
										}
										while ($rows = mysqli_fetch_array($displaylist, MYSQLI_ASSOC)) {
										?>
											<tr>
												<?php
												// main student's information
												echo '<td><a onclick="gototuteepage(' . $rows['Student Id'] . ')" style="cursor: pointer">' . $rows['Student Id'] . '</a></td>';
												echo '<td>' . $rows['Full Name'] . '</td>';

												// if is list of all tutees, display tutors and changing option
												if ($changeList) {
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
							if ($isSeniorTutor) {
								if ($changeList) {
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
													while ($rows = mysqli_fetch_array($tutor_list)) {
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