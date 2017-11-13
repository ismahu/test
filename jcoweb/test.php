<?php
 session_start();
 include('like/database_connection.php');
  $message = ""; 
   $user_name = $_POST["user_name"];
   $user_email = $_POST["user_email"];
   $user_password = $_POST["user_password"];
   $user_type = $_POST["user_type"];
   


    if (isset(submit)) {
     if (!empty($_POST["user_name"]) && !empty($_POST["user_email"]) && !empty($_POST["user_password"]) && !empty($_POST["user_type"]) ) {
             
             $query = "INSERT INTO"  
               }
    }


 $query = "INSERT INTO  SET user"

?>