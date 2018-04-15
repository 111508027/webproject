<?php
	session_start();
	if (!isset($_SESSION['lang']))
		$_SESSION['lang'] = "en";
	else if (isset($_GET['lang']) && $_SESSION['lang'] != $_GET['lang'] && !empty($_GET['lang'])) {
		if ($_GET['lang'] == "en")
			$_SESSION['lang'] = "en";
		else if ($_GET['lang'] == "mr")
			$_SESSION['lang'] = "mr";
		else if ($_GET['lang'] == "hn")
			$_SESSION['lang'] = "hn";			
	}
	require_once "languages/" . $_SESSION['lang'] . ".php";
?>