function getOneTableAPI1(tName, snapshotId, asynchronousOrNot) {/*Loads data from server asynchronously*/
	var xhttp;
	xhttp = new XMLHttpRequest();
	alert('getOneTableAPI' + JSON.stringify(arguments));
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			alert('responseText = ' + this.responseText);
			var db = JSON.parse(this.responseText);
			alert('db= ' + db);
			return db;
		}
	};
	xhttp.open("POST", "http://127.0.0.1/pqr/api/api.php", asynchronousOrNot);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("reqType=getOneTable&tableName=" + tName + "&snapshotId=" + snapshotId);
	if(asynchronousOrNot == false) {
		var db = JSON.parse(xhttp.responseText);
		//alert('responseText = ' + this.responseText);
		return db;  /* JS variables are pass by value */
	}
}
function getOneTableAPI(tName, snapshotId) {/*Loads data from server synchronously*/
	var xhttp;
	xhttp = new XMLHttpRequest();
	//alert('getOneTableAPI' + JSON.stringify(arguments));
	xhttp.open("POST", "http://127.0.0.1/pqr/api/api.php", false);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhttp.send("reqType=getOneTable&tableName=" + tName + "&snapshotId=" + snapshotId);
	var db = JSON.parse(xhttp.responseText);
	//alert('responseText = ' + xhttp.responseText);
	return db;  /* JS variables are pass by value */
}
