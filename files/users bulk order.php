

<!DOCTYPE html>
<!-- Do not edit this file, copy the code to use it in your module-->

<html>
<head>
	<meta charset="utf-8">
    <title>Template</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>

<script>
$(document).ready(function(){
	$('input').click(function(){
		var value=$(this).val();
		//alert(value);
		if(value=='edit')
		{
			var id=$(this).attr('id');
			//alert(id);
			var str=id.split("");
			var x='';
			for(var i=1;i<str.length;i++)
			{
				x=x+str[i];
			}
			//alert(x);

			var q_id='#'+'q'+x;
			var c_id='#'+'c'+x;
			var d_id='#'+'d'+x;
			var q=$(q_id).val();
			var c=$(c_id).val();
			var d=$(d_id).val();
			//alert(q);

			$.ajax({
				url:'edit.php',
				method:'POST',
				data:'q='+q+'&c='+c+'&d='+d+'&x='+x,
				success:function(result){
					//alert(result);
					if(result)
					{
						$('#response').html("<p style='color:green'>Updated</p>")
					}
				}
			});
						

		}

	  if(value=='Buy')
	  	{
	  	  alert(value);
	  	  var id=$(this).attr('id');
	  	  var str=id.split("");
			var x='';
			for(var i=1;i<str.length;i++)
			{
				x=x+str[i];
			}
	  	  var q_id='#q'+x;
	  	  var n_id='#n'+x;
	  	  var c_id='#c'+x;

	  	  var q=$(q_id).val();
	  	  var n=$(n_id).val();
	  	  var c=$(c_id).val();


	  	  $.ajax({
				url:'buy.php',
				method:'POST',
				data:'id='+x+'&q='+q+'&n='+n+'&c='+c,
				success:function(result){
					alert(result);
					if(result)
					{
						//$('#response').html("<p style='color:green'>Updated</p>")
					}
				}
			});


	  	}

		
		if(value=='Insert')
		 {

		 	var id=$(this).attr('id');
			var str=id.split("");
			var x='';
			for(var i=1;i<str.length;i++)
			{
				x=x+str[i];
			}
			var n_id='#'+'n'+x;
			var q_id='#'+'q'+x;
			var c_id='#'+'c'+x;
			var d_id='#'+'d'+x;
			var q=$(q_id).val();
			var c=$(c_id).val();
			var d=$(d_id).val();
			var n=$(n_id).val();
			var insert='#e'+x;
			var del='#z'+x;
			$.ajax({
				url:'insert.php',
				method:'POST',
				data:'q='+q+'&c='+c+'&d='+d+'&x='+x+'&n='+n,
				success:function(result){
					alert(result);
					if(result)
					{
						$('#response').html("<p style='color:blue'>Inserted</p>")
					}
				}
				
			});

		
		 }
	});
}); 
</script>
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
		                <li class="active"><a href="#">Search</a></li>
		                <li class="active"><a href="orders list.php">Orders list</a></li>
		                <li class="active"><a href="#">Help</a></li>
		                
		                
		                
	                </ul>
                </div>
				<!--Main Content area--> 
		        <div class="container-fluid">
		           		           

		             <table width="80%" border="2"id="table1">
		        	<tr >
		        		<th align="center" width="14%">id</th>
		        		<th align="center" width="17%">name</th>
		        		<th align="center"width="15%">cost</th>
		        		<th align="center"width="15%">discount</th>
		        		<th align="center"width="15%">qty</th>
		        		<th align="center"width="19%">Buy items</th>
		        	</tr>
		        	
		        	<?php
		        	require_once "class.MySQL.php";
		        	   
                      $obmysql=new MySQL();
                      
                       $obmysql->Select("vendor's database","","id ASC");
                       $rows=$obmysql->arrayedResult;
                       $item_id;

                      if($obmysql->records>0)
                      {
                      	   

   	                      foreach ($rows as $row)
   	                         {
   	                               
                                   $item_id=$row["id"]; 
                                   $item_name=$row["name"];
                                   $qty=0;
                                   $cost=$row["cost"];                                 
                                   $discount=$row["discount"]; 

                                   ?>
                                 <tr id="<?php echo 'r'.$item_id?>">
								<td align="center">
									<div class="input-group" align="center">				
 									 <input type="text"  value="<?php echo $item_id ?>" disabled="true" class="form-control" >
								    </div>
							   </td>
	                       		<td align="center">
	                       			
	                       			<div class="input-group">

 									 <input type="text" id="<?php echo 'n'.$item_id; ?>" disabled="true" value="<?php echo $item_name ?>"disabled="true"class="form-control" >
 									  
								    </div>

							    </td>
	                       		
	                       		<td align="center">
	                       			<div class="input-group">				
 									 <input type="text" id="<?php echo 'c'.$item_id; ?>" disabled="true" value="<?php echo $cost ?>" class="form-control" >
								    </div>
							    </td>
	                       		<td align="center">
	                       			<div class="input-group">				
 									  <input  type="text" id="<?php echo 'd'.$item_id; ?>"disabled="true" value="<?php echo $discount ?> "class="form-control" >
							     	</div>
							    </td>

							    <td align="center">
	                       			<div class="input-group">				
 									  <input type="text" id="<?php echo 'q'.$item_id; ?>" value="<?php echo $qty ?> "class="form-control" >
								    </div>
							    </td>

	                       		<td align="center" ><input  class="btn btn-primary"style="display: inline"  align="center" type='button' value='Buy' id="<?php echo 'e'.$item_id; ?>">               
	                               
	                       		</td>

	                       		</tr>	                       		
	                       		     
	                       	   <?php	  
	                       	     
	                       	   
	                         }                       	   

	                   }
	                 else
	                  {
	                  	echo "The query hasn't returned anything!! ";
	                  }
	                  	
		        	?>
		        		        

		         </table>

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
