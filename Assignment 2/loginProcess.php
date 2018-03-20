<?php include "../inc/dbinfo.inc"; ?>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the Students table. */
  $student_name = htmlentities($_POST['emaillogin']);
  $student_grade = htmlentities($_POST['passwordlogin']);
?>


<?php
if (isset($_POST['Login'])) {

        session_start();

echo $student_grade;
echo $student_name;

$sql="SELECT * FROM users WHERE
 email='$student_name' AND password='$student_grade' LIMIT 1";

      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      $count = mysqli_num_rows($result);

      // If result matched $myusername and $mypassword, table row must be 1 row

      if($count == 1) {

         header("location: SamplePage.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
