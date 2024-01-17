<?php
//fetch.php
include("../../config/database.php");
global $hidDistId;
global $hidDistName;
global $query;
global $query2;
global $disIdNew ;

//var_dump($_POST);

if(isset($_POST["action"]) && isset($_POST["type"]))
{
/*  if(isset($_POST['dist'])){
	  $query2 = "SELECT id,district_name FROM post_districs WHERE id = '".$_POST["dist"]."' GROUP BY district_name";
	  $result2 = mysqli_query($conn, $query2);	 
	  $row2 = mysqli_fetch_array($result2);

	$hidDistId = $row2['id'];
	$hidDistName = $row2['district_name'];	
  }else{
	$hidDistId = '';
	$hidDistName = '';		  
  }*/	
 $output = '';
 if($_POST["action"] == "province")
 {
	 
	 
  $query = "SELECT id,district_name FROM post_districs WHERE province_id = '".$_POST["query"]."' GROUP BY district_name";
  $result = mysqli_query($conn, $query);
  

 /* if(isset($hidDistId) && $hidDistId != ''){
	  $output .= '<option value="'.$hidDistId.'">'.$hidDistName.'</option>';
  }else{
	  $output .= '<option value="">Select Distric</option>';
  }*/
  
  if(isset($_POST['disId']) && $_POST['type'] == 'withoutChange' && $_POST['disId'] != '' && $_POST['disName'] != ''){
	  
		$output .= '<option value="'.$_POST["disId"].'">'.$_POST["disName"].'</option>';	
		
	  while($row = mysqli_fetch_array($result))
	  {
		  if($_POST['disId'] == $row["id"]){
			  
		  }else{
			$output .= '<option value="'.$row["id"].'" class="notranslate">'.$row["district_name"].'</option>';	
			//$output .= '<option value="">All</option>';
		  }
		
	  }	  
	         $output .= '<option value="">All</option>';
  }else{
	   $output .= '<option value="">Select Distric</option>';  
	  while($row = mysqli_fetch_array($result))
	  {
		$output .= '<option value="'.$row["id"].'" class="notranslate">'.$row["district_name"].'</option>';
		
	  }	
	    $output .= '<option value="" class="notranslate">All</option>';
  }
 
 //var_dump($_POST);

 }
 if($_POST["action"] == "district" && isset($_POST['hiddentown']))
 {
	if(isset($_POST['hiddentown']) && $_POST['hiddentown'] != ''){
	  $query2 = "SELECT post_city_name FROM post_districs_city WHERE post_districs_id = '".$_POST['disId']."'";
	  $result2 = mysqli_query($conn, $query2);		
	  $output .= '<option value="'.$_POST['hiddentown'].'">'.$_POST['hiddentown'].'</option>';
	  while($row2 = mysqli_fetch_array($result2))
	  {
		  if($_POST['hiddentown'] == $row2["post_city_name"]){
			  
		  }else{
			  $output .= '<option value="'.$row2["post_city_name"].'" class="notranslate">'.$row2["post_city_name"].'</option>';
			  
		  }
	   
	  }		
	         $output .= '<option value="" class="notranslate">All</option>';
	}else{
	  if(isset($_POST['disId'])){
		$disIdNew = $_POST['disId']; 
	  }else{
		$disIdNew = $_POST['query'];  
	  }	
	   
	  $query2 = "SELECT post_city_name FROM post_districs_city WHERE post_districs_id = '".$disIdNew."'";
	  $result2 = mysqli_query($conn, $query2);		
	  $output .= '<option value="">Select Town</option>';
	  while($row2 = mysqli_fetch_array($result2))
	  {
		  $output .= '<option value="'.$row2["post_city_name"].'" class="notranslate">'.$row2["post_city_name"].'</option>';  
		  
	   
	  }	
	      $output .= '<option value="" class="notranslate">All</option>';  
	   // echo $query2;  
		
	}
	//var_dump($_POST);

 }
/*  if($_POST["action"] == "district")
 {
  $query = "SELECT post_city_name FROM post_districs_city WHERE post_districs_id = '".$_POST["query"]."'";
  $result = mysqli_query($conn, $query);
  $output .= '<option value="">Select Town</option>';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '<option value="'.$row["post_city_name"].'">'.$row["post_city_name"].'</option>';
  }
 }
*/
//echo $_POST['query'];
 echo $output;
 //var_dump($_POST);
}
?>