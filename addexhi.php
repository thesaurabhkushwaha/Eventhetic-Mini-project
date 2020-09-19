<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
<title>Add Exhibition</title>
</head>
<body>

<form action="http://localhost:1234/Exhibition/exhiadded.php" method="POST">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">CREATE NEW EXHIBITION</font></b></p>
 
<p style="font-size:25px"align="center"><br><br><font face="comic sans ms" color="blue"> Exhibition Code:</font>
<input type="text" name="ecode" size="30"  />
</p>
 <p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Institution's Code:</font>
<input type="text" name="icode" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Exhibition title:</font>
<input type="text" name="etitle" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Exhibition date (yyyy-mm-dd):</font>
<input type="text" name="edate" size="30" />
</p>

 
<p align="center"><br>
<input style="height:40px;width:70px" type="submit" name="submit" value="Create" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getexhiinfo.php">Display Exhibition list</a> 
<a href="http://localhost:1234/Exhibition/admin-ui.php"><br>Admin UI</a></p>
</form>
</body>
</html>