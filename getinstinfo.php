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
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">INSTITUTIONS REGISTERED</font></b></p>

<?php

require_once('../Exhibition/mysqli_connect.php');
 

$query = "SELECT icode, iname, ilocation, ihead FROM institution";
 

$response = @mysqli_query($dbc, $query);
 

if($response){
 
echo '<table align="center"
cellspacing="15" cellpadding="10">
 
<tr>
<td align="center"><b>CODE</b></td>
<td align="center"><b>NAME</b></td>
<td align="center"><b>LOCATION</b></td>
<td align="center"><b>HEAD</b></td>
</tr>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['icode'] . '</td><td align="left">' .
$row['iname'] . '</td><td align="left">' .
$row['ilocation'] . '</td><td align="left">' .
$row['ihead'] ;
 
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
<a href="http://localhost:1234/Exhibition/addinst.php">Add more institutions</a> <br><br>
<a href="http://localhost:1234/Exhibition/updateinst.php">Update Information</a> <br><br>
<a href="http://localhost:1234/Exhibition/deleteinst.php">Delete Record</a> 
</p>

</body>
</html>