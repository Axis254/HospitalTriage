<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_SESSION[adminid]))
	{
			$sql ="UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]',status='$_POST[select]' WHERE adminid='$_SESSION[adminid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('admin record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO admin(adminname,loginid,status) values('$_POST[adminname]','$_POST[loginid]','$_POST[select]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Administrator record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_SESSION[adminid]))
{
	$sql="SELECT * FROM admin WHERE adminid='$_SESSION[adminid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Triage PROJECT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
    			<div class="col-lg-2 pr-4 align-items-center">
		    		<a class="navbar-brand" >Triage<span>System</span></a>
	    		</div>
			    </div>
		    </div>
		  </div>
    </nav>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">View and Update Administrator Profile</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">
    <table width="200" align="center" border="3">
      <tbody>
        <tr>
          <td width="34%">Admin Name</td>
          <td width="66%"><input type="text" name="adminname" id="adminname" value="<?php echo $rsedit[adminname]; ?>"/></td>
        </tr>
        <tr>
          <td>Login ID</td>
          <td><input type="text" name="loginid" id="loginid"value="<?php echo $rsedit[loginid]; ?>" /></td>
        </tr>
        <tr>
          <td>Status</td>
          <td><select name="select" id="select">
          <option value="">Select</option>
          <?php
		  $arr = array("Active","Inactive");
		  foreach($arr as $val)
		  {
			  if($val == $rsedit[status])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
				  echo "<option value='$val'>$val</option>";			  
			  }
		  }
		  ?>
          </select></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
	<button onclick="goBack()">Go Back</button>

<script>
function goBack() {
  window.history.back();
}
</script>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>

<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmadminprofile.adminname.value == "")
	{
		alert("Admin name should not be empty..");
		document.frmadminprofile.adminname.focus();
		return false;
	}
	else if(!document.frmadminprofile.adminname.value.match(alphaspaceExp))
	{
		alert("Admin name not valid..");
		document.frmadminprofile.adminname.focus();
		return false;
	}
	else if(document.frmadminprofile.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmadminprofile.loginid.focus();
		return false;
	}
	else if(!document.frmadminprofile.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmadminprofile.loginid.focus();
		return false;
	}
	else if(document.frmadminprofile.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmadminprofile.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>