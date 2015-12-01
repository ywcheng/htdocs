<html>
<head>
	<title><?php if(isset($pageTitle)) echo $pageTitle; ?></title>
	<link rel="stylesheet" href="/css/style.css" type="text/css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700" type="text/css">
	<link rel="shortcut icon" href="favicon.ico">
</head>
<body>
	<div class="header">

		<div class="wrapper">

			<h1 class="branding-title"><a href="/">Shirts 4 Mike</a></h1>

			<ul class="nav">
				<?php require_once("config.php"); ?>
				<li class="shirts <?php if(isset($section) && $section == "shirts") echo "on"; ?>"><a href="<?php echo BASE_URL; ?>shirts/">Shirts</a></li>
				<li class="search <?php if(isset($section) && $section == "search") echo "on"; ?>"><a href="<?php echo BASE_URL; ?>search/">Search</a></li>
				<li class="contact <?php if(isset($section) && $section == "contact") echo "on"; ?>"><a href="<?php echo BASE_URL; ?>contact/">Contact</a></li>
				<li style="display:none;" class="contact <?php if(isset($section) && $section == "company") echo "on"; ?>"><a href="<?php echo BASE_URL; ?>company/">Company</a></li>

				<li class="cart"><a  target="paypal" href="https://www.paypal.com/cgi-bin/webscr?cmd=_cart&amp;business=PVEEL3VPF9UB2&amp;display=1">

					Shopping Cart</a></li>
			</ul>

		</div>

	</div>
	<div id="content">
		