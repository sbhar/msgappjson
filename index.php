<?php

header('Access-Control-Allow-Origin: *');

$code = file_get_contents("code.txt",true);	

$values = json_decode(file_get_contents("msg.txt"), true);	

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
		file_put_contents("msg.txt", json_encode($values));
		chmod("msg.txt",0600);
		
	}else{
		echo "Session variable: ".json_encode($_SESSION["code"]);
		//die("Wrong Code Entered");
		
	}
}

$values = json_decode(file_get_contents("msg.txt"), true);	    
echo json_encode($values);
      
?>