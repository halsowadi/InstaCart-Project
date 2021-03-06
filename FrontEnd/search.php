
<?php

@include 'config.php';
session_start();

if(isset($_POST['search'])){

   $term = mysqli_real_escape_string($conn, $_POST['username']);
 

   $select = " SELECT * FROM product WHERE product_name = '$term";

   $result = mysqli_query($conn, $select);
   $num_row =mysqli_num_rows($result);
   if( $num_row == 1){

      $row = mysqli_fetch_array($result);
      echo $row; 
    

      
     
   }else{
      echo 'incorrect email or password!';
   }

};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Search page</title>
    <meta name="description" content="Description Goes Here">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>

    <div class="container">
        <!-- cart -->
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">3</span>
                </h4>
                <ul class="list-group mb-3 sticky-top">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Book</h6>
                            <small class="text-muted">GOOGLE HACKS</small>
                        </div>
                        <span class="text-muted">$12</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Second product</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$8</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Third item</h6>
                            <small class="text-muted">Brief description</small>
                        </div>
                        <span class="text-muted">$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light">
                        <div class="text-success">
                            <h6 class="my-0">Promo code</h6>
                            <small>EXAMPLECODE</small>
                        </div>
                        <span class="text-success">-$5</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>$20</strong>
                    </li>
                </ul>
                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Checkout</button>
                </form>

                <!-- add 2 -->

                <div id="ad2">
                    <div class="row mt-3">
                        <div class="col-xs-3 col-xs-offset-4" style="border:1px solid silver;padding:0px;">

                            <div class="col-xs-12">
                                <div class="row canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- add 1 -->
            <div class="col-md-8 order-md-1">
                <div id="ad1" style="margin-top:40px">
                    <div class="row">
                        <div class="col-xs-3 col-xs-offset-4" style="border:1px solid silver;padding:0px;">

                            <div class="col-xs-12">
                                <div class="row canvas"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- search products  -->
                <div class="search-box pt-5">
                    <div class="row height d-flex margin-top 20px">
                        <div class="col-md-6">
                            <div class="form"> <i class="fa fa-search"></i>
                                <input type="text" class="form-control form-input" placeholder="Search products" name = "search">
                                <span class="left-pan"><i class="fa fa-microphone"></i></span>
                               
                            </div>
                        </div>

                    </div>
                </div>


                <!-- example of data search  -->
                <div class="py-5 text-center">
                    <img class="product-image" src="http://images.amazon.com/images/P/0596004478.01.20TRZZZZ.jpg" alt=""
                        width="150" height="150">

                </div>

            </div>
        </div>


    </div>




    <script src="ads.js"></script>
</body>

</html>