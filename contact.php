<?php 

	$error_messages = [];
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		require('vendor/phpmailer/phpmailer/PHPMailerAutoload.php');
		require_once('vendor/phpmailer/phpmailer/class.phpmailer.php');
		//echo "I have information from a form. Now what?";
		//var_dump($_POST);
		$name = trim($_POST["name"]);
		$email = trim($_POST["email"]);
		$message = trim($_POST["message"]);
		$address = trim($_POST["address"]);
		$reason = trim($_POST["reason"]);

		//verification:
		if($name == "" || $email == "" || $message == "") {
			$error_messages[] = "You must specify a value for name, email, and message.";
		}

		//email header injection exploit:
		//http://nyphp.org/phundamentals/8_Preventing-Email-Header-Injection
		if(count($error_messages) == 0){
			foreach ($_POST as $value) {
				if(stripos($value, 'Content-Type:') != FALSE){
					$error_messages[] = "There was a problem with the informaiton you entered.";
				}
			}
		}

		//"honeypot field": 
		//have a invisible input field to allow robots fill in value whereas normal users wouldn't be able to do so.
		//https://solutionfactor.net/blog/2014/02/01/honeypot-technique-fast-easy-spam-prevention/
		if(count($error_messages) == 0 && $address != ""){
			$error_messages[] = "Your form submission has an error.";
		}

		$mail = new PHPMailer();

		if(count($error_messages) == 0 && !$mail -> ValidateAddress($email)){
			$error_messages[] = "You must specify a valid email address.";
		}

		if(count($error_messages) == 0){
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
	        	$error_messages[] = "Mailer Error: " . $mail->ErrorInfo;

				require 'vendor/autoload.php'; 
				date_default_timezone_set('Asia/Taipei');
				//redirect based on 
			//	$app = new \Slim\Slim();
			//	$app->get('/contact', function() use ($app) {
			//      $app->response->redirect('contact.php');
			//	});
			//	$app->get('/shirts', function() use ($app) {
			//      $app->response->redirect('shirts.php');
			//	});
			//
			//	$app->get('/company', function() use ($app) {
			//      $app->response->redirect('company.php');
			//	});
			//
			//	$app->get('/', function() use ($app) {
			//      //$app->response->redirect('./');
			//	});
			//
			//	$app->get('/shirt', function() use ($app) {
			//      $app->response->redirect('shirt.php');
			//	});
			//
			//	$app->run();

				$log = new Monolog\Logger($section .'.php');

				//nameSpacing: how to make string usage shorter
				//use Monolog\Handler\StreamHandler;
				//use Monolog\Logger;		

				$log->pushHandler(new Monolog\Handler\StreamHandler('log/log_'.$section.'.txt', Monolog\Logger::ERROR));
				$log->addERROR($mail->ErrorInfo);
	        }
	        else
	        {
				header("Location: contact.php?status=thanks");
	        } 
		}
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
			<?php 
				if(count($error_messages) > 0){
					echo '<p class="message">';
					echo implode('<br />', $error_messages);
					echo '</p>';
				}
			?>
			<form method="post" action="contact.php">
				<table>
					<tr>
						<th>
							<label for="name" >Name</label>
						</th>
						<td>
							<input type="text" name="name" id="name" 
								value="<?php if(isset($name)) echo htmlspecialchars($name); ?>"
							/>
						</td>
					</tr>
					<tr>
						<th>
							<label for="email" >Email</label>
						</th>
						<td>
							<input type="text" name="email" id="email"
								value="<?php if(isset($email)) echo htmlspecialchars($email); ?>"
							/>
						</td>
					</tr>
					<tr>
						<th>
							<label for="reason" >Reason for Inquiry</label>
						</th>
						<td>
							<select name="reason" id="reason"> 
								<option <?php if(isset($reason) && $reason == "-Select-") echo 'selected="selected"'; ?>>-Select-</option>
								<option <?php if(isset($reason) && $reason == "T-Shirts") echo 'selected="selected"'; ?>>T-Shirts</option>
								<option <?php if(isset($reason) && $reason == "Order Status") echo 'selected="selected"'; ?>>Order Status</option>
								<option <?php if(isset($reason) && $reason == "Shipping Status") echo 'selected="selected"'; ?>>Shipping Status</option>
							</select>
						</td>
					</tr>
					<tr>
						<th>
							<label for="message" >Message</label>
						</th>
						<td>
							<textarea name="message" id="message" rows="5"><?php if(isset($message)) echo htmlspecialchars($message); ?></textarea>
							
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