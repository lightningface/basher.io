<!DOCTYPE HTML>
<html>
<head>
	<title>Show Locations</title>
	<link rel="stylesheet" type="text/css" href="mystyles.css" />
</head>

<body style="background-color:grey">

<div id="maindiv">

<?php
# first see if there's a location data file
if (file_exists("locationfile.txt")) {
	# print the table and the header row
	print "<table>";
	print "<tr><th>Dessert Shop</th><th>Map</th></tr>";

	# first, get the "handle" for our locations file
	$file = fopen("locationfile.txt","r");
	# then read one line
	$data = fgets($file); 

	# Keep reading lines in a loop while $data (the line we are reading) is NOT empty
	# When it's empty, we're done reading!
	while($data != "") {

		# Use explode to divide up saved locations by "|" into an array called $fields
		$fields = explode("|",$data);
		
		print "<tr>"; # start the row in HTML
		print "<td>$fields[0]</td>"; # first field (0 is the first!) is the name
		
		# the second is the address, but we have to encode it for Google
		$address = urlencode($fields[1]); 
		
		# Use this address to output a Google Map in the table!
		print "<td><iframe src=\"https://maps.google.com/maps?q=$address&output=embed\"></iframe></td>";

		print "</tr>"; # end of table row
		
		$data = fgets($file); # read next line
	}

	# end the table
	print "</table>";
	
	# close the data file when we're done
	fclose($file);

# this "else" is from file_exists, above!  So if file does NOT exists, there are no locations.
} else {
	print "Sorry, no locations yet.";
}

?>

Go back <a href=index.html>home</a>

</div>

</body>
</html>