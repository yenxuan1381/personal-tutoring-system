<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="vieport" content="width=device-width, initial-scale=1.0">
		<link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="./View/html/style.css">
        <link rel="stylesheet" type="text/css" href="./View/html/module_view.css">
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
						<!-- Form to search for module -->
						<div class="search">
                    		<input type="text" id="myInput" onkeyup="filterSearch()" placeholder="Search Module...">
                    		<ion-icon name="search-outline"></ion-icon>
                		</div>
						<div id="ModulesInfo" class="table-wrapper">
							<table id="myTable" class="fl-table">
								<thead>
									<tr class="top">
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
											$displaylist = $allmodule;
										}
										else
										{
											$displaylist = $specificmodule;
										}
										while($rows = mysqli_fetch_array($displaylist,MYSQLI_ASSOC))
										{
									?>
									<tr>
									<?php
										// Main code's information
										echo '<td><a onclick="gotomoduleeditpage(\''.$rows['Code'].'\')" style="cursor: pointer">'.$rows['Code'].'</a></td>';
										echo '<td>'.$rows['Academic Plan'].'</td>';
										
										// If is list of all school, display school as well
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
	</body>
</html>

