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
       
              $teacher = $_SESSION['teacher'];
      $query = "select distinct semester from course where t_username = '$teacher' ";
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
       
              $teacher = $_SESSION['teacher'];
      $query = "select * from course where t_username = '$teacher' ";
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
        <th scope="col">Present</th>
        <th scope="col">Absent</th>
      
      </tr>
    </thead>
    <tbody>
        <?php
        

    
        
        if(isset($_POST['show_attend']))
        {
          $semester=$_POST['semester'];
        
          $query1 = "select * from course where cname = '$_POST[subject]'";
          $result = mysqli_query($con,$query1);
          $row = mysqli_fetch_assoc($result);

          $sem1 = $_POST['semester'];
          $sem2 = $row['semester'];
          if($sem1==$sem2)
          {

          $teachername=$_SESSION['teacher'];
         
          $semester=$_POST['semester'];
          $subject=$_POST['subject'];
        
          $sql= "select distinct (date) from `t_attendance` where semester = '$semester'  AND subject='$subject' AND t_username='$teachername' order by date desc";

          $sql1 = "Select * from t_attendance";
          
        
        
            $result = mysqli_query($con,$sql);
            
      
            $result=mysqli_query($con,$sql);
            while ($row=mysqli_fetch_assoc($result)){
          

            ?>
  
            <tr>
  <td><?php echo $row['date']; ?></td>
  <?php
        $date1=$row['date'];

  $sql2 = "Select operations FROM t_attendance where semester = '$semester'  AND subject = '$subject' AND t_username='$teachername' AND date='$date1'";
  $result1 = mysqli_query($con,$sql1);
            $result2 = mysqli_query($con,$sql2);

            $present_count=0;
            $absent_count=0;
            
            if($result2)
            {
              while($row1 = mysqli_fetch_assoc($result2))
              {
                if($row1['operations']=='present')
                {
                  $present_count++;
                }
                else{
                  $absent_count++;
                }
              }
            }


  ?>
  <td><?php echo  $present_count;?></td>
  <td><?php echo $absent_count;?></td>
  <!-- <td>
  <button class='btn btn-primary' name ='show_report'><a href="report1.php?semester=<?php echo $row['semester']; ?>&section='<?php echo $row['section']; ?> " class="text-light"> Show Report</td> </button></td> -->


        </tr>



        </tr>
  <?php }}
 else{
  echo "<span style = 'color:red;'>Subject is not match in the semester.</span>";
}


}?>
    </tbody>
  </table>
        </body>
        </html>