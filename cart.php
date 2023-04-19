<?php
require 'classes/meal.php';
//require 'database\database.php';

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

if(isset($_GET['logout']))
{
    header("location:login.php");
    
    unset($_SESSION['email']);  
    session_destroy(); 
}

if(isset($_POST['shop']))
{
    header("location: menu");
}

$database = new Database();

if (isset ( $_GET ['mid'] ) && !isset($_POST['update'])) {

	$result = mysqli_query ($database->ConnectionString(), 'select * from meal where meal_id=' . $_GET ['mid'] );
	$getMeal = mysqli_fetch_object ( $result );
	$cart_class = new meals();

	$cart_class->meal_id = $getMeal->meal_id;
	$cart_class->meal_name = $getMeal->meal_name;
	$cart_class->price = $getMeal->price;
	$cart_class->quantity = 1;

	// Check product is existing in cart
	$index = - 1;
	if (isset ( $_SESSION ['cart'] )) {
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++)
		if ($cart [$i]->mid == $_GET ['mid']) {
			$index = $i;
			break;
		}
	}
	if ($index == - 1)
	$_SESSION ['cart'] [] = $cart_class;
	else {
		$cart [$index]->quantity ++;
		$_SESSION ['cart'] = $cart;
	}
}


// Delete product in cart
if (isset ( $_GET ['index'] ) && !isset($_POST['update'])) {
	$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
	unset ( $cart [$_GET ['index']] );
	$cart = array_values ( $cart );
	$_SESSION ['cart'] = $cart;
}

// Update quantity in cart
if(isset($_POST['update'])) {
	$arrQuantity = $_POST['quantity'];

	// Check validate quantity
	$valid = 1;
	for($i=0; $i<count($arrQuantity); $i++)
	if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] < 1){
		$valid = 0;
		break;
	}
	if($valid==1){
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		for($i = 0; $i < count ( $cart ); $i ++) {
			$cart[$i]->quantity = $arrQuantity[$i];
		}
		$_SESSION ['cart'] = $cart;
	}
	else
		$error = 'Quantity is InValid';
}

?>

<?php echo isset($error) ? $error : ''; ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PSN | YOUR CART</title>
		<link rel="icon" href="/images/tranparent-logo.png">
	</head>
	<body>
		<?php include 'nav-bar.php' ?>
		<center>
  		<h2>Your Order</h2>
		<form method="post">
			<table>
		<tr>
			<th>Option</th>
			<th>Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Sub Total</th>
		</tr>
		<?php
		$cart = unserialize ( serialize ( $_SESSION ['cart'] ) );
		$s = 0;
		$index = 0;
		for($i = 0; $i < count ( $cart ); $i ++) {
			$s += $cart [$i]->price * $cart [$i]->quantity;
			?>
		<tr>
			<td><a href="cart.php?index=<?php echo $index; ?>"
				onclick="return confirm('Are you sure?')">Delete</a></td>
			<td><?php echo $cart[$i]->meal_name; ?></td>
			<td><?php echo "R :".$cart[$i]->price; ?></td>
			<td><center><input type="number" value="<?php echo $cart[$i]->quantity; ?>"
				style="width: 50px;" name="quantity[]"></center></td>
			<td><?php echo "R :".$cart[$i]->price * $cart[$i]->quantity; ?></td>
		</tr>
		<?php
		$index ++;
		}
		?>
		<tr>
			<td colspan="4" align="right"><b>Grand Total</b></td>
			<td align="left"><?php echo "<b>R :$s</b>"; ?></td>
		</tr>
	</table>
</form>
<br>
<a href="menu.php">Continue Shopping</a>|||
<a href="checkout.php">Checkout</a>|||
<a href="cart.php" name='update'>Update</a>
<?php include "footer.php"?>
</center>

</body>
</html>