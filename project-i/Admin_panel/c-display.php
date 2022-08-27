<?php
include 'header.php';
include 'connect.php';


?>

<button class="btn btn-primary" ><a  href="course.php" class="text-light">Assign Subject</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Course ID</th>
      <th scope="col">Course Name</th>
      <th scope="col">Semester</th>
      <th scope="col">Teacher Username</th>

    </tr>
  </thead>
  <tbody>
      <?php
        $sql= "select * from `course`";
        $result = mysqli_query($con,$sql);
        if($result){
      while ($row = mysqli_fetch_assoc($result)){

        $cid=$row['cid'];
        $cname=$row['cname'];
        $semester=$row['semester'];
        $teacher=$row['t_username'];
    
  
     echo '<tr>
     <th scope="row">'.$cid.'</th>
     <td>'.$cname.'</td>
     <td>'.$semester.'</td>
     <td>'.$teacher.'</td>
 

     <td>
     <button class="btn btn-primary" ><a  href="c-update.php?updateid='.$cid.' " class="text-light">Update</a></button>
     <button  class="btn btn-danger"><a  href="c-delete.php?deleteid='.$cid.' " class="text-light">Delete</a></button>
 </td>
    </tr>';  
    
    }
           
        }


?>


    
  </tbody>
</table>
    
</body>
</html>