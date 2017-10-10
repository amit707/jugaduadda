<?php
//connecting to the database
define('DB_HOST', 'localhost');
define('DB_NAME', 'id3031606_company');
define('DB_USER','id3031606_root');
define('DB_PASSWORD','root123');
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysqli_error());
$db=mysqli_select_db($con,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
//inserting Record to the database
$username= $_POST['name'];
$password = $_POST['password'];

$q = "INSERT INTO login(username,password)VALUES('$username','$password')";
$r = mysqli_query($con,$q);
if($r)
  {
      echo "<br>";
  }
  else
  {
   die('Error: '.mysqli_error($con));
  }

$sql = "SELECT username FROM alogin where username='$username' and password='$password'";
  if($res = mysqli_query($con,$sql))
  {
    if(mysqli_num_rows($res) > 0)
    {
  echo "WELCOME $username<br>";
  echo "<br><br> List Of Orders";  
$sqq= "SELECT * FROM details";
    if($ree = mysqli_query($con,$sqq))
           {
            echo "<table border = 1>";
            echo "<tr>";
                echo "<th>FullName</th>";
    echo "<th>Email</th>";
    echo "<th>Contact</th>";
    echo "<th>Message</th>";
    
    echo "</tr>";
        while($row = mysqli_fetch_array($ree))
       {
            echo "<tr>";
                echo "<td>" . $row['Name'] . "</td>";
    echo "<td>" . $row['Email'] . "</td>";
    echo "<td>" . $row['Contact'] . "</td>";
    echo "<td>" . $row['Message'] . "</td>";
          echo "</tr>";
        }
        echo "</table>";
   // Close result set
        mysqli_free_result($ree);
    } 
  else{
        echo "<br><br>Error .....";
    }


  } 
    else
   {
        echo "<br>No records were found.";
       echo "<br>Incorrect Username or Password";
    }

 }
  else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }

mysqli_close($con);
?>