<?php
session_start();
if(!isset($_SESSION['email'])){  
  header("Location:http://localhost/arp/admin_logout.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .btn {
            padding: 5px 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
        }

        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: white;
        }

        .navbar a,
        .navbar button {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 16px;
        }

        .navbar .search-bar {
            display: flex;
            align-items: center;
        }

        .search-bar input {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 5px 10px;
            background-color: #28a745;
            border: none;
            border-radius: 4px;
            color: white;
        }

        .logout-btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
        }

        .student-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .student-table th,
        .student-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .student-table th {
            background-color: #007bff;
            color: white;
        }

        .student-details {
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <div>
            <p>Admin Portal</p>
        </div>
        <div>
            <p><?=$_SESSION['name']?></p>
        </div>
        <div>
        <form action="admin_acess.php" method="post">
            <button class="btn" style="background-color: #28a745;" type="submit" name="all">View All Students</button>
        </form>
        </div>
        <div class="search-bar">
            <form action="admin_acess.php" method="post">
            <input type="text" id="emailSearch" placeholder="Search Student by Email" name="search">
            <button type="submit">Search</button>
        </form>
        </div>
        <div>
            <button class="logout-btn" style="background-color: #dc3545;"><a href="admin_logout.php">Logout</a></button>
        </div>
    </div>
    <?php
            if (isset($_POST['search'])) {
    $search=$_POST['search'];
    include 'dbconnect.php';
    $sql="SELECT `name`, `email`, `pn`, `coll name`, `rcount` FROM `students` WHERE `email`='$search' ";
    $query=mysqli_query($conn,$sql);
    if (mysqli_num_rows($query) > 0) {
        $data=mysqli_fetch_assoc($query);
        include 'close_button.html';
        echo '
        <h2 style="text-align: center;">Student Details</h2>
        <div class="student-details" id="studentDetails">
            <table class="student-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>College Name</th>
                        <th>Total Report by User</th>
                    </tr>
                </thead>
                    <tr>
                        <td>'.$data["name"].'</td>
                        <td>'.$data["email"].'</td>
                        <td>'.$data["pn"].'</td>
                        <td>'.$data["coll name"].'</td>
                        <td>'.$data["rcount"].'</td>
                    </tr>
    
                </table>';
    }
    else{
        include 'close_button.html';
        echo "<br><center> No data found </center><br>";
    }
}
?>

<?php 
if (isset($_POST['all'])){ 
    include 'dbconnect.php';
    $sql="SELECT `name`, `email`, `pn`, `coll name`, `rcount` FROM `students` ";
    $query=mysqli_query($conn,$sql);
    $i=(mysqli_num_rows($query));
    include 'close_button.html';
    if($i==0){
        echo "<br><center> No data found </center><br>";
    }
    else{
        echo '
        <h2 style="text-align: center;">Student Details</h2>
        <div class="student-details" id="studentDetails">
            <table class="student-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone No</th>
                        <th>College Name</th>
                        <th>Total Report by User</th>
                    </tr>
                </thead>';
    while($i!=0) {
        $data=mysqli_fetch_assoc($query);
       echo '<tr>
        <td>'.$data["name"].'</td>
        <td>'.$data["email"].'</td>
        <td>'.$data["pn"].'</td>
        <td>'.$data["coll name"].'</td>
        <td>'.$data["rcount"].'</td>
    </tr>';
        $i--;
    }
    echo '</table>';
}
}
?>
</html>