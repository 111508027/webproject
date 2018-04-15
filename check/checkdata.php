<?php
$connect = mysqli_connect('localhost', 'root', 'root', 'test2');

if(isset($_POST['user_name']))
{
 $username=$_POST['user_name'];
 $checkdata=" SELECT username FROM user WHERE username='$username' ";
 $result = mysqli_query($connect, $checkdata);


 if(mysqli_num_rows($result)>0)
 {
  echo "<p><font color='red'> User Name Already Exist</p>";
 }
 else
 {
    echo "<p><font color='green'> User Name Available </p>"; }
 exit();
}

if(isset($_POST['contact']))
{
 $contact=$_POST['contact'];

 $checkdata=" SELECT contact FROM user WHERE contact='$contact' ";
 $result = mysqli_query($connect, $checkdata);


 if(mysqli_num_rows($result)>0)
 {
    echo "<p><font color='red'>Contact Already Exist</p>";
 }
 else
 {
    echo "<p><font color='green'>Contact Available</p>"; 
}
 exit();
}
?>
