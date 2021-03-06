<?php 
	$pageTitle = "Unique T-shirts designed by a frog";
	$section = "index";
	include('inc/header.php'); 
	require_once('inc/config.php');
	include("inc/products.php");
?>
<div class="section banner">

	<div class="wrapper">

		<img class="hero" src="/img/mike-the-frog.png" alt="Mike the Frog says:">
		<div class="button">
			<a href="shirt.php?id=102">
				<h2>Hey, I&rsquo;m Mike!</h2>
				<p>Check Out My Shirts</p>
			</a>
		</div>
	</div>
</div>

<div class="section shirts latest">

	<div class="wrapper">

		<h2>Mike&rsquo;s Latest Shirts</h2>

		<ul class="products">
			<?php 	
				$recent = get_products_recent();
				foreach ($recent as $value) {
					echo get_list_view_html($value);
				}
			?>				
		</ul>

	</div>
</div>
<?php include('inc/footer.php'); ?>
