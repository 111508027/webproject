
<?php
    include_once "W_config.php";
    include_once "W_configlang.php"
?>

<?php
    session_start();
    if(isset($_POST['signup'])) {
		$name = $_POST['name'];
        $username = $_POST['userName'];
        $password = $_POST['password'];
        $contact = $_POST['contact'];
        
		$query = "insert into user(name,password,username,contact) values('$name','$password','$username','$contact');";
		$result = mysqli_query($connect, $query);
		header("location:main.php");		
	}


    
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
                echo "<script>alert('invalid')</script>";
                header("location:main.php");
		    }
        }
    }    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title><?php echo $lang['book_a_truck']?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

<script type="text/javascript" src="../WST/js/jquery.js"></script>
    <script type="text/javascript">
        function checkname() {
            var name = document.getElementById("userName").value;

            if (name) {
                $.ajax({
                    type: 'post',
                    url: '../WST/check/checkdata.php',
                    data: {
                        user_name: name,
                    },
                    success: function(response) {
                        $('#name_status').html(response);
                        if (response == "User Name Available") {
                            return true;
                        } else {
                            return false;
                        }
                    }
                });
            } else {
                $('#name_status').html("");
                return false;
            }
        }

        function checkcontact() {
            var contact = document.getElementById("contact").value;

            if (contact) {
                $.ajax({
                    type: 'post',
                    url: '../WST/check/checkdata.php',
                    data: {
                        contact: contact,
                    },
                    success: function(response) {
                        $('#contact_status').html(response);
                        if (response == "Contact Available") {
                            return true;
                        } else {
                            return false;
                        }
                    }
                });
            } else {
                $('#contact_status').html("");
                return false;
            }
        }

        function checkall() {
            var namehtml = document.getElementById("name_status").innerHTML;
            var contacthtml = document.getElementById("contact_status").innerHTML;

            if ((namehtml == "User Name Available" && contacthtml == "Contact Available")) {
                return true;

            } else {
                window.alert("Please select the correct Username or Contact")
                return false;
            }
        }
    </script>
    


<style>
.question {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 1px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
    margin-bottom:1px;
    text-align:justify;
}

.active, .question:hover {
    background-color: #ccc;
}

.question:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
    margin-bottom:20px;
    text-align:justify;

}

.active:after {
    content: "\2212";
}

.answer {
    padding: 1px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    margin-bottom:1px;
    text-align:justify;

}
    
/* Full-width input fields */

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 4%;
    border-radius: 5%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 100%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}


/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

 
  body {
      font: 400 15px Lato, sans-serif;
      line-height: 1.8;
      color: #818181;
  }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: #303030;
      font-weight: 600;
      margin-bottom: 30px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #303030;
      font-weight: 400;
      margin-bottom: 30px;
  }  
  .jumbotron {
      background-color: #f4511e;
      color: #fff;
      padding: 100px 25px;
      font-family: Montserrat, sans-serif;
  }
  .container-fluid {
      padding: 60px 50px;
  }
  .bg-grey {
      background-color: #f6f6f6;
  }
  .logo-small {
      color: #f4511e;
      font-size: 50px;
  }
  .logo {
      color: #f4511e;
      font-size: 200px;
  }
  .thumbnail {
      padding: 0 0 15px 0;
      border: none;
      border-radius: 0;
  }
  .thumbnail img {
      width: 100%;
      height: 100%;
      margin-bottom: 10px;
  }
  .carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #f4511e;
  }
  .carousel-indicators li {
      border-color: #f4511e;
  }
  .carousel-indicators li.active {
      background-color: #f4511e;
  }
  .item h4 {
      font-size: 19px;
      line-height: 1.375em;
      font-weight: 400;
      font-style: italic;
      margin: 70px 0;
  }
  .item span {
      font-style: normal;
  }
  .panel {
      border: 1px solid #f4511e; 
      border-radius:0 !important;
      transition: box-shadow 0.5s;
  }
  .panel:hover {
      box-shadow: 5px 0px 40px rgba(0,0,0, .2);
  }
  .panel-footer .btn:hover {
      border: 1px solid #f4511e;
      background-color: #fff !important;
      color: #f4511e;
  }
  .panel-heading {
      color: #fff !important;
      background-color: #f4511e !important;
      padding: 25px;
      border-bottom: 1px solid transparent;
      border-top-left-radius: 0px;
      border-top-right-radius: 0px;
      border-bottom-left-radius: 0px;
      border-bottom-right-radius: 0px;
  }
  .panel-footer {
      background-color: white !important;
  }
  .panel-footer h3 {
      font-size: 32px;
  }
  .panel-footer h4 {
      color: #aaa;
      font-size: 14px;
  }
  .panel-footer .btn {
      margin: 15px 0;
      background-color: #f4511e;
      color: #fff;
  }
  .navbar {
      margin-bottom: 0;
      background-color: #f4511e;
      z-index: 9999;
      border: 0;
      font-size: 12px !important;
      line-height: 1.42857143 !important;
      letter-spacing: 4px;
      border-radius: 0;
      font-family: Montserrat, sans-serif;
  }
  .navbar li a, .navbar .navbar-brand {
      color: #fff !important;
  }
  .navbar-nav li a:hover, .navbar-nav li.active a {
      color: #f4511e !important;
      background-color: #fff !important;
  }
  .navbar-default .navbar-toggle {
      border-color: transparent;
      color: #fff !important;
  }
  footer .glyphicon {
      font-size: 20px;
      margin-bottom: 20px;
      color: #f4511e;
  }
  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    } 
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }
  @media screen and (max-width: 768px) {
    .col-sm-4 {
      text-align: center;
      margin: 25px 0;
    }
    .btn-lg {
        width: 100%;
        margin-bottom: 35px;
    }
  }
  @media screen and (max-width: 480px) {
    .logo {
        font-size: 150px;
    }
  }
  </style>

</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand"  href="#myPage"><?php echo $lang['book_a_truck']?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about"><?php echo $lang['about']?></a></li>
        <li><a href="#faq"><?php echo $lang['faq']?></a></li>
        <li><a href="#contact"><?php echo $lang['contact']?></a></li>
        <a><?php echo $lang['logged_in']?></a>
        <li><button  onclick="window.location.href='../WST/W_userlogin.php'" style="width:auto;"><?php echo $lang['get_in_touch']?></button></li>
      </ul>
      <div>
			<label>Languages</label>
			    <select onchange= "window.location.href = this.value;">
            	    <option value ="explore.php?lang=en" <?php echo $_SESSION['lang'] === "en" ? "selected" : "";?>><?php echo $lang['lang_en'] ?></option>
            	    <option value = "explore.php?lang=mr" <?php echo $_SESSION['lang'] === "mr" ? "selected" : "";?>><?php echo $lang['lang_mr'] ?></option>
            	    <option value = "explore.php?lang=hn" <?php echo $_SESSION['lang'] === "hn" ? "selected" : "";?>><?php echo $lang['lang_hn'] ?></option>
                </select>
                
			</div>

    </div>
  </div>
</nav>

<div class="jumbotron text-center">
  <h1><?php echo $lang['book_a_truck']?></h1> 
  <p><?php echo $lang['doorstep_delivery']?></p> 
</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
  <div class="row">
    <div class="col-sm-8">
      <h2><?php echo $lang['about_book_a_truck']?></h2><br>
      <p style="margin-bottom:20px;text-align:justify;"><span style="font-size: larger;"><?php echo $lang['about_section1']?></span></p>
      <p style="margin-bottom:20px;text-align:justify;"><span style="font-size: larger;"><?php echo $lang['about_section2']?></span></p><br>
      <button class="btn btn-default btn-lg" onclick="window.location.href='../tempo/WST/W_userlogin.php'"><?php echo $lang['get_in_touch']?></button>
    </div>
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-signal logo"></span>
    </div>
  </div>
</div>

<div class="container-fluid bg-grey">
  <div class="row">
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-globe logo slideanim"></span>
    </div>
    <div class="col-sm-8">
      <h2><?php echo $lang['our_values']?></h2><br>
      <h4><strong><?php echo $lang['mission']?></strong><?php echo $lang['mission_section']?></h4><br>
      <p><strong><?php echo $lang['vision']?></strong><?php echo $lang['vision_section']?></p>
    </div>
  </div>
</div>

<div id="portfolio" class="container-fluid text-center bg-grey">
  <h2><?php echo $lang['portfolio']?></h2><br>
  <h4><?php echo $lang['what_we_have_created']?></h4>
  <div class="row text-center slideanim">
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="pune.jpg" alt="Paris" width="400" height="300">
        <p><strong><?php echo $lang['pune']?></strong></p>
        <p><?php echo $lang['punesec']?></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="mumbai.jpg" alt="New York" width="400" height="300">
        <p><strong><?php echo $lang['mumbai']?></strong></p>
        <p><?php echo $lang['mumbaisec']?></p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
        <img src="aurangabad.jpg" alt="San Francisco" width="400" height="300">
        <p><strong><?php echo $lang['aurangabad']?></strong></p>
        <p><?php echo $lang['aurasec']?></p>
      </div>
    </div>
  </div><br>
  
  
  <h2><?php echo $lang['what_our_customers_say']?></h2>
  <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <h4><?php echo $lang['comment1']?><br><span><?php echo $lang['by1']?></span></h4>
      </div>
      <div class="item">
        <h4><?php echo $lang['comment2']?><br><span><?php echo $lang['by2']?></span></h4>
      </div>
      <div class="item">
        <h4><?php echo $lang['comment3']?><br><span><?php echo $lang['by3']?></span></h4>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div id="faq" class="container-fluid ">
    <div class="row">
        <div class="col-sm-8">
<h2>FAQ</h2>
<button class="question"><?php echo $lang['que1']?></button>
<div class="answer">
  <p><?php echo $lang['ans1']?></p>
</div>

<button class="question"><?php echo $lang['que2']?></button>
<div class="answer">
  <p><?php echo $lang['ans2']?></p>
</div>

<button class="question"><?php echo $lang['que3']?></button>
<div class="answer">
  <p><?php echo $lang['ans3']?></p>
</div>

<button class="question"><?php echo $lang['que4']?></button>
<div class="answer">
  <p><?php echo $lang['ans4']?></p>
</div>

<button class="question"><?php echo $lang['que5']?></button>
<div class="answer">
  <p><?php echo $lang['ans5']?></p>
</div>

<button class="question"><?php echo $lang['que6']?></button>
<div class="answer">
  <p><?php echo $lang['ans6']?></p>
</div>

</div>
</div>
</div>

<script>
var acc = document.getElementsByClassName("question");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var answer = this.nextElementSibling;
    if (answer.style.maxHeight){
      answer.style.maxHeight = null;
    } else {
      answer.style.maxHeight = answer.scrollHeight + "px";
    } 
  });
}
</script>


<!-- Container (Pricing Section) -->
<form name="form1" method="post" action="W_comment.php">
        <div id="contact" class="container-fluid bg-grey">
            <h2 class="text-center"><?php echo $lang['contact']?></h2>
            <div class="row">
                <div class="col-sm-5">
                    <p><?php echo $lang['contact_info']?></p>
                    <p><span class="glyphicon glyphicon-map-marker"></span> <?php echo $lang['pune']?></p>
                    <p><span class="glyphicon glyphicon-phone"></span>+91 9075592263</p>
                    <p><span class="glyphicon glyphicon-phone"></span>+91 8237397699</p>
                    <p><span class="glyphicon glyphicon-envelope"></span>pawanhage123@gmail.com</p>
                    <p><span class="glyphicon glyphicon-envelope"></span>gathashutosh76@gmail.com</p>

                </div>
                <div class="col-sm-7 slideanim">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="username" name="username" placeholder="Name" type="text" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                        </div>
                    </div>
                    <textarea class="form-control" id="comment" name="comment" placeholder="Comment" rows="5"></textarea><br>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-right" name="submit" type="submit">Send</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<!-- Add Google Maps -->

     <div id="googleMap" style="height:400px;width:100%;"></div>
    <script>
        function myMap() {
            var myCenter = new google.maps.LatLng(18.5204, 73.8567);
            var mapProp = {
                center: myCenter,
                zoom: 12,
                scrollwheel: false,
                draggable: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter
            });
            marker.setMap(map);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5UQObku61O2NXIaG6DOMUmF65ft8GZPs&callback=myMap"></script>
<!--
To use this code on your website, get a free API key from Google.
Read more at: https://www.w3schools.com/graphics/google_maps_basic.asp
-->

<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
</footer>

<script>
$(document).ready(function(){
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
  
  $(window).scroll(function() {
    $(".slideanim").each(function(){
      var pos = $(this).offset().top;

      var winTop = $(window).scrollTop();
        if (pos < winTop + 600) {
          $(this).addClass("slide");
        }
    });
  });
})
</script>

</body>
</html>
