<?php session_start(); ?>
<?php
if(isset($_COOKIE['cookie_name']))
{
	header('Location: home cookie.php');
}
else
{

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type ="text/css" href="login and registration.css">

    <title>Login</title>
</head>
<body>
   
<div class="login">
     <h2 class="login_heading">Login Form</h2>
<?php include('function.php'); ?>
<?php
$_SESSION['loginstatus']="";
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="select * from users where Username='" . $_POST["t1"] . "' and Pwd='" . $_POST["t2"] ."'";
	
	$q=mysqli_query($cn,$s);
	$r=mysqli_num_rows($q);
$data=mysqli_fetch_array($q);
	mysqli_close($cn);
	if($r>0)
	{
		$_SESSION["Username"]= $_POST["t1"];
        $_SESSION["usertype"]=$data[3];
        if($_SESSION["usertype"]=="Admin"){
            $_SESSION['loginstatus']="yes";
            header("location:admin_page.php");
        }
        else{
            $_SESSION['loginstatus']="yes";
            header("location:home page.php");
        }
		
	
	}
	else
	{
	echo "<script>alert('Invalid User Name or Password');</script>";
}
}
?>








<form method="post" class="login_form"  action="home cookie.php">
    <div class="container">



<label for="uname"><b>Username</b></label><input type="text" name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for User Name" /></td></tr>
<label for="psw"><b>Password</b></label><input type="password" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters between 1 to 10 for Password" /></td></tr></table>
<input class="button" type="submit" value="LOGIN" name="sbmt">
<label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
</label>
</div>




</form>

<div>
    <p class="login">Doesn't have an account? please..<div class=go_to_reg>
            <a  href="registration.php" target="_self">Registration</a>
    </div>
    </p>
</div>


</div>


</div>

</body>
</html>
<?php
}
?>