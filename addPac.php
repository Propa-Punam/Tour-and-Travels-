<?php if(!isset($_SESSION)) { session_start(); } ?>


<!DOCTYPE html>
<html>
<head>
<title>Add packages</title>
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




<form method="post" enctype="multipart/form-data" style="margin-top:50px;">
<table border="0" width="400px" height="450px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Add Package</td></tr>
<tr><td class="lefttxt">Package Name</td><td><input type="text" name="t1" required pattern="[a-zA-z _]{3,50}" title"Please Enter Only Characters between 3 to 50 for Package Name" /></td></tr>
<tr><td class="lefttxt">Select CategoryID</td><td><select name="t2" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from category";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{

		echo "<option value=$data[0]>$data[0]</option>";
	
}



?>

</select>




<tr><td class="lefttxt">Package Price</td><td><input type="number" name="t8" /></td></tr>
<tr><td class="lefttxt">Upload Pic1</td><td><input type="file" name="t4" /></td></tr>
<tr><td class="lefttxt">Details</td><td><textarea name="t7"></textarea></td></tr>
<tr><td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>




</table>
</form>



</div>


</div>

<?php
if(isset($_POST["sbmt"]))
{$cn=makeconnection();
	$f1=0;
	
	$target_dir = "packimages/";
	//t4
	$target_file = $target_dir.basename($_FILES["t4"]["name"]);
	$uploadok = 1;
	$imagefiletype = pathinfo($target_file, PATHINFO_EXTENSION);
	//check if image file is a actual image or fake image
	$check=getimagesize($_FILES["t4"]["tmp_name"]);
	if($check!==false) {
		echo "file is an image - ". $check["mime"]. ".";
		$uploadok = 1;
	}else{
		echo "file is not an image.";
		$uploadok=0;
	}
	
	
	//check if file already exists
	if(file_exists($target_file)){
		echo "sorry,file already exists.";
		$uploadok=0;
	}
	
	//check file size
	if($_FILES["t4"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t4"]["tmp_name"], $target_file)){
			$f1=1;
	} else{
			echo "sorry there was an error uploading your file.";
		}
	}

	
	

	if($f1>0)
		{
	
	$s="insert into package(Packname,Category,Packprice,Pic1,Detail) values('" . $_POST["t1"] ."','" . $_POST["t2"] . "','". $_POST["t8"] . "','" . basename($_FILES["t4"]["name"]) . "','" . $_POST["t7"] ."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Save');</script>";
		}
	
		
}
?>
<button class="button button2">
	<a href="admin_page.php">Go Back</a>
</button>
</body>
</html>


