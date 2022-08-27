<?php
        $id = $_GET['updateid'];
        include 'connect.php';
        include 'header.php';
        $sql="Select * from student where id= $id";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['id'];
            $name=$row['name'];
        $username=$row['username'];
        $useremail=$row['email'];
        $password=$row['password'];
        }        
?>
<html>
<head>  
<title>Update</title>
<link href="signup.css" rel="stylesheet" type="text/css" media="all" />
<link href="add_student.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

    <div class="container">
        
    <h3 class="create"> Update  account  </h3>

       <form action="" method="post">

       <label for="name" class="name"> Name: </label>
      
       <input type="text" name="txtname" placeholder="Name" value="<?php echo $name;?>">
</br>
    <label for="uname" class="uname"> UserName:</label>
 <input type="text" name="Username" placeholder="Username"  value="<?php echo $username; ?>"></br>
</br>
   <label class="e-mail"> E-mail </label>
    <input type="text" name="email"  placeholder="E-mail" value="<?php echo $useremail; ?>"> </br>

   <label class="password"> Password:</label>
    <input type="text" name="password" placeholder="Password" value="<?php echo $password; ?>" >  </br>

   <button class="btn btn-success" name="btn" > Update </button>
   </form>  
</div>
</body>
</html>

<?php
include 'connect.php';
 if(isset($_POST['btn'])) 
 {    
    
     // receive all input values from the form
     $id = $_GET['updateid'];
     $name = $_POST['txtname'];
     $username = $_POST['Username'];
     $useremail = $_POST['email'];
     $password = $_POST['password'];
 

       $sql= "update `student` set id=$id, name='$name', username='$username',email='$useremail',password='$password' where id=$id";
       $result=mysqli_query($con,$sql);
 if($result)
 {
     header('location:s-display.php');
 }
}

?>