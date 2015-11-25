<?php 
	$pageTitle = "Unique T-shirts designed by a frog";
	$section = "index";
	include('inc/header.php'); 
	
?>

<div class="section banner">

	<div class="wrapper">

		<img class="hero" src="img/mike-the-frog.png" alt="Mike the Frog says:">
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
				include("inc/products.php");
				$total_products = count($products);
				$position = 0;
				foreach($products as $product_id => $product) { 
					$position++;
					if($total_products - $position < 4)
						echo get_list_view_html($product_id, $product);
				}
			?>				
		</ul>

	</div>
</div>
<?php include('inc/footer.php'); ?>
