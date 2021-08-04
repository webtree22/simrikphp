<?php include("../base.php"); ?>
<?php
$sn=$_GET['sn'];

	$lat=0;
	$lng=0;
	$address1="";
	$address2="";
	$address3="";
	$listaccount=mysqli_query($dbc,"select * from map where sn=$sn");
   if(!$listaccount) echo mysqli_error($dbc);
	while($row = mysqli_fetch_array($listaccount))
	{
   		$lat=$row['lat'];
		$lng= $row['lng'];
		$address1 = $row['address1'];
		$address2 = $row['address2'];
		$address3 = $row['address3'];
	}
	if($lat==0) $lat = 	27.72150;
	if($lng==0) $lng = 85.32008;
?>	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
      	<title>Find latitude and longitude with Google Maps</title>
        <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAgrj58PbXr2YriiRDqbnL1RSqrCjdkglBijPNIIYrqkVvD1R4QxRl47Yh2D_0C1l5KXQJGrbkSDvXFA"
      type="text/javascript"></script>
    <script type="text/javascript">

 function load() {
      if (GBrowserIsCompatible()) {
        var map = new GMap2(document.getElementById("map"));
        map.addControl(new GSmallMapControl());
        map.addControl(new GMapTypeControl());
        var center = new GLatLng(<?php echo $lat; ?>,<?php echo $lng; ?>);
        map.setCenter(center, 15);
        geocoder = new GClientGeocoder();
        var marker = new GMarker(center, {draggable: true});  
        map.addOverlay(marker);
        document.getElementById("lat").innerHTML = center.lat().toFixed(5);
        document.getElementById("lng").innerHTML = center.lng().toFixed(5);
		document.getElementById("idlat").value = center.lat().toFixed(5);
	document.getElementById("idlng").value= center.lng().toFixed(5);

	  GEvent.addListener(marker, "dragend", function() {
       var point = marker.getPoint();
	      map.panTo(point);
       document.getElementById("lat").innerHTML = point.lat().toFixed(5);
       document.getElementById("lng").innerHTML = point.lng().toFixed(5);
	   document.getElementById("idlat").value = point.lat().toFixed(5);
	document.getElementById("idlng").value= point.lng().toFixed(5);

        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").innerHTML = center.lat().toFixed(5);
	   document.getElementById("lng").innerHTML = center.lng().toFixed(5);
	   document.getElementById("idlat").value = center.lat().toFixed(5);
	document.getElementById("idlng").value= center.lng().toFixed(5);


	 GEvent.addListener(marker, "dragend", function() {
      var point =marker.getPoint();
	     map.panTo(point);
      document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	     document.getElementById("lng").innerHTML = point.lng().toFixed(5);
		 document.getElementById("idlat").value = point.lat().toFixed(5);
	document.getElementById("idlng").value= point.lng().toFixed(5);

        });
 
        });

      }
    }

	   function showAddress(address) {
	   var map = new GMap2(document.getElementById("map"));
       map.addControl(new GSmallMapControl());
       map.addControl(new GMapTypeControl());
       if (geocoder) {
        geocoder.getLatLng(
          address,
          function(point) {
            if (!point) {
              alert(address + " not found");
            } else {
		  document.getElementById("lat").innerHTML = point.lat().toFixed(5);
	   document.getElementById("lng").innerHTML = point.lng().toFixed(5);
	   document.getElementById("idlat").value = point.lat().toFixed(5);
	document.getElementById("idlng").value= point.lng().toFixed(5);
		 map.clearOverlays()
			map.setCenter(point, 14);
   var marker = new GMarker(point, {draggable: true});  
		 map.addOverlay(marker);

		GEvent.addListener(marker, "dragend", function() {
      var pt = marker.getPoint();
	     map.panTo(pt);
      document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
	     document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
		 document.getElementById("idlat").value = pt.lat().toFixed(5);
	document.getElementById("idlng").value= pt.lng().toFixed(5);
        });


	 GEvent.addListener(map, "moveend", function() {
		  map.clearOverlays();
    var center = map.getCenter();
		  var marker = new GMarker(center, {draggable: true});
		  map.addOverlay(marker);
		  document.getElementById("lat").innerHTML = center.lat().toFixed(5);
	   document.getElementById("lng").innerHTML = center.lng().toFixed(5);
	   document.getElementById("idlat").value = center.lat().toFixed(5);
	document.getElementById("idlng").value= center.lng().toFixed(5);

	 GEvent.addListener(marker, "dragend", function() {
     var pt = marker.getPoint();
	    map.panTo(pt);
    document.getElementById("lat").innerHTML = pt.lat().toFixed(5);
	document.getElementById("lng").innerHTML = pt.lng().toFixed(5);
	document.getElementById("idlat").value = pt.lat().toFixed(5);
	document.getElementById("idlng").value= pt.lng().toFixed(5);
        });
 
        });

            }
          }
        );
      }
    }
    </script>
  <script type="text/javascript">
//<![CDATA[
//var gs_d=new Date,DoW=gs_d.getDay();gs_d.setDate(gs_d.getDate()-(DoW+6)%7+3);
//var ms=gs_d.valueOf();gs_d.setMonth(0);gs_d.setDate(4);
//var gs_r=(Math.round((ms-gs_d.valueOf())/6048E5)+1)*gs_d.getFullYear();
//var gs_p = (("https:" == document.location.protocol) ? "https://" : "http://");
//document.write(unescape("%3Cscript src='" + gs_p + "s.gstat.orange.fr/lib/gs.js?"+gs_r+"' type='text/javascript'%3E%3C/script%3E"));
//]]>
</script>
</head>

  
<body onload="load()" onunload="GUnload()" >

   <p><h2>Set the Cordinates of your address:</h2>
   </p> <p>1. Drag and drop the map to broad location. <br/>
	2. Zoom in for greater accuracy. <br/>
	3. Drag and drop the marker to pinpoint the place. The coordinates are refreshed at the end of each move.  </p>
  <p><b>Find coordinates using the name and/or address of the place</b></p>
  <p>Search for your location: <br/>
 </p>

  <form action="#" onsubmit="showAddress(this.address.value); return false">
     <p>        
      <input type="text" size="60" name="address" value="" />
      <input type="submit" value="Search!" />
      </p>
    </form>

 <p align="left">
 <form action="setmap_save.php" method="post">
 <table  bgcolor="#FFFFCC" width="600">
  <tr>
    <td><b>Latitude</b></td>
    <td><b>Longitude</b></td>
    <td><b>Address</b></td>
  </tr>
  <tr>
    <td id="lat"></td>
    <td id="lng"></td>
    <td>
    <input type="text" style="width:100%" name="address1" value="<?php echo $address1; ?>" /><br />
    <input type="text" style="width:100%" name="address2" value="<?php echo $address2; ?>" /><br />
    <input type="text" style="width:100%" name="address3" value="<?php echo $address3; ?>" /></td>
  </tr>
</table>

<input type="hidden" name="lat" id="idlat" value="<?php echo $lat; ?>" />
<input type="hidden" name="lng" id="idlng" value="<?php echo $lng; ?>" />
<input type="hidden" name="sn" value="<?php echo $sn; ?>" />
<input type="submit" value="Save Location" /> <a href="index.php">Cancel</a>
</form>
 </p>
  <p>
  <div align="center" id="map" style="width: 600px; height: 400px"><br/></div>
   </p>
  </div>
  <script type="text/javascript">
//<![CDATA[
//if (typeof _gstat != "undefined") _gstat.audience('','pagesperso-orange.fr');
//]]>
</script>
</body>

</html>
