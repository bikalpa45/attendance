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


    ?>
</head>
<body>
    <center>`
<h2>Assigne Subject</h2>
<form action="" class = "myForm"  method="POST">
      
Course Id: <input type="text" id = "course" size='55' name = "courseid" > 
<div id = "message1" class = "errormsg" ></div>

Course Name: <input type="text" id = "cname" size="55" name = "coursename"> 
<div id = "messagea" class = "errormsg"></div>

Semester:
<select name="semester" >
<option value="First">First</option>
<option value="Second">Second</option>
<option value="Third">Third</option>
<option value="Fourth">Fourth</option>
<option value="Fifth">Fifth</option>
</select>
<br><br>
Teacher:<select name = 'teacher'>
      <?php
      $query = "select * from teacher";
      $result = mysqli_query($con,$query);
           
            
            while($row = mysqli_fetch_assoc($result))
            { 
                $val = $row['username'];
                echo "<option value = '$val'> ";
                echo $row['Name'];
                echo "</option>";
            }

           
           
        ?>
        </select><br><br>
<button class='btn btn-primary' name='assign_subject' value= 'save'>Assign teacher</button>





    
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

    $query = "Insert into course (cid ,semester,cname,t_username)values('$courseid','$semester', '$coursename','$t_username')";
    $result = mysqli_query($con,$query);
     
    if($result)
    {
        echo "<script>
        alert('Course added successfully!')
        </script>";
    }
    else{
        echo "error";
    }
  }
  
  ?>