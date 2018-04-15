<?php
$connect = mysqli_connect("localhost", "root", "root", "test2");
if(isset($_POST["driver_type"], $_POST["driver_name"], $_POST["driver_lic"],  $_POST["driver_city"], $_POST["driver_age"]))
{
 $driver_type = mysqli_real_escape_string($connect, $_POST["driver_type"]);
 $driver_name = mysqli_real_escape_string($connect, $_POST["driver_name"]);
 $driver_lic = mysqli_real_escape_string($connect, $_POST["driver_lic"]);
 $driver_city = mysqli_real_escape_string($connect, $_POST["driver_city"]);
 $driver_age = mysqli_real_escape_string($connect, $_POST["driver_age"]);
 $query = "INSERT INTO drivers (driver_type, driver_name, driver_lic, driver_age, driver_city) VALUES('$driver_type', '$driver_name', '$driver_lic', '$driver_age', '$driver_city')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>