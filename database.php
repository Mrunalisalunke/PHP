<?php
   // create a database connection using MySQLi
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "widget_corp"; 

   $connection = new mysqli($servername, $username, $password, $dbname);

   // check the connection
   if ($connection->connect_error) {
       die("Database connection failed: " . $connection->connect_errno . " - " . $connection->connect_error);
   }

   $result = mysqli_query($connection, "SELECT * FROM subjects");

   if (!$result) {
       die("Database query failed: " . mysqli_error($connection));
   }

   while ($row = mysqli_fetch_array($result)) {
       echo $row[1] . " " . $row[2] . "<br>";
   }

   mysqli_close($connection);
?>
