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
        $fathername=$row['fathername'];
        $phone=$row['phone'];
        $address=$row['address'];
        $gender = $row['gender'];
        $semester = $row['semester'];
        $useremail=$row['email'];
        $password=$row['password'];
  
        } 
          
        
     $nameErr=$usernameErr=$fathernameErr=$phoneErr=$addressErr=$genderErr=$useremailErr=$semesterErr=$sectionErr=$passwordErr=''; 
     $checkErr = false;

     
 if(isset($_POST['btn'])) 
 {    
    
     // receive all input values from the form
     $id = $_GET['updateid'];
     $name = $_POST['txtname'];
     $username = $_POST['Username'];
     $fathername = $_POST['fathername'];
     $phone = $_POST['phone'];
     $address = $_POST['address'];
    $gender = $_POST['gender'];
    $semester=$_POST['semester'];
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


 if(empty($fathername))
 {
     $fathernameErr = "Father Name is required";
     $checkErr = true;
 }
 else if(!preg_match("/^[a-zA-Z]{3,}/",$fathername))
 {
     $nameErr = "Invalid Father Name";
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
        $sql= "update `student` set id=$id, name='$name', username='$username',fathername='$fathername',phone='$phone',address='$address',gender='$gender',semester='$semester',email='$useremail',password='$password' where id=$id";
        $result=mysqli_query($con,$sql);
  if($result)
  {
      header('location:s-display.php');
  }
    }
 
}
            
?>
<html>
<head>  
<title>Update Student</title>

<link href="add_student.css" rel="stylesheet" type="text/css" media="all" />
</head>


<body>
<h2 align = "center">Update Student</h2>
<form action="" class = "myForm"  
method="POST">

Name: <input type="text" id = "name"  name = "txtname" value="<?php echo $name;?>"> 
<div id = "message1" class = "errormsg"><?php echo $nameErr; ?></div>

Username: <input type="text" id = "uname" size="55" name = "Username" value="<?php echo $username;?>"> 
<div id = "messagea" class = "errormsg"><?php echo $usernameErr; ?></div>

Fathername: <input type="text" id = "fname" size="55" name = "fathername" value="<?php echo $fathername;?>"> 
<div id = "messageb" class = "errormsg"><?php echo $fathernameErr; ?></div>

Email: <input type="text" id = "email" size="55" name = "email" value="<?php echo $useremail;?>"> 
<div id = "message2" class = "errormsg"><?php echo $useremailErr; ?></div>


Phone Number: 
<input type="text" id = "phone" size="55" name = "phone" value="<?php echo $phone;?>" > 
<div id = "message3" class = "errormsg"><?php echo $phoneErr; ?></div>

Address: 
<input type="text" id = "address" name = "address" value="<?php echo $address;?>"> 
<div id = "message4" class = "errormsg"><?php echo $addressErr; ?></div>

Gender: 
Male<input type="radio" id = "gender1" value='Male' <?php 
      if($gender=='Male')
      {
          echo 'checked';
      }
?> name = "gender">



Female<input type="radio" id = "gender2" value='Female'<?php 
      if($gender=='Female')
      {
          echo 'checked';
      }
?> name = "gender"> 


Others<input type="radio" id = "gender3" value='Others'
<?php 
      if($gender=='Others')
      {
          echo 'checked';
      }
?> name = "gender"> 
<div id = "messagegender" class = "errormsg"></div>

<div>
Semester:
<select name='semester'> 
<option value="first"
<?php 
if( $semester=='first'){
   echo 'selected';
}
?>
>First</option>
<option value="Second"
<?php 
if ($semester=='Second'){
   echo 'selected';
}
?>
>Second</option>
<option value="Third"
<?php 
if ($semester=='Third'){
   echo 'selected';
}
?>>Third</option>
<option value="Fourth"
<?php 
if ($semester=='Fourth'){
   echo 'selected';
}
?>>Fourth</option>
<option value="Fifth"
<?php 
if ($semester=='Fifth'){
   echo 'selected';
}
?>>Fifth</option>
</select>

</br>

Password: 
<input type="password" id = "password" size="55" name = "password"  value="<?php echo $password;?>"> 
<div id = "message5" class = "errormsg"><?php echo $passwordErr; ?></div>


<br><input type="submit" value="Update"  class='btn btn-primary' name = "btn">
</div>
</form>
</body>
</html>

<?php


?>