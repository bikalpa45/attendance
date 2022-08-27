<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance</title>
    <?php
      include 'connect.php';
      include 'connect.php';
    ?>
<link rel="stylesheet" href="add_student.css">
</head>
<body>
<header>
<h1 class="dash">Attendance Management System</h1>
    <div class="">
        <center>

            <div class="navbar">
                <ul>
                    <li> <a href="add_student.php">Add Student</a></li>
                    <li> <a href="take_attendance.php">Take Attendance</a></li>
                    <li> <a href="viewattendance.php">View Attendance</a></li>
                    <li> <a href="logout.php">log out</a></li>
                    </ul>
            
                </center>
</header>
  
    <form action="">
    <select name="se" id="sem">
             <option value="First">first sem</option>
             <option value="Second">second sem</option>
             <?php 
     $val='sem';


?>
        </select>
        </select>

        <select name="subject" id="sub">
             <option id='1' value="dbms">Dbms</option>
             <option value="os">os</option>


<?php 
     $val='sub';


?>
        </select>
     

        <td><a class='btn btn-primary' href= "take_attendance.php?subject=<?php echo $row['$subject']; ?>">Take attendance</td>

    </form>
    
<?php 
  



?>
</body>
</html>