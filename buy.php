<?php if(!isset($_SESSION)) { session_start(); } ?>


<!DOCTYPE html>
<html>
<head>
<title>buy</title>

<link rel="stylesheet" type="text/css" href="admin_css.css">

<style>

   
h1.about_us{
   
   text-shadow: 0 0 3px #FF0000, 0 0 5px #0000FF;
   text-align:center;font-size: 50px;display: block;
 
}
span.about{
  
  width: 100%;
  max-width: 100%;
  
  background-image: linear-gradient(to right, red , yellow);
}

 
 div.main_home_div{
   margin: 50px;
 }
 
 
input[type=text],input[type=password],input[type=number],input[type=email], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

</style>
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


 
<form method="post" >
<tr><td class="lefttxt">Package Id:</td><td><input type="number" name="id"></td></tr><br/>
<tr><td class="lefttxt">Name:</td><td><input type="text" name="t1" required pattern="[a-zA-z1 _]{3,50}" title"Please Enter Only Characters and numbers between 1 to 50 for Name"/></td></tr><br/>
<tr><td class="lefttxt">Gender:</td><td><input type="radio" name="r1" value="Male" checked="checked" />Male<input type="radio" name="r1"  value="Female"/>Female</td></tr><br/>
<tr><td class="lefttxt">Mobile No.</td><td><input type="text" name="t2" required pattern="[0-9]{10,12}" title"Please Enter Only numbers between 10 to 12 for Mobile No"/></td></tr><br/>
<tr><td class="lefttxt">Email:</td><td><input type="email" name="t3" required /></td><td><br/>
<tr><td class="lefttxt">No.of Days:</td><td><input type="number" name="t4" required pattern="[1 _]{1,20}" title"Please Enter Only numbers between 1 to 20 for No. oF Days"/></td><td><br/>
<tr><td class="lefttxt">No.of Adults:</td><td><input type="number" name="t6" required pattern="[1 _]{1,20}" title"Please Enter Only numbers between 1 to 20 for No.Of Adults"/></td><td><br/>
<tr><td class="lefttxt">Enquiry Message:</td><td><textarea name="t7" required="required"/></textarea></td><td><br/>
<tr><td>&nbsp;</td><td ><input type="submit" value="Submit" name="sbmt" /></td></tr>

</form>
</div>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="insert into enquiry(Packageid,Name,Gender,Mobileno,Email,NoofDays,Num_person,Message) values('" . $_POST["id"] ."','" . $_POST["t1"] ."','" . $_POST["r1"] ."','" . $_POST["t2"] ."','" . $_POST["t3"] ."','" . $_POST["t4"] ."','" . $_POST["t6"] ."','" . $_POST["t7"]."')";	
	
	
		mysqli_query($cn,$s);
	
	echo "<script>alert('Record Save');</script>";
}
?>
</body>
</html>