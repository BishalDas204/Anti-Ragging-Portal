<?php
session_start();
//making connection to database
include 'dbconnect.php';
//take input from the form
$user=$_POST['user'];
$pas=$_POST['pas'];
$vpas=FALSE;
//hasing data
$hsql="SELECT `pas` FROM `students` WHERE `email`='$user' ";
$query=mysqli_query($conn,$hsql);
$hash_data=mysqli_fetch_assoc($query);
if ($hash_data!=NULL) {
  //verify password
  $vpas=password_verify($pas,$hash_data['pas']);
}
if ($vpas) {
  //sql query
$sql="SELECT `name`, `email`, `pn`, `coll name` FROM `students` WHERE `email`='$user'";
$query=mysqli_query($conn, $sql);
//fetching data from query
$data=mysqli_fetch_assoc($query);  
        //set session variable
        $_SESSION['name']=$data['name'];
        $_SESSION['email']=$data['email'];
        $_SESSION['pn']=$data['pn'];
        $_SESSION['coll name']=$data['coll name'];
    header("Location: Welcome.php");
}
else{
    echo "<center>Incorrect credentials.</center> <br>";
    echo "<center><a href='/arp/login.html'>Back</a></center>";
    session_unset();
    session_destroy();
}

?>
