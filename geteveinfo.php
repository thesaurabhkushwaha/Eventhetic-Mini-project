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
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">LIST OF EVENTS</font></b></p>

<?php

require_once('../Exhibition/mysqli_connect.php');
 

$query = "SELECT evecode, evename, evetime, ecode FROM event";
 

$response = @mysqli_query($dbc, $query);
 

if($response){
 
echo '<table align="center"
cellspacing="15" cellpadding="10">
 
<tr>
<td align="center"><b>EVENT CODE</b></td>
<td align="center"><b>EVENT NAME</b></td>
<td align="center"><b>TIMING(24H)</b></td>
<td align="center"><b>EXHIBITION CODE</b></td>
</tr>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['evecode'] . '</td><td align="left">' .
$row['evename'] . '</td><td align="left">' .
$row['evetime'] . '</td><td align="left">' .
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
<a href="http://localhost:1234/Exhibition/addeve.php">Add new event</a> <br><br>
<a href="http://localhost:1234/Exhibition/updateeve.php">Update event</a> <br><br>
<a href="http://localhost:1234/Exhibition/deleteeve.php">Delete event</a> 
</p>

</body>
</html>