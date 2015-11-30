<?php

function get_list_view_html($product){
	
	$output = "";
	$output .= '<li>';
	$output .= '<a href="' . BASE_URL . 'shirts/' . $product["sku"] . '">';
	$output .= '<img src="' . BASE_URL . $product["img"] . '" alt="' . $product["name"] . '" title="' . $product["desc"] . $product["name"] . '" />';
	$output .= '<p>View Details</p>';
	$output .= '</a>';
	$output .= '</li>';

	return $output;
}

function get_products_search($searchTerm){
	$results = array();
	$all = get_products_all();
	foreach ($all as $product) {
		if(false){
			//$results[] = $product;
		}
	}

	return $results;
}

function get_products_recent(){
	$recent = array();
	$all = get_products_all();		
	$total_products = count($all);
	$position = 0;

	foreach ($all as $product) {
		$position++;
		if($total_products - $position < 4)
			$recent[] = $product;
	}
	return $recent;
}

function get_products_all(){	
	$products = array();
	$products[108] = array(
		"name" => "Logo Shirt, Red",
		"img" => "img/shirts/shirt-108.jpg",
		"price" => 18,
		"paypal" =>	"K5HVMFE95TAUA",
		"sizes" => array("Small", "Medium", "Large", "X-Large"),
		"desc" => "desc for "
		);
	$products[102] = array(
		"name" => "Mike the Frog Shirt, Black",
		"img" => "img/shirts/shirt-102.jpg",
		"price" => 20,
		"paypal" => "77CG2NC8NB96S",
		"sizes" => array("Small", "Medium", "Large", "X-Large"),
		"desc" => "desc for ",
		"style" => array("Short Sleeve", "Long Sleeve")
		);
	$products[103] = array(
		"name" => "Mike the Frog Shirt, Blue",
		"img" => "img/shirts/shirt-103.jpg",
		"price" => 20,
		"paypal" => "XNZ8VDEBDJYPE"	,
		"sizes" => array("Small", "Medium", "Large", "X-Large"),
		"desc" => "desc for "
		);
	$products[105] = array(
		"name" => "Mile the Frog Shirt, Yellow",
		"img" => "img/shirts/shirt-105.jpg",
		"price" => 20,
		"paypal" => "JFMAQ8743HCVE"	,
		"sizes" => array("Small", "Medium", "Large", "X-Large"),
		"desc" => "desc for "
		);

	$products[104] = array(
		"name" => "Logo Shirt, Green",
		"img" => "img/shirts/shirt-104.jpg",
		"price" => 25,
		"paypal" => "E6BSHGQ7GSVZ4"	,
		"sizes" => array("Small", "Medium", "Large", "X-Large"),
		"desc" => "desc for "
		);

	$products[106] = array(
		"name" => "Logo Shirt, Light Green",
		"img" => "img/shirts/shirt-106.jpg",
		"price" => 20,
		"paypal" => "Q4BL8YPGRPFJJ"	,
		"sizes" => array("Small", "Medium", "Large", "X-Large"),
		"desc" => "desc for "
		);
	$products[107] = array(
		"name" => "Mike the Frog Shirt, Blue",
		"img" => "img/shirts/shirt-107.jpg",
		"price" => 20,
		"paypal" => "SCQJ96NM274JS"	,
		"sizes" => array("Small", "Medium", "Large", "X-Large"),
		"desc" => "desc for "
		);
	$products[101] = array(
		"name" => "Logo Shirt, Brown",
		"img" => "img/shirts/shirt-101.jpg",
		"price" => 25,
		"paypal" => "LX7EYEC5T9WFW"	,
		"sizes" => array("Large", "X-Large"),
		"desc" => "desc for ",
		"style" => array("Short Sleeve", "Long Sleeve")
		);

	foreach ($products as $product_id => $product) {
		$products[$product_id]["sku"] = $product_id;
	}

	return $products;
}

?>