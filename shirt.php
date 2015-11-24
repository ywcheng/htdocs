<?php include("inc/products.php");
	if(isset($_GET["id"])){
		$produdct_id = $_GET["id"];
		if (isset($products[$produdct_id])) {
			$product = $products[$produdct_id];
		}
	}

	if(!isset($product)) {
		exit(header("Location: shirts.php"));
	}

	$section = "shirts";
	$pageTitle = $product["name"];
	include("inc/header.php");
?>

<div class="section page">
	<div class="wrapper">
			<div class="breadcrumb">
				<a href="shirts.php">Shirts</a> &gt;
				<?php echo $product["name"]; ?>
			</div>
			<div class="shirt-picture">
				<span>
					<img src="<?php echo $product["img"]; ?>" alt="<?php echo $product["name"]; ?>"/>
				</span>
			</div>
			<div class="shirt-details">
				<h1>
					<span> 
						$<?php echo $product["price"]; ?>
					</span>
					<?php echo $product["name"]; ?>
					<p class="note-designer">
						All shirts are designed by Mike the Frog.
					</p>
				</h1>
				<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
					<input type="hidden" name="cmd" value="_s-xclick">
					<input type="hidden" name="hosted_button_id" value="<?php echo $product["paypal"]; ?>">
					<input type="hidden" name="item_name" value="<?php echo $product["name"] ?>">
					<table>
						<tr>
							<td>
								<input type="hidden" name="on0" value="Size">
								<label for="on0">Size</label>
							</td>
						</tr>
						<tr>
							<td>
								<select name="os0">
									<?php foreach ($product["sizes"] as $size) { ?>
										<option value="<?php echo $size; ?>"><?php echo $size; ?> </option>
									<?php }?>
								</select> 
							</td>
						</tr>
					</table>
					<input type="submit" value="Add to Cart" name="submit" />
				</form>
			</div>
	</div>
</div>
<?php
	include ('inc/footer.php');
?>