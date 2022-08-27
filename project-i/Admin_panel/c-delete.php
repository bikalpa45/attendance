<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
$cid=$_GET['deleteid'];
$sql="delete from `course` where cid=$cid";
$result = mysqli_query($con,$sql);
if($result){
    // echo "Deleted sucessfully";
    header('location:c-display.php');
}else{
    die(mysqli_error($con));
}

}

?>