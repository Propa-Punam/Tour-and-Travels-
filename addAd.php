<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>View Packages</title>
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




<form method="post" enctype="multipart/form-data">
<table border="0" width="400px" height="300px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Add Advertisement</td></tr>
<tr><td class="lefttxt">Title</td><td><input type="text" name="t1" required pattern="[a-zA-z _]{3,50}" title"Please Enter Only Characters between 3 to 50 for Title" /></td></tr>
<tr><td class="lefttxt">Company Name</td><td><input type="text" name="t2"  required="required" pattern="[a-zA-z. _]{3,50}" title"Please Enter Only Characters between 3 to 50 for Company name" /></td></tr>
<tr><td class="lefttxt">Upload Pic</td><td><input type="file" name="t3"/></td></tr>
<tr><td class="lefttxt">Details</td><td><textarea name="t4"/></textarea></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>
</table>
</form>
</div>


</div>
<button class="button button2" >
	<a href="admin_page.php">Go Back</a>
</button>

<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	
	$target_dir = "addverimages/";
	$target_file = $target_dir.basename($_FILES["t3"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["t3"]["tmp_name"]);
	if($check!==false) {
		echo "file is an image - ". $check["mime"]. ".";
		$uploadok = 1;
	}else{
		echo "file is not an image.";
		$uploadok=0;
	}
	
	
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t3"]["tmp_name"], $target_file)){
			
	
	
	$s="insert into advertisement(title,companyname,pic,detail) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','" . basename($_FILES["t3"]["name"]) . "','" . $_POST["t4"] ."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Save');</script>";
	
	
		} else{
			echo "sorry there was an error uploading your file.";
		}}
}
?>

</body>
</html>


