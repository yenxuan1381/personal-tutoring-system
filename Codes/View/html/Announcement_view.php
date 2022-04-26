<!DOCTYPE html>
<html lang="en">
	
	<head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <title>Nottingham Tutor 2.0</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="Announcement_view.css">
    </head>
	
	<body>
		<aside>
            <div class="header">
                <div class="logo">
                    <img src="./image/logo1.png" alt="" >
                    <span class="title">Nottingham Tutor 2.0</span>
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
                <a href="loginpage.php">
                    <span class="title">Logout</span>
                    <ion-icon name="log-out"></ion-icon>
                </a>
            </div>
        </aside>
		<main>
		<?php 
            $rows = $result
		?>
			<div class="background">
					<div class="background-image"></div>
					<div class="title-container">
						<span class="title"><?php echo $rows['title']?></span>
					</div>
					<div class="Annoucement-container">
						<div class="from-container">
							<span class="from">From:</span>
							<span class="tutor"><?php echo $rows['tutor_name']?></span>
						</div>
						<div class="Annoucement-info">
							<h3><pre><?php echo $rows['content']?></pre></h3>
						</div>
					</div>
					<div class="Comment-container">
						<div class="comment">
							<p>
							<?php
								while($rows=$result1->fetch_assoc())
								{   
									echo "<span style='color:blue;font-weight:bold;font-size:25px'>",$rows['user_name'],"</span>: ",$rows['content'],"<br><br>";	
								} 
							?> 
							</p>
						</div>
							<div class="container1">
								<form  method="POST" onsubmit="return confirm('Are you sure you want to comment?');">	
								<textarea type="text" id="text_id" name="text" class="input" placeholder="Write a comment"></textarea>							
								<button  class='primaryContained float-right' type="submit">Add Comment</button>
								</form>
							</div>
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

