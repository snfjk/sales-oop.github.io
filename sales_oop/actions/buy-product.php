<?php
include "../classes/Product.php";

$product = new Product;
$id = $_GET['id'];
$product->buyProduct($_POST);


?>