<?php
$connect = mysqli_connect("localhost", "root", "root", "test2");
if(isset($_POST["veh_type"], $_POST["veh_name"],$_POST["veh_reg_no"], $_POST["loadcapacity"] ))
{
 $veh_type = mysqli_real_escape_string($connect, $_POST["veh_type"]);
 $veh_name = mysqli_real_escape_string($connect, $_POST["veh_name"]);
 $veh_reg_no = mysqli_real_escape_string($connect, $_POST["veh_reg_no"]);
 $loadcapacity = mysqli_real_escape_string($connect, $_POST["loadcapacity"]);
 $query = "INSERT INTO vehicles(veh_type, veh_name, veh_reg_no, loadcapacity) VALUES('$veh_type', '$veh_name', $veh_reg_no, $loadcapacity)";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>