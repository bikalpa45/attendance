<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Teacher records </title>
    <link href="add_student.css" rel="stylesheet" type="text/css" media="all" />
    <style>
tr{
  margin: 50px;
}

    </style>
    
</head>
<body>

<?php
include 'connect.php';
include 'header.php';
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">T_Id</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
      <?php
        $sql= "select * from `Teacher`";
        $result = mysqli_query($con,$sql);
        if($result){
      while ($row = mysqli_fetch_assoc($result)){

        $id=$row['id'];
        $name=$row['Name'];
        $username=$row['username'];
        $phone=$row['phone'];
    
        $email=$row['email'];
        $password=$row['password'];
     echo '<tr>
     <th scope="row">'.$id.'</th>
     <td>'.$name.'</td>
     <td>'.$username.'</td>
     <td>'.$phone.'</td>
     <td>'.$email.'</td>
     <td>'.$password.'</td>

     <td>
     <button class="btn btn-primary" ><a  href="t-update2.php?updateid='.$id.' " class="text-light">Update</a></button>
     <button  class="btn btn-danger"><a  href="t-delete.php?deleteid='.$id.' " class="text-light">Delete</a></button>
 </td>
    </tr>';  
    
    }
           
        }


?>


    
  </tbody>
</table>
    
</body>
</html>