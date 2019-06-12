<?php
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}
   
function get_commands(){
	include("config.php");
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		 $sql = "SELECT command FROM commands";
		 $result = mysqli_query($db,$sql);
		 
		 $array =[];
		 $i=0;
		 
		 while($row=mysqli_fetch_array($result)){
		 $array[$i]= $row[0];
		 $i=$i+1;
		 }
		 echo json_encode($array);
		 
	}
}

function get_hosts(){
	include("config.php");
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		 $sql = "SELECT name FROM hosts";
		 $result = mysqli_query($db,$sql);
		 
		 $array =[];
		 $i=0;
		 
		 while($row=mysqli_fetch_array($result)){
		 $array[$i]= $row[0];
		 $i=$i+1;
		 }
		 echo json_encode($array);
		 
	}
}

function new_command(){
	$cmd = ($_GET['r']);
	include("config.php");
	$command = mysqli_real_escape_string($db, $cmd);
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "INSERT INTO commands (command) VALUES ('$command')";
		$result = mysqli_query($db,$sql);
	}
}

function delete_command(){
	$cmd = ($_GET['r']);
	include("config.php");
	$command = mysqli_real_escape_string($db, $cmd);
	//debug_to_console( $cmd );
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "DELETE FROM commands WHERE command = '$command'";
		$result = mysqli_query($db,$sql);
	}
}
function edit_command(){
	$oldcmd = ($_GET['r']);
	$newcmd = ($_GET['n']);
	include("config.php");
	$oldCommand = mysqli_real_escape_string($db, $oldcmd);
	$newCommand = mysqli_real_escape_string($db, $newcmd);
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "UPDATE commands SET command='$newcmd' WHERE command='$oldcmd'";
		$result = mysqli_query($db,$sql);
	}
}

function run_command(){
	$command = ($_GET['r']);
	$host = ($_GET['n']);
	$ip=get_ip($host);
	include("config.php");
	$cmd = mysqli_real_escape_string($db, $command);
	$hts = mysqli_real_escape_string($db, $ip);
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$sql = "UPDATE commands SET ip='$ip', torun='1' WHERE command='$command'";
		$result = mysqli_query($db,$sql);
		
		$torun='1';
		$sql2="SELECT torun FROM commands WHERE command='$command' and ip='$ip'";
		while($torun=='1'){
			sleep(3);
			$torun = mysqli_query($db,$sql2);
		}
		$sql3="SELECT result FROM commands WHERE command='$command' and ip='$ip'";
		$result=mysqli_query($db,$sql3);
		$row = mysqli_fetch_array($result);
		echo $row[0];
	}
	
	
}
function get_ip($hostname){
	include("config.php");
	$name = mysqli_real_escape_string($db, $hostname);
	$sql = "SELECT ip FROM hosts WHERE name='$hostname'";
	$result = mysqli_query($db,$sql);
	$row=mysqli_fetch_row($result);
	return($row[0]);
}

$q = intval($_GET['q']);
switch ($q){
	case 0:
	get_commands();
	break;
	case 1:
	new_command();
	break;
	case 2:
	delete_command();
	break;
	case 3:
	edit_command();
	break;
	case 4:
	get_hosts();
	break;
	case 5:
	run_command();
	break;
}