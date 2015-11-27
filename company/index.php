<?php
	$pageTitle = "Company Information"; 
	$section = "company";

	require_once('../inc/config.php');
	require_once (ROOT_PATH . 'inc/products.php');
	include(ROOT_PATH . 'inc/header.php');
?>
<div class="section shirts page">
	<div class="wrapper">
		<h1>Company Information</h1>
		<h2>mission statement</h2>
		<p>paragrah</p>
		<?php  
			////for logger:
			//check ./vendor/composer/monolog/monolog/src/Logger.php for available functions and fields
			//$log = new Monolog\Logger($section.'.php');

			////nameSpacing: how to make string usage shorter
			//use Monolog\Handler\StreamHandler;
			//use Monolog\Logger;

			//$log->pushHandler(new StreamHandler('log/log_'.$section.'.txt', Logger::WARNING));
			//$log->addWarning('warning from '. $section . '.php');
			//$log->pushHandler(new StreamHandler('log/log_'.$section.'.txt', Logger::ERROR));
			//$log->addERROR('error msg from ' . $section. '.php');
		
			//try if Slim works:
			//http://localhost:8888/company.php/hello/shirts.php
			//$app = new \Slim\Slim();
			//$app->get('/hello/:name', function ($name) {
			    //echo "Hello, $name";
			//});
			//$app->run();
		?>
	</div>
</div>

<?php include(ROOT_PATH . 'inc/footer.php'); ?>