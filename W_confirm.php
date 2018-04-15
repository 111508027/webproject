<?php
    session_start();
    
	include_once "W_config.php";
	if(isset($_POST['signin'])) {
        $uname = $_POST['uname'];
        $upassword = $_POST['upassword'];
        if ($uname == "pawan" and $upassword == "pawan") {
                header("location:W_vehicle.php");
        }
        else {
		    $query = "select * from user where username = '$uname' && password = '$upassword';";
		    $result = mysqli_query($connect, $query);
		    $count = mysqli_num_rows($result);
		    if($count == true) {
			    $_SESSION['uname'] = $uname;
			    $_SESSION['logintime'] = time();
			    header("location:W_userlogin.php");	
            }
            else {
                echo "Invalid User";
                header("location:main.php");
		    }
        }
    }    
?>
