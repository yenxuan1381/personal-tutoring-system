<?php include 'sendEmail.php'; ?>

<!DOCTYPE html>
 <html>
  <head>
	<link rel="stylesheet" href="default.css">
  <link rel="stylesheet" href="contactform.css">
    <title> Contact Us </title>
  </head>

<body>
<!-- Start Menu -->
<div class="nav-btn">Menu</div>
	<div class="container">
		<div class="sidebar">

			<nav>
				<a href="#">Notts<span>Tutor</span></a>
				<ul>
					<li><a href="StudentView.php">List</a></li>
					<li><a href="Loginpage.php">Log Out</a></li>
				</ul>

			</nav>

		</div>
    <!-- End Menu -->
    <!-- Contact Us form -->
    <div class="main-content">
		<h3><b>Contact Us</b></h3><br>
        <!--notify messages start-->
         <?php echo $notify; ?>
        <!--notify messages end-->
        <form class="contact" method="post"> 
          <label for="name">Full Name</label><br>
          <input type="text" name="name" placeholder="Your Name.." style="font-size: 16px" autocomplete="none">
          <?php echo $NameError; ?>
          <br>
          <label for="email">Email</label><br>
          <input type="text" name="email" placeholder="Your Email.." style="font-size: 16px">
          <?php echo $EmailError;?>
          <br>
          <label for="message">Message</label><br>
          <textarea name="message" placeholder="Your Message.." rows=10 cols="50" required style="font-size: 16px"></textarea><br>
          <input type="submit" name="submit" class="send-btn" value="Send">
		</form>
    <!-- End of Contact Us form -->

</body>
</html>