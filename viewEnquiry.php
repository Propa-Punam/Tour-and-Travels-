<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>View Ad</title>
<link rel="stylesheet" type="text/css" href="admin_css.css">
</head>
<body>
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
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

</div>


<form method="post">
<table border="0" width="90%" height="300px" align="center" class="tableshadow">
<tr><td class="toptd">View Enquiry</td></tr>
<tr><td align="center" valign="top" style="padding-top:10px;">
<table border="0" align="center" width="95%">

<td style="font-size:15px; padding:5px; font-weight:bold; ">Package Id</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Name</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Gender</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Mobile No.</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Email</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">No. of Days</td>

<td style="font-size:15px; padding:5px; font-weight:bold;">no. of Persons</td>
<td style="font-size:15px; padding:5px; font-weight:bold;">Details</td>
</tr>


<?php

$s="select * from enquiry,package where enquiry.Packageid=package.Packid";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{

	
		echo "
		<td style=' padding:5px;'>$data[1]</td>
		<td style=' padding:5px;'>$data[2]</td>
		<td style=' padding:5px;'>$data[3]</td>
		<td style=' padding:5px;'>$data[4]</td>
		<td style=' padding:5px;'>$data[5]</td>
		<td style=' padding:5px;'>$data[6]</td>
		<td style=' padding:5px;'>$data[7]</td>
		<td style=' padding:5px;'>$data[8]</td>
		
		</tr>";

}




?>

</table>
</td></tr></table>

</form>



</div>


</div>
<button class="button button2" >
	<a href="admin_page.php">Go Back</a>
</button>
</body>
</html>