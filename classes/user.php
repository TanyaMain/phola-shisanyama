<?php
    include "database/database.php";

    class user{

        private $customer_id;
        private $name;
        private $surname;
        private $phone_number;
        private $email_address;
        private $password;

        //Get and Set methods for the customer properties 

        #GET: $customer_id;
        public function setCustomerID($customer_id){
            $this->customer_id = $customer_id;
        }
        
        #SET: $customer_id;
        public function getCustomerID(){
            return $this->customer_id;
        }

        #GET: $name;
        public function setName($name){
            $this->name = $name;
        }
        
        #SET: $name
        public function getName(){
            return $this->name;
        }

        #GET: $surname
        public function setSurname($surname){
            $this->surname= $surname;
        }
        
        #SET: $surname
        public function getSurname(){
            return $this->surname;
        }

        #GET: $phone_number
        public function setPhoneNumber($phone_number){
            $this->phone_number= $phone_number;;
        }
        
        #SET: $phone_number
        public function getPhoneNumber(){
            return $this->phone_number;
        }
        
        #GET: $email_address
        public function setEmailAddress($email_address){
            $this->email_address= $email_address;
        }
        
        #SET: $email_address
        public function getEmailAddress(){
            return $this->email_address;
        }
        
        #GET: $password
        public function setPassword($password){
            $this->password= $password;
        }
        
        #SET: $password
        public function getPassword(){
            return $this->password;
        }

        function register($first_name,$last_name,$phone_number,$email,$l_password,$c_password)
        {
            $database = new Database();
            //$database->CreateTables();

            $first_name = $this->getName();
            $last_name = $this->getSurname();
            $phone_number = $this->getPhoneNumber();
            $email = $this->getEmailAddress();
            $l_password = $this->getPassword();
            $c_password;

            $pattern = '/^(?=.*[!@#$%^&*-?])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{4,20}$/';

            $query_11 = "SELECT * FROM customers WHERE email = '$email' OR stnum = '$phone_number'";
            $check_exsistance =mysqli_query($database->ConnectionString(), $query_11);

            if(empty($first_name) ||empty($last_name) ||empty($phone_number) ||empty($email) ||empty($l_password) ||empty($c_password))
            {
                echo '<script>alert("Make sure you fill in all the fields")</script>';
            }
            elseif(filter_var($email, FILTER_VALIDATE_EMAIL) != true)
            {
                echo '<script>alert("Verify you email adress")</script>';
            }
            elseif($l_password != $c_password)
            {
                echo '<script>alert("The passwords do not match")</script>';
            }
            elseif(!preg_match($pattern, $l_password))
            {
                echo '<script>alert("Password is not strong enough")</script>';
            }
            else
            {
                $query_12 = "INSERT INTO customers (name,surname,phone_number,email_address,password) VALUES ('$first_name','$last_name','$phone_number','$email','$l_password')";
                $insertUser = mysqli_query($database->ConnectionString(),$query_12);
                if ($insertUser == true)
                {
                   echo "You have Sucessfully been Registered";
                   //header('location: login.php');
                   echo "<script>window.location.href='login.php'</script>";

                }
            }
        }
     
        function login($email, $lpassword)
        {
            $email = $this->getEmailAddress();
            $lpassword = $this->getPassword();
            //$session = $this->getCustomerID();
            $database = new Database();


            $query_10 = "SELECT * FROM customers WHERE email_address = '$email' AND password = '$lpassword'";
            $login = mysqli_query($database->ConnectionString(),$query_10);
            $creditails = mysqli_fetch_array($login);
            $_SESSION[$this->setCustomerID('cid')] = $creditails['customer_id'];
            if(empty($email) || empty($lpassword))
            {
                echo '<script>alert("Make sure you fill in all the fields")</script>';
            }
            elseif(empty($email) && empty($lpassword))
            {
                echo '<script>alert("Make sure you fill in all the fields")</script>';
            }
            if($email == 'admin@01' && $lpassword == 'admin@01')
            {
                header("location: admin/dashboard.php");
            }
            elseif($creditails['email_address'] == $email && $creditails['password'] == $lpassword)
            {
                header("location: menu.php");
            }
            elseif($creditails['email_address'] != $email && $creditails['password'] != $lpassword)
            {
                echo '<script>alert("Something is wrong! check your,creditails")</script>';
            }
            else
            {
                echo '<script>alert("Something is wrong! check your,creditails")</script>';
            }
        }
    }
?>