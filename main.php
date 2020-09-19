<html>
<!-- COMMENT -->
<head>
<script language='Javascript'>
function check1()
{
	if(document.form1.ename.value=="")
  {
    alert("Plese Enter Exhibition Name");
	
	return false;
  }
}
function check2()
{
  if(document.form2.evename.value=="")
  {
    alert("Plese Enter Event Name");
	
	return false;
  }
}
function check3()
{  
  if(document.form3.ilocation.value=="")
  {
    alert("Plese Enter Location");
	
	return false;
  }
}
</script>

<style>
table, th, td {
   font-family:verdana;
}
#foo {
	font-size:15px;
    position: fixed;
    bottom: 0;
    right: 0;
	margin: 0px 3px 3px 10px;
  }
a:link {
	font-family:impact;
	border: 2px double red;
	margin: 200px 40px 20px;
	border-radius:20px;
	padding: 5px 8px;
    color: red; 
    background-color: transparent; 
    text-decoration: none;
}
div.relative {
	float:left;
    position:relative;
	border: 2px solid darkred;
	border-radius:20px;
    padding: 5px 8px;
    margin: 20px 30px;
	height:125px; 
	width:400px;
    }
div.display {
	float:left;
    position:relative;
	border: 2px solid darkred;
	border-radius:20px;
    padding: 7px 8px;
    margin: 20px 30px;
	height:525px; 
	width:400px;
    }	
a:hover {
    color: green;
}
body {
    background-image: url("bluegra3.jpg");
	 background-repeat: no-repeat auto;
	 background-size:  1600px 865px;
}
p.solid {border-style: solid;
         border-radius: 10px;
        border-color: blue;}
p.t1 {border-style: solid;
		background-color:lightgreen;
		border-width:8px;
		padding: 5px 8px;
		margin: 0px 400px;
         border-radius: 110px;
        border-color: green green transparent green;}
p.t2 {border-style: solid;
		background-color:lightgreen;
        border-width:8px;
		padding: 5px 8px;
		margin: -19px 250px 10px;
         border-radius: 110px;
        border-color: green;}		

</style>
<title>Exhibition Database</title>
</head>
<body>


 <br>
<p class="t1" style="font-size:60px" align="center"><b><font face="georgia" color="indigo">WELCOME TO </font></b></p>
<p class="t2" style="font-size:60px" align="center"><b><font face="georgia" color="indigo">EXHIBITION DATABASE</font></b></p>


<div class="relative">
<form onSubmit="return check1();"name="form1"action="http://localhost:1234/Exhibition/find-ename.php" method="post">
<p style="font-size:25px"align="center"><font face="Courier New" color="red"><b>SEARCH BY EXHIBITION NAME: </b></font>
<input type="text" name="ename" size="30"  />
<input style="height:20px;" type="submit" name="submit" value="SEARCH Exhibition" />
</p>
</div>
</form>

<div class="relative">
<form onSubmit="return check2();"name="form2"action="http://localhost:1234/Exhibition/find-event.php" method="post">
<p style="font-size:25px"align="center"><font face="Courier New" color="red"><b>SEARCH BY EVENT NAME: </b></font>
<input type="text" name="evename" size="30"  />
<input style="height:20px;" type="submit" name="submit" value="SEARCH Event" />
</p>
</div>
</form>

<div class="relative">
<form onSubmit="return check3();"name="form3"action="http://localhost:1234/Exhibition/find-location.php" method="post">
<p style="font-size:25px"align="center"><font face="Courier New" color="red"><b>SEARCH BY LOCATION : </b></font>
<input type="text" name="ilocation" size="30"  />
<input style="height:20px;" type="submit" name="submit" value="SEARCH Location" />
</p>
</form>
</div>
 
 
<div class="display">

<?php
require_once('../Exhibition/mysqli_connect.php');
 $query = "SELECT etitle FROM exhibition";
 $response = @mysqli_query($dbc, $query);
 if($response){
 echo '<table align="center"
cellspacing="15" cellpadding="10">
 <tr>
<td style="font-size:20px" align="center"><b>UPCOMING EXHIBITIONS :</b></td>
</tr>';
while($row = mysqli_fetch_array($response)){
 echo '<tr><td align="center">' . 
$row['etitle'] . '</td><td align="left">' ;
 echo '</tr>';
}
 echo '</table>';
} else {
 echo "No Exhibitions to display<br />";
 echo mysqli_error($dbc);
 }
 ?>
</div>


<div class="display">

<?php
require_once('../Exhibition/mysqli_connect.php');
 $query = "SELECT evename FROM event";
 $response = @mysqli_query($dbc, $query);
 if($response){
 echo '<table align="center"
cellspacing="15" cellpadding="10">
 <tr>
<td style="font-size:20px" align="center"><b>UPCOMING EVENTS :</b></td>
</tr>';
while($row = mysqli_fetch_array($response)){
 echo '<tr><td align="center">' . 
$row['evename'] . '</td><td align="left">' ;
 echo '</tr>';
}
 echo '</table>';
} else {
 echo "No Events to display<br />";
 echo mysqli_error($dbc);
 }
 ?>
</div>


<div class="display">

<?php
require_once('../Exhibition/mysqli_connect.php');
 $query = "SELECT ilocation FROM institution";
 $response = @mysqli_query($dbc, $query);
 if($response){
 echo '<table align="center"
cellspacing="15" cellpadding="10">
 <tr>
<td style="font-size:20px" align="center"><b>PLACES TO VISIT :</b></td>
</tr>';
while($row = mysqli_fetch_array($response)){
 echo '<tr><td align="center">' . 
$row['ilocation'] . '</td><td align="left">' ;
 echo '</tr>';
}
 echo '</table>';
} else {
 echo "No Events to display<br />";
 echo mysqli_error($dbc);
 }
 ?>
</div>

 <a id="foo" href="http://localhost:1234/Exhibition/admin-login.php">ADMIN LOGIN<a>



</body>
</html>