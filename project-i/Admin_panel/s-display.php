<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display student records</title>
    <link href="add_student.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<?php
include 'connect.php';
include 'header.php';
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">S_Id</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Father Name</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">Gender</th>
      <th scope="col">Semester</th>
 
    
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql= "select * from `student` order by semester asc";
        $result = mysqli_query($con,$sql);
        if($result){
      while ($row = mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $name=$row['name'];
        $username=$row['username']; 
        $email=$row['email'];   
         $fathername=$row['fathername'];
         $phone=$row['phone'];
         $address=$row['address'];
        $gender=$row['gender'];
         $semester=$row['semester'];
       
     


     echo '<tr>
     <th scope="row">'.$id.'</th>
     <td>'.$name.'</td>
     <td>'.$username.'</td>
     <td>'.$email.'</td>
     <td>'.$fathername.'</td>
     <td>'.$phone.'</td>
     <td>'.$address.'</td>
     <td>'.$gender.'</td>
     <td>'.$semester.'</td>
   
   

     <td>
     <button class="btn btn-primary" ><a  href="s-update.php?updateid='.$id.' " class="text-light">Update</a></button>
     <button  class="btn btn-danger"><a  href="s-delete.php ?deleteid='.$id.' " class="text-light">Delete</a></button>
 </td>
    </tr>'; 
    
    }
           
        }


?>


    
  </tbody>
</table>
    
</body>
</html>