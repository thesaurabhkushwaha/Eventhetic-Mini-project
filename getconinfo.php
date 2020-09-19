<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
</head>
<body>
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">LIST OF CONTACTS</font></b></p>

<?php

require_once('../Exhibition/mysqli_connect.php');
 

$query = "SELECT cid, name, contactnumber, ecode FROM contact";
 

$response = @mysqli_query($dbc, $query);
 

if($response){
 
echo '<table align="center"
cellspacing="15" cellpadding="10">
 
<tr>
<td align="center"><b>CONTACT ID</b></td>
<td align="center"><b>CONTACT NAME</b></td>
<td align="center"><b>CONTACT NUMBER</b></td>
<td align="center"><b>EXHIBITION CODE</b></td>
</tr>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['cid'] . '</td><td align="left">' .
$row['name'] . '</td><td align="left">' .
$row['contactnumber'] . '</td><td align="left">' .
$row['ecode'] ;
 
echo '</tr>';
}
 
echo '</table>';


 
} else {
 
echo "Couldn't issue database query<br />";
 
echo mysqli_error($dbc);
 
}
 
// Close connection to the database
mysqli_close($dbc);
 
?>
<p align="center" style="font-size:25px"><br><br><br><br><br><br>
<a href="http://localhost:1234/Exhibition/addcon.php">Add new contact</a> <br><br>
<a href="http://localhost:1234/Exhibition/updatecon.php">Update contact</a> <br><br>
<a href="http://localhost:1234/Exhibition/deletecon.php">Delete contact</a> 
</p>

</body>
</html>