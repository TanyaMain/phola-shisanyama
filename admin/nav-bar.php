<style>
    <?php include '..//css//styles.css' ?>
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet"   type=”text/css” href="..//css//styles.css">
</head>
<body>
   <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="/images/tranparent-logo.png">
    <title>Navigation bar</title>
  </head>
  <body>
    <header>
      <img src="..//images//tranparent-logo.png" alt="logo">
      <nav>
        <ul>
          <li><a href="editMenu.php">Edit Menu</a></li>
          <li><a href="orders.php">Orders</a></li>
          <li id="#login"><a href="..\\login.php" >Logout</a></li>
        </ul>
      </nav>
      <div id="hamburger-icon" onclick="toggleMobileMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
        <ul class="mobile-menu">
          <li><a href="/home">Home</a></li>
          <li><a href="/products">Products</a></li>
          <li><a href="/about">About</a></li>
          <li id="login"><a href="/login" >Login</a></li>
        </ul>
      </div>
    </header>
    <script src="javaScript/index.js"></script>
  </body>
</html>

</body>
</html>