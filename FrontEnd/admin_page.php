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
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '<span class="message">'.$message.'</span>';
   }
}

?>
   
<div class="container">

   <div class="admin-product-form-container">
      
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new product</h3>
         <input type="text" placeholder="enter product name" name="product_name" class="box">
         <input type="number" placeholder="enter product price" name="product_price" class="box">
         <input type="number" placeholder="enter product ID" name="product_ID" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
         </form>

</div>

<?php

$select = mysqli_query($conn, "SELECT * FROM product");

?>

<div class="product-display">
   <table class="product-display-table">
      <thead>
      <tr>
         <th>product image</th>
         <th>product name</th>
         <th>product price</th>
         <th>action</th>
      </tr>
      </thead>
     
      <?php while($row = mysqli_fetch_assoc($select)){ ?>
      <tr>
         <td><?php echo $row['product_name']; ?></td>
         <td>$<?php echo $row['Price']; ?>/-</td>
         <td>
         <a href="admin_page.php?delete=<?php echo $row['Product_ID']; ?>" class="btn"  method="get" name = "delete"> <i class="fas fa-trash"></i> delete </a>
         </td>
      </tr>
   <?php } ?>
   </table>
</div>

</div>


</body>
</html>