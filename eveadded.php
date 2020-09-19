<html>
<head>
<style>
body {
    background-image: url("bluegra.png");
	 background-repeat: no-repeat;
	 background-size:  1540px 865px;
}
</style>
<title>Add Event</title>
</head>
<body>
<?php
 
if(isset($_POST['submit'])){
    
    $data_missing = array();
    
    if(empty($_POST['evecode'])){
 
        $data_missing[] = 'Code of event';
 
    } else {
 
        $evecode = trim($_POST['evecode']);
 
    }
 
    if(empty($_POST['evename'])){
 
	$data_missing[] = 'Name of the event';}
	else{
 
        $evename = trim($_POST['evename']);
 
    }
	
	if(empty($_POST['evetime'])){
 
        $data_missing[] = 'Time of event';	
 
    } else{
 
        $evetime = trim($_POST['evetime']);
 
    }
	if(empty($_POST['ecode'])){
 
        $data_missing[] = 'Code of exhibition';	
 
    } else{
 
        $ecode = trim($_POST['ecode']);
 
    }
	
 
    
    
    if(empty($data_missing)){
        
        require_once('../Exhibition/mysqli_connect.php');
        
        $query = "INSERT INTO event (evecode, evename, evetime, ecode) VALUES (?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($dbc, $query);
        
        mysqli_stmt_bind_param($stmt, "issi", $evecode, $evename, $evetime, $ecode);
        
        mysqli_stmt_execute($stmt);
        
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        
        if($affected_rows == 1){
            
            echo 'Event added successfully';
            
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
 
<form action="http://localhost:1234/Exhibition/eveadded.php" method="POST">
 
<p style="font-size:40px" align="center"><b><font face="georgia" color="indigo">ADD NEW EVENT</font></b></p>
 
<p style="font-size:25px"align="center"><br><br><font face="comic sans ms" color="blue"> Event Code:</font>
<input type="text" name="evecode" size="30"  />
</p>
 <p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Event name:</font>
<input type="text" name="evename" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue"> Event time:</font>
<input type="text" name="evetime" size="30"  />
</p>
<p style="font-size:25px"align="center"><br><font face="comic sans ms" color="blue">Exhibition code:</font>
<input type="text" name="ecode" size="30" />
</p>

 
<p align="center"><br>
<input style="height:40px;width:70px" type="submit" name="submit" value="Submit" />
</p>
<p style="font-size:25px"align="center"><br><br><br><br>
<a href="http://localhost:1234/Exhibition/geteveinfo.php">Display Event list</a> </p>
</form>
</body>
</html>