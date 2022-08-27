<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assigne Teacher</title>
    <?php 
             include 'connect.php';
             include 'header.php';

             $cid = $_GET['updateid'];
             $sql="Select * from course where cid= $cid";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
        $courseid=$row['cid'];
         $semester=$row['semester'];
        $coursename=$row['cname'];
        $t_username=$row['t_username'];
        }

        
    ?>
</head>
<body>
    <center>`
<h2>Assigne Subject</h2>
<form action="" class = "myForm"  method="POST">
      
Course Id: <input type="text" id = "course" size='55' name = "courseid" value="<?php echo $courseid;?>"> 
<div id = "message1" class = "errormsg" ></div>

Course Name: <input type="text" id = "cname" size="55" name = "coursename" value="<?php echo $coursename;?>"> 
<div id = "messagea" class = "errormsg"></div>

Semester 
<select name="semester" >
<option value="First" <?php
if($semester='First'){
    echo 'selected';}?>
}>First</option>
<option value="Second"
<?php  
if ($semester='Second'){
    echo 'selected';
}  ?>>Second</option>
</select>
<br><br>
Teacher:<select name = 'teacher'>
      <?php
      $query = "select * from teacher";
      $result = mysqli_query($con,$query);
           
            
            while($row = mysqli_fetch_assoc($result))
            { 
                $val = $row['username'];
                echo "<option value = '$val'" if ($val='$t_username'){
                    echo 'selected';
                }" 
                
                > ";
                echo $row['Name'];
                echo "</option>";
            }

           
           
        ?>
        </select><br><br>
<button class='btn btn-primary' name='assign_subject' value= 'save'>Update</button>





    
</center>


</body>
</html>
<?php
if(isset($_POST['assign_subject']))
  {
    $courseid=$_POST['courseid'];
    $coursename=$_POST['coursename'];
    $semester=$_POST['semester'];
    $t_username=$_POST['teacher'];

    $sql= "update `course` set cid=$courseid, cname='$coursename', semester='$semester', t_username='$t_username' where cid=$cid";
    $result=mysqli_query($con,$sql);
if($result)
{
  header('location:c-display.php');
}
    else{
        echo "error";
    }
  }
  
  ?>