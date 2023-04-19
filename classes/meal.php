<?php 
   include "database/database.php";
    class meals{

        public $meal_id;
        public $meal_name;
        public $cartegory;
        public $description;
        public $price;
        public $quantity;

        
        #method to get all the meals with the same ($category)
        function getMeals($category)
        {
            $database = new Database();
    
            $query_12= "SELECT * FROM meal WHERE category = '$category'";
            $getMeal = mysqli_query($database->ConnectionString(),$query_12);
    
            while($meal = mysqli_fetch_object($getMeal))
            {
                echo
                "
                <div class='meals'>
                    <br><img src=".$meal->picture."><br>
                    <span class='meal'>".$meal->meal_name."</span><br>
                    <span> R ".$meal->price."</span><br>
                    <a href=cart.php?mid=".$meal->meal_id."><button class = 'button'type='button'>Add to Cart</button></a>
                    <a href=view.php?mid=".$meal->meal_id."><button class = 'button' type='button'>View Detail</button></a>
                </div>
                    ";
             }
        }

        function getMeal($meal_id)
        {
            $database = new Database();

            $query_12= "SELECT * FROM meal WHERE meal_id = '$meal_id'";
			$getMeal = mysqli_query($database->ConnectionString(),$query_12);
            $meal = mysqli_fetch_object($getMeal);

            echo
            "
            <div class='meals'>
            <h3>".$meal->meal_name."</h3>
                <img src=".$meal->picture."><br>
                <span>".$meal->description."</span><br>
                <span> R ".$meal->price."</span><br>
                <a href=cart.php?mid=".$meal->meal_id."><button class = 'button'type='button'>Add to Cart</button></a>
            </div>
                ";
        }

        function getOrders($ordersid)
        {
            $database = new Database();
            $query_12= "SELECT * FROM orders WHERE order_id = '$ordersid'";
            $getMeal = mysqli_query($database->ConnectionString(),$query_12);
        
            while($order = mysqli_fetch_object($getMeal))
            {
                echo "Please collect order with the number ".$order->order_id." at phola";
            }
        }
                
        function getMealAdmin()
        {
            $database = new Database();

            $query_12= " SELECT * FROM meal";
            $getMeal = mysqli_query($database->ConnectionString(),$query_12);
            

            while($meal = mysqli_fetch_object($getMeal))
            {
                    echo "
                    <center>
                    <table>
                        <thead>
                        <tr>
                            <th> Meal Name</th>
                            <th> Meal Price</th>
                            <th> Edit Meal</th>
                            <th> Delete Meal</th>
                        </tr>
                        </thead>
                        <tr>
                            <td><span class='meal'>".$meal->meal_name."</span></td>
                            <td><span class='meal'> R ".$meal->price."</span></td>
                            <td><a href=editMeal.php?mid=".$meal->meal_id."><button class = 'button'type='button'>Edit Meal</button></a></td>
                            <td><a href=editMeal.php?mid=".$meal->meal_id."><button class = 'button'type='button'>Delete Meal</button></a></td>
                        </tr>
                </table>
                </center>
                    ";
            }
        }
    }
?>