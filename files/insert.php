<?php

$q=$_POST['q'];
$c=$_POST['c'];
$d=$_POST['d'];
$id=$_POST['x'];
$n=$_POST['n'];

 include_once './class.MySQL.php';

		         

		     // connecting to the database.
	       $connect=mysql_connect(constant("DB_HOST"),constant("USERNAME"),constant("PASS"))
	           or die('Could not connect to the database: '.mysql_error());

           $db='online_trading';
           mysql_select_db($db) or die('Could not select the database ('.$db.') ');


           $query="INSERT INTO `vendor's database`  (`id`,`name`,`Threshold`,`cost`,`discount`) VALUES ($id,'$n',$q,$c,$d)";
           
           if(mysql_query($query))
           {
           		echo '1';
           }
          

?>
