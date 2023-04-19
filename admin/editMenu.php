<?php
    include '..//database//database.php';
    include '..//classes//meal.php';
    
    $meal = new meals();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'nav-bar.php'; ?>
<h1>Meal & Menu Dashboard</h1><br>
<?php  $meal->getMealAdmin()?>
</body>
</html>