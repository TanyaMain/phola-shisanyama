<?php
    class database{
        #properties to connect to the database
        private $servername = "sql9.freesqldatabase.com";
        private $username = "sql9541050";
        private $password = "DUMvvCaMV8";
        private $database = "sql9541050";


        #method that return the connection string for the database
        function ConnectionString()
        {
            #server connection string
            $server_connection = mysqli_connect($this->servername, $this->username, $this->password);

            #check if I am able to connect to the server
            if(!$server_connection)
            {
                #for no connection
                die("Connection failed: " . mysqli_connect_error());
            }
            else
            {
                #for sucessfully connecting to the database
                //echo "Connected to the server successfully<br>";
            }
            #Select a database on the server
            $select_database = mysqli_select_db($server_connection,$this->database);
            #Check if the database is on the server
            if(!$select_database)
            {
                #If there is no database
                $query_1 = "CREATE DATABASE ".$this->database."";
                if($server_connection->query($query_1)=== TRUE)
                {
                   // echo "Database created successfully with the name".$this->database;
                }
                elseif($server_connection->query($query_1)=== FALSE)
                {
                    //echo "Error creating database: " .$server_connection->error;
                }
                else
                {
                   // echo "Database with the name".$this->database." already Exist";
                }
            }
            else
            {
                //echo "The database with the name ".$this->database."is already on the server<br>";
            }
             return $database_connection = mysqli_connect($this->servername, $this->username, $this->password,$this->database);
             mysqli_close($database_connection);
        }


        private $query_2 = "CREATE TABLE `customers`(
            `customer_id` int(10) NOT NULL AUTO_INCREMENT,
            `name` varchar(50) NOT NULL,
            `surname` varchar(50) NOT NULL,
            `phone_number` varchar(12) NOT NULL,
            `email_address` varchar(50) NOT NULL,
            `password` varchar(100) NOT NULL,
            PRIMARY KEY (`customer_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

        private $query_3 = "CREATE TABLE `meal` (
            `meal_id` int(10) NOT NULL AUTO_INCREMENT,
            `meal_name` varchar(100) NOT NULL,
            `category` varchar(100) NOT NULL,
            `description` varchar(500) NOT NULL,
            `price` decimal(10,2) NOT NULL,
            `quantity`int NOT NULL,
            `picture` varchar(1000) NOT NULL,
            PRIMARY KEY (`meal_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        
        private $query_4 = "CREATE TABLE `orders` (
            `order_id` int(10) NOT NULL AUTO_INCREMENT,
            `orderdate` date NOT NULL,
            PRIMARY KEY (`order_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
  
          private $query_5 = "CREATE TABLE `orderMeal` (
            `order_id` int(10) NOT NULL,
            `meal_id` int(10) NOT NULL,
            `price` decimal(10,2) NOT NULL,
            `qnty` int(10) NOT NULL,
            PRIMARY KEY (`order_id`,`meal_id`),
            CONSTRAINT `tblorderbooks_ibfk_1` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`meal_id`),
            CONSTRAINT `tblorderbooks_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
          ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
  
          
          function CreateTables()
          {
              $create_tables_customers = mysqli_query($this->ConnectionString(),$this->query_2);
              $create_tables_meal = mysqli_query($this->ConnectionString(),$this->query_3);
              $create_tables_order= mysqli_query($this->ConnectionString(),$this->query_4);
              $create_tables_orderMeal = mysqli_query($this->ConnectionString(),$this->query_5);
  
              if($create_tables_customers &&$create_tables_meal&&$create_tables_order&&$create_tables_orderMeal)
              {
                  //echo "<br>Tables created successfully<br>";
              }
              else
              {
                  //echo "<br>Tables already exist<br>";
              }
  
              $query_8 = "SELECT * FROM meal";
              $check_data_on_table = mysqli_query($this->ConnectionString(),$query_8);
              if (mysqli_num_rows($check_data_on_table) == 0) {
                  $this->loadMeals();
              }
          }

        function loadMeals()
        {
            $open_file = fopen('database\menu.txt', 'r');
            while(!feof($open_file))
            {
                $getTextLine = fgets($open_file);
                $explodeLine = explode(';', $getTextLine);

                list($meal_name,$category,$description,$price,$quantity,$picture) = $explodeLine;

                $query_9 = "INSERT INTO meal (meal_name,category,description,price,quantity,picture) 
                            VALUES('$meal_name','$category','$description','$price','$quantity','$picture')";
                mysqli_query($this->ConnectionString(),$query_9);
            }
            fclose($open_file);
        }
    }
?>