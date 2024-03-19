<?php
include "../classes/Product.php";

// create an obj
$product = new Product;

// Call the method
$product->store($_POST);

?>