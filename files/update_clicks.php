<?php
if(isset($_POST["item_id"])&&isset($_POST["search_term"])){
	$search_term=$_POST["search_term"];
	require_once "class.MySQL.php";
	$search_term_array=array_map('strtolower',preg_split('/[\s]+/', trim(preg_replace("/\b[^\s]{1,3}\b/","",$search_term))));
	$omysql_clicks_update=new MySQL();
	require_once "PorterStemmer2.php";
	require_once "StringBuilder.php";
	$oporter_stemmer=new PorterStemmer2();
	for($i=0;$i<count($search_term_array);$i++)
		$search_term_array[$i]=$oporter_stemmer->Stem($search_term_array[$i]);
	$search_term_array=array_unique($search_term_array);
	$where_click_update="where item_id = '".$_POST["item_id"]."' and (";
	foreach ($search_term_array as $value) {
		$where_click_update.="search_term like '".$omysql->escape_string($value)."' or "
	}

	$where_click_update=substr($where_click_update,0,-3);
	$where_click_update.=")";

	$omysql->ExecuteSQL("Select * from search_index ".$where_click_update);
	$result=$omysql->arrayedResult[];
	foreach ($result as $row) {
		$update_var=array("clicks"=>$row["clicks"]+1);
		$where_var=array("search_id ="=>$row["search_id"])
		$omysql->Update("search_index",$update_var,$where_var);
	}
	echo "success in click update";
}
?>