<?php

@include 'config.php';
session_start();
if(isset($_POST['add_product'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_stock = 100;
   $product_ID = $_POST['product_ID'];
 $product_matierals= "stuff";

   if(empty($product_name) || empty($product_price) ){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO PRODUCT VALUES('$product_ID','$product_name','$product_matierals', 100 ,'$product_price')";
      $upload = mysqli_query($conn,$insert);
      
      if($upload){
        $message[] = 'new product added successfully';
     }else{
        $message[] = 'could not add the product';
     }
   
   }

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
         <input type="number" placeholder="enter product price" name="product_ID" class="box">
         <input type="submit" class="btn" name="add_product" value="add product">
      </form>

   </div>

  
      </table>
   </div>

</div>


</body>
</html>