<?php 


	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require('vendor/phpmailer/phpmailer/PHPMailerAutoload.php');
		require_once('vendor/phpmailer/phpmailer/class.phpmailer.php');
		//echo "I have information from a form. Now what?";
		//var_dump($_POST);
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$message = trim($_POST["message"]);
		$address = trim($_POST["address"]);
		$error = [];

		//verification:
		if($name == "" || $email == "" || $message == "") {
			$error[] = "You must specify a value for name, email, and message.";
		}

		//email header injection exploit:
		//http://nyphp.org/phundamentals/8_Preventing-Email-Header-Injection
		foreach ($_POST as $value) {
			if(stripos($value, 'Content-Type:') != FALSE){
				$error[] = "There was a problem with the informaiton you entered.";
			}
		}

		//"honeypot field": 
		//have a invisible input field to allow robots fill in value whereas normal users wouldn't be able to do so.
		//https://solutionfactor.net/blog/2014/02/01/honeypot-technique-fast-easy-spam-prevention/
		if($address != ""){
			$error[] = "Your form submission has an error.";
		}

		if(count($error) > 0){
			echo implode($error);
			exit();
		}

		$mail = new PHPMailer();

		if(!$mail -> ValidateAddress($email)){
			echo "You must specify a valid email address.";
			exit();
		}

		$email_body = "";
		$email_body = $email_body .  "Name: " . $name . "<br />";
		$email_body = $email_body .   "Email: " . $email . "<br />";
		$email_body = $email_body .   "Message: " . $message . "<br />";

		$recipient_email = "yuahwen.cheng@gmail.com";

	  	$mail = new PHPMailer(); // create a new object
	    $mail->IsSMTP(); // enable SMTP
	    $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	    $mail->SMTPAuth = true; // authentication enabled
	    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
	    $mail->Host = "smtp.gmail.com";
	    $mail->Port = 465; // or 587
	    $mail->IsHTML(true);
	    $mail->Username = $recipient_email;
	    $mail->Password = "XXX";
	    $mail->SetFrom($email, $name);
	    $mail->Subject = "Shirts 4 Mike Contact Form Submission | " . $name;
	    //$mail->Body = $email_body;
	    $mail->msgHTML($email_body);
	    $mail->AddAddress($recipient_email);

	    if(!$mail->Send())
        {
        	echo "Mailer Error: " . $mail->ErrorInfo;
			$log->pushHandler(new StreamHandler('log/log_'.$section.'.txt', Logger::ERROR));
			$log->addERROR( $mail->ErrorInfo);
			exit();
        }
        else
        {
			header("Location: contact.php?status=thanks");
        } 
		exit;
	}
	
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
							<label for="reason" >Reason for Inquiry</label>
						</th>
						<td>
							<select name="reason" id="reason"> 
								<option>-Select-</option>
								<option>T-Shirts</option>
								<option>Order Status</option>
								<option>Shipping Status</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="message" >Message</label>
						</th>
						<td>
							<textarea name="message" id="message" rows="5"> </textarea>
							
						</td>
					</tr>
					<tr style="display:none;">
						<th>
							<label for="address">Address</label>
						</th>
						<td>
							<input type="text" name="address" id="address" />
							<p>Humans (and frogs): please leave this field blank.</p>
						</td>
					</tr>
				</table>
				<input type="submit" value="Send"/>
			</form>
		<?php } ?>
	</div>
<?php include('inc/footer.php'); ?>