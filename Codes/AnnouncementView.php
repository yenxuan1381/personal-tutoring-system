<?php
	session_start();

	include_once('Connection.php');

	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or (($_SESSION['category'] != "Tutor") and ($_SESSION['category'] != "Student")))
	{
		header("Location:Loginpage.php");
	}

	$userid = $_SESSION['userid'];
	
	if(isset($_POST['id'])){
		$_SESSION['announcementid'] = $_POST['id'];
	}


	$announcementid = $_SESSION['announcementid'];

	
    $sql = "SELECT * FROM announcement WHERE announcement_id = '$announcementid';";
	$result = $conn->query($sql);	
	$sql1 = "SELECT * FROM comment WHERE announcement_id = '$announcementid';";	
	$result1 = $conn->query($sql1);	
	if($_SESSION['category']=="Student"){
		$sql2 = "SELECT name FROM tutors WHERE `Lect ID` = (SELECT `Tutor Id` FROM students WHERE `Student Id` ='$userid')";
		$sql3 = "SELECT `Full Name` FROM students WHERE `Student Id` = '$userid'";
		$result3 = $conn->query($sql3);	
		while($rows=$result3->fetch_assoc())
		{
			$studentname = $rows['Full Name'];
		}
	}
	elseif($_SESSION['category']=="Tutor"){
		$sql2 = "SELECT name FROM tutors WHERE `Lect ID` = $userid";
	}
	$result2 = $conn->query($sql2);	
	while($rows=$result2->fetch_assoc())
	{
		$tutorname = $rows['name'];
	}	
	
	if(isset($_POST['text'])){
		$comment = $_POST['text'];
		if($_SESSION['category']=="Tutor"){
			$sql = "INSERT INTO comment (user_name,announcement_id,content) VALUES ('$tutorname','$announcementid','$comment')";
		}
		elseif($_SESSION['category']=="Student"){
			$sql = "INSERT INTO comment (user_name,announcement_id,content) VALUES ('$studentname','$announcementid','$comment')";
		}
		
				
		if(mysqli_query($conn, $sql)){
			header("Location:Announcementview.php");
		} 
		else {
    			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
	}

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="default.css">

		<title>
			Tutors
		</title>

		<style>
		.close
		{
			position:absolute;
			transition:all 500ms;
			top:20px;
			right:30px;
			font-size:30px;
			font-weight:bold;
			text-decoration:none;
			color:black;
		}

		.overlay
		{
			position:fixed;
			top:0;
			bottom:0;
			left:0;
			right:0;
			background:rgba(0,50,75,0.7);
			transition:all 500ms;
			visibility:hidden;
			opacity:0;
		}

		.overlay:target
		{
			visibility:visible;
			opacity:1;
		}

		.popupchange
		{
			margin:225px auto;
			padding:15 30 30;
			background:white;
			border-radius:5px;
			width:19%;
			height:25%;
			position:relative;
			transition:all 5s ease-in-out;
		}

		.popupconfirm
		{
			margin:225px auto;
			padding:15 30 30;
			background:white;
			border-radius:5px;
			width:17%;
			height:25%;
			position:relative;
			transition:all 5s ease-in-out;
		}
        .container1 {
            position:absolute;
	        max-width: 900px;
	        top:400px;
            left:260px;
	        background: #fff;
	        border-radius: 8px;
	        padding: 20px;
        }
        .comment {
            display: block;
			min-height: 0px;
            border: 1px solid #eee;
            border-radius: 5px;
            padding: 5px 10px
            
        }
        .container1 textarea {
            width: 100%;
            border: none;
            background: #E8E8E8;
            padding: 5px 10px;
            height: 50%;
            border-radius: 5px 5px 0px 0px;
            border-bottom: 2px solid #016BA8;
            transition: all 0.5s;
            margin-top: 15px;
        }
        button.primaryContained {
            background: #016ba8;
            color: #fff;
            padding: 10px 10px;
            border: none;
            margin-top: 0px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 4px;
            box-shadow: 0px 2px 6px 0px rgba(0, 0, 0, 0.25);
            transition: 1s all;
            font-size: 10px;
            border-radius: 5px;
        }
		button.primaryContained:hover {
			background: #9201A8;
		}

		pre.ex1 {
  			margin-left: 275px;
		}
		</style>

	</head>
	<!-- Start Menu -->
	<div class="nav-btn">Menu</div>
	<div class="container">
		<div class="sidebar">
			<?php
				if($_SESSION['category']=="Tutor"){
					echo '<nav>
					<a href="#">Nottingham <span>Tutor System</span></a>
					<ul>
						<li><a href="tutorpage.php">Tutees</a></li>
						<li><a href="Search.php">Search</a></li>
						<li><a href="Loginpage.php">Log Out</a></li>
					</ul>
	
					</nav>';
				}
				elseif($_SESSION['category']=="Student"){
					echo '<nav>
					<a href="#">Notts<span>Tutor</span></a>
					<ul>
						<li><a href="StudentView.php">List</a></li>
						<li><a href="Loginpage.php">Log Out</a></li>
					</ul>
	
					</nav>';
				}
			?>
		</div>

	<!-- End Menu -->

    <body>
        <?php
            while($rows=$result->fetch_assoc())
            {   
                echo str_repeat('&nbsp;', 57);
                echo "<u>",$rows['title'],"</u>";
                echo "<br><br>"; 
                echo str_repeat('&nbsp;', 57);
                echo "-by ",$rows['tutor_name'];
                echo str_repeat('<br>', 6);
                echo str_repeat('&nbsp;', 57);
                echo "<pre class='ex1'>",$rows['content'],"</pre>";
                    
            } 
        ?>
    </body>
    <section id="app">
    <div class="container1">
      <div class="row">
        <div class="col-6">
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
        </div>
      <div class="row">
        <div class="col-6">
			<form  method="POST" onsubmit="return confirm('Are you sure you want to comment?');">	
      			<textarea type="text" id="text_id" name="text" class="input" placeholder="Write a comment"></textarea>
          		<button  class='primaryContained float-right' type="submit">Add Comment</button>
			</form>
        </div>
      </div>
    </div>
  </section>
    </html>

