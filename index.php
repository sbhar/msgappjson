<?php
header('Access-Control-Allow-Origin: *'); 
function json_response($code = 200, $message = null){
	
	$values = array(
  "name"    =>     $_POST['name'],
  "comment" =>     $_POST['comment'],
  "time"    =>     $_POST['time']
  
);



$json_obj = json_encode($values);
    
		return json_encode($values);
      
		
}

	echo json_response(200, 'working');



?>