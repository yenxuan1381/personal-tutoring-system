<?php
	session_start();
	
	include_once('Connection.php');
	
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Admin"))
	{
		header("Location:Loginpage.php");
	}
	
	$whichschool = $_SESSION['whichschool'];
	
	// Query to look for the current school association
	$schoolquery = mysqli_query($conn,'SELECT DISTINCT School FROM `academic plan codes`') or die('school error');
	$school = mysqli_fetch_array($schoolquery, MYSQLI_ASSOC);
	
	
	// Query to look for all modules
	$allmodulequery = 'SELECT * FROM `academic plan codes`';
	
	// Query to look for specific schools
	$specificmodulequery = 'SELECT * FROM `academic plan codes` WHERE school LIKE "'.$whichschool.'"';
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta name="vieport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="modulespage.css">
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
					}else{
						require_once "sidebar_admin.php";
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
					<span class="title">Modules</span>
				</div>
				<div class="content-container">
					<div class="search-container">
						<form action="" method="post">
							Search: <input type="text" id="searchbar" name="search" placeholder="Code or Academic Plan" onkeyup="showRows(this.value)">
						</form>
						<div id="ModulesInfo" class="table-wrapper">
							<table class="fl-table">
								<thead>
									<tr>
										<th>Code</th>
										<th>Academic Plan</th>
										<?php
											if($whichschool == "all")
											{
												echo '<th>School</th>';
											}
										?>
									</tr>
								</thead>
								<tbody>
									<?php
										if($whichschool == "all")
										{
											$display = $allmodulequery;
										}
										else
										{
											$display = $specificmodulequery;
										}
										$displaylist = mysqli_query($conn,$display) or die('modules error');
										while($rows = mysqli_fetch_array($displaylist,MYSQLI_ASSOC))
										{
									?>
									<tr>
									<?php
										// main code's information
										echo '<td><a onclick="gotomoduleeditpage(\''.$rows['Code'].'\')" style="cursor: pointer">'.$rows['Code'].'</a></td>';
										echo '<td>'.$rows['Academic Plan'].'</td>';
										
										// if is list of all school, display school as well
										if($whichschool == "all")
										{
											echo '<td>'.$rows['School'].'</td>';
										}
									?>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="function-icon">
					<form id="newmodule" action="Newmodulepage.php" method="POST">
						<input type="hidden" id="modulecode" name="modulecode" value="" />	
						<button class="add" value="Add new module" onclick="gotomoduleeditpage(null)"><ion-icon name="add-circle"></ion-icon></button>
					</form>
                </div>
			</div>
		</main>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script>
		var input = document.getElementById("searchbar");
		input.addEventListener("keydown", function(event) 
		{
		if (event.keyCode === 13) 
		{
			event.preventDefault();
		}
		});
		</script>

		<script>
		function gotomoduleeditpage(id)
		{
			if(id == null)
			{
				document.getElementById("newmodule").submit();
			}
			else
			{
				document.getElementById("modulecode").value = id;
				document.getElementById("newmodule").submit();
			}
		}
		</script>

		<script>
		function showRows(str) 
		{
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() 
			{
			if (this.readyState == 4 && this.status == 200) 
			{
				document.getElementById("ModulesInfo").innerHTML = this.responseText;
			}
			};
			xmlhttp.open("GET", "SearchedModule.php?search=" + str, true);
			xmlhttp.send();
		}
		</script>
	</body>
</html>



	