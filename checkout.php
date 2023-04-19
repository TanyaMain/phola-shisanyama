<?php
	//require 'database\database.php';
	require 'classes/meal.php';
    $database = new Database();

	$date = date('Y-m-d');

	//Save new order
	mysqli_query($database->ConnectionString(), "insert into orders (orderdate)
	values('$date')");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet"   type=”text/css” href="css\styles.css">
	<title>Check out</title>
</head>
<body>
    <?php include 'nav-bar.php'; ?><br>
    <center>
        	<?php
	$meals = new meals(); 
	$meals->getOrders(10);
	?>
    </center>
	<?php include 'footer.php'; ?>
</body>
</html>
