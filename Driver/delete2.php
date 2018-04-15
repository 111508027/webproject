<?php
$connect = mysqli_connect("localhost", "root", "root", "test2");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM drivers WHERE driver_id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
