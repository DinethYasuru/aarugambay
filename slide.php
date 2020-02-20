<?php
	include("connection.php");
	$q1="Select images from slide";
	$sql=mysqli_query($con,$q1);
	if ($sql)
		echo "Selected";
	else 
		die("Query doesnt satisfied");
	while($row=mysqli_fetch_assoc($sql)){
		echo"<img src=$row[images]>";
	}

?>