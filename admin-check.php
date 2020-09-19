
<?php
$name = $_POST["name"];
$pass = $_POST["pass"];
DEFINE ('DB_USER', 'studentweb');
DEFINE ('DB_PASSWORD', 'hoihoi');
DEFINE ('DB_HOST', 'localhost');

 
 $dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
if(! $dbc)
{
    die('Connection Failed'.mysql_error());
}

mysqli_select_db($dbc,'exhibition');

$qry="SELECT name,password FROM admin";
$result= @mysqli_query($dbc,$qry);

$row = mysqli_fetch_array($result);

if($row["name"]==$name && $row["password"]==$pass)
    echo'VALIDATION SUCCESSFULL <a href="http://localhost:1234/Exhibition/admin-ui.php">Click here</a>';
else
    echo"Sorry, your credentials are not valid, Please try again.";

?>

