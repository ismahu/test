 <!DOCTYPE html>
<html lang="en">
<head>
  <title>admin_Analysis</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
error_reporting(0);
$host = "localhost";
$username = "root";
$password = "";
$database = "jcobase";


try{
$handler = new PDO("mysql:host=$host;dbname=$database", $username, $password);
$handler ->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

echo '<center><u><i>USER REGISTRATION TABLE</i></u></center><br><br>';
}

catch(PDOEXception $error){
    $error->getMessage();
}

$query = "SELECT * FROM registration";
 
 $data = $handler->query($query);


 echo ' <div class="col-sm-3" >
 <table  width="70%" border="1" cellpadding="5" cellspacing="5"  >
  <tr>
  
  
                         <th>user_id</th>                        
                         <th>firstname</th>
                         <th>surname</th>
                         <th>username</th>
                         <th>password</th>
                         <th>email</th>
     </tr>

                 </div>          ';

    foreach($data as $row)
    {
       echo ' <tr>
        <td>'.$row[user_id].'</td>
        <td>'.$row[firstname].'</td>
        <td>'.$row[surname].'</td>
        <td>'.$row[username].'</td>
        <td>'.$row[password].'</td>
        <td>'.$row[email].'</td>
        </tr>' ;
    }

?>
</body>
</html>