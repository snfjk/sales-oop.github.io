<?php
include "../classes/Product.php";

$product = new Product;
$id = $_GET['id'];
$product->update($id, $_POST);


?>