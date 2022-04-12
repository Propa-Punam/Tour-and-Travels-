<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>update user</title>
<link rel="stylesheet" type="text/css" href="admin_css.css">

</head>
<body>


<?php
if($_SESSION['loginstatus']=="")
{
	header("location:login and registration.html");
}
?>

<?php include('function.php'); ?>



<div class="main_home_div">
           <h1  id="top_heading_id" class="top_heading">tour and travels....</h1>
       </div>

<div>
<ul>
  <li><a href="#news">Logout</a></li>
  <li><a class="active" href="#home">Home</a></li>
  
 
</ul>



<form method="post">
<table border="0" width="400px" height="300px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Update User</td></tr>

<?php
if(isset($_POST["sbmt"]))
{
     
$cn=makeconnection();
$s="select * from users where Userid='" .$_POST["t1"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);

$Pass=$data[2];

	if($Pass == $_POST["t9"]){
	
	$s="update users set pwd='" . $_POST["t3"] ."',Username='" . $_POST["t2"] . "' where Userid='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Update');</script>";
}
else{
	echo "wrong password";
}
}
?>


</td></tr>
<tr><td class="lefttxt"> Enter Userid</td><td><input type="text"   name="t1"/></td></tr>
<tr><td class="lefttxt"> Enter New Username</td><td><input type="text"   name="t2"/></td></tr>
<tr><td class="lefttxt">Enter old Password</td><td><input type="password"  name="t9" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Password"/></td></tr>
<tr><td class="lefttxt">Enter New Password</td><td><input type="password"  name="t3" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Password"/></td></tr>

</td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="Update" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>

<div>
<button class="button button2">Go Back</button>
</div>

</body>
</html>
