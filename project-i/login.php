<!DOCTYPE HTML>
<html>
<head>

   <link rel="stylesheet" href="login.css">
</head>
<body>
<h1>Attendance Management System</h1>    
<div class="container">
    
        <form method="POST" action="login.php">
            
Username: <input type="text" id = "uname" size="55" name = "username" placeholder="Enter your username"> 

       
Password: 
<input type="password" id = "password" name = "password" placeholder="Enter your password"> 
       
  <button type="submit" value="login" name="login" class="btn btn-warning" >Log in</button>
</br>
  

<?php

session_start();

if(isset($_POST["login"]))
{

    
if(!empty($_POST['username']) && !empty($_POST['password'])) {
    
	$username=$_POST['username'];
	$pass=$_POST['password'];
    $db = mysqli_connect("localhost","root","","attendance");
    
	$query1=mysqli_query($db,"SELECT * FROM admin WHERE username= '".$username."' AND password='".$pass."'");
    $query2=mysqli_query($db,"SELECT * FROM student WHERE username= '".$username."' AND password='".$pass."'");
    $query3=mysqli_query($db,"SELECT * FROM teacher WHERE username= '".$username."' AND password='".$pass."'");
    
   	$numrows1=mysqli_num_rows($query1);
    $numrows2=mysqli_num_rows($query2);
    $numrows3=mysqli_num_rows($query3);
    
	if($numrows1 !=0)
	{
        while($row=mysqli_fetch_assoc($query1))
        {
            
            $dbpass=$row['password'];
            $dbusername=$row['username'];    
	    }

        
        if($username == $dbusername && $pass == $dbpass)
        {

            $_SESSION['teacher']= $dbusername;

            /* Redirect browser */
         header("location:Admin_panel\dashboard.php");
        }
	}
    if($numrows2 !=0)
	{
        while($row=mysqli_fetch_assoc($query2))
        {
            
            $dbpass=$row['password'];
            $dbusername=$row['username'];    
	    }

        
        if($username == $dbusername && $pass == $dbpass)
        {

            $_SESSION['student']= $dbusername;

            /* Redirect browser */
         header("location:student panel\dashboard.php");
        }
	}  
    if($numrows3 !=0)
	{
        while($row=mysqli_fetch_assoc($query3))
        {
            
            $dbpass=$row['password'];
            $dbusername=$row['username'];    
	    }

        
        if($username == $dbusername && $pass == $dbpass)
        {

            $_SESSION['teacher']= $dbusername;

            /* Redirect browser */
         header("location:teacher panel\dashboard.php");
        }
       
      
	}
    else {
        echo "<span style = 'color:red;'>Invalid Username or Password</span>";
    } 

} 
else {
    echo "<span style = 'color:red;'>Empty Username or Password</span>";
}
}
?>
  </form>
    </div>     
</body>
</html>