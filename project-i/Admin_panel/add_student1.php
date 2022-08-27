

<!DOCTYPE html>
<html lang="en">
<head>
<title>Add Student</title>
<link  href='add_student.css' rel='stylesheet' />



<?php

    $nameErr=$usernameErr=$fathernameErr=$phoneErr=$addressErr=$genderErr=$useremailErr=$semesterErr=$sectionErr=$passwordErr=''; 
    $checkErr = false;


include 'connect.php';
include 'header.php';


if(isset($_POST['btn'])) 
{   
    $sql="Select * from student";
    $result=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
        $username1=$row['username'];
    }
   
	// receive all input values from the form
    $name = $_POST['txtname'];
    $username = $_POST['Username'];
    $fathername=$_POST['fathername'];
    $phone = $_POST['phone'];
	$address= $_POST['address'];
    $gender = $_POST['gender'];
	$useremail = $_POST['email'];
    $semester = $_POST['class'];
  
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


    if(empty($fathername))
    {
        $fathernameErr = "Father Name is required";
        $checkErr = true;
    }
    else if(!preg_match("/^[a-zA-Z]{3,}/",$fathername))
    {
        $fathernameErr = "Invalid Father Name";
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
    else if($username==$username1){
        $usernameErr = "Username already exist";
        $checkErr = true;
    }
    else if(!preg_match("/^[a-zA-Z][a-zA-Z0-9]{3,}/",$username))
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
        $sql="insert into `student` (name,username,fathername,phone,address,gender,semester,email,password) values('$name','$username','$fathername','$phone','$address','$gender','$semester','$useremail','$password')";
            $result=mysqli_query($con,$sql);
            if($result){ 
                // echo"data inserted sucessfully";
                header('location:s-display.php');
                
            }else{
                die(mysql_error($con));
            }
    }
 
      }


?>
</head>
<body>
<h2 align = "center" >Add Student</h2>
<form action="" class = "myForm"  method="POST">

Name: <input type="text" id = "name"  name = "txtname" > 
<div id = "message1" class = "errormsg" > <?php echo $nameErr; ?></div>

Username: <input type="text" id = "uname" size="55" name = "Username"> 
<div id = "messagea" class = "errormsg"><?php echo $usernameErr; ?></div>

Fathername: <input type="text" id = "fname" size="55" name = "fathername"> 
<div id = "messageb" class = "errormsg"><?php echo $fathernameErr; ?></div>

Email: <input type="text" id = "email" size="55" name = "email"> 
<div id = "message2" class = "errormsg"><?php echo $useremailErr; ?></div>

Phone Number: 
<input type="text" id = "phone" size="55" name = "phone"> 
<div id = "message3" class = "errormsg"><?php echo $phoneErr; ?></div>

Address: 
<input type="text" id = "address" name = "address"> 
<div id = "message4" class = "errormsg"></div>

Gender:
Male<input type="radio" id = "gender1" value='Male' name = "gender" required> 
Female<input type="radio" id = "gender2" value='Female' name = "gender" required> 
Others<input type="radio" id = "gender3" value='Others' name = "gender" required> 
<div id = "messagegender" class = "errormsg"></div>

<div>
Semester:
<select name='class'> 
<option value="first">First</option>
<option value="Second">Second</option>
<option value="Third">Third</option>
<option value="Fourth">Fourth</option>
<option value="Fifth">Fifth</option>
</select>

</br>

Password: 
<input type="password" id = "pass" name = "password"> 
<div id = "message5" class = "errormsg"><?php echo $passwordErr; ?></div>


<br><input type="submit" value="Add Student"  class='btn btn-primary' name = "btn">
</div>
</form>
</body>
</html>

