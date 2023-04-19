<?php
    include 'classes/meal.php' ;
    $meal = new meals();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/images/tranparent-logo.png">
    <title>View Meal</title>
</head>
<body>
    <?php include 'nav-bar.php'; ?>
	<h1>View Meal</h1>
    <h2><em>"Food that brings Sunshine to your soul"</em></h2><br>
    <?php  $meal->getMeal($_GET ['mid'])?>
	<?php include 'footer.php'; ?>
</body>
</html>