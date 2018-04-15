<?php
$connect = mysqli_connect("localhost", "root", "root", "test2");
if(isset($_POST["veh_id"]))
{
 $value = mysqli_real_escape_string($connect, $_POST["value"]);
 $query = "UPDATE vehicles SET ".$_POST["column_name"]."='".$value."' WHERE veh_id = '".$_POST["veh_id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Updated';
 }
}
?>
