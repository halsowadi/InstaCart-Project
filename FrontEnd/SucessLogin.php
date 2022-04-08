
<!doctype HTML >

<html>
<head>
  <meta charset="utf-8">
  <title>Product Page</title>
  <meta name="description" content="Description Goes Here">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1> Product Page </h1>

    <?php
    
    $conn = mysqli_connect('localhost','root','Chicken1!','instacart');

    $sql = 'SELECT * FROM instacart.product' ;
    $result = $conn->query($sql);
    
 if($result->num_rows > 0){

    while($row = $result-> fetch_assoc()){
echo "<tr><td>";

echo $row["product_name"];
echo "\n" . "Stock: " .  $row["stock_Count"];
echo "</td></tr><br/>";
echo "<br/>";


    }
 }
 else {

 }
 $conn->close();


    ?>
   
</body>
</html>
    