<?php
  $sql="select r_msg from report where r_mail='$rmail' ";
  $query=mysqli_query($conn,$sql);
  $rcount=mysqli_num_rows($query);
  $sql="update students set rcount=$rcount where email='$rmail' ";
  $query=mysqli_query($conn,$sql);
?>