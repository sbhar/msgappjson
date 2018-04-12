<?php
header('Access-Control-Allow-Origin: *'); 
	
$values = json_decode(file_get_contents("msg.json"), true);	

if( !empty( $_POST ) ){
	$postarray = array(
	  "name"    =>     $_POST['name'],
	  "comment" =>     $_POST['comment'],
	  "timer"    =>     $_POST['timer']
	  
	);
	array_push($values,$postarray);
	file_put_contents("msg.json", json_encode($values));
}

$values = json_decode(file_get_contents("msg.json"), true);	    
echo json_encode($values);
      
?>