<?php 
	require_once('../inc/config.php');
	require_once (ROOT_PATH . 'inc/products.php');

	//retrieve current page number from query string: set to 1 if blank;
	if(empty($_GET["pg"])){
		$current_page = 1;
	}else $current_page = $_GET["pg"];

	//set strings like "frog" to 0; remove decimals
	intval($current_page);

	$total_products = get_products_count();
	$product_per_page = 8;
	$total_pages = ceil($total_products/ $product_per_page);

	//redirect too-large page numbers to the last page
	if($current_page > $total_pages){
		header("Location:./?pg=" . $total_pages);
	}
	
	//refiect too-small page numbers (or stirng convered to 0) to the first page
	if($current_page < 1){
		header("Location:./");
	}

	//determine the start and end shirts for the current page; for example, on
	//page 3 with 8 shirts per page, $start and $end would be 17 and 24
	$start = (($current_page - 1) * $product_per_page) + 1;
	$end = $current_page * $product_per_page;

	if($end > $total_products) $end = $total_products;

//	echo "<pre>";
//	echo "Total products: " . $total_products;
//	echo "<br />";
//	echo "Total pages: " . $total_pages;
//	echo "<br />";
//	echo "Current page: " . $current_page;
//	echo "<br />";
//	exit();

	$products = get_products_subset($start, $end);


	$pageTitle = "Mike 4 Shirts"; //should be above header to set $pageTitle
	include(ROOT_PATH . 'inc/header.php');
	$section = "shirts"; 
?>
<div class="section shirts page">
	<div class="wrapper">
		<h1>Mike's Full Catalog of Shirts</h1>
		<?php include(ROOT_PATH . 'inc/partial-list-navigation.html.php'); ?>
		<ul class="products ">
			<?php 
				//$all = get_products_all();
				foreach ($products as $value) {
					echo get_list_view_html($value);
				}
			?>
		</ul>
		<?php include(ROOT_PATH . 'inc/partial-list-navigation.html.php'); ?>
	</div>
</div>

<?php include(ROOT_PATH . 'inc/footer.php'); ?>