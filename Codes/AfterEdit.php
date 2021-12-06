<?php 

	session_start();

	$error=$_SESSION['error'];



	if($error==1)
	{
	
		echo "An error has occurred. Please try again!";
		
	}

	else if($error==2)
	{
		echo "A new module has been added.";
	}

	else if($error==3)
	{
		echo "An error has occurred. Please try again!";
	}

	else if($error==4)
	{
		echo "The module has been edited.";
	}


	else if($error==5)
	{
		echo "The module can't be deleted as it is still being used.";
	}


	else if($error==6)
	{
		echo "The module has been deleted.";
	}


?>

<html>

	<button id="myBtn">Redirect</button>

</html>

<script>
	var btn = document.getElementById('myBtn');
	btn.addEventListener('click', function() {
  	document.location.href = 'Modulespage.php';
	});
</script>