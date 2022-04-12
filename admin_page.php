
<?php if(!isset($_SESSION)) { session_start(); } ?>
<!DOCTYPE html>
<html>
<head>
<title>admin page</title>
<link href="admin_page.css" rel='stylesheet' type='text/css'/>

</head>
<body>
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:login and registration.html");
}
?>
<header>
       <div class="main_home_div">
           <h1  id="top_heading_id" class="top_heading">tour and travels....</h1>
       </div>
    <div class="navigation">
        <nav>
       <span class="navigation"> <a  href="home page.php">Home</a> </span>
       
        <span class="navigation"><a  href="logout.php"> Logout</a> </span>
        </nav>
    </div>

   </header>
  

   <?php if($_SESSION["usertype"]=="Admin")
{?>
 <div class="user">
  
<a class="link_navigation" href="updateUser.php" target="_blank">Update User</a>
<a class="link_navigation" href="deleteUser.php" target="_blank">Delete User</a>
<a class="link_navigation" href="viewUser.php" target="_blank">View User</a>
   </div>
   <div class="category" style="margin-top:100px">
  
<a class="link_navigation"href="addCat.php" target="_blank">Add Category</a>
<a class="link_navigation" href="updateCat.php" target="_blank">Update Category</a>
<a class="link_navigation" href="deleteCat.php" target="_blank">Delete Category</a>
<a class="link_navigation" href="viewCat.php" target="_blank">View Category</a>

   </div>
   <div class="sub_category" style="margin-top:100px" >
  
   <a class="link_navigation"href="addPac.php" target="_blank">Add Packages</a>
<a class="link_navigation" href="updatePac.php" target="_blank">Update Packages</a>
<a class="link_navigation" href="deletePac.php" target="_blank">Delete Packages</a>
<a class="link_navigation" href="viewPac.php" target="_blank">View Packages</a>

   </div>

   <div class="Ad"  style="margin-top:100px">
  
   <a class="link_navigation"href="addAd.php" target="_blank">Add Advertisement</a>
<a class="link_navigation" href="deleteAd.php" target="_blank">Delete Advertisement</a>
<a class="link_navigation" href="viewAd.php" target="_blank">View Advertisement</a>

   </div>
   <div class="Enquiry"  style="margin-top:100px">
  
   <a class="link_navigation"href="viewEnquiry.php" target="_blank">View Enquiry</a>

<?php }?>
   </div>






</body>
</html>