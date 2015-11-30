<?php
	include("../inc/config.php");
	$pageTitle = "Search";
	$section = "search";
	include(ROOT_PATH . "inc/header.php");

	$searchTerm ="";
	if(isset($_GET["s"])){
		$searchTerm = trim($_GET["s"]);
		if($searchTerm != ""){
			require_once(ROOT_PATH . "inc/products.php");
			$products = get_products_search($searchTerm);		}
	}
?>
<div class="section shirts search page">
	<div class="wrapper">
		<h1>Search</h1>
		<form method="get" action="./">
			<input type="text" name="s" value="<?php if($searchTerm != "") echo htmlspecialchars($searchTerm); ?>"/>
			<input type="submit" value="Go" />
		</form>
		<?php
			if($searchTerm != ""){
				if(!empty($products)){
					echo '<ul class="products">';
					foreach ($products as $product) {
						echo get_list_view_html($product);
					}
					echo '</ul>';
				}else {
					echo '<p>No products were found matching that search term.</p>';
				}
			}
		?>
	</div>
</div>

<?php include(ROOT_PATH . "inc/footer.php"); ?>