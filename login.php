<?php
	
	include_once 'classes/user.php';
    $user = new user();
    #password_hash($_POST['password'],PASSWORD_BCRYPT)
    $email = $pass = "";
    if(isset($_POST['submit']))
    {
        $email = $user->setEmailAddress($_POST['email_address']);
        $pass = $user->setPassword($_POST['password']);
        $user->login($email,$pass);
    }
    //session_start();
    //$_SESSION['email_address'] = $email;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon" href="/images/tranparent-logo.png">
    <title>PSN | Login</title>
</head>
<body>
    <?php include 'nav-bar.php'; ?>
    <h1>LOGIN</h1>
    <h2><em>"Food that brings Sunshine to your soul"</em></h2><br>
    <div class="form">
            <form action="" method="post">
		    <img src="images/user.png" alt="user-img"><br>
		    <input type="text"  name="email_address" placeholder="Email" id="" value="<?php echo $email; ?>"><br>
            <input type="password"  name="password" placeholder="Password" id="" value="<?php echo $pass; ?>"><br>

		    <button type="submit" name = "submit">Login</button><br><br>
		
		    <p>Don't have an account? <a href="register.php"><strong>Register here!!!</strong></a></p><br>
	    </form>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>