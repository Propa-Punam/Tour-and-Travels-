<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type ="text/css" href="login and registration.css">

<title> Registration</title>
</head>
<body>
   
<div class="login">
     <h2 class="login_heading">Registration Form</h2>
<?php include('function.php'); ?>
<?php
$_SESSION['loginstatus']="";
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into users(Username,Pwd,Typeofuser) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" .'General'. "')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
    echo "<script>alert('Registration Complete');</script>";
    header("location:loginCookie.php");
}
?>
	








<form method="post" class="login_form">
    <div class="container">



<label for="uname"><b>Username</b></label><input type="text" name="t1" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for User Name" />
<label for="psw"><b>Password</b></label><input type="password" name="t2" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters between 1 to 10 for Password" />
<label for="cpsw"><b>Confirm Password</b></label><input type="password" name="t3" required pattern="[a-zA-z0-9]{1,10}" title"Please Enter Only Characters and numbers between 1 to 10 for Company name"/>

<input class="button" type="submit" value="Registration" name="sbmt">
<label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
</label>
</div>
<div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
      </div>



</form>

<div>
    <p class="login">Already have an account? please..<div class=go_to_reg>
            <a  href="loginCookie.php" target="_self">Login</a>
    </div>
    </p>
</div>

</div>


</div>

</body>
</html>