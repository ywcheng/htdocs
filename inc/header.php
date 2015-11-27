<html>
<head>
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="/css/style.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
	<div class="header">

		<div class="wrapper">

			<h1 class="branding-title"><a href="/">Shirts 4 Mike</a></h1>

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
							//$output .= BASE_URL;
							//$output .= '#';
							$output .= $item; 
							if($item == "shirts") $output .= "/";
							else $output .= '.php';
							$output .= '">';
							$output .= ucfirst($item);
							$output .='</a></li>';
						}
						echo $output;
					}else{ ?>
						<li class="shirts"><a href="/shirts.php">Shirts</a></li>
						<li class="contact"><a href="/contact.php">Contact</a></li>
				<?php	}?>
				<li class="cart"><a  target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=PVEEL3VPF9UB2&amp;display=1">

					Shopping Cart</a></li>
			</ul>

		</div>

	</div>
	<div id="content">
		