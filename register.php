<?php
     include_once 'classes/user.php' ;

     $uesr = new user();
     #password_hash($_POST['password'],PASSWORD_BCRYPT)
    
     if(isset($_POST['submit']))
     {
        $first_name = $uesr->setName($_POST['name']);
		$last_name = $uesr-> setSurname($_POST['surname']);
		$phone_number = $uesr->setPhoneNumber($_POST['phone_number']);
        $email_address = $uesr->setEmailAddress($_POST['email_address']);
        $password =  $uesr->setPassword($_POST['password']); 
        $confirm_password = $_POST['confirm_password'];

        $uesr->register($first_name,$last_name,$phone_number,$email_address,$password,$confirm_password);
     }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon" href="/images/tranparent-logo.png">
    <title>PSN | Register</title>
</head>
<body>
    <?php include 'nav-bar.php'; ?>
    <h1>REGISTER</h1>
    <h2><em>"Food that brings Sunshine to your soul"</em></h2><br>
    <div class="form">
        <form action="" method="post">
            <img src="images/user.png" class="user"><br>
            <input type="text"  name="name" placeholder="Name" id="" value="" required><br>
            <input type="text"  name="surname"  placeholder="Surname" id="" value="" required><br>
            <input type="text"  name="email_address"  placeholder="Email" id="" value="" required><br>
            <input type="text"  value="+27"name="phone_number" placeholder="Phone Number" id="" value="" required><br>
            <input type="password"  name="password" placeholder="Password" id="" value="" required><br>
            <input type="password"  name="confirm_password"  placeholder="Confirm Password" id="" value="" required><br>

            <button type="submit" name = "submit">Register</button>

        <p>Already have an account? <a href="login.php"><strong>Sign in</strong></a></p>
    </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
