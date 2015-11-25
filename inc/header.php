<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
	<div class="header">

		<div class="wrapper">

			<h1 class="branding-title"><a href="./">Shirts 4 Mike</a></h1>

			<ul class="nav">
				<?php
					if(isset($section)){
						$items = array('shirts', 'contact', 'company');
						$output = "";
						foreach ($items as $item) {

							$output .= '<li class="';
							$output .= $item;
							if($section == $item)
								$output .= ' on';
							$output .= '"><a href="';
							//$output .= '#';
							$output .= $item; 
							$output .= '.php';
							$output .= '">';
							$output .= ucfirst($item);
							$output .='</a></li>';
						}
						echo $output;
					}else{ ?>
						<li class="shirts"><a href="shirts.php">Shirts</a></li>
						<li class="contact"><a href="contact.php">Contact</a></li>
				<?php	}?>
				<li class="cart"><a  target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=PVEEL3VPF9UB2&amp;display=1">

					Shopping Cart</a></li>
			</ul>

		</div>

	</div>
<?php 
	require 'vendor/autoload.php'; 
	date_default_timezone_set('Asia/Taipei');				
?>
<?php 
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

	$log = new Monolog\Logger($section.'.php');

	//nameSpacing: how to make string usage shorter
	use Monolog\Handler\StreamHandler;
	use Monolog\Logger;	
?>

	<div id="content">
		