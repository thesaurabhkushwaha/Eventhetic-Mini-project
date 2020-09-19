<html>
<head>
<style>
body {
    background-image: url("bluegra3.jpg");
	 background-repeat: no-repeat auto;
	 background-size:  1600px 865px;
}
</style>
<head>
</html>
<?php
$ename = $_POST['ename'];

DEFINE ('DB_USER', 'studentweb');
DEFINE ('DB_PASSWORD', 'hoihoi');
DEFINE ('DB_HOST', 'localhost');

 
 $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,'exhibition');
if(! $dbc)
{
    die('Connection Failed'.mysql_error());
}


$qry="SELECT `exhibition`.`etitle`, `event`.`evename`, `institution`.`iname`, `institution`.`ilocation`, `exhibition`.`edate`, `event`.`evetime`
FROM `institution`
    LEFT JOIN `exhibition` ON `exhibition`.`icode` = `institution`.`icode`
    LEFT JOIN `event` ON `event`.`ecode` = `exhibition`.`ecode`
WHERE (`exhibition`.`etitle`='$ename');";
$response = @mysqli_query($dbc, $qry);
 
if($response)
{
 
echo '<table align="center"
cellspacing="15" cellpadding="10">
 
<tr><br><br><br><br><br><br><br>
<td align="center"><b>EXHIBITION NAME</b></td>
<td align="center"><b>EVENT NAME</b></td>
<td align="center"><b>INSTITUTION NAME</b></td>
<td align="center"><b>LOCATION OF EVENT</b></td>
<td align="center"><b>DATE OF EXHIBITION</b></td>
<td align="center"><b>TIMING OF EVENT</b></td>
</tr>';

while($row = mysqli_fetch_array($response)){
 
echo '<tr><td align="center">' . 
$row['etitle'] . '</td><td align="left">' .
$row['evename'] . '</td><td align="left">' .
$row['iname'] . '</td><td align="left">' .
$row['ilocation']. '</td><td align="left">' .
$row['edate']. '</td><td align="left">' .
$row['evetime'] ;
 
echo '</tr>';
}
 
echo '</table>';
} 


else {
 
echo "SEARCH ERROR, PLEASE TRY AGAIN<br />";
 
echo mysqli_error($dbc);
 
}

mysqli_close($dbc);
 
?>


