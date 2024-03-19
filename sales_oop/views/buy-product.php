<?php
session_start();

require '../classes/Product.php';

$product_obj = new Product;
$product     = $product_obj->getProduct($_GET['id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CDN CSS Bootstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CDN FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-Avb2QiuDEEvB4bZJYdft2mNjVShBftLdPG8FJ0V7irTLQ8Uo0qcPxh4Plq7G5tGm0rU+1SPhVotteLpBERwTkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Edit Product</title>
</head>
<body>
    <main class="row justify-content-center gx-0">
     <div class="col-3">
        <h1 class="text-center mb-4 mt-5">Buy Product</h1>

        <label>Product Name</label>
        <h2><?=$product['product_name']?></h2>
        <div class="row">
            <div class="col-6">
                <label>Price</label>
                <h2>$ <?=$product['price']?></h2>
            </div>
            <div class="col-6">
                <label>Stocks Left</label>
                <h2><?=$product['quantity']?></h2>
            </div>
        </div>

            <form action="payment.php?id=<?=$product['id']?>" method="post">
                <div class="mb-3">
                    <label for="buy-quantity" class="form-label">Buy Quantity</label>
                    <input type="text" name="buy_quantity" id="buy-quantity" class="form-control" required autofocus>
                </div>
                <button type="submit" name="btn_pay" class="btn btn-success w-100">Pay</button>
                 <a href="dashboard.php" class="btn btn-outline-secondary w-100 my-3">Cancel</a>
        </form>
     </div>
    </main>
    
</body>
</html>