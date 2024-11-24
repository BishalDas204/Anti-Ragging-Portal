<!-- sign up part -->
<?php
if (isset($_POST['signup'])) {
    
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
    header("Location: signup_success.php");
    }
      
    //catch exception
      catch(Exception $e) {
        header("Location: signup_fail.php");
      }
}
}
 ?>
 <!-- login part -->
 <?php
 if (isset($_POST['login'])){
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
    header("Location: login_fail.php");
  }
 }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anti-ragging portal</title>
    <link rel="stylesheet" type="text/css"href="login.css">
</head>
<body>
    <center>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form action="http://localhost/arp/login.php" method="POST">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="name" placeholder="Enter Name" required>
                <input type="email" name="email" placeholder="Enter Email" required>
                <input type="tel" name="phone" placeholder="Enter your phone number" required>
                <input type="text" name="pass" placeholder="Enter a Password" required>
                <input type="text" name="college" placeholder="Enter college name" required>
                <button type="submit" name="signup">Sign up</button>
            </form>
        </div>
        <div class="login">
            <form action="http://localhost/arp/login.php" method="POST">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email"name="user" placeholder="Enter Email" required>
                <input type="Password" name="pas" placeholder="Enter Password" required>
                <button name="login" type="submit">Login</button>
            </form>
        </div>
    </div>
</center>
</body>
</html>