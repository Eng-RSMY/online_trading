<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>Template</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
</head>
<body>
<?php include_once "search_process.php";?>

	<div class="container-fluid">
		<div class="row" role="header">
			<?php include_once "header.php";?> 
		</div>
	
		<div class="container">
				<!--Navigation sidebar-->
				<div class="col-sm-3 col-md-2 sidebar">
	                <ul class="nav nav-sidebar">
		                <li class="active"><a href="#">Search</a></li>
		                <li><a href="#">Profile</a></li>
		                <li><a href="#">Bulk Order</a></li>
		                <li><a href="#">Auction</a></li>
	                </ul>
                </div>
				<!--Main Content area--> 
		        <div class="container-fluid">
		        <ul>
		        	<?php include "show_result.php";?>
		        </ul>
		           <!--
						Write all
						your code
						here...
						It will appear in the content 
						section of webpage
		           -->
		        
	    		</div>
		</div>
	</div>
	<!--All javascript placed at the end so that the page loads faster-->
    <script src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>
</body>
</html>

