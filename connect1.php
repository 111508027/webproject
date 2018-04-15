<?php
	
	session_start();
	if(isset($_SESSION['uname'])) {
		if((time() - $_SESSION['logintime']) > 500) {
			header("location:W_logout.php");
		}
		else {
			$_SESSION['logintime'] = time();
		}
		}
	else {
		header("location:main.php");
	}
	$hostname = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "test2";
	$connect = mysqli_connect($hostname, $username, $password, $dbname);
	$user = $_SESSION['uname'];
	if(isset($_GET['delete'])) {
		
		$id = $_GET['delete'];
		
		$query1 = "select date as dd from orderinfo where billid = '$id';";
		$result1 = mysqli_query($connect,$query1);
		$data = mysqli_fetch_assoc($result1);
		$re = $data['dd'];
		$curtime = date('Y-m-d H:i:s', time());
		$date1 = new DateTime($re);
		$date2 = new DateTime($curtime);
		$diff = $date2->diff($date1);
		$hours = $diff->h;
		$hours = $hours + ($diff->days*24);
		
		if($hours <= 4) {
			$ordel = "select orderid as odel from orderinfo where billid = $id;";
			$resdel = mysqli_query($connect, $ordel);
			$delvalue = mysqli_fetch_assoc($resdel);
			$deletevalue = $delvalue['odel'];
			
			$querydel = "delete from orderinfo where billid = $id;";
			$resultdel = mysqli_query($connect, $querydel);

			$querydelete = "delete from ordertable where orderid = '$deletevalue';";
			$resultdelete = mysqli_query($connect, $querydelete);
			header("location:rate1.php");
		}
		else {
			echo "<script> var sure = confirm('Sorry you are late : You can only delete order uto $ hrours to your booking');
			if(sure) {
				window.location.href = 'rate1.php';
			}</script>";
		}
		//header('location: rate1.php');
	}
		$currentdate = date('Y-m-d', time());
		$querym = "select *from orderinfo where user = '$user';";
		$resultm = mysqli_query($connect, $querym);
	
	
		

?>	

		
	

