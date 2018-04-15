<?php
$connect = mysqli_connect("localhost", "root", "root", "test2");
if(isset($_POST["driver_id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE drivers SET ".$_POST["column_name"]."='".$value."' WHERE driver_id = '".$_POST["driver_id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>
