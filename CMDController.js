function init() {
	
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		var options = JSON.parse(xhttp.response);
		options.forEach(addoption);
		}
	};
	xhttp.open("GET", "CommandsModel.php?q=0", true);
	xhttp.send();
		
}
function initC() {
	init();
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		var options = JSON.parse(xhttp.response);
		options.forEach(addhosts);
		}
	};
	xhttp.open("GET", "CommandsModel.php?q=4", true);
	xhttp.send();
		
}
function addoption(value, index, array){
	var x = document.getElementById("cmdselector");
	var c = document.createElement("option");
	c.text = value;
	x.add(c, 1);
}

function addhosts(value, index, array){
	var x = document.getElementById("hostselector");
	var c = document.createElement("option");
	c.text = value;
	x.add(c, 1);
}
function newCommand(){
	var location = document.getElementById("cmdbody").value;
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
        document.getElementById("cmdbody").value = this.responseText;
		console.log("added");
		}
	};
	xhttp.open("POST", "CommandsModel.php?q=1"+ "&r=" + location, true);
	xhttp.send();
}
function deleteCommand(){
	var command = document.getElementById("cmdselector");
	var strcmd = command.options[command.selectedIndex].text;
	var xhttp = new XMLHttpRequest();
	console.log(command);
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
        //document.getElementById("cmdbody").value = this.responseText;
		console.log(xhttp.response);
		}
	};
	xhttp.open("POST", "CommandsModel.php?q=2"+ "&r=" + strcmd, true);
	xhttp.send();
}
function editCommand(){
	var newcmd = document.getElementById("cmdbody").value;
	var command = document.getElementById("cmdselector");
	var oldcmd = command.options[command.selectedIndex].text;
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
        document.getElementById("cmdbody").value = this.responseText;
		console.log("added");
		}
	};
	xhttp.open("POST", "CommandsModel.php?q=3"+ "&r=" + oldcmd + "&n=" +newcmd, true);
	xhttp.send();
}
function executeCommand(){
	var host = document.getElementById("hostselector");
	var hts = host.options[host.selectedIndex].text;
	var command = document.getElementById("cmdselector");
	var cmd = command.options[command.selectedIndex].text;
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
        document.getElementById("response").value = this.responseText;
		}
	};
	xhttp.open("POST", "CommandsModel.php?q=5"+ "&r=" + cmd + "&n=" +hts, true);
	xhttp.send();
}