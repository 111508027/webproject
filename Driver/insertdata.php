<?php
 $connect = mysqli_connect('localhost', 'root', 'root', 'test2');

if( isset( $_POST['signup'] ) )
{

$username = $_POST['userName'];
$contact = $_POST['contact'];
$password = $_POST['password'];
$name = $_POST['name'];


$query = "insert into user(name,password,username,contact) values('$name','$password''$username','$contact');";
$result = mysqli_query($connect, $query);
header("location:main.php");

}
?>