<?php
require_once "class.MySQL.php";
$suggestions=array();
$temp=array();
$omysql=new MySQL();
if(isset($_GET["search_text"])&&!empty($_GET["search_text"])){
	$search_text=$_GET["search_text"];
	session_start();
	$_SESSION["user_nm"]="shubham";
	if(isset($_SESSION["user_nm"])){
		//personal history
		$where=array("user_nm LIKE" =>$_SESSION['user_nm']," AND search_text LIKE "=>$search_text."%");// the % is to let any number of char appear after $serch_text
		$result=$omysql->Select("search_history",$where,"num_reps DESC, timestamp DESC");
			for($i=0;$i<$omysql->records;$i++){
		 		$temp["search_text"]=$result[$i]["search_text"];
		 		$temp["personal"]=true;
		 		$suggestions[]=$temp;
			}
		//other's history
		$where=array("user_nm NOT LIKE" =>$_SESSION['user_nm'],"AND search_text LIKE "=>$search_text."%");// the % is to let any number of char appear after $serch_text
		$result=$omysql->Select("search_history",$where,"num_reps DESC, timestamp DESC");
			for($i=0;$i<$omysql->records;$i++){
		 		$temp["search_text"]=$result[$i]["search_text"];
		 		$temp["personal"]=false;
		 		$suggestions[]=$temp;
			}
	}else{
		$where=array("search_text LIKE"=> $search_text."%");// the % is to let any number of char appear after $serch_text
		$result=$omysql->Select("search_history",$where,"num_reps DESC, timestamp DESC");
			for($i=0;$i<$omysql->records;$i++){
		 		$temp["search_text"]=$result[$i]["search_text"];
		 		$temp["personal"]=false;
		 		$suggestions[]=$temp;
			}
	}
	echo json_encode($suggestions);
}

?>