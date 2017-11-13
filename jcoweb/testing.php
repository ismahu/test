<?php
error_reporting(0);
session_start();

$user = "root";
$pass= "";
$message = "";

try{
  $conn = new pdo("mysql:host=127.0.0.1;dbname=jcobase", $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

     $username = $_POST["username"];
     $password = $_POST["password"];


    if (isset($_POST["login"])) {
      	if (!empty($_POST["username"]) && !empty($_POST["password"])) {
      		$query = "SELECT * FROM registration WHERE username = :username  AND password = :password ";
      		$statement = $conn->prepare($query);
      		$statement->execute(array(
      			'username' => $_POST["username"],
      			'password' => $_POST["password"]
      		));

      		$count = $statement->rowCount();
      		if ($query > 0 ) {
      			# code...
      			$SESSION["username"] = $_POST["username"];
      			header("location:admin.php");
      		}else{
      			$message = '<label>You Entered Wrong Data</label>';
      		}
      	}else{
      		$message = '<label>ALl field are required</label>';
      	}
      }  
  }catch(PDOException $e ){
             
      $message = $e->getMessage();
  }


?>

<!DOCTYPE html>  
 <html>  
      <head>  
           <title>testingPage</title>  
           <meta charset="utf-8">
           <meta name="viewport" content="width=device-width, initial-scale=1">
           <script src="jquery.min.js"></script>
           <link rel="stylesheet" href="css/bootstrap.min.css">
           <script src="js/bootstrap.min.js" ></script>
      <body>  
           <br />  
            <div class="container" style="width:500px;">  
           <div class="panel panel-default">
            <div class="panel panel-header">
               <?php  
                if(isset($message))  
                {  
                     echo '<label class="text-danger">'.$message.'</label>';  
                }  
                ?>  
               <div class="panel panel-body">
                 
               
                <h3 align="">User-login account</h3><br />  
                <form method="post">  
                     <input type="text" name="username" placeholder="Enter Username..." class="form-control" />  
                     <br />  
                     <input type="password" name="password" placeholder="Enter Password..." class="form-control" />  
                     <br />  
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
                </form>  
           </div>  
         </div>
       </div>
     </div>
           <br />  
      </body>  
 </html>  