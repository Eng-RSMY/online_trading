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




<?php  
            require_once "class.MySQL.php";           
            $test = new MySQL(); 
            $type = "auction";
           // session_start();
            $usrnm=$_SESSION["user_nm"];
            if(isset($_POST["base_price_1"]) && isset($_POST['close_date']) && isset($_POST['type_1']) && isset($_POST['condition_1']) && isset($_POST['name_1']) && isset($_POST['description_1']) && isset($_POST['mrp_1']) && isset($_POST['model_1']) && isset($_POST['brand_1']) && isset($_POST['quantity_1']))
            {
     
           
           //echo "mittal1";
                $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {     
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                echo $count->records;
                    
                                $pic_loc= $x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                $sale_type="auction";
                        // remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "Electronics";
                       // $type = "auction";
                        $type_1 = $_POST['type_1'];
                        $name = $_POST['name_1'];
                        $brand = $_POST['brand_1'];
                        $model = $_POST['model_1'];
                        $mrp=$_POST['mrp_1'];
                        $quantity=$_POST['quantity_1'];
                        $condition = $_POST['condition_1'];
                        $description = $_POST['description_1'];
                        $base_price = $_POST['base_price_1'];
                        $close_date = $_POST['close_date'];
                        $start_date = $_POST['start_date'];
                        $category=$category1.":".$type_1;

                        $x="description: ".$description." ;"."category: ".$category." ;"."type: ".$type." ;"."brand: ".$brand." ;"."name: ".$name." ;"."mrp: ".$mrp." ;"."base_price: ".$base_price." ;"."start_date: ".$start_date." ;"."close_date: ".$close_date." ;"."model: ".$model;
            $vars = array('user_nm'=>$usrnm,'quantity'=>$quantity,'pic_loc'=>$_FILES["file"]["name"],'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$x,'type'=>$type,'category'=>$category,'last_date'=>$_POST['close_date'],'start_date'=>$start_date,'model'=>$model,'sale_type'=>$sale_type,'base_price'=>$base_price);
            $test->Insert($vars,"items");
            
            // echo $test->lastQuery;
                       echo "Thank u";
                        

                                }
                            }
                }
                    else
                    {
                    echo "Invalid file0";
                    }

            }

                       else if(isset($_POST["type_2"]) && isset($_POST['name_2']) && isset($_POST['author_2']) && isset($_POST['condition_2']) && isset($_POST['mrp_2']) && isset($_POST['description_2']) && isset($_POST['base_price_2'])  && isset($_POST['close_date']))
                       {
                        // echo "mittal1";
                        //session_start();
                         $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                            $sale_type="auction";
                        //$_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "Books";
                        $name = $_POST['name_2'];
                        $author = $_POST['author_2'];
                        $mrp=$_POST['mrp_2'];
                        $genre=$_POST['type_2'];
                        $type_1=$_POST['type_2'];
                        $quantity=$_POST['quantity_2'];
                        $condition = $_POST['condition_2'];
                        $description = $_POST['description_2'];
                        $base_price = $_POST['base_price_2'];
                        $close_date = $_POST['close_date'];
                        $start_date = $_POST['start_date'];
                        $category=$category1.":".$type_1;
                         $x="description: ".$description." ;"."category: ".$category." ;"."type: ".$type." ;"."author: ".$author." ;"."name: ".$name." ;"."mrp: ".$mrp." ;"."base_price: ".$base_price." ;"."start_date: ".$start_date." ;"."close_date: ".$close_date;
                        $vars = array('user_nm'=>$usrnm,'quantity'=>$quantity,'type'=>$type,'author_nm'=>$author,'pic_loc'=>$_FILES["file"]["name"],'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$x,'genre'=>$genre,'category'=>$category,'start_date'=>$start_date,'last_date'=>$close_date,'sale_type'=>$sale_type,'base_price'=>$base_price);
                        $test->Insert($vars,"items");
                        echo "wow";
                        
                                }
                            }
                         }
                    else
                    {
                    echo "Invalid file90";
                    }
                       }



                       else if(isset($_POST["type_4"]) && isset($_POST['name_4']) && isset($_POST['brand_4']) && isset($_POST['condition_4']) && isset($_POST['mrp_4']) && isset($_POST['description_4']) && isset($_POST['base_price_4'])  && isset($_POST['close_date']) && isset($_POST['model_4']) && isset($_POST['start_date']))
                       {
                        // echo "mittal1";
                        echo "appliances";
                        //session_start();
                             $allowedExts = array("gif", "jpeg", "jpg", "png","PNG");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/PNG")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                             $sale_type="auction";
                      //  $_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "Appliances";
                        $type_1 = $_POST['type_4'];
                        $name = $_POST['name_4'];
                        $brand = $_POST['brand_4'];
                        $mrp=$_POST['mrp_4'];
                        $model=$_POST['model_4'];
                        $quantity=$_POST['quantity_4'];
                        $condition = $_POST['condition_4'];
                        $description = $_POST['description_4'];
                        $base_price = $_POST['base_price_4'];
                        $close_date = $_POST['close_date'];
                        $start_date = $_POST['start_date'];
                        $category=$category1.":".$type_1;
                        $cookers=$_POST['Cookers'].",";
                        $irons = $_POST['Irons'].",";
                        $Coffee_Makers = $_POST['Coffee Makers'].",";
                        $others = $_POST['Others'].",";
                        echo "hello";
                        echo $cookers;
                        echo "<br>";
                        echo $irons;
                        if(!$others){
                            echo "defined";
                        }
                        /*if(!$cookers){
                            $tag1 = "cookers,";
                        }
                        else{
                            $tag1="";
                        }
                        echo $tag1;*/
                       // $tag=$cookers.$irons.$Coffee_Makers.$others;//   'tags'=>$tag,'
                       // echo $tags;
                         $x="description: ".$description." ;"."category: ".$category." ;"."type: ".$type." ;"."brand: ".$brand." ;"."name: ".$name." ;"."mrp: ".$mrp." ;"."base_price: ".$base_price." ;"."start_date: ".$start_date." ;"."close_date: ".$close_date." ;"."model: ".$model;
                        
                        $vars = array('user_nm'=>$usrnm,'quantity'=>$quantity,'brand'=>$brand,'pic_loc'=>$_FILES["file"]["name"],'model'=>$model,'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$x,'category'=>$category,'start_date'=>$start_date,'last_date'=>$close_date,'type'=>$type,'sale_type'=>$sale_type,'base_price'=>$base_price);
                        $test->Insert($vars,"items");
                        echo "wow";
                        
                                }
                            }
                         }
                    else
                    {
                    echo "Invalid file1";
                    }
                       }





                        else if(isset($_POST["type_3"]) && isset($_POST['name_3']) && isset($_POST['brand_3']) && isset($_POST['condition_3']) && isset($_POST['mrp_3']) && isset($_POST['description_3']) && isset($_POST['base_price_3'])  && isset($_POST['close_date']) && isset($_POST['model_3']) && isset($_POST['start_date']))
                        {
                            // echo "mittal1";
                         echo "stationary";
                        //session_start();
                          $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                                echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                                echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                                echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                                echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                           
                         $sale_type="auction";
                        //$_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "Stationary";
                        $type_1 = $_POST['type_3'];
                        $name = $_POST['name_3'];
                        $brand = $_POST['brand_3'];
                        $mrp=$_POST['mrp_3'];
                        $model=$_POST['model_3'];
                        $quantity=$_POST['quantity_3'];
                        $condition = $_POST['condition_3'];
                        $description = $_POST['description_3'];
                        $base_price = $_POST['base_price_3'];
                        $close_date = $_POST['close_date'];
                        $start_date = $_POST['start_date'];
                        $category=$category1.":".$type_1;
                         $x="description: ".$description." ;"."category: ".$category." ;"."type: ".$type." ;"."brand: ".$brand." ;"."name: ".$name." ;"."mrp: ".$mrp." ;"."base_price: ".$base_price." ;"."start_date: ".$start_date." ;"."close_date: ".$close_date." ;"."model: ".$model;
                        
                        $vars = array('user_nm'=>$usrnm,'quantity'=>$quantity,'brand'=>$brand,'pic_loc'=>$_FILES["file"]["name"],'model'=>$model,'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$x,'category'=>$category,'start_date'=>$start_date,'last_date'=>$close_date,'type'=>$type,'sale_type'=>$sale_type,'base_price'=>$base_price);
                        $test->Insert($vars,"items");
                                 }
                            }
                         }
                    else
                    {
                    echo "Invalid file2";
    
                       }
                    }



                    else if(isset($_POST['name_5']) && isset($_POST['brand_5']) && isset($_POST['condition_5']) && isset($_POST['mrp_5']) && isset($_POST['description_5']) && isset($_POST['base_price_5'])  && isset($_POST['close_date']) && isset($_POST['model_5']) && isset($_POST['start_date']))
                        {

                         echo "others";
                       // session_start();
                          $allowedExts = array("gif", "jpeg", "jpg", "png");
                    $temp = explode(".", $_FILES["file"]["name"]);
                    $extension = end($temp);    
                    if ((($_FILES["file"]["type"] == "image/gif")       
                    || ($_FILES["file"]["type"] == "image/jpeg")
                    || ($_FILES["file"]["type"] == "image/jpg")
                    || ($_FILES["file"]["type"] == "image/pjpeg")
                    || ($_FILES["file"]["type"] == "image/x-png")
                    || ($_FILES["file"]["type"] == "image/png"))
                    && in_array($extension, $allowedExts))  
                {
                        if ($_FILES["file"]["error"] > 0)
                            {
                                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                            }
                        else
                            {
                               // echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                               // echo "Type: " . $_FILES["file"]["type"] . "<br>";
                               // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                               // echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

                            if (file_exists("../upload/" . $_FILES["file"]["name"]))
                                {
                                    echo $_FILES["file"]["name"] . " already exists. ";
                                }
                            else
                                {
                                $count = new MySQL();
                                $x = $count->Select("items","","item_id DESC","1");
                                $pic_loc=$x[0]["item_id"]+1;
                                $_FILES["file"]["name"] =$pic_loc.".jpg";
                                move_uploaded_file($_FILES["file"]["tmp_name"],
                                "../upload/" . $_FILES["file"]["name"]);
                               // echo "Stored in: " . "../upload/" . $_FILES["file"]["name"];
                
                            // echo $test->lastQuery;
                         //  $type_1= $_POST['type_5'];
                         $sale_type="auction";
                       // $_SESSION["user_nm"]="shubahm";// remove and for getting username use $_SERVER["user_nm"]
                        $category1 = "Others";
                        
                        $name = $_POST['name_5'];
                        $brand = $_POST['brand_5'];
                        $mrp=$_POST['mrp_5'];
                        $model=$_POST['model_5'];
                        $quantity=$_POST['quantity_5'];
                        $condition = $_POST['condition_5'];
                        $description = $_POST['description_5'];
                        $base_price = $_POST['base_price_5'];
                        $close_date = $_POST['close_date'];
                        $start_date = $_POST['start_date'];
                        $category=$category1;
                        $x="description: ".$description." ;"."category: ".$category." ;"."type: ".$type." ;"."brand: ".$brand." ;"."name: ".$name." ;"."mrp: ".$mrp." ;"."base_price: ".$base_price." ;"."start_date: ".$start_date." ;"."close_date: ".$close_date." ;"."model: ".$model;
                        $vars = array('user_nm'=>$usrnm,'type'=>$type,'quantity'=>$quantity,'brand'=>$brand,'pic_loc'=>$_FILES["file"]["name"],'model'=>$model,'item_nm'=>$name,'cost'=>$mrp,'item_condition'=>$condition,'description'=>$x,'category'=>$category,'start_date'=>$start_date,'last_date'=>$_POST['close_date'],'sale_type'=>$sale_type,'base_price'=>$base_price);
                        $test->Insert($vars,"items");
                                }
                            }
                         }
                    else
                    {
                   // echo "Invalid file3";
    
                       }
                    }
                    include_once "insert_search_index.php";
 header("Location: myitems.php");

		               ?>
                       </div>
                       </body>
                       </html>
