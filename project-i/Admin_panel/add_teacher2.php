<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Teacher</title>
    <link  href='add_student.css' rel='stylesheet' />
    <?php

$nameErr=$usernameErr=$fathernameErr=$phoneErr=$addressErr=$genderErr=$useremailErr=$semesterErr=$sectionErr=$passwordErr=''; 
$checkErr = false;
include 'connect.php';
include 'header.php';
if(isset($_POST['btn'])) 
{    
	// receive all input values from the form
    $name = $_POST['txtname'];
    $username = $_POST['Username'];
    $phone = $_POST['phone'];
	$useremail = $_POST['email'];
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
 
     //fathername
 
 
    //  if(empty($fathername))
    //  {
    //      $fathernameErr = "Father Name is required";
    //      $checkErr = true;
    //  }
    //  else if(!preg_match("/^[a-zA-Z]{3,}/",$fathername))
    //  {
    //      $fathernameErr = "Invalid Father Name";
    //      $checkErr = true;
    //  }
 
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
     else if(!preg_match("/^[a-zA-Z]{3,}/",$password))
     {
         $passwordErr = "Invalid password";
         $checkErr = true;
     }
 
     
 
     if($checkErr==false)
     {
        $sql="insert into `teacher` (name,username,phone,email,password) values('$name','$username','$phone','$useremail','$password')";
        $result=mysqli_query($con,$sql);
        if($result){
            // echo"data inserted sucessfully";
            header('location:t-display.php');
            
        }else{
            die(mysql_error($con));
        }
     }
  
 
 
 }



?>
</head>
<body>
    

<body>
<h2 align = "center">Add Teacher</h2>
<form action="" class = "myForm"  method="POST">

Name: <input type="text" id = "name"  name = "txtname"> 
<div id = "message1" class = "errormsg"> <?php echo $nameErr; ?> </div>

Username: <input type="text" id = "uname" size="55" name = "Username"> 
<div id = "messagea" class = "errormsg"><?php echo $usernameErr; ?></div>

Email: <input type="text" id = "email" size="55" name = "email"> 
<div id = "message2" class = "errormsg"><?php echo $useremailErr; ?></div>

Phone Number: 
<input type="text" id = "phone" size="55" name = "phone"> 
<div id = "message3" class = "errormsg"><?php echo $phoneErr; ?></div>

Password: 
<input type="password" id = "pass" name = "password"> 
<div id = "message5" class = "errormsg"><?php echo $passwordErr; ?></div>

<br><input type="submit" value="Add Teacher"  class='btn btn-primary' name = "btn">

</form>
</body>
</html>