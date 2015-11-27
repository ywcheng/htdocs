<?php 
	require_once('../inc/config.php');
	include(ROOT_PATH . "inc/products.php");
	include(ROOT_PATH . "inc/header.php");

	if(isset($_GET["id"])){
		$produdct_id = $_GET["id"];
		if (isset($products[$produdct_id])) {
			$product = $products[$produdct_id];
		}
	}

	if(!isset($product)) {
		exit(header("Location: " . BASE_URL . "shirts.php"));
	}

	$section = "shirts";
	$pageTitle = $product["name"];
?>

<div class="section page">
	<div class="wrapper">
			<div class="breadcrumb">
				<a href="<?php echo BASE_URL; ?>shirts/">Shirts</a> &gt;
				<label title="<?php echo $product["desc"] . $product["name"];?>"><?php echo $product["name"]; ?><label>
			</div>
			<div class="shirt-picture">
				<span>
					<img src="<?php echo BASE_URL . $product["img"]; ?>" alt="<?php echo $product["name"]; ?>"/>
				</span>
			</div>
			<div class="shirt-details">
				<h1>
					<?php echo $product["name"]; ?>
					<span> 
						<?php echo '<br/>$' . $product["price"]; ?>
					</span>
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
								<label for="os0">Size</label>
							</td>

							<td>
								<select name="os0">
									<?php foreach ($product["sizes"] as $size) { ?>
										<option value="<?php echo $size; ?>"><?php echo $size; ?> </option>
									<?php }?>
								</select> 
							</td>
						</tr>
						<?php if(isset($product["style"])) {?>
							<tr>
								<td>
									<input type="hidden" name="on1" value="Style">
									<label for="os1">Style</label>
								</td>
								<td>
									<select name="os1">
										<option value="Short Sleeve">Short Sleeve </option>
										<option value="Long Sleeve">Long Sleeve </option>
									</select>
								</td>
							</tr>
						<?php }?>
					</table>
					<input type="submit" value="Add to Cart" name="submit" />
				</form>
			</div>
	</div>
</div>
<?php
	include (ROOT_PATH . 'inc/footer.php');
?>