<?php include "../base.php"; ?>
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{
	
	
		
	$sn=$_POST['sn'];
	$lat=$_POST['lat'];
	$lng=$_POST['lng'];
	$address1=$_POST['address1'];
	$address2=$_POST['address2'];
	$address3=$_POST['address3'];

	$chk=mysqli_query($dbc,"select sn from map where sn=$sn");
	$chknum = mysqli_num_rows($chk);
	
   if($chknum==0)
	{
	

		$sql="insert into map(lat,lng,address1,address2,address3) values(\"$outletsn\",\"$lat\",\"$lng\",\"$address1\",\"$address2\",\"$address3\")";	
	$registerquery = mysqli_query($dbc,$sql);
	
	
	}
	else
	{
	$sql="update map set lat=\"$lat\", lng=\"$lng\", address1=\"$address1\" , address2=\"$address2\" , address3=\"$address3\"  where sn=$sn";
	$registerquery = mysqli_query($dbc,$sql);
	}

	
	if($registerquery)
        {
			header("location: index.php");
        }
		else
		{
			echo mysqli_error($dbc);
			
		}
}
else
{
	echo"NO WAY!";
}
?>