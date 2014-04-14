<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>My Items</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="../../css/bootstrap-responsive.css" rel="stylesheet">
<link href="../../css/style.css" rel="stylesheet">
<link href="../../css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="../../css/jquery.fancybox.css" rel="stylesheet">
<link href="../../css/cloud-zoom.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/bootstrap/css/bootstrap.css"  type="text/css"/>
<link rel="stylesheet" type="text/css" href="../../css/smoothness/jquery-ui.css">
<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="assets/ico/favicon.html">
<?php 
    session_start();
    if(!isset($_SESSION['user_nm']))
    header("Location: http://localhost/online_trading/files/Profile/login.php");
?>
<script type="text/javascript">
 var item_ids = new Array();
 var i=0;
</script>
</head>
<body>
    <?php include 'header.php';?>
        <?php include 'sidebar.php'; ?>
<div id="maincontainer">
  <section id="product">
    <div class="container">
      <div class="row">
        <!-- My Items -->
        <div class="span9">
          <h1 class="heading1"><span class="maintext">Watchlist</span><span class="subtext">Monitor items you are interested in</span></h1>
          <div class="cart-info">
            <table id="mytable" class="table table-striped table-bordered">
              <tr>
                <th class="image">Image</th>
                <th class="name">Product Name</th>
                <th class="model">Category</th>
                <th class="condition">Condition</th>
                <th class="quantity">Quantity</th>
                <th class="cost">Cost</th>
                <th class="type">Type</th>
                <th class="description">Item Description</th>
                <th class="total">Action</th>
              </tr>
              <?php 
                  if(!($connection=mysql_connect("localhost", "root", "")))
                  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
                  if(!mysql_select_db("online_trading", $connection))
                  header("Location: http://localhost/online_trading/files/Profile/connection_error.php");
                  else{
                  if(!isset($_SESSION))
                  session_start();
                  $rs=mysql_query("SELECT * from watch_list where user_nm='".$_SESSION['user_nm']."'");
                  if($rs)
                  {
                  $count=0;
                  while($ids=mysql_fetch_assoc($rs)){
                  ++$count;
                    echo '<script type="text/javascript">
                         item_ids[i]=';
                         echo $ids['item_id'];
                         echo';
                         ++i;
                         </script>';
                         $info=mysql_query("SELECT * from items where item_id='".$ids['item_id']."'");
                         $row=mysql_fetch_assoc($info);
                  echo '<tr id="';echo $count;echo '"">
                <td class="image"><a href="#"><img width="50" height="50" src="';echo $row['pic_loc'];echo '" alt="product" title="product"></a></td>
                <td class="name">'.$row['item_nm'].'</td>
                <td class="model">'.$row['category'].'</td>
                <td class="condition">'.$row['item_condition'].'</td>
                <td class="quantity">'.$row['quantity'].'</td>
                <td class="cost">'.$row['cost'].'</td>
                <td class="type">'.$row['type'].'</td>
                <td class="description">'.$row['description'].'</td>
                <td class="total">
                <a  href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a>
                <a onclick="remove_entry(';echo ($count-1);echo')" href="#"><span class="glyphicon glyphicon-trash"></span></a>
                </td></tr>';
                 }}
                mysql_close($connection);
               }
              ?>
            </table>
          </div>
        </div>        
      </div>
    </div>
  </section>
</div>


<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/respond.min.js"></script>
<script src="js/application.js"></script>
<script src="js/bootstrap-tooltip.js"></script>
<script defer src="js/jquery.fancybox.js"></script>
<script defer src="js/jquery.flexslider.js"></script>
<script type="text/javascript" src="js/jquery.tweet.js"></script>
<script  src="js/cloud-zoom.1.0.2.js"></script>
<script  type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript"  src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript"  src="js/jquery.mousewheel.min.js"></script>
<script type="text/javascript"  src="js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript"  src="js/jquery.ba-throttle-debounce.min.js"></script>
<script defer src="js/custom.js"></script>
<script type="text/javascript">

function remove_entry(id)
 {
  var r=confirm("Are you sure you want to remove this item from your Watchlist ?");
  if(r==true){  
  var temp=item_ids[id];
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","remove_item_watchlist.php?id="+temp,true);
  xmlhttp.send();
  document.getElementById("mytable").deleteRow(id+1);  
  }
}
</script>
</body>
</html>