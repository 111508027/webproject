<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input[type=text], input[type=number] {
    width: 10%;
    padding: 2px 2px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 4px 2px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 10%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
    width: 100%;
    margin: 8px 0;
    display: inline-block;
    box-sizing: border-box;
    border: 3px solid #f1f1f1;}

span.count {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.count {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2 align ="center"><a target="_blank" title="follow me on twitter" href="http://www.twitter.com/PawanHage"><img alt="follow me on twitter" src="//login.create.net/images/icons/user/twitter-b_30x30.png" border=0>Twitter</a></h2>

<form action="./twitter.php">
  <div>
    <label for="user"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="user" required>
    <label for="count"><b>Count</b></label>
    <input type="number" placeholder="Enter Count" name="count" required>
    <button type="submit">View Tweets</button>
  </div>
</form>
</body>
</html>

<?php
require_once('TwitterAPIExchange.php');
$settings = array(
'oauth_access_token' => "720900823744520192-w3YNgwTVnQpVAHiV0TD12uyhna2pt3Z",
'oauth_access_token_secret' => "mdRnEGcbRuibI4SYvFi2OKy6jnKC9GyhNFUaemxTAXlX8",
'consumer_key' => "8zNt295EN1Xic1kyqVgTtdT6R",
'consumer_secret' => "g8YJYPeXpSuyvDmdI4r7WQeNUaqnq2KVCFT5qjCMRdYI3jZKWS"
);
$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";

if (isset($_GET['user']))  {
    $user = $_GET['user'];
}
else {
    echo "Please Enter the Username";
    exit();
}
if (isset($_GET['count'])) {
    $count = $_GET['count'];
}
else {
    $count = 10;
}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$tweet = json_decode($twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest(),$assoc = TRUE);
$i = 0;
if ($tweet == NULL) {
    echo "<b>No Tweets So Far</b>";
    exit();
}
else {
    foreach($tweet as $fields) {    
        if($i == 0) {
            echo "<div class='container'>";
            echo "<b>Tweeted by: ". $fields['user']['name']."</b><br />";
            echo "<b>Username: ". $fields['user']['screen_name']."</b><br /><br />";
            echo "<b>Followers: ". $fields['user']['followers_count']."</b><br />";
            echo "<b>Following: ". $fields['user']['friends_count']."</b><br />";
            echo "</div>";
        }
        $i++;  
    }
}
echo "<div class='container'>";
echo "<b><p align='center'>Last $count Tweets By @$user</p></b>";
echo "</div>";

$no = 1;
foreach($tweet as $fields)
    {
        echo "<div class='container'>";
        echo "($no)<br>";
        echo "Time and Date of Tweet: ".$fields['created_at']."<br />";
        echo "<b>Tweet: ". $fields['text']."</b><br />";
        echo "</div>";
        $no++;
    }
?>