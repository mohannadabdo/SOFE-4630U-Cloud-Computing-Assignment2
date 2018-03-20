<?php include "../inc/dbinfo.inc"; ?>
<?php

  /* Connect to MySQL and select the database. */
  $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD);

  if (mysqli_connect_errno()) echo "Failed to connect to MySQL: " . mysqli_connect_error();

  $database = mysqli_select_db($connection, DB_DATABASE);

  /* If input fields are populated, add a row to the Students table. */
  $student_name = htmlentities($_POST['email']);
  $student_grade = htmlentities($_POST['password']);
?>
<?php

if (isset($_POST['register'])) {
        echo "$_POST[email]\n";
        echo "$_POST[password]";
        AddStudent($connection, $student_name, $student_grade);

  }

function AddStudent($connection, $name, $grade) {
   $n = mysqli_real_escape_string($connection, $name);
   $a = mysqli_real_escape_string($connection, $grade);

   $query = "INSERT INTO `users` (`email`, `password`) VALUES ('$n', '$a');";

   if(!mysqli_query($connection, $query)) echo("<p>Error adding student data.</p>");
}
echo "<script> window.location.assign('index.html'); </script>";



  ?>
