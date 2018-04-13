<?php

header('Access-Control-Allow-Origin: *');

$code = file_get_contents("code.txt",true);	

$values = json_decode(file_get_contents("msg.json"), true);	

if( !empty( $_POST ) ){
	
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$code==$_POST["captcha"]) {
		echo "Correct Code Entered";
		//Do you stuff
		$postarray = array(
		  "name"    =>     $_POST['name'],
		  "comment" =>     $_POST['comment'],
		  "timer"    =>     $_POST['timer']
		  
		);
		array_push($values,$postarray);
		file_put_contents("msg.json", json_encode($values));
	}else{
		echo "Session variable: ".json_encode($_SESSION["code"]);
		//die("Wrong Code Entered");
		
	}
}

$values = json_decode(file_get_contents("msg.json"), true);	    
//echo json_encode($values);
      
?>