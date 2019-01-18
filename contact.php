
	<?php
	include ('header.php');
	?>

	<div id="page-parent1">
	<h1>Oh, you want to contact us?</h1>
		<center>
			<p id="page-p2">
			Is there anything wrong? Well please tell us if that's the case! Here's how to reach us:
			</p>
		</center>
	</div>

	<?php
	$email;
	$email = htmlentities($email);
	//Protects all html enteties to be added.
	//It will not execute special signs.
	//Mostly on ALL user inputs. 


	?>

	<div class="contact-container">
  		<!-- <form action="action_page.php"> -->
			 <center>
			 	<label for="fname">First Name</label>
    		 	<input type="text" class="name-box" name="firstname" placeholder="Your name...">
    		 </center>

			 <center>
			 	<label for="lname">Last Name</label>
   				<input type="text" class="name-box" name="lastname" placeholder="Your last name...">
			</center>

			<center>
				<label id="subject-text" for="subject"> Whatever is wrong, write it here ♥</label>
			</center>

  			<center>
    			<textarea id="subject-box" name="subject" placeholder="Write something..."> </textarea>
			</center>

			<center>
				<input id="contact-submit" type="submit" value="All done">
			</center>
	</div>


	<?php include ('footer.php');
	?>
