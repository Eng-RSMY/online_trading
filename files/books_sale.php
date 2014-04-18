<!DOCTYPE html>
<!-- Do not edit this file, copy the code to use it in your module-->
<html>
<head>
	<meta charset="utf-8">
    <title>Template</title>
	<link rel="stylesheet" href="../css/bootstrap.css"  type="text/css"/>
	<link rel="stylesheet" type="text/css" href="../css/smoothness/jquery-ui.css">



	<!--some problem in this link-->
	<link href="../css/bootstrap-combined.min.css" rel="stylesheet" type="text/css">








    <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap-datetimepicker.min.css">
	
</head>
<body>
	<div class="container-fluid">
		<div class="row" role="header">
			<?php include_once "header.php";?> 
		</div>
	
		<div class="container"><!-- you can delete this div if you don't want the side bar-->
				<!--Navigation sidebar-->
				
				<!--Main Content area--> 
		        <div class="container-fluid col-sm-9 col-md-10">
		           <!--
						Write all
						your code
						here...
						It will appear in the content 
						section of webpage
		           -->


                    <form  action="set_sale.php" method="post" class="form-horizontal" id="usrform" enctype="multipart/form-data"  onsubmit="return validation(this)">
                    <fieldset>




		          	<div class="form-group">
		             <label class="col-sm-2 control-label" for="select02" >Choose Type</label>
		        <!--     <div class="controls">-->
		             <div class="col-sm-5">
		             <select name="type_2" id="type" class="form-control">
		             <option></option>
		             <option value='fiction'>Fiction</option>
		             <option>Romance</option>
		             <option>Drama</option>
		             <option>Horror</option>
		             <option>Others</option>
		             </select>
		             </div>
                     </div>
                      

                   


                     <div class="form-group">
		             <label class="col-sm-2 control-label" for="select03" >Name</label>
		            
		            
		            <div class="col-sm-5">
		             <input type = "text" class="form-control"  id="name" name="name_2" style="height:30px;font-size:14pt;" >
		             
		             </div>
		             </div>
         













                    <div class="form-group">
		            <label class="col-sm-2 control-label" for="select03">Author</label>
		          <div class="col-sm-5">
		            <input type = "text" class="form-control" id="author" name="author_2">
                   </div>
		       
		            </div>







		          
		            <div class="form-group">
		            <label class="col-sm-2 control-label" for="select05">M.R.P.</label>
		           <div class="col-sm-5">
		            <input type = "number" class="form-control" id="mrp" name="mrp_2" min="1">
		            </div>
		      
		            </div>









		            <div class="form-group">
		            <label class="col-sm-2 control-label" for="select03">Quantity</label>
		         <div class="col-sm-5">
		            <input type = "number" class="form-control"  id="quantity" name="quantity_2" min="1">
                   </div>
		            </div>


		            <div class="form-group" >
		            <label class="col-sm-2 control-label" for="select06">Condition</label>
		            <div class="col-sm-5">
		            <input type = "text" class="form-control" id="condition" name="condition_2">
		           </div>
		            </div>
                    <div class="form-group">
                    <label class="col-sm-2 control-label" for="select07">Description</label>
                    <div class="col-sm-5">
                    <textarea rows="4" cols="50" name="description_2" form="usrform" style=" width: 360px; height: 70px;"></textarea>
		            </div>
		            </div>
                     
		             <div class="form-group">
		            <label class="col-sm-2 control-label" for="select08">Base Price</label>
		            <div class="col-sm-5">
		            <input class="form-control" name="base_price_2" id="base_price" type = "number" min="1"/>


		            </div>
		            </div>

              

                  

		            
		            

		            <div>
					<label for="file">Filename:</label>
					<input type="file" name="file" id="file"><br>
					</div>

		             <div id="valid_msg">
                </div>
		             	
		        
                

                      <div class="form-actions">
                     <div class="col-sm-1">
		           <input type="submit" name="submit" class="btn btn-primary" value="Submit" class="form-control" onclick="verify()" >
		           </div>  
		           </div>

                      
		              </fieldset>
                      </form>
		              
		             

		             </div>
		        		<div class="container-fluid col-sm-3 col-md-2">
                  <ul style="list-style-type: none;">
                    <li>
                   <label class="checkbox inline">
                      <input type="checkbox" name="Literature" value="Literature"> Literature
                
                    </label>
                  </li>
                  <li>
                    <label class="checkbox inline">
                      <input type="checkbox" name="Textbooks" value="Textbooks"> Textbooks
                    </label>
                  </li>
                  <li>
                    <label class="checkbox inline">
                      <input type="checkbox" name="Bussiness Magazines" value="Bussiness Magazines"> Bussiness Magazines
                    </label>
                   </li>
                   <li>
                    <label class="checkbox inline">
                      <input type="checkbox" name="Science journals" value="Science journals"> Science journals
                    </label>
                  </li>
                  
                  
                  </ul>
                 </div>
	    		</div>


		</div>

	
	

	<!--<script>
	function myFunction(){
    alert('hii');
    alert(document.getElementById('name').value);
     }
     
	</script>-->

	<!--All javascript placed at the end so that the page loads faster-->
	<script src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/custom/search_suggestions.js"></script>
	<script type="text/javascript">
 function verify(){
  if(!document.getElementById('type').value.trim().length){
 	 	 alert("Please enter the type");
        $( "#usrform" ).submit(function( event ) {
       alert( "Handler for .submit() called." );
       event.preventDefault();
});
   }else if(!document.getElementById('name').value.trim().length){
        alert("Please enter the name");
        $( "#usrform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  document.getElementById('name').style.color="red";
  event.preventDefault();
});
    }
    else if(!document.getElementById('author').value.trim().length){
        alert("Please enter the author");
        $( "#usrform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});
    }
    else if(!document.getElementById('quantity').value.trim().length){
        alert("Please enter the quantity");
        $( "#usrform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});
    }
  
    else if(!document.getElementById('description').value.trim().length){
        alert("Please enter the description");
        $( "#usrform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});
    }
    else if(!document.getElementById('base_price').value.trim().length){
        alert("Please enter the base_price");
        $( "#usrform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});
    }
    else if(!document.getElementById('start_date').value.trim().length){
        alert("Please enter the start_date");
        $( "#usrform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});
    }
    else if(!document.getElementById('close_date').value.trim().length){
        alert("Please enter the close_date");
        $( "#usrform" ).submit(function( event ) {
  alert( "Handler for .submit() called." );
  event.preventDefault();
});
    }
 }</script>
	
 

	<!-- <script type="text/javascript">
                     function check1(event)
                     {
                     if (!document.getElementById('file').value.match(/.*\.PNG|.*\.GIF|.*\.JPEG|.*\.jpg/) )
                      {
					  alert('File must have suitable extension. Please try again.');
					    return false;
					    event.preventDefault();
					    }
					    else{
					    	alert("hii");
					    	
					    	
					    return true;
                         
					}

					  }
					</script> -->

					<!--<script type="text/javascript">
                     function check2(event)
                     {
                     if (!document.getElementById('image2').value.match(/.*\.PNG/) || !document.getElementById('image2').value.match(/.*\.GIF/) || !document.getElementById('image2').value.match(/.*\.JPEG/) || !document.getElementById('image2').value.match(/.*\.JPG/))
                      {
					  alert('File must have suitable extension. Please try again.');
					    return false;
					    }
					    return true;
					  }
					</script>

					<script type="text/javascript">
                     function check3(event)
                     {
                     if (!document.getElementById('image3').value.match(/.*\.PNG/) || !document.getElementById('image3').value.match(/.*\.GIF/) || !document.getElementById('image3').value.match(/.*\.JPEG/) || !document.getElementById('image3').value.match(/.*\.JPG/))
                      {
					  alert('File must have suitable extension. Please try again.');
					    return false;
					    }
					    return true;
					  }
					</script> -->
    
	<script type="text/javascript" src="../js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
        </script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker2').datetimepicker();
            });
        </script>


</body>
</html>
<script type="text/javascript">

function validation(thisform)
{
   with(thisform)
   {
      if(validateFileExtension(file, "valid_msg", "png/jpeg/image files are only allowed!",
      new Array("PNG","GIF","JPEG","jpg","png","gif","jpeg")) == false)
      {
         return false;
      }
      
   }
}

function validateFileExtension(component,msg_id,msg,extns)
{
   var flag=0;
   with(component)
   {
      var ext=value.substring(value.lastIndexOf('.')+1);
      for(i=0;i<extns.length;i++)
      {
         if(ext==extns[i])
         {
            flag=0;
            break;
         }
         else
         {
            flag=1;
         }
      }
      if(flag!=0)
      {
         document.getElementById(msg_id).innerHTML=msg;
         component.value="";
         component.style.backgroundColor="#eab1b1";
         component.style.border="thin solid #000000";
         component.focus();
         return false;
      }
      else
      {
         return true;
      }
   }
}


</script>