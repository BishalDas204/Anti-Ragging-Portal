<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title> Admin Registration </title> 
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #4070f4;
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
    </style>
   </head>
<body>
  <div class="wrapper">
    <!-- sign up part -->
<?php
if (isset($_POST['register'])) {
    
 //making connection to database
 include 'dbconnect.php';
//take input from the form
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$pass_user=$_POST['pass'];
//password hasing
$hash=password_hash($pass_user,PASSWORD_DEFAULT);
  try {
    //inserting input to database
    $sql="INSERT INTO `admin` (`name`, `email`, `pn`, `pas`) VALUES ('$name', '$email', '$phone', '$hash')";
    $insert=mysqli_query($conn, $sql);
    echo '
    <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Registration sucessful</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> ';
    }
      
    //catch exception
      catch(Exception $e) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Registration fail</strong>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> ';
      }
}
 ?>
    <h2>Admin Registration</h2>
    <form action="admin_signup.php" method="post">
      <div class="input-box">
        <input type="text" placeholder="Enter your name" required name="name"> 
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" required name="email">
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your phone number" required name="phone">
      </div>
      <div class="input-box">
        <input type="password" placeholder="Create password" required name="pass">
      </div>
      <div class="input-box button">
        <input type="Submit" value="Register Now" name="register">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="http://localhost/arp/admin_login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>
</html>
