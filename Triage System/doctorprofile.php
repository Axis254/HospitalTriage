<?php
session_start();
include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_SESSION[doctorid]))
	{
			$sql ="UPDATE doctor SET doctorname='$_POST[doctorname]',mobileno='$_POST[mobilenumber]',departmentid='$_POST[select3]',loginid='$_POST[loginid]',education='$_POST[education]',experience='$_POST[experience]',consultancy_charge='$_POST[consultancy_charge]' WHERE doctorid='$_SESSION[doctorid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Doctor profile updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO doctor(doctorname,mobileno,departmentid,loginid,password,status,education,experience) values('$_POST[doctorname]','$_POST[mobilenumber]','$_POST[select3]','$_POST[loginid]','$_POST[password]','$_POST[select]','$_POST[education]','$_POST[experience]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Doctor record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_SESSION[doctorid]))
{
	$sql="SELECT * FROM doctor WHERE doctorid='$_SESSION[doctorid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Doctor Profile | Triage System</title>
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
		    		<a class="navbar-brand" >Triage<span>Triage</span></a>
	    		</div>
			    </div>
		    </div>
		  </div>
    </nav>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Add New Doctor </li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Add new Doctor record</h1>
   <form method="post" action="" name="frmdoctprfl" onSubmit="return validateform()">
    <table width="418" border="3">
      <tbody>
        <tr>
          <td width="34%">Doctor Name</td>
          <td width="66%"><input type="text" name="doctorname" id="doctorname" value="<?php echo $rsedit[doctorname]; ?>" /></td>
        </tr>
        <tr>
          <td>Mobile Number</td>
          <td><input type="text" name="mobilenumber" id="mobilenumber" value="<?php echo $rsedit[mobileno]; ?>"/></td>
        </tr>
        <tr>
          <td><p>Department</p></td>
          <td><select name="select3" id="select3" class="form-control">
          <option value="">Select</option>
            <?php
		  	$sqldepartment= "SELECT * FROM department WHERE status='Active'";
			$qsqldepartment = mysqli_query($con,$sqldepartment);
			while($rsdepartment=mysqli_fetch_array($qsqldepartment))
			{
				if($rsdepartment[departmentid] == $rsedit[departmentid])
				{
	echo "<option value='$rsdepartment[departmentid]' selected>$rsdepartment[departmentname]</option>";
				}
				else
				{
  echo "<option value='$rsdepartment[departmentid]'>$rsdepartment[departmentname]</option>";
				}
				
			}
		  ?>
          </select></td>
        </tr>
        <tr>
          <td>Login ID</td>
          <td><input type="text" name="loginid" id="loginid" value="<?php echo $rsedit[loginid]; ?>"/></td>
        </tr>
        <tr>
          <td>Education</td>
          <td><input type="text" name="education" id="education" value="<?php echo $rsedit[education]; ?>" /></td>
        </tr>
        <tr>
          <td>Experience</td>
          <td><input type="text" name="experience" id="experience" value="<?php echo $rsedit[experience]; ?>"/></td>
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
if(document.frmdoctprfl.doctorname.value == "")
	{
		alert("Doctor name should not be empty..");
		document.frmdoctprfl.doctorname.focus();
		return false;
	}
	else if(!document.frmdoctprfl.doctorname.value.match(alphaspaceExp))
	{
		alert("Doctor name not valid..");
		document.frmdoctprfl.doctorname.focus();
		return false;
	}
	else if(document.frmdoctprfl.mobilenumber.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmdoctprfl.mobilenumber.focus();
		return false;
	}
	else if(!document.frmdoctprfl.mobilenumber.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmdoctprfl.mobilenumber.focus();
		return false;
	}
	else if(document.frmdoctprfl.select3.value == "")
	{
		alert("Department ID should not be empty..");
		document.frmdoctprfl.select3.focus();
		return false;
	}
	else if(document.frmdoctprfl.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmdoctprfl.loginid.focus();
		return false;
	}
	else if(!document.frmdoctprfl.loginid.value.match(alphanumericExp))
	{
		alert("loginid not valid..");
		document.frmdoctprfl.loginid.focus();
		return false;
	}
	else if(document.frmdoctprfl.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmdoctprfl.password.focus();
		return false;
	}
	else if(document.frmdoctprfl.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmdoctprfl.password.focus();
		return false;
	}
	else if(document.frmdoctprfl.password.value != document.frmdoctprfl.cnfirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmdoctprfl.password.focus();
		return false;
	}
	else if(document.frmdoctprfl.education.value == "")
	{
		alert("Education should not be empty..");
		document.frmdoctprfl.education.focus();
		return false;
	}
	else if(!document.frmdoctprfl.education.value.match(alphaExp))
	{
		alert("Education not valid..");
		document.frmdoctprfl.education.focus();
		return false;
	}
	else if(document.frmdoctprfl.experience.value == "")
	{
		alert("Experience should not be empty..");
		document.frmdoctprfl.experience.focus();
		return false;
	}
	else if(!document.frmdoctprfl.experience.value.match(numericExpression))
	{
		alert("Experience not valid..");
		document.frmdoctprfl.experience.focus();
		return false;
	}
	else if(document.frmdoctprfl.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmdoctprfl.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>