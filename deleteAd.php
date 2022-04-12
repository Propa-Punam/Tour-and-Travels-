<?php if(!isset($_SESSION)) { session_start(); } ?>

<!DOCTYPE html>
<html>
<head>
<title>View Packages</title>
<link rel="stylesheet" type="text/css" href="admin_css.css">

</head>
<body>
<!--header-->
<!--sticky-->
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}
?>

	


<?php include('function.php'); ?>


<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	$s="delete from advertisement  where Advid='" . $_POST["t1"] . "'";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Delete');</script>";
    }
?>



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
<tr><td colspan="2" class="toptd">Delete Advertisement</td></tr>
<tr><td class="lefttxt">Select Title</td><td><select name="t1" required/><option value="">Select</option>

<?php
$cn=makeconnection();
$s="select * from advertisement";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

while($data=mysqli_fetch_array($result))
{
	if(isset($_POST["show"])&& $data[0]==$_POST["t1"])
	{
		echo"<option value=$data[0] selected>$data[1]</option>";
	}
	else
	{
		echo "<option value=$data[0]>$data[1]</option>";
	}
}
mysqli_close($cn);



?>

</select>
<input type="submit" value="Show" name="show" formnovalidate/>
<?php
if(isset($_POST["show"]))
{
$cn=makeconnection();
$s="select * from advertisement where Advid='" .$_POST["t1"] ."'";
$result=mysqli_query($cn,$s);
$r=mysqli_num_rows($result);
//echo $r;

$data=mysqli_fetch_array($result);
$Advid=$data[0];
$Title=$data[1];
$Companyname=$data[2];
$Pic=$data[3];


mysqli_close($cn);

}

?>

</td></tr>

<tr><td class="lefttxt">Company Name</td><td><input type="text"  value="<?php if(isset($_POST["show"])){ echo $Companyname ;} ?> " name="t2" required pattern="[a-zA-z _]{1,50}" title"Please Enter Only Characters between 1 to 50 for Company Name"/></td></tr>

<tr><td class="lefttxt">Old Pic</td><td><img src="addverimages/<?php echo @$Pic; ?>" width="150px" height="100px" /></td></tr>



<tr><td>&nbsp;</td><td ><input type="submit" value="Delete" name="sbmt" /></td></tr>




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
	
	
	//check if file already exists
	if(file_exists($target_file)){
		echo "sorry,file already exists.";
		$uploadok=0;
	}
	
	//check file size
	if($_FILES["t3"]["size"]>500000){
		echo "sorry, your file is too large.";
		$uploadok=0;
	}
	
	
	//aloow certain file formats
	if($imagefiletype != "jpg" && $imagefiletype !="png" && $imagefiletype !="jpeg" && $imagefileype !="gif"){
		echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
		$uploadok=0;
	}else{
		if(move_uploaded_file($_FILES["t3"]["tmp_name"], $target_file)){
			
	       } else{
			echo "sorry there was an error uploading your file.";
		}}
}
?>

</body>
</html>


