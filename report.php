<?php
// starting session
session_start();
?>

<!-- php code for reporting -->
<?php
if(isset($_SESSION['email'])){
    // <!-- html ,css, javascript -->
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
<body>
<!-- nav bar -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand">Report</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page">'.$_SESSION['name'].'</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">'.$_SESSION['email'].'</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    <form action="http://localhost/arp/report.php" method="POST">
        <h1>Reporter details</h1>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Course</label>
          <input required name="rc" type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter your course name">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Semester</label>
          <input required name="rs" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Your current semester">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput2" class="form-label">Roll No.</label>
          <input required name="rr" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Your roll number">
        </div>
          <div class="form-floating">
          <textarea required name="rm" class="form-control" id="floatingTextarea2" style="height: 100px"></textarea>
          <label for="floatingTextarea2">Describe the incident within 200 characters</label> 
        </div>
        <hr>
        <h1>Offender details</h1>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Name</label>
          <input name="an" required type="text" class="form-control" id="formGroupExampleInput" placeholder="Name of the offender">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">College name</label>
          <input required name="aco" type="text" class="form-control" id="formGroupExampleInput" placeholder="Offender college name">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Course</label>
          <input required name="ac" type="text" class="form-control" id="formGroupExampleInput" placeholder="Offender course name">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Semester</label>
          <input required name="as" type="text" class="form-control" id="formGroupExampleInput" placeholder="Offender current semester">
        </div>
        <div class="mb-3">
          <label for="formGroupExampleInput" class="form-label">Roll No.</label>
          <input required name="ar" type="text" class="form-control" id="formGroupExampleInput" placeholder="Offender roll number">
        </div>
        <div class="mb-3">
        <input class="btn btn-primary" type="submit" value="Submit">
        </div>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>';
    if ($_SERVER['REQUEST_METHOD']=='POST'){
    #connecting to database
    include 'dbconnect.php';
    # storing values
    $rname=$_SESSION['name'];
    $rmail=$_SESSION['email'];
    $rcollege=$_SESSION['coll name'];
    $rcourse=$_POST['rc'];
    $rsem=$_POST['rs'];
    $rroll=$_POST['rr'];
    $rmsg=$_POST['rm'];
    $aname=$_POST['an'];
    $acollege=$_POST['aco'];
    $acourse=$_POST['ac'];
    $asem=$_POST['as'];
    $aroll=$_POST['ar'];
    $sta="Unsolved";
    try {
      $sql="SELECT `r_id` FROM `report`";
      $check_id_no=mysqli_query($conn, $sql);
      $cal_row=mysqli_num_rows($check_id_no);
      if ($cal_row>0) {
        $rid=$cal_row+1;
      }
      else {
        $rid=1;
      }
    } catch (Throwable $th) {
       echo "Something went wrong";
    }
    try{

    // sql query
    $sql="INSERT INTO `report` (
    `r_id`,
    `r_name`, 
    `r_mail`, 
    `r_college`, 
    `r_course`, 
    `r_sem`, 
    `r_roll`, 
    `r_msg`,
    `a_name`,  
    `a_college`, 
    `a_course`, 
    `a_sem`, 
    `a_roll`,
    `r_date`,
    `sta`
    ) 
    VALUES (
    '$rid', 
    '$rname', 
    '$rmail', 
    '$rcollege', 
    '$rcourse', 
    '$rsem',
    '$rroll',
    '$rmsg',
    '$aname',
    '$acollege',
    '$acourse',
    '$asem',
    '$aroll',
    NOW(),
    '$sta'
    )";
    // sql query executing
    $insert=mysqli_query($conn, $sql);
   echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Done. Your Id reference no. is '.$rid.'</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    ';
    include 'rcount.php';
}
catch(Exception $e){
  echo' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Try again</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
    ';

} 
// try{
// //file name
// $file_name='Report ID '.$rid;
// //opening file as write mode
// $file=fopen($file_name,"w");
// $text="Reporter Details\n Reporter: ".$rname."\n Reporter's Roll: ".$rroll."\n Reporter's college name: ".$rcollege.
// "\n Report: ".$rmsg."\nReporter's course: ".$rcourse."\nReporter's Semester: ".$rsem."\n\nAccuser Details \n Accuser: ".$aname
// ."\n Accuser's Roll: ".$aroll."\n Accuser's college name: ".$acollege."\nAccuser's course: ".$acourse."\nAccuser's Semester: ".$asem;
//     fwrite($file, $text);
//     fclose($file);
// }
// catch(Exception $e){
//   echo "Unable to create file";
// }
// PDF of report
// try {
// include('\xampp\htdocs\fpdf186\fpdf.php');
// $pdf=new FPDF('p','mm','A4');
// $pdf->AddPage();
// $pdf->SetFont('Arial','B',20);
// $pdf->Cell(180,5,'Report',0,0,'C');
// $pdf->Cell(50,5,'',0,1,);
// //Reporter's details
// $pdf->Cell(50,5,'Name = '.$rname,0,1,);
// $pdf->Cell(50,5,'Roll = '.$rroll,0,1,);
// $pdf->Output();
// } catch (Exception $e) {
//   echo "Unable to create file";
// }

   }
}
else{
    echo '<center>Please log in </center><br>';
    echo "<center><a href='/arp/login.html'>Log In</a></center>";
}
?>