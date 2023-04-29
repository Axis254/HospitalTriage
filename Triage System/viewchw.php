<?php
include("header.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM chw WHERE chwid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('chw record deleted successfully..');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Community Healthcare Worker | Triage System</title>
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
		    		<a class="navbar-brand" href="index.html">Triage<span>System</span></a>
	    		</div>
			    </div>
		    </div>
		  </div>
    </nav>
<div class="wrapper col2">
  <div id="breadcrumb">View  chw  </div>
</div>
<div class="wrapper col4">
  <div id="container">
 
<section class="container">
<h2>Search chw - <input type="search" class="light-table-filter" data-table="order-table" placeholder="Filtrer" /></h2>


	<table class="order-table">
      <thead>
   
    <table style="width:100%;" border="3">
      <tbody>
        <tr>
          <td>chw Name</td>
          
         
          <td>Login ID</td>
          
          
          <td>Status</td>
          <td>Action</td>
        </tr>
          <?php
		$sql ="SELECT * FROM chw";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			
        echo "<tr>
          <td>&nbsp;$rs[chwname]</td>
         
			<td>&nbsp;$rs[loginid]</td>
			
		
          <td>$rs[status]</td>
           <td>&nbsp;
		   <a href='chw.php?editid=$rs[chwid]'>Edit</a> | <a href='viewchw.php?delid=$rs[chwid]'>Delete</a> </td>
        </tr>";
		}
		?>      </tbody>
    </table>
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

