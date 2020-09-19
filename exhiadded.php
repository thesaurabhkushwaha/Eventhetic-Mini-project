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
<?php
 
if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['ecode'])){
 
        $data_missing[] = 'Code of exhibition';
 
    } else {
 
        $ecode = trim($_POST['ecode']);
 
    }
 
    if(empty($_POST['icode'])){
 
	$data_missing[] = 'Code of institution';}
	else{
 
        $icode = trim($_POST['icode']);
 
    }
	
	if(empty($_POST['etitle'])){
 
        $data_missing[] = 'Title of exhibition';	
 
    } else{
 
        $etitle = trim($_POST['etitle']);
 
    }
	if(empty($_POST['edate'])){
 
        $data_missing[] = 'Date of exhibition';	
 
    } else{
 
        $edate = trim($_POST['edate']);
 
    }
	
 
    
    
    if(empty($data_missing)){
        
        require_once('../Exhibition/mysqli_connect.php');
        
        $query = "INSERT INTO exhibition (ecode, icode, etitle, edate) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "iiss", $ecode, $icode, $etitle, $edate);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Exhibition entry successful';
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        } else {
            
            echo 'Error Occurred<br />';
            echo mysqli_error($dbc);
            
            mysqli_stmt_close($stmt);
            
            mysqli_close($dbc);
            
        }
        
    } else {
        
        echo 'You need to enter the following data<br />';
        
        foreach($data_missing as $missing){
            
            echo "$missing<br />";
            
        }
        
    }
    
}
 
?>
 
<form action="http://localhost:1234/Exhibition/exhiadded.php" method="post">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">CREATE NEW EXHIBITION</font></b></p>
 
<p style="font-size:25px"align="center"><br><br><font face="comic sans ms" color="blue"> Exhibition Code:</font>
<input type="text" name="ecode" size="30" value="" />
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

 
<p align="center"><BR>
<input style="height:40px;width:70px" type="submit" name="submit" value="Create" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/getexhiinfo.php">Display Exhibition list</a> </p>
</form>
</body>
</html>