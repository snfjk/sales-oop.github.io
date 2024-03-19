<?php
    session_start();
    include "../classes/Product.php";

    $product = new Product();
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
    <title>Dashboard</title>

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 80px;">
        <div class="container">
            <a href="#" class="navbar-brand">Sales</a>

            <button type="button" class="navbar-toggler" data-bs-targer="#menu" data-bs-toggle="collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

             <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="profile.php" class="nav-link"><?= $_SESSION["username"]?></a></li>
                    <li class="nav-item"><a href="../actions/logout.php" class="nav-link text-danger">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container py-5">
        <h1>Product List</h1>
        <div class="text-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary mb-2 " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Product
            </button>
        </div>
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../actions/add-product.php" method="post">
                    <input type="text" name="product_name" class="form-control mb-2" placeholder="Product Name">
                    <input type="number" name="price" class="form-control mb-2" placeholder="Price">
                    <input type="number" name="quantity" class="form-control mb-2" placeholder="Quantity">
                    <button name="btn_add" class="btn btn-primary w-100 mb-2">Save Changes</button>
                    <button name="btn_add" class="btn btn-secondary w-100">Close</button>
                </form>
            </div>
          
            </div>
        </div>
        </div>
        <table class="table table-bordered table-striped table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>ID No.</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th><!-- for edit/delete buttons --></th>
                    <th><!-- for buy buttons --></th>
                    <th><!-- for buy buttons --></th>
                </tr>
            </thead>
            <tbody>
               
                <?php
                    $all_products = $product->getAllProducts();

                    if($all_products && $all_products->num_rows > 0)
                    {
                        while($product = $all_products->fetch_assoc())
                        {
                    ?>
                            <tr>
                                
                                <td><?= $product["id"] ?></td>
                                <td><?= $product["product_name"] ?></td>
                                <td><?= $product["price"] ?></td>
                                <td><?= $product["quantity"] ?></td>
                           
                    
                               <td><a href="edit-product.php?id=<?= $product["id"] ?>" class="btn btn-outline-warning"><i class="fa-solid fa-pencil"></i></a> </td>
                                <td><a href="../actions/delete-product.php?id=<?= $product["id"] ?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a></td>
                                <td><a href="buy-product.php?id=<?= $product["id"] ?>" class="btn btn-outline-success"><i class="fa-solid fa-trash-can"></i></a></td>
                   <?php       
                             }
                        }
                    
                    else
                    {
                        echo "<tr><td class='fst-italic text-center text-muted' colspan='6'>No records to display.</tr>";
                    }
    
                    ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   
</body>
</html>