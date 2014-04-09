<!DOCTYPE html>
<!-- Do not edit this file, copy the code to use it in your module-->
<html>
<head>
	<meta charset="utf-8">
    <title>Template</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
</head>
<body>
	<div class="container-fluid">
		<div class="row" role="header">
			<?php include_once "header.php";?> 
		</div>
	
		<div class="container"><!-- you can delete this div if you don't want the side bar-->
				<!--Navigation sidebar-->
				<div class="col-sm-3 col-md-2 sidebar">
	                <ul class="nav nav-sidebar">
	                	<?php
	                		require_once "class.MySQL.php";
	                		$omysql=new MySQL();
	                		$omysql->Select("categories");
	                		$result=$omysql->arrayedResult;
	                		if($omysql->records>0){
		                		$categories=array();
		                		foreach ($result as $row) {
		                			if(preg_match("/^[A-Za-z]+$/", $row["categories_name"])){
		                				$categories[]["category"]=$row["categories_name"];
		                				$categories[]["sub_category"]=array();
		                			}
		                		}
		                		foreach ($result as $row) {
		                			if(preg_match("/^[A-Za-z]+:[A-Za-z]+$/", $row["categories_name"])){
		                				$temp=explode(":", $row["categories_name"]);
		                				for($i=0;$i<count($categories);$i++){
		                					if($categories[$i]["category"]==$temp[0])
		                						$categories[$i]["sub_category"][] =$temp[1];
		                				}
		                			}
		                		}
		                		foreach ($categories as $row) {
		                			if(count($row["sub_category"])>0){
			                			echo "<li><a href='#' class='dropdown-toggle' data-toggle='dropdown' data-hover='dropdown'>";
			                			echo $row["category"]."</a>";
			                			echo "<ul class='dropdown-menu dropdown-menu-right' style='right:-100%; top:0%' role='menu' aria-labelledby='dropdownMenu'>";
			                			foreach ($row["sub_category"] as $value) {
			                				echo "<li><a tabindex='-1' href='#'>".$value."</a></li>";		
			                			}
			                			echo "</ul>";

		                			}else{
		                				echo "<li><a href='#'>".$row["category"]."</a></li>";
		                			}
		                		}
		                	}
	                	?>
		                <!-- <li class="active" >
		                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Search</a>
		                	<ul class="dropdown-menu dropdown-menu-right" style="right:-100%; top:0%" role="menu" aria-labelledby="dropdownMenu">
								  <li><a tabindex="-1" href="#">Action</a></li>
								  <li><a tabindex="-1" href="#">Another action</a></li>
								  <li><a tabindex="-1" href="#">Something else here</a></li>
								  <li class="divider"></li>
								  <li><a tabindex="-1" href="#">Separated link</a></li>
							</ul>
		                </li>
		                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown">Profile</a>
		                	<ul class="dropdown-menu dropdown-menu-right" style="right:-100%; top:0%" role="menu" aria-labelledby="dropdownMenu">
								  <li><a tabindex="-1" href="#">Action</a></li>
								  <li><a tabindex="-1" href="#">Another action</a></li>
								  <li><a tabindex="-1" href="#">Something else here</a></li>
								  <li class="divider"></li>
								  <li><a tabindex="-1" href="#">Separated link</a></li>
							</ul>
		                </li>
		                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Bulk Order</a></li>
		                <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Auction</a></li> -->
	                </ul>
                </div>
				<!--Main Content area--> 
		        <div class="container-fluid col-sm-9 col-md-9">
		        	<div id="item_col_1" class="container-fluid clo-sm-4 col-md-4"></div>
		        	<div id="item_col_2" class="container-fluid clo-sm-4 col-md-4"></div>
		        	<div id="item_col_3" class="container-fluid clo-sm-4 col-md-4"></div>
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
	<script type="text/javascript" src="../js/bootstrap-hover-dropdown.js"></script>
	<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>
</body>
</html>
