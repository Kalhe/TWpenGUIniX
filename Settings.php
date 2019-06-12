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
		  
				<input type="button" class="Edit" onclick="editCommand()" align="run" value="Edit">
				<input type="button" class="New" onclick="newCommand()" align="run" value="New">
				<input type="button" class="Delete" onclick="deleteCommand()" align="run" value="Delete">	
		</form>
		
		<label class= "logon" for="textfield">Command body:</label>
		<textarea rows="4" cols="100"type="text" name="textarea" id="cmdbody">
			</textarea>
	</div>

<body onLoad="init()"></body>
<script src="CMDController.js">
</script>

</div>	
</body>
	<footer class="footer"><a class="f" href="https://github.com/Kalhe/TWpenGUIniX" >Find us on GIT Hub</a></footer>
	
</html>
