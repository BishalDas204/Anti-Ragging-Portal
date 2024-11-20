<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arp</title>
</head>
<body>
<?php
 //making connection to database
 include 'dbconnect.php';
//take input from the form
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass_user=$_POST['pass'];
$coll=$_POST['college'];
//password hasing
$hash=password_hash($pass_user,PASSWORD_DEFAULT);
if ((strlen($name)>20)||(strlen($email)>100) || (strlen($phone)>10) || (strlen($coll)>100) || (strlen($pass_user)>20)) {
  echo "Input out of lenghth <br>";
}
else{
  try {
    //inserting input to database
    $sql="INSERT INTO `students` (`name`, `email`, `pn`, `pas`, `coll name`) VALUES ('$name', '$email', '$phone', '$hash', '$coll')";
    $insert=mysqli_query($conn, $sql);
    echo "<center>Sign Up Sucessfully</center><br>";
    echo "<center>
     <a href='/arp/login.html'>Log In</a>
     <br>
      <a href='/arp/index.html'>Home</a>
    </center>" ;
    }
      
    //catch exception
      catch(Exception $e) {
        echo '<center>Sign Up Unsucessful. Email or phone number already exsist</center>';
        echo "<br>
        <center>
     <a href='login.html'>Sign up</a>
     <br>
     <a href='/arp/index.html'>Home</a>
    </center>";
      }
}

 ?>
</body>
</html>