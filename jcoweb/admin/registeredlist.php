<?php 
$message = "";
 try{
 $connect = new PDO("mysql:host=127.0.0.1;dbname=jcobase", "root", "");
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $query = "SELECT * FROM tbl_employee ORDER BY id DESC ";
 $stmt = $connect->prepare($query);
 $stmt->execute(array());


 }catch(PDOException $error){
 
   $message=$error->getMessage();

 }
 
     

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Datatable with PDO and Online datatable plugins</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    
 </head>

 <body>
 	 <br /><br />  
           <div class="container">  
                <h3 align="center">Datatable with PDO and Online datatable plugin</h3>  
                <br />  
                <div class="table-responsive">  
                     <table id="employee_data" class="table table-striped table-bordered">  
  		<thead>
  			<tr>
  				<td>id</td>
  				<td>name</td>
  				<td>gender</td>
  				<td>Designation</td>
  			</tr>
  		</thead>

  		<?php
  		while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
          echo '  <tr>

              <td>'.$row["id"].'</td>
              <td>'.$row["name"].'</td>
              <td>'.$row["gender"].'</td>
              <td>'.$row["designation"].'</td>

            </tr>  ';

          
}
  		 ?>
  	
  </table>
  </div>
</div>
 </body>

 </html>
<script >
	$(document).ready(function(){
		$('#employee_data').DataTable({
		
		});
	});
</script>



<?php
error_reporting(0);
include('connect.php');
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $designation = $_POST["designation"];


     if(!empty($name) && !empty($gender) && !empty($designation) ){
      $query = $connect->prepare(" INSERT INTO tbl_employee SET name = ?, gender = ?, designation = ? ");
        $query->execute([$name, $gender, $designation]);
        echo "<script type= 'text/javascript'>alert('UPDATE Successful');</script>";
               header('location:userUpdate.php');

     }else{
      echo "<script>All Fields are required</script>";
     }

  

?>



<!DOCTYPE html>
<html>
<head>
  <title>total employee list update</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container" >
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-body">
        <form method="POST">
        <label>Name</label>
          <input type="text" name="name" placeholder="john Brown..." class="form-control" required="text">
          <br>
          <label>Gender</label>
          <input type="text" name="gender" placeholder="male/female..." class="form-control" required="text">
          <br>
          <label>Designation</label>
          <input type="text" name="designation" placeholder="engineer etc..." class="form-control" required="text">
                     <br>
          <button type="submit" value="update" class="btn btn-success">UPDATE</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>