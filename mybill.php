<?php
	include('connect1.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  	<meta name = "viewport" content = "width=device-width, initial-scale = 1">
  	<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		#tabledata {
			position: relative;
			top: 75px;
			left: 40px;
			border: 2px solid;
		}
		th {
			color: #cb4335;
			border: 5px solid #dddddd;
			padding: 6px;
		}
		td {
			border: 5px solid #dddddd;
			padding: 6px;
		}
		
		
	</style>
	
	
</head>
<body>
	<p><h4>This is your latest bill:</h4></p>
	
	<?php

		$taxes = 0.14;
		$delamount;
		$user = $_SESSION['uname'];
		//echo $user;
		$query1 = "select orderid, billid, vehicletype, goods, orderquantity, name, deladdress, mobilenumber, city, pincode from ordertable natural join orderinfo where user = '$user' order by billid desc limit 1;";
		$query2 = "select vehicletype as vehtype from ordertable where user = '$user' order by orderid desc limit 1;";
		$result1 = mysqli_query($connect,$query1);
		$result2 = mysqli_query($connect, $query2);
		$data = mysqli_fetch_assoc($result2);
		$re = $data['vehtype'];
		$query3 = "select ratevalue as rate1 from rate where vehicleneed = '$re';";
		$result3 = mysqli_query($connect, $query3);
		$data1 = mysqli_fetch_assoc($result3);
		$rate = $data1['rate1'];
		$query4 = "select fastdelivery as del from orderinfo where user = '$user' order by orderid desc limit 1;";
		$result4 = mysqli_query($connect, $query4);
		$data2 = mysqli_fetch_assoc($result4);
		$fdel = $data2['del'];
		$query5 = "select orderquantity as quantity from ordertable where user = '$user' order by orderid desc limit 1;";
		$result5 = mysqli_query($connect, $query5);
		$data3 = mysqli_fetch_assoc($result5);
		$quantity = $data3['quantity'];
	
		$query7 = "select city as destcity from ordertable where user = '$user' order by orderid desc limit 1;";
		$result7 = mysqli_query($connect, $query7);
		$data4 = mysqli_fetch_assoc($result7);
		$destcity = $data4['destcity'];
		$sourcecity = "pune";

		$api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$sourcecity."&destinations=".$destcity."&key=AIzaSyC_fyfh2NVqJqQr3hXI0yvjsG8HZv40nfg");
		$jsondata = json_decode($api);
		$m = $jsondata->rows[0]->elements[0]->distance->value / 1000;
		//$distcost = ($rate * $gdquantity * 0.3);
		//$fcost = $cost + ($rate * $gdquantity * ($m + $gdquantity) / $gdquantity);

		if($fdel == "yes") {
			$amount = ($rate * $quantity) * $m / 100;
			$delamount = 300;
			$totamount = ($amount * $taxes) + $amount + $delamount;
		}
		else {
			$amount = ($rate * $quantity) * $m / 100;
			$delamount = 0;
			$totamount = ($amount * $taxes) + $amount + $delamount;
		}
	
		
			if(mysqli_num_rows($result1) >= 1) {
				while($row = mysqli_fetch_array($result1)) {
				
				$r = array($row["billid"], $row["orderid"], $row["vehicletype"], $row["goods"], $row["orderquantity"]);
				$billid = $r[0];
				$orderid = $r[1];
				$vehicletype = $r[2];
				$goods = $r[3];
				$orderquantity = $r[4];
				$taxper = "14%";
				$query6 = "insert into billinfo(billid, orderid, vehicletype, goods, orderquantity, rate, amount, taxes, totalamount) values('$billid', '$orderid', '$vehicletype', '$goods', '$orderquantity', '$rate', '$amount', '$taxper', '$totamount');";
				$result6 = mysqli_query($connect, $query6);
				
				
				echo "<b>Name:</b>"; echo $row["name"]; echo "<br>";
				echo "<b>Delivery Address:</b>&nbsp&nbsp"; echo $row["deladdress"]; echo "<br>";
				echo "<b>Mobile Number:</b>&nbsp&nbsp"; echo $row["mobilenumber"]; echo "<br>";
				echo "<b>City:</b>&nbsp&nbsp"; echo $row["city"]; echo "<br>";
				echo "<b>Pincode:</b>&nbsp&nbsp"; echo $row["pincode"]; echo"<br><br>";
		
			
			
				echo "<table border = 2>";
				echo "<tr>";
				echo "<th>"; echo "BillId"; echo "</th>";
				echo "<th>"; echo "OrderId"; echo "</th>";
				echo "<th>"; echo "Vehicle Type"; echo "</th>";
				echo "<th>"; echo "Goods"; echo "</th>";
				echo "<th>"; echo "Quantity"; echo "</th>";
				echo "<th>"; echo "Rate"; echo "</th>";
				echo "<th>"; echo "Amount"; echo "</th>";
				echo "</tr>";
				echo "<tr>";
				echo "<td>"; echo $row["billid"]; echo "</td>";
				echo "<td>"; echo $row["orderid"]; echo "</td>";
				echo "<td>"; echo $row["vehicletype"]; echo "</td>";
				echo "<td>"; echo $row["goods"]; echo "</td>";
				echo "<td>"; echo $row["orderquantity"]; echo "</td>";
				echo "<td>"; echo $rate; echo "</td>";
				echo "<td>"; echo $amount; echo "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan = '6'>"; echo "Delivery Charges"; echo "</td>";
				echo "<td>"; echo $delamount; echo "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan = '6'>"; echo "Taxes"; echo "</td>";
				echo "<td>"; echo "14%"; echo "</td>";
				echo "</tr>";
				echo "<tr>";
				echo "<td colspan = '6'>"; echo "Total"; echo "</td>";
				echo "<td>"; echo $totamount; echo "</td>";
				echo "</tr>";
				
			
			}
		
			
		}
			
	
	
?>

<a href= "W_pdf.php" target = "_blank"> Save Bill as Pdf </a>
</body>
</html>
