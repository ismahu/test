<?php

session_start();
error_reporting(0);
$host = "localhost";
$username = "root";
$password = "";
$database = "jcobase";
$message = "";
 
 try{
  $connect = new PDO("mysql:host=$host;dbname=$database",$username, $password);
     $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     if(isset($_POST["allow"]))
     {
        if(empty($_POST["access"])){
            $message = '<label>All field are required</label>';
        }
    
    else{
        $query = "SELECT * FROM admin WHERE  access = :access";
                $statement = $connect->prepare($query);
                $statement->execute(
                    array(
                        
                        'access' => $_POST["access"])
            
                );
               
            
                    $count = $statement->rowCount();

                    if($count > 0 ){
                        $_SESSION["access"] = $_POST["access"];
                        header("location:analytics.html");
                    }
                      else{
                          $message = '<label>Wrong Data</label>';
                      }
                }
 }

}catch (PDOException $error){
    
     echo '$message';
 }

?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Administration</title>

    <script src="jquery.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js" ></script>
    
</head>
<body>
<br />


 <div class="container" >
 <br/>
<?php
  if(isset($message)){

    echo '<label class="text-danger">'.$message.'</label>';
  }
?>
 <h3 align="center">Enter Your Access Code</h3>
    <form method="post" >
   
    <label>Access Code</label>
    <input type="access" name="access" placeholder="access here...." class="form-control"/>
    <br/>
        <input type="checkbox">remember me
        <br/>
    <input type="submit" name="allow" value="Access" class="btn btn-info"/>
    
    </form>
    </div>
</body>
</html> 