<?php
	session_start();

	include_once('Connection.php');
	
	error_reporting(0);
	
	// If haven't login, then change to login page
	if((!(isset($_SESSION['userid']))) or ($_SESSION['category'] != "Admin"))
	{
		header("Location:Loginpage.php");
	}
	
	$add = $_POST['add'];
	$edit = $_POST['edit'];
	$delete = $_POST['delete'];
	$oldcode = $_POST['modulecode'];
	$_SESSION['error']=0;
	$code = $_POST['code'];
	$acadplan = $_POST['acadplan'];
	$school = $_POST['school'];
	
	$codebeforeedit = $_POST['codebeforeedit'];
	
	if(!($oldcode == null))
	{
		$oldmodule = mysqli_query($conn, 'SELECT * FROM `academic plan codes` WHERE Code LIKE "'.$oldcode.'"') or die('Get a Module error');
		$oldmoduledata = mysqli_fetch_array($oldmodule, MYSQLI_ASSOC);
	}
	
	if(isset($add))
	{
		if(!($modulequery = mysqli_query($conn, 'INSERT INTO `academic plan codes` (`Code`, `Academic Plan`, `School`) VALUES ("'.$code.'", "'.$acadplan.'", "'.$school.'")')))
		{
			$_SESSION['error']=1;
			//header("Location:AfterEdit.php");
		}
		else
		{
			$_SESSION['error']=2;
			//header("Location:AfterEdit.php");
		}
		
	}
	else if(isset($edit))
	{
		if(!($modulequery = mysqli_query($conn, 'UPDATE `academic plan codes` SET `Code` ="'.$code.'",`Academic Plan` = "'.$acadplan.'", `School` = "'.$school.'" WHERE Code LIKE "'.$codebeforeedit.'"')))	
		{
			$_SESSION['error']=3;
			//header("Location:AfterEdit.php");
		}
		else
		{
			$_SESSION['error']=4;
			//header("Location:AfterEdit.php");
		}		

	}
	else if(isset($delete))
	{
		if(!($modulequery = mysqli_query($conn, 'DELETE FROM `academic plan codes` WHERE `Code` LIKE "'.$codebeforeedit.'"')))
		{
			$_SESSION['error']=5;
			//header("Location:AfterEdit.php");
		}
		else
		{
			$_SESSION['error']=6;
			//header("Location:AfterEdit.php");	
		}
	}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="vieport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="image/icon.png" sizes="16x16">
        <title>NOTTSTUTOR</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="newmodulepage.css">
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
                    <span class="title">Module</span>
                </div>
                <div class="content-container">
					<div class="panel-wrapper">
						<div class="panel-head">	
							<form id="modulesform" action="" method="POST">
								<span><b>Code:</b></span><br>
								<input type="text" id="code" name="code" value="<?php echo $oldmoduledata['Code'] ?>" placeholder="Code..."/>
								<input type="hidden" name="codebeforeedit" value="<?php echo $oldmoduledata['Code'] ?>" />
								<br /><br />
								<span><b>Academic Plan:</b></span><br>
								<input type="text" id="acadplan" name="acadplan" value="<?php echo $oldmoduledata['Academic Plan'] ?>" placeholder="Academic Plan..." />
								<br /><br />
								<span><b>School:</b></span><br>
								<input type="text" id="school" name="school" value="<?php echo $oldmoduledata['School'] ?>" placeholder="School..." />
								<br /><br />
								<?php
								if($oldcode == null)
								{
										

									echo '<input type="hidden" name="add" value="1" />';
									echo '<input type="button" value="Add module" onclick="toadd()" />';
								}
								else
								{
		
									echo '<input type="hidden" id="editordelete" name="" value="1" />';
									echo '<input type="button" value="Edit module" onclick="toedit()" />';
									echo '<input type="button" value="Delete module" onclick="todelete()" />';
								}
								?>
							</form>
				
							<!-- form to go back to module page-->
							<form id="alldata" action="Modulespage.php" method="POST"></form>
						</div>
						<?php
							if(isset($add) or isset($edit) or isset($delete))
							{
								echo '<script>document.getElementById("alldata").submit();</script>';
							}
						?>
					</div>
                </div>
                <div class="back-button">
                    <a href="Modulespage.php">
                        <ion-icon name="arrow-back"></ion-icon>
                    </a>
                </div>
            </div>
        </main>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<script>
		function goback()
		{
			document.getElementById("alldata").submit();
		}
		</script>

		<script>
		function toadd()
		{
			if (document.getElementById("code").value == "")
			{
				window.alert("Error: Code cannot be empty");
			}
			else if (document.getElementById("acadplan").value == "")
			{
				window.alert("Error: Academic plan cannot be empty");
			}
			else if (document.getElementById("school").value == "")
			{
				window.alert("Error: School cannot be empty");
			}
			else
			{
				document.getElementById("modulesform").submit();
			}
		}
		</script>

		<script>
		function toedit()
		{
			if (document.getElementById("code").value == "")
			{
				window.alert("Error: Code cannot be empty");
			}
			else
			{
			document.getElementById("editordelete").name = "edit";
			document.getElementById("modulesform").submit();	
			}
		}
		</script>

		<script>
		function todelete()
		{
			document.getElementById("editordelete").name = "delete";
			document.getElementById("modulesform").submit();
		}
		</script>
    </body>
</html>

