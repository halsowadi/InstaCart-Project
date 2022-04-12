<?php

@include 'config.php';
if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_ID = $_POST['product_ID'];
   $product_stock = 100;
 $product_matierals= "stuff";


   //method to insert
   if(empty($product_name) || empty($product_price) ){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO instacart.PRODUCT VALUES('$product_ID', '$product_name','$product_matierals', 100 ,'$product_price')";
      $upload = mysqli_query($conn,$insert);
      
      if($upload){
        $message[] = 'new product added successfully';
     }else{
        $message[] = 'could not add the product';
     }
   
   }
};

   //method to delete
   if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      $delete = "DELETE FROM PRODUCT WHERE Product_ID = $id";
      
      mysqli_query($conn, $delete);
      
      header('location:admin_page.php');
   
};



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Page Title Goes Here</title>
  <meta name="description" content="Description Goes Here">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body class="store">

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Instacart</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-dark" href="cart.html" role="button">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </a>
            </form>
        </div>
    </div>
</nav>

<?php

$select = mysqli_query($conn, "SELECT * FROM product");

?>

<!-- Section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php while($row = mysqli_fetch_assoc($select)){ ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder"><?php echo $row['product_name']; ?></h5>
                            <!-- Product price-->
                            $<?php echo "\n" . $row['Price']; ?>/-
                            <br>
                            <?php echo "\n" . "Stock Remaining: " . $row["stock_Count"]; ?>
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to Cart</a></div>
                    </div>
                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Group 2 COSC 471 Winter 2022</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>