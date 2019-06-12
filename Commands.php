<?php
   include('session.php');
?>
<html>
<head>
<meta charset="utf-8">
<title>login</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="header">
	<h1 class="h1">PinGUIniX</header>
	<h2 class="h2">Your Retro system administrating tool</h2>
	</div>
<nav class="navbar">
	<li><a class="button" href="Dashboard.php">Dashboard</a></li>
	<li><a class="button" href="Commands.php">Commands</a></li>
	<li><a class="button" href="Settings.php">Settings</a></li>
</nav>
	
<div width=100% class="main" align="center">

	<form >
		<select name="cmdlist" form="cmdform" id="cmdselector"></select>
	  	<select name="carlist" form="carform" id="hostselector"></select>
		<input type="button" class="Run" onclick="executeCommand()" align="run" value="Run">	
    </form>
	
	<label class= "logon" for="textfield">Result:</label>
	<textarea rows="4" cols="100"type="text" name="textarea" id="response">
		</textarea>
</div>

<body onLoad="initC()"></body>
<script src="CMDController.js">
</script>

</div>	
</body>
	<footer class="footer"><a class="f" href="https://github.com/Kalhe/TWpenGUIniX" >Find us on GIT Hub</a></footer>
	
</html>
