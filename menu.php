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
    <link rel="stylesheet"  href="css/style.css">
    <link rel="icon" href="/images/tranparent-logo.png">
    <title>PSN | Menu</title>
</head>
<body>
    <?php include 'nav-bar.php'; ?>
    <h1>MENU</h1>
    <h2><em>"Food that brings Sunshine to your soul"</em></h2><br>

    <div class="full-tab">
        <div class="tab">
            <button class="tablinks" onclick="openCartegory(event, 'phola-shisa-nyama-meal')">Phola shisanyama Meal</button>
            <button class="tablinks" onclick="openCartegory(event, 'meal-to-share')">Meal to Share</button>
            <button class="tablinks" onclick="openCartegory(event, 'chips-menu')">Chips Menu</button>
            <button class="tablinks" onclick="openCartegory(event, 'phola-shisa-nyama-extras')">Phola Shisa Nyama Extras</button>
            <button class="tablinks" onclick="openCartegory(event, 'chips-side')">Chips Side</button>
            <button class="tablinks" onclick="openCartegory(event, 'refreshment')">Refreshment</button>
            <button class="tablinks" onclick="openCartegory(event, 'online-special')">Online Special</button>
    </div>
    
    </div>
    <!-- Tab content -->
    <div id="phola-shisa-nyama-meal" class="tabcontent">
        <h2>Phola Shisa Nyama Meals Menu @ Phola</h2>
        <?php  $meal->getMeals("Phola Shisa Nyama Meals Menu")?>
    </div>
    <!-- Tab content -->
    <div id="meal-to-share" class="tabcontent">
        <h2>Meal To Share Menu @ Phola</h2>
        <?php  $meal->getMeals("Meal To Share Menu")?>
    </div>
    <!-- Tab content -->
    <div id="chips-menu" class="tabcontent">
        <h2>Chip Menu</h2>
        <?php  $meal->getMeals("Chips Menu")?>
    </div>
        <!-- Tab content -->
    <div id="phola-shisa-nyama-extras" class="tabcontent">
        <h2>Phola Shisa Nyama Extra Menu</h2>
        <?php  $meal->getMeals("Phola Shisa Nyama Extra Menu")?>
    </div>

    <!-- Tab content -->
    <div id="chips-side" class="tabcontent">
        <h2>Chips Side Menu</h2>
        <?php  $meal->getMeals("Chips Side Menu")?>
    </div>

    <!-- Tab content -->
    <div id="refreshment" class="tabcontent">
        <h2>Refreshment</h2>
        <?php  $meal->getMeals("Refreshment")?>
    </div>

    <!-- Tab content -->
    <div id="online-special" class="tabcontent">
        <h2>Online Specials</h2>
        <?php  $meal->getMeals("Online Specials")?>
    </div>

    <?php include 'footer.php'; ?>
    <script>
    
    function openCartegory(evt, cityName)
    {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) 
        {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++)
        {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>
</body>
</html>