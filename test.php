<pre><?php

$store="Ye Olde Ice Cream Shoppe";
var_dump($store);
echo '<br/>';

$fans = 926;
var_dump($fans);
echo '<br/>';

echo 'strpos($store, "Cream"): ' . strpos($store, "00");
echo '<br/>';
var_dump(strpos($store, "00"));
echo '<br/>';

$flavors = array("choco", "vanilla");
var_dump($flavors);
echo '<br/>';


    
    $flavor = "Cookie Dough";
    $search_term = "cookie";

    if (stripos($flavor,$search_term) !== false) {

        echo "Randy's favorite flavor of ice cream contains the search term '" . $search_term . "'.";

    } else {

        echo "Randy's favorite flavor of ice cream does NOT contain the search term '" . $search_term . "'.";

    }

?>