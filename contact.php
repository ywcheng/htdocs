<?php 

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		//echo "I have information from a form. Now what?";
		//var_dump($_POST);
		$name = $_POST["name"];
		$email = $_POST["email"];
		$message = $_POST["message"];
		$email_body = "";
		$email_body = $email_body .  "Name: " . $name . "\n";
		$email_body = $email_body .   "Email: " . $email . "\n";
		$email_body = $email_body .   "Message: " . $message . "\n";
		//echo $email_body;
		//$pageTitle = "Contact Mike";
		//$section = "contact";
		header("Location: contact.php?status=thanks"); 
		exit;
	}
?>
<?php 
	$pageTitle = "Contact Mike";
	$section = "contact";
	include('inc/header.php'); 
?>

	<div class="section page">

		<h1>Contact</h1>
		
		<?php if (isset($_GET["status"]) && $_GET["status"] == "thanks"){ ?>
			<p>Thanks for the email! I'll be in touch shortly.</p>
		<?php } else { ?>
		
			<p>I'd like to hear from you!<br/>Complete the form to send me and email.</p>
			<form method="post" action="contact.php">
				<table>
					<tr>
						<th>
							<label for="name" >Name</label>
						</th>
						<td>
							<input type="text" name="name" id="name"/>
						</td>
					</tr>
					<tr>
						<th>
							<label for="email" >Email</label>
						</th>
						<td>
							<input type="text" name="email" id="email"/>
						</td>
					</tr>
					<tr>
						<th>
							<label for="message" >Message</label>
						</th>
						<td>
							<input type="textarea" name="message" id="message"/>
						</td>
					</tr>
				</table>
				<input type="submit" value="Send"/>
			</form>
		<?php } ?>
	</div>
<?php include('inc/footer.php'); ?>