<?php 
$message = "";
 try{
      $dbc = new PDO("mysql:host=localhost;dbname=jcobase", "root", "");
      $dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT * FROM tbl_employee ORDER BY id DESC";
      $stmt=$dbc->prepare($query);
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
          <td>Id</td>
          <td>Name</td>
          <td>Gender</td>
          <td>Designation</td>
        </tr>
      </thead>

      <?php
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<tr>

                <td>'.$row["id"].'</td>
                 <td>'.$row["name"].'</td>
                  <td>'.$row["gender"].'</td>
                   <td>'.$row["designation"].'</td>

                </tr>';
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
