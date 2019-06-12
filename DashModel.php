<?php
$mysqli = new mysqli("localhost", "root", "", "peng");

if($mysqli->connect_error) {
  exit('Could not connect');
}

$q = intval($_GET['q']);

$sql="SELECT * FROM status ";
$result = mysqli_query($mysqli,$sql);

if (!$result) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
echo "<table width=100%>";
echo "<tr id= 'topper'>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>IP</th>";
echo "<th>Network Upload</th>";
echo "<th>Network Download</th>";
echo "<th>nr. of Processes</th>";
echo "<th>% used RAM</th>";
echo "<th>5 used storage</th>";
echo "<th>Online?</th>";
echo "</tr>";
while($row = mysqli_fetch_array($result)) {
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['name'] . "</td>";
echo "<td>" . $row['ip'] . "</td>";
echo "<td>" . $row['nin'] . "</td>";
echo "<td>" . $row['nout'] . "</td>";
echo "<td>" . $row['procs'] . "</td>";
echo "<td>" . $row['ram'] . "</td>";
echo "<td>" . $row['hdd'] . "</td>";
echo "<td>" . $row['isOn'] . "</td>";
echo "</tr>";
}
echo "</table>";
mysqli_close($mysqli);
?>