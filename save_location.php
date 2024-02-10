<!DOCTYPE HTML>
<html>
<head>
	<title>Save Dessert Shop</title>
	<link rel="stylesheet" type="text/css" href="mystyles.css" />
</head>

<body style="background-color:grey">

<div id="maindiv">

<?php
# Everything inside the <?php ? > brackets gets run by the server *before* 
# sending the page back to the browser!

# $_POST is an array of elements inside the form of the previous page, 
# that requested this page.  In our case, it contains the location name and address that was sent.
# Use "implode" to piece together the elements, separated by a bar “|”
$newdata = implode ("|",$_POST);

# Write location info to our file with a new line (\n) at the end.
# If you'd like, look at the file on your server at 000webhost!
file_put_contents("locationfile.txt", $newdata . "\n", FILE_APPEND);

# Printing will actually show as HTML, and be sent back to the browser
# On your Browser on this page, try “View Source” (right-click on page) to see the actual HTML!
print "Location saved! Go back <a href=index.html>home</a>.";

?>

</div>
</body>
</html>