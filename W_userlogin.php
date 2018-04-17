<?php

    include_once "W_configlang.php";
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
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type = text/javascript src="W_modify.js"></script>
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
    <link rel = "stylesheet" type = "text/css" href = "style.css">
    <style>
	#orderaddress {
		position: relative;
		max-width: 500px;
		top: -600px;
		right: -350px;
	}
	#orderdata {
		position: relative;
		max-width: 400px;
		top: -1450px;
		left: 350px;
	}
	</style>
	
    <script>
        function placeorder() {
            var op = document.getElementById("orderaddress");
            var rp = document.getElementById("orderdata");
            if(op.style.visibility == 'hidden' || rp.style.visibility == 'visible') {
                op.style.visibility = 'visible';
                rp.style.visibility = 'hidden';
            }
           
        }
        function ratecalculate() {
            var op = document.getElementById("orderaddress");
            var rp = document.getElementById("orderdata");

            if(rp.style.visibility == 'hidden' || op.style.visibility == 'visible') {
                rp.style.visibility = 'visible';
                op.style.visibility = 'hidden';
            }
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

			if(x.match(mobilecheck)) {
				return true;
			}
			else {
				alert("Enter correct mobile number"); 
				return false;
			}
			if(y.match(stringcheck)) {
				return true;
			}
			else {
				alert("Enter correct address");
				return false;
			}
			if(z.match(pincheck)) {
				return true;

			}
			else {
				alert("Enter correct pincode");
				return false;
			}
			
			
		}
    </script>

	
</head>
<body>


<nav class="navbar navbar-inverse" >
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" ><?php echo $lang['book_a_truck']?></a>
    </div>
    <ul class="nav navbar-nav"></ul>

    <ul class="nav navbar-nav navbar-right">
        
        <li><a href="explore.php"><span class = "glyphicon glyphicon-log-in"></span><?php echo $lang['home']?></a></li>
        <li><a href="W_logout.php"><span class = "glyphicon glyphicon-log-in"></span><?php echo $lang['logout']?></a></li>
        <div>
			<label>Languages</label>
			    <select onchange= "window.location.href = this.value;">
            	    <option value ="W_userlogin.php?lang=en" <?php echo $_SESSION['lang'] === "en" ? "selected" : "";?>><?php echo $lang['lang_en'] ?></option>
            	    <option value = "W_userlogin.php?lang=mr" <?php echo $_SESSION['lang'] === "mr" ? "selected" : "";?>><?php echo $lang['lang_mr'] ?></option>
            	    <option value = "W_userlogin.php?lang=hn" <?php echo $_SESSION['lang'] === "hn" ? "selected" : "";?>><?php echo $lang['lang_hn'] ?></option>
                </select>
                
    	</div>
    </ul>

  </div>
</nav>

    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2><button style="width:auto;" onclick= "placeorder()"><?php echo $lang['placeorder']?></button></h2>
                <h3>You can place your order here:</h3><br>
                <h2><button style="width:auto;" onclick= "ratecalculate()"><?php echo $lang['calculate_rate']?></button></h2>
                <h3><?php echo $lang['calculate_rate']?></h3><br><br>
                <p><h2><?php echo $lang['for_orders_and_bills']?>:</h2></p>
                <h2><a href = "rate1.php">Click Here</a></h2>
                
            </div>
           
        </div>
    </div>
    <div id = "orderaddress" class = "container" style = "visibility : hidden">
		<div class = "panel panel-default">
			<div class = "panel-heading" style = "background-color: #9FF781"><b>Order Details</b></div>
			<div class = "panel-body">
				<form action= "W_userlogin.php" name = "orderform" method = "post" onsubmit = "ordercheck()">
					<div class = "form-group">
						<label for = "vehicletype"><?php echo $lang['choose_vehicle']?>:</label>
						<select class = "form-control" name = "vehicletype" id = "vehicletype">
							<option value = "Truck"><?php echo $lang['truck']?></option>
							<option value = "Tempo"><?php echo $lang['tempo']?></option>
							<option value = "Minitruck"><?php echo $lang['mini_truck']?></option>
						</select>
			
						<label for = "goods"><?php echo $lang['type_of_goods']?>:</label>
							<select class = "form-control" name = "goods" id = "goods">
							<option>Construction material</option>
							<option>Grains</option>
							<option>Grocery</option>
						</select>
						<label for = "orderquantity"><?php echo $lang['quantity']?></label>
						<input type = "number" class = "form-control" name = "orderquantity" id = "orderquantity">
						<label for = "yourname"><?php echo $lang['name']?></label>
						<input type = "text" class = "form-control" name = "yourname" id = "yourname" >
						
						<label for = "youremail"><?php echo $lang['email']?></label>
						<input type = "email"  class = "form-control" name = "youremail" id = "youremail" >
						<label for = "mobilenumber"><?php echo $lang['mobile_Number']?></label>
						<input type = "number" class = "form-control" name = "mobilenumber" id = "mobilenumber" maxlength = "10" size = "5" >
						<label for = "deladdress"><?php echo $lang['delivery_address']?></label>
						<input type = "textarea" class = "form-control" name = "deladdress" id = "daddress" placeholder = "address">
						
						<label for = "scity"><?php echo $lang['source']?></label><!-- add ajax here-->
						<input type = "text" class = "form-control" name = "scity" id = "scity" value = "Pune" readonly>
						<label for = "city"><?php echo $lang['city']?></label><!-- add ajax here-->
						<input type = "text" class = "form-control" name = "city" id = "city" >
						<div id = "citylist"></div>
						<label for = "pincode"><?php echo $lang['pincode']?></label>
						<input type = "number" class = "form-control" name = "pincode" id = "pincode" maxlength = "6" size = "6"><br>

						<input type = "submit" name = "placeorder" value = "Placeorder">
					</div>

				</form>
     			</div>
		</div>
    </div>
    <div id = "orderdata" class = "container" style = "visibility : hidden">
		<div class = "panel panel-default">
			<div class = "panel-heading" style = "background-color: #FE2E2E"><b>Rate Calculator</b></div>
			<div class = "panel-body">
				<form method = "post">
					<div class = "form-group">
						<label for = "goods"><?php echo $lang['veh_type']?></label>
						<select class = "form-control" name = "vehicleneed" id = "vehicleneed">
                            <option value = "Truck"><?php echo $lang['truck']?></option>
							<option value = "Tempo"><?php echo $lang['tempo']?></option>
							<option value = "Minitruck"><?php echo $lang['mini_truck']?></option>
						</select>
						<label for = "squantity"><?php echo $lang['quantity']?></label><!-- add ajax here-->
							<input type = "number" class = "form-control" name = "squantity" id = "squantity">
						<label for = "city"><?php echo $lang['source']?></label><!-- add ajax here-->
							<input type = "text" class = "form-control" name = "source1" id = "source1" value = "Pune" readonly>
						<label for = "city"><?php echo $lang['destination']?></label><!-- add ajax here-->
                            <input type = "text" class = "form-control" name = "destination1" id = "destination1" >
                            <div id = "destlist"></div>
						<!-- Suggestion of vehicle to be added according to need-->
						<div class = "checkbox">
							<label><input type = "checkbox" name = "fastdelivery" id ="fastdelivery"><?php echo $lang['urgent_delivery_needed']?></label>
							
						</div>
						<input type = "submit" name = "calculate" value = "Calculate Rate">
						
							
					</div>
				</form>
			</div>
			
		</div>
	</div>
    <?php
$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "test2";
$connect = mysqli_connect($hostname, $username, $password, $dbname);



$fastdelivery;	

if(isset($_POST['calculate'])) {
    
    $user = $_SESSION['uname'];
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
                $cost = ($rate * $quantity) * $m / 100;
                $fcost = $cost + 300;
                $fcost = $fcost;
                echo "<script>alert('Rate:' + $fcost)</script>";
            }
            else {
                $rate = $row["ratevalue"];
                $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$source1."&destinations=".$destination1."&key=AIzaSyC_fyfh2NVqJqQr3hXI0yvjsG8HZv40nfg");
                $data = json_decode($api);
                $m = $data->rows[0]->elements[0]->distance->value / 1000;
                $cost = ($rate * $gdquantity) * $m / 100;
                $fcost = $cost + 0;
                echo "<script>alert('Rate:' + $fcost)</script>";
            }
        }
    }
}


if(isset($_POST['placeorder'])) {
    
    $user = $_SESSION['uname'];
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
                echo "<script>window.location.href='payment1.php';</script>";
            }
        }
    }
    else {
        echo "<script> alert('Sorry no vehicles/drivers available try after some time')</script>";
        return false;    
    } 
}		
?>


 

</body>

</html>

