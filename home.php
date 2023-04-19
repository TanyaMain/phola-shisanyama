<?php
    require 'classes/meal.php';
    $meals = new meals();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon" href="/images/tranparent-logo.png">
    <title>PSN | Welcome Home</title>
</head>
<body>
    <?php include 'nav-bar.php'; ?>
    <h1>HOME</h1>
    <h2><em>"Food that brings sunshine to your soul"</em></h2>
    <div class="about-us">
    <h3>About Us</h3><br>
        <img class="pic1" src="images/about-us-img.jpg" alt="">
        <div class="text">
            <p>
            We are Phola Shisa Nyama, the heart, and soul of Pretoria, rated and recommended, 
            by all sides of Tshwane. Professionals adore us, and students and lecturers from 
            different campuses, love us due to the amazing products and services we deliver. 
            It's always the food that speaks excellent for us. Phola always makes sure that we 
            have something for everyone which is what our brand is locally known for. Since we 
            accommodate everyone and anyone in our small joint offers a wild rage of meals, this 
            includes and Phola is not limited to; the versatile of meat that ranges from chicken to 
            beef not excluding pork, a veggie menu for our vegetarians and your American variety such as 
            burgers and wraps and we always love the whole concept of tribe meat. We are not just people who 
            grill, or braai, mara ki shisa nyama.
            </p><br>
        </div>
        <div class="picture-2">
            <img src="images\s-6.jpg" alt="">
        </div><br>
    </div>
    <div class="online-specails">
        <h2>Online Specials</h2>
        <?php $meals->getMeals("Online Specials"); ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>