<?php
session_start();
error_reporting(0);


 $user = "root";
 $pass = "";

 $abc = new PDO( 'mysql:host=127.0.0.1;dbname=jcobase', $user, $pass );
    $abc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 

  $name = $_POST['name'];
  $email = $_POST["email"];
   $username = $_POST["username"];
  $password = $_POST["password"];
 
      

    
    $salt = mcrypt_create_iv(24);
    $hashed = hash('shaa256', $password.$salt);
  if(isset($_POST["signup"])){
      if(!empty($name) && !empty(email) && !empty($username) && !empty($password)  ){
 
     $query = $abc->prepare("INSERT INTO registration SET name = ?, username = ?, password = ?, email = ?, $salt = ? " );
        $query->execute([$name, $username, $password, $email, $hashed, $salt]);

        
          echo "<script>alert('Registration Successful!!!')</script>";

          header("location:home.php");

        }else{
          echo "<script>alert('All Field are Required!')</script>";
        }
}else{
  header("location:register.php");
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>User_Registration</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>jco Registration-form</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

</head>
<body>
 <div class="container" style="width:500px;" >
  
    <h1 align="center"> User Registration page</h1>
    <h3><a href="login.php">Login</a></h3>

    <div class="panel panel-default">
    <div class="panel-heading">Signup</div>
    <div class="panel-body">

<form   method="POST">
  
  
  <input type="text" name="name" placeholder="Enter your name...." class="form-control"/>
  <br>
  <input type="email" name="email" placeholder="Enter your email...." class="form-control"/>
  <br>
  <input type="text" name="username" placeholder="Select username...." class="form-control"/>
  <br>
  <input type="password" name="password" placeholder="Select password...." class="form-control"/>
  <br>
  <button type="signup" name="signup" value="signup" class="btn btn-primary" >Submit</button>

</form>
        </div>
  </div>
  </div>
  </div>

</body>
</html>