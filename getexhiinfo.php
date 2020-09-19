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
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">LIST OF EXHIBITIONS</font></b></p>

<?php

require_once('../Exhibition/mysqli_connect.php');
 

$query = "SELECT ecode, icode, etitle, edate FROM exhibition";
 

$response = @mysqli_query($dbc, $query);
 

if($response){
 
echo '<table align="center"
cellspacing="15" cellpadding="10">
 
<tr>
<td align="center"><b>ECODE</b></td>
<td align="center"><b>ICODE</b></td>
<td align="center"><b>TITLE</b></td>
<td align="center"><b>DATE</b></td>
</tr>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['ecode'] . '</td><td align="left">' .
$row['icode'] . '</td><td align="left">' .
$row['etitle'] . '</td><td align="left">' .
$row['edate'] ;
 
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
<a href="http://localhost:1234/Exhibition/addexhi.php">Add new exhibition</a> <br><br>
<a href="http://localhost:1234/Exhibition/updateexhi.php">Update exhibition</a> <br><br>
<a href="http://localhost:1234/Exhibition/deleteexhi.php">Delete exhibition</a> 
</p>

</body>
</html>