function myFunction() {
	var xhttp;
	var str=1;
	
		setTimeout(function(){
			
			xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("demo").innerHTML = this.responseText;
			}
		  };
		  
		  xhttp.open("GET", "DashModel.php?q="+str, true);
		  xhttp.send();
		  myFunction();
		}, 2000);
	
 }