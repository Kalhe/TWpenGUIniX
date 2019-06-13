<!doctype html>
<?php
include("Config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']);
 
      $sql = "SELECT id FROM admins WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);

 if (!$result) {
printf("Error: %s\n", mysqli_error($db));
exit();
}

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
     
      $count = mysqli_num_rows($result);
     
      if($count == 1) {
        $_SESSION['login_user'] = $myusername;
         
         header("location: Dashboard.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
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


<div width=100% class="main" align="center">
<div>
<form action = "" method = "post">
<input class= "logon" type="text" name = "username" align="center" placeholder="Username">
<input class= "logon" type="password" name = "password" align="center" placeholder="Password">
<input type = "submit" value = " Submit "/>
</form>
</div>

</div>
</body>
<footer class="footer"><a class="f" href="https://github.com/Kalhe/TWpenGUIniX" >Find us on GIT Hub</a></footer>

</html>
