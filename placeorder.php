

<!DOCTYPE HTML>
<html lang = "en">
<head>
	<meta charset="utf-8">
  	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
  	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#city').keyup(function(){
				var query = $(this).val();
					if(query != '') {
							$.ajax({
							url:"search.php",
							method:"POST",
							data:{query:query},
							success:function(data){
								$('#citylist').fadeIn();
								$('#citylist').html(data);
							}
						});
					}
			});
			$(document).on('click', 'li', function(){
				$('#city').val($(this).text());
				$('#citylist').fadeOut();
			});
		});  
 </script>  
<style>
	#orderaddress {
		position: relative;
		max-width: 500px;
		top: 150px;
		right: -350px;
	}
	#orderdata {
		position: relative;
		max-width: 400px;
		top: -600px;
		left: 300px;
	}
	#pickupservice {
		border: solid red 2px;
	}
	</style>
	
	<script>
		/*function pickupservice() {
			if(document.getElementById('pickupcheck').checked) {
				document.getElementById('pickupservice').style.visibility = 'visible';
			}
			else
				document.getElementById('pickupservice').style.visibility = 'hidden';
		}*/
				function pickupservice() {
			if(document.getElementById('pickupcheck').checked) {
				document.getElementById('pickupservice').style.visibility = 'visible';
			}
			else
				document.getElementById('pickupservice').style.visibility = 'hidden';
		}

	</script>
	<script>
		function ordercheck() {
			var textcheck = /^[A-Za-z]+$/;
			var numbercheck = /^[0-9]+$/;
			var stringcheck = /^[0-9A-Za-z]+$/;
			var pincheck = /^\d{6}$/;
			var mobilecheck = /^\d{10}$/;
			var x = document.forms["orderform"]["mobilenumber"].value;
			var y = document.forms["orderform"]["deladdress"].value;
			var z = document.forms["orderform"]["pincode"].value;
			if(x.match(mobilecheck) {
				return true;
			}
			else {
				alert("Enter correct mobile number"); 
				return false;
			}
			if(y.match(stringcheck) {
				return true;
			}
			else {
				alert("Enter correct address");
				return false;
			}
			if(z.match(pincheck) {
				return true;

			}
			else {
				alert("Enter correct pincode");
				return false;
			}
			
			
		}
		
	</script>
</head>
<body background = "bgimage.jpg">
	<div id = "orderaddress" class = "container" style = "visibility : hidden">
		<div class = "panel panel-default">
			<div class = "panel-heading" style = "background-color: #9FF781"><b>Order Details</b></div>
			<div class = "panel-body">
				<form action = "placeorder.php" name = "orderform" method = "post" onsubmit = "ordercheck()">
					<div class = "form-group">
						<label for = "vehicletype">Choose Vehicle:</label>
						<select class = "form-control" name = "vehicletype" id = "vehicletype">
							<option>Truck</option>
							<option>Tempo</option>
							<option>Mini-truck</option>
						</select>
			
						<label for = "goods">Type of Goods:</label>
							<select class = "form-control" name = "goods" id = "goods">
							<option>Construction material</option>
							<option>Grains</option>
							<option>Grocery</option>
						</select>
						<label for = "orderquantity">Quantity</label>
						<input type = "number" class = "form-control" name = "orderquantity" id = "orderquantity">
						<label for = "yourname">Name:</label>
						<input type = "text" class = "form-control" name = "yourname" id = "yourname" >
						
						<label for = "youremail">Email:</label>
						<input type = "email"  class = "form-control" name = "youremail" id = "youremail" >
						<label for = "mobilenumber">Mobile Number:</label>
						<input type = "number" class = "form-control" name = "mobilenumber" id = "mobilenumber" maxlength = "10" size = "5" >
						<label for = "deladdress">Delivery Address</label>
						<input type = "textarea" class = "form-control" name = "deladdress" id = "daddress" placeholder = "address">
						
						<label for = "scity">Source</label><!-- add ajax here-->
						<input type = "text" class = "form-control" name = "scity" id = "scity" value = "Pune" readonly>
						<label for = "city">City</label><!-- add ajax here-->
						<input type = "text" class = "form-control" name = "city" id = "city" >
						<div id = "citylist"></div>
						<label for = "pincode">Pincode</label>
						<input type = "number" class = "form-control" name = "pincode" id = "pincode" maxlength = "6" size = "6"><br>

						<input type = "submit" name = "placeorder" value = "Placeorder">
					</div>

				</form>
     			</div>
		</div>
	</div>

  
	<div id = "orderdata" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-heading" style = "background-color: #FE2E2E"><b>Rate Calculator</b></div>
			<div class = "panel-body">
				<form method = "post">
					<div class = "form-group">
						<label for = "goods">Quantity</label>
						<select class = "form-control" name = "vehicleneed" id = "vehicleneed">
							<option>Truck</option>
							<option>Tempo</option>
							<option>Mini-truck</option>
						</select>
						<label for = "squantity">Quantity</label><!-- add ajax here-->
							<input type = "number" class = "form-control" name = "squantity" id = "squantity">
						<label for = "city">Source</label><!-- add ajax here-->
							<input type = "text" class = "form-control" name = "source1" id = "source1" value = "Pune" readonly>
						<label for = "city">Destination</label><!-- add ajax here-->
							<input type = "text" class = "form-control" name = "destination1" id = "destination1" >
						<!-- Suggestion of vehicle to be added according to need-->
						<div class = "checkbox">
							<label><input type = "checkbox" name = "fastdelivery" id ="fastdelivery">Urgent delivery needed</label>
							
						</div>
						<input type = "submit" name = "calculate" value = "Calculate Rate">
						
							
					</div>
				</form>
			</div>
			
		</div>
	</div>
	
	
	
</body>
</html>

<?php

	require('navbar.html');
	$hostname = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "test2";
	$connect = mysqli_connect($hostname, $username, $password, $dbname);
	
	$user = $_SESSION['uname'];
	

	$dastdelivery;	
	
	if(isset($_POST['calculate'])) {
		$cost;
		$selected = $_POST['vehicleneed'];
		$gdquantity = $_POST['squantity'];
		$source1 = "Pune";
		$destination1 = $_POST['destination1'];
		$calquery = "select *from rate where vehicleneed = '$selected';";
		$result2 = mysqli_query($connect, $calquery);
		
		if(mysqli_num_rows($result2) >= 1) {
			
			while($row = mysqli_fetch_array($result2)) {
				if(isset($_POST['fastdelivery'])) {
					$rate = $row["ratevalue"];
					$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$source1."&destinations=".$destination1."&key=AIzaSyC_fyfh2NVqJqQr3hXI0yvjsG8HZv40nfg");
					$data = json_decode($api);
					$m = $data->rows[0]->elements[0]->distance->value / 1000;
					$cost = ($rate * $quantity) * (($m + $quantity) / $gdquantity);
					$fcost = $cost * 0.3;
					$fcost = $fcost;
					echo "<script>alert('Rate:' + $fcost)</script>";
				}
				else {
					$rate = $row["ratevalue"];
					$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$source1."&destinations=".$destination1."&key=AIzaSyC_fyfh2NVqJqQr3hXI0yvjsG8HZv40nfg");
					$data = json_decode($api);
					$m = $data->rows[0]->elements[0]->distance->value / 1000;
					$cost = ($rate * $gdquantity);
					$fcost = $cost + ($rate * $gdquantity * ($m + $gdquantity) / $gdquantity);
					echo "<script>alert('Rate:' + $fcost)</script>";
				}
			}
		}
	}

	
	if(isset($_POST['placeorder'])) {
		$vehicletype = $_POST['vehicletype'];
		$goodstype = $_POST['goods'];
		$orderquantity = $_POST['orderquantity'];
		$yourname = $_POST['yourname'];
		$youremail = $_POST['youremail'];
		$mobilenumber = $_POST['mobilenumber'];
		$deladdress = $_POST['deladdress'];
		$scity = $_POST['scity'];
		$city = $_POST['city'];
		$pincode = $_POST['pincode'];
		$date1 = date('Y-m-d H:i:s', time());
		
		$query5 = "select *from vehicles where veh_id not in (select veh_id from busytable) and veh_type = '$vehicletype' order by veh_id  asc limit 1;";
		$result5 = mysqli_query($connect, $query5);
		
		$query6 = " select driver_id as drid from drivers where driver_id not in (select driver_id from busytable)  order by driver_id  asc limit 1;";	
		$result6 = mysqli_query($connect, $query6);
		$data6 = mysqli_fetch_assoc($result6);
		$drivid = $data6['drid'];
		
		$query7 = "select driver_name as driname from drivers where driver_id = '$drivid';";	
		$result7 = mysqli_query($connect, $query7);
		$data7 = mysqli_fetch_assoc($result7);
		$drivname = $data7['driname'];
		
		//$query5 = "select *from vehicles where veh_id not in (select veh_id from busytable) and veh_type = '$vehicletype' order by veh_id  asc limit 1;";
		//$result5 = mysqli_query($connect, $query5);
		
		
		
		
		if(mysqli_num_rows($result5) >= 1) {
			while($row = mysqli_fetch_array($result5)) {
				if(mysqli_num_rows($result6) >= 1) {
					$query1 = "insert into ordertable (user, vehicletype, goods, orderquantity, name, email, deladdress, mobilenumber, sourcecity, city, pincode) values('$user', '$vehicletype', '$goodstype', '$orderquantity', '$yourname', '$youremail', '$deladdress', '$mobilenumber', '$scity', '$city', '$pincode');";
					$result1 = mysqli_query($connect,$query1);
					$query2 = "select orderid as total from ordertable where user = '$user' order by orderid desc limit 1;";
					$result2 = mysqli_query($connect, $query2);
					$data = mysqli_fetch_assoc($result2);
					$data1 = $data['total'];
					
					if(isset($_POST['fastdelivery'])) {
						$fastdelivery = "yes";
						$query3 = "insert into orderinfo(orderid, user, fastdelivery, date) values('$data1', '$user', '$fastdelivery', '$date1');";
						$result3 = mysqli_query($connect,$query3);
					}
					else {
						$fastdelivery = "no";
						$query3 = "insert into orderinfo (orderid, user, fastdelivery, date) values('$data1', '$user', '$fastdelivery', '$date1');";
						$result3 = mysqli_query($connect,$query3);
					}

					$r = array($row["veh_id"], $row["veh_type"], $row["veh_name"]);
					$vehid = $r[0];
					$vehtype = $r[1];
					$vehname = $r[2];

					$myquery = "insert into busytable (orderid, veh_id, veh_type, veh_name, driver_id, driver_name) values('$data1', '$vehid', '$vehtype', '$vehname', '$drivid', '$drivname');";
					$myresult = mysqli_query($connect,$myquery);
				}
			}
		}
		else {
			echo "<script>alert('Sorry no vehicles/drivers available try after some time')</script>";
			return false;
		}
	}		
?>
