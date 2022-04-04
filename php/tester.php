<!doctype HTML >
<html>
    <head>
        <title> PHP, SQL, and MYSQL </title>
</head>
<body>

    <h1> PHP,SQL, and mySQL </h1>

    <?php
    
    $connect = mysqli_connect('localhost','root','Chicken1!','instacart');

    $query = 'SELECT * FROM instacart.customer';
    $result = mysqli_query($connect, $query );

    echo mysqli_num_rows($result);
    
    while ($record = mysqli_fetch_assoc( $result ))
    {
        echo '<pre>';
        print_r($record);
        echo '</pre>';
    }

    ?>
</body>
</html>
    