<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
$id=$_GET['deleteid'];
$sql="delete from `teacher` where id=$id";
$result = mysqli_query($con,$sql);
if($result){
    // echo "Deleted sucessfully";
    header('location:t-display.php');
}else{
    die(mysqli_error($con));
}

}

?>