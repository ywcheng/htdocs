<?php 
	require_once('../inc/config.php');
	require_once (ROOT_PATH . 'inc/products.php');
	include(ROOT_PATH . 'inc/header.php');
	$pageTitle = "Mike 4 Shirts"; 
	$section = "shirts"; 
?>
<div class="section shirts page">
	<div class="wrapper">
		<h1>Mike's Full Catalog of Shirts</h1>
		<ul class="products ">
			<?php 
				$all = get_products_all();
				foreach ($all as $value) {
					echo get_list_view_html($value);
				}
			?>
		</ul>
	</div>
</div>

<?php include(ROOT_PATH . 'inc/footer.php'); ?>