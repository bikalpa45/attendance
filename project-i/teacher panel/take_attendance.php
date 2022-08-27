<?php
 session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Attendance</title>
</head>
<body>
<?php
include 'connect.php';
include 'header.php';

?>
<header>
<h3>Attendance of <?php echo date('Y-m-d'); ?></h3>
</header>
<form  method='POST'>
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
Teacher:
  <input type="text" name = "teacher" value = "<?php echo $_SESSION['teacher'];?> ">
  <button class='btn btn-primary' name ='show_attend'>Show Student</td> </button>

  <thead>
    <tr>
      <th scope="col">S_no</th>
      <th scope="col">Name</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
  
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
      <?php
      //data from database           
      $count = 0;
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
            $sql= "select * from `student` where semester = '$semester' ";
            $result = mysqli_query($con,$sql);
            
          
          while ($row = mysqli_fetch_assoc($result))
          {     
            $count++;
        
            
              echo "<tr>
              <td>".$row['id']."</td>
              <td>".$row['name']."</td>
              <td>".$row['username']."</td>
              <td>".$row['email']."</td>
          
              
              <td>
                Present <input   type='radio'  name='attendance[$row[username]]' value='present'> 
                Absent <input  type='radio'  name='attendance[$row[username]]' value='absent'> 
                
              </td>
                    </tr>";                         
    
          }
          }
          else{
            echo "<span style = 'color:red;'>Subject is not match in the semester.</span>";
          }
             
        } 
        //Take attendance
  if(isset($_POST['attendance1']))
  {
  
        
          $semester=$_POST['semester'];
          $subject=$_POST['subject'];
          $t_name = $_POST['teacher'];
  
      $date1 = date("Y-m-d");
      $att=$_POST["attendance"];
      
      $query= "select distinct date,semester,subject , t_username from t_attendance";
      $result = mysqli_query($con,$query);
      $b=false;
      if($result->num_rows>0){
        while($check = mysqli_fetch_assoc($result)){
  
         if($date1==$check['date']&&$semester==$check['semester']  && $subject==$check['subject']  ){
          $b=true;
          echo "<div class='alert alert-danger'>Attendance already taken!!;</div>";
          
        }
      }
      }


    if (!$b){
   
      if(count($att)==$count)
      {

      
      foreach($att as $key => $value){
        if($value=="present"){
          $query= "insert into t_attendance(s_username,t_username,semester,  subject,operations,date) values('$key','$t_name','$semester','$subject','present','$date1')";
          // $insertresult=$con->query($query);
          mysqli_query($con,$query);
          // header('location:take_attendance.php');
        }
  
        else{
          $query= "insert into t_attendance(s_username,t_username,semester,  subject,operations,date) values('$key','$t_name','$semester','$subject','absent','$date1')";
          // $insertresult=$con->query($query);
          mysqli_query($con,$query);
          // header('location:take_attendance.php');
    
        }
      }
      } 
      else{
        echo "<script>
        alert('Course added successfully!')
        </script>";
      }

      }

  }

  
  
  ?>
  </tbody>
</table>


<button class='btn btn-primary' name='attendance1' value= 'save'>Take attendance</button>
</form>
    
</body>
</html>