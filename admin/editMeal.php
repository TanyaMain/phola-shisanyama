<?php
    include '../models/meal.php';
    include '..//database//database.php';
    $meal = new meals();
    $database = new Database();
    
    if (isset($_GET['mid'])) {
        
            $query_12= "SELECT * FROM meal WHERE meal_id=".$_GET['mid'];
			$getMeal = mysqli_query($database->ConnectionString(),$query_12);
            $meal = mysqli_fetch_object($getMeal);
            
            $meal->meal_name;
            $meal->price;
            $meal->meal_id;
	}
	
	
		
	if (isset($_POST['update'])) {
		$meal_id = $_POST['meal_id'];
		$meal_name = $_POST['meal_name'];
		$price = $_POST['price'];

		mysqli_query($database->ConnectionString(), "UPDATE meal SET price = '$price' WHERE meal_id=$meal_id");
		 echo '<script>alert("Meal Updated")</script>';
		 //header('location:..//admin//editMenu.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Meal</title>
</head>
<body>
<?php include 'nav-bar.php'; ?>
<h1>Edit Meal</h1><br>
<form method="post" action="" >
	<input type="hidden" name="meal_id" value="<?php echo $meal->meal_id;; ?>">
		<table>
		<tr>
			<td>Meal Name</td><td><input type="text" name="meal_name" value="<?php echo $meal->meal_name;; ?>"></td>
		</tr>
		<tr>
			<td>Price</td><td><input type="text" name="price" value="<?php echo $meal->price; ?>"></td>
		</tr>
		<tr>
			<td>
				<button type="submit" name="update" >Save</button>
			</td>
		</tr>
		</table>
	</form>
</body>
</html>