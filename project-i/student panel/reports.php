<?php
 session_start();

?>


  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>View  Attendance</title>
  </head>
  <body>
  <?php
  include 'connect.php';
  include 'header.php';
  ?>
  <header>

  </header>
  <form method='POST'>
  <table class="table">
    Semester:
    <select name = 'semester'>
      <?php
       
          $student=$_SESSION['student'];
      $query = "select distinct semester from student where username='$student' ";
      $result = mysqli_query($con,$query);
           
            
            while($row = mysqli_fetch_assoc($result))
            { 
                $val = $row['semester'];
                echo "<option value = '$val'> ";
                echo $row['semester'];
                echo "</option>";
               
            }
     
        ?>
    
    </select>
  
  Subject:
  <select name = 'subject'>
      <?php
      $query = "select * from course where semester='$val' ";
      $result = mysqli_query($con,$query);
       
            while($row = mysqli_fetch_assoc($result))
            { 
                $val = $row['cname'];
                echo "<option value = '$val'> ";
                echo $row['cname'];
                echo "</option>";
            }
            

           
           
        ?>
    
    </select>


    <button class='btn btn-primary' name ='show_attend'>Show Reports</td> </button>

    <thead>
  
      <tr>
     
        <th scope="col">Date</th>
        <th scope="col">Attendance</th>
       
      
      </tr>
    </thead>
    <tbody>
        <?php
               
        if(isset($_POST['show_attend']))
        {
 
          $semester=$_POST['semester'];
          $subject=$_POST['subject'];
        
          $sql= "select * from `t_attendance` where semester = '$semester' AND subject='$subject' AND s_username='$student' order by date desc ";
        
            $result=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_assoc($result)){
          
            ?>
            <tr>
           
                <td><?php echo $row['date']?></td>
                <td><?php echo $row['operations'] ?></td>

            </tr>
            
          
        <?php  } }?>






 
    </tbody>
  </table>
        </body>
        </html>