<!DOCTYPE hstml>
<html>
  <head>
<meta charset="utf-8"/>
   <title>Satellites</title>
  </head>

<body onload = "loadMap()">
<form id="form1">
<select id="satellite">
  <option value="ISS">ISS</option>
  <option value="NOAA-16">NOAA-16</option>
  <option value="NOAA-15">NOAA-15</option>
  <option value="ZACUBE">ZACUBE</option>
</select>
<!DOCTYPE hstml>
<html>
  <head>
<meta charset="utf-8"/>
   <title>Satellites</title>
  </head>
<?php

mysql_connect('localhost', 'satellite', 'satellite123');
meysql_select_db('satellite_Predict');

$sql = "SELECT satelite_name FROM Satellites";
$result = mysql_query($sql);

echo "<select name='Satelliet'>";
while ($row = mysql_fetch_array($result)) {
    echo "<option value='" . $row['Satellite_Name'] . "'>" . $row['Satellite_Name'] . "</option>";
}
echo "</select>";

?>

</form>
<p id="demo"></p>
<p id="demo0"></p>
<p id="demo1"></p>
<script>
var myVar = setInterval(myTimer, 2500);
//const map = new google.maps.Map(document.getElementById("map"), mapOptions);
function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var myObj = JSON.parse(this.responseText);
	document.getElementById("demo0").innerHTML = "Satellite : " + myObj.name + " Lat : " + myObj.lat + " Long : " + myObj.long ;
        //document.getElementById("demo2").innerHTML = "Long: " + myObj.long;
	//document.getElementById("demo3").innerHTML = "lat: " + myObj.lat;
	const mapOptions = {
	     center:new google.maps.LatLng(Number(myObj.lat),Number(myObj.long) ), zoom: 3
			          }
        const map = new google.maps.Map(document.getElementById("map"), mapOptions);
	//const map = new google.maps.Map(document.getElementById("map"));
	var newlatlng = new google.maps.LatLng((myObj.lat),Number(myObj.long));
    	map.panTo(newlatlng);	
	//const map = new google.maps.Map(document.getElementById("map"));
	//map.panTo( new google.maps.LatLng(Number(myObj.lat),Number( myObj.long))); 
	//map.panTo(Number(myObj.lat),Number( myObj.long));	
	var image = 'images/Satellite_Icon.png';
	var  marker = new google.maps.Marker({
		               map: map,
	 position: new google.maps.LatLng(Number(myObj.lat),Number( myObj.long)),
	 icon: image,
	 title: 'Satellite' 
	   });
    }
}
//var as = document.form1.satellite.value;
var select = document.getElementById("satellite");
var satellite  = select.options[select.selectedIndex].text;
 document.getElementById("demo1").innerHTML = " bb" + satellite;
//xmlhttp.open("GET", "jason.php?="+ satellite, true);
xmlhttp.open("GET", "jason.php?satellite="+ satellite, true);
xmlhttp.send();
}
</script>
<script>
function getSatJasonMarkers(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	    var myObj = JSON.parse(this.responseText);
	    const markers = this.responseText;
            // Load JSON Data
//	    const hotelMarkers = getJSONMarkers();
}
}
var select = document.getElementById("satellite");
var satellite  = select.options[select.selectedIndex].text;
 document.getElementById("demo1").innerHTML = " bb" + satellite;
	
xmlhttp.open("GET", "jason.php?satellite="+ satellite , true);

//	xmlhttp.open("GET", "jason.php", true);
	xmlhttp.send();
}
</script>
    <h2>Satellites</h2>
    <div id = "map" style = "width:640px; height:480px;"></div>
	<script>
        function loadMap() {
          // Initialize Google Maps
          const mapOptions = {
            center:new google.maps.LatLng(-26.2048, 28.2708),
            zoom: 11
          }
          const map = new google.maps.Map(document.getElementById("map"), mapOptions);
	    let marker = new google.maps.Marker({
              map: map,
	      position: new google.maps.LatLng(-26.2048, 28.2708),title: 'Satellites' 
            });
          }
        
      </script>
         <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyDZaf2m_PtVBRoD1hYP510tyYZorJ7z9XE&callback=myTimer">
</script>

  </body>
</html>

