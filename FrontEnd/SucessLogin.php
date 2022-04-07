<!doctype HTML >
<html>
    <head>
        <title> Product Page </title>
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
    