<?php

        $id = $_GET['updateid'];
        include 'connect.php';
        include 'header.php';

        $sql="Select * from teacher where id= $id";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            $id=$row['id'];
            $name=$row['Name'];
        $username=$row['username'];
        $useremail=$row['email'];
        $phone=$row['phone'];
        $password=$row['password'];
        }   
        $nameErr=$usernameErr=$phoneErr=$useremailErr=$passwordErr=''; 
        $checkErr = false;


        if(isset($_POST['btn'])) 
        {    
            // receive all input values from the form
            $id = $_GET['updateid'];
            $name = $_POST['txtname'];
            $username = $_POST['Username'];
            $useremail = $_POST['email'];
            $phone=$_POST['phone'];
            $password = $_POST['password'];
        
       
//name
 if(empty($name))
 {
     $nameErr = "Name is required";
     $checkErr = true;
 }
 else if(!preg_match("/^[a-zA-Z]{3,}/",$name))
 {
     $nameErr = "Invalid Name";
     $checkErr = true;
 }
 //phone
 if(empty($phone))
 {
     $phoneErr = "phone number is required";
     $checkErr = true;
 }
 else if(!preg_match("/^[0-9]{10}$/",$phone))
 {
     $phoneErr = "Invalid phone";
     $checkErr = true;
 }
 //email
 if(empty($useremail))
 {
     $useremailErr = "E-mail is required";
     $checkErr = true;
 }
 else if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$useremail))
 {
     $useremailErr = "Invalid E-mail";
     $checkErr = true;
 }
 //username
 if(empty($username))
 {
     $usernameErr = "Username is required";
     $checkErr = true;
 }
 else if(!preg_match("/^[a-zA-Z]{3,}/",$username))
 {
     $usernameErr = "Invalid Username";
     $checkErr = true;
 }
 //password

 if(empty($password))
 {
     $passwordErr = "password is required";
     $checkErr = true;
 }
 else if(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$password))
 {
     $passwordErr = "Invalid password";
     $checkErr = true;
 }

    if($checkErr==false)
    {
        $sql1= "update `teacher` set id=$id, Name='$name', username='$username',email='$useremail',phone='$phone',password='$password'  where id=$id";
        $result=mysqli_query($con,$sql1);
        if($result)
  {
         header('location:t-display.php');
       
  }

    } 
 } 
?>
<html>
<head>  
<title>Update Teacher</title>

<link href="add_student.css" rel="stylesheet" type="text/css" media="all" />
</head>
<h2 align = "center">Update Teacher</h2>
<form action=""class = "myForm" method="POST">

Name: <input type="text" id = "name"  name = "txtname" value="<?php echo $name;?>"> 
<div id = "message1" class = "errormsg"> <?php echo $nameErr; ?> </div>

Username: <input type="text" id = "uname" size="55" name = "Username" value="<?php echo $username;?>"> 
<div id = "messagea" class = "errormsg"><?php echo $usernameErr; ?></div>

Email: <input type="text" id = "email" size="55" name = "email" value="<?php echo $useremail;?>"> 
<div id = "message2" class = "errormsg"><?php echo $useremailErr; ?></div>

Phone Number: 
<input type="text" id = "phone" size="55" name = "phone" value="<?php echo $phone;?>" > 
<div id = "message3" class = "errormsg"><?php echo $phoneErr; ?></div>

Password:
<input type="password" id = "password" size="55" name = "password" value="<?php echo $password;?>"> 
<div id = "message5" class = "errormsg"><?php echo $passwordErr; ?></div>

<br><input type="submit" value="Update"  class='btn btn-primary' name = "btn">

</form>
</body>
</html>

