<?php
session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
$im = imagecreatetruecolor(50, 24);
$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);
header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');
imagepng($im);
imagedestroy($im);

header('Access-Control-Allow-Origin: *');
	
$values = json_decode(file_get_contents("msg.json"), true);	

if( !empty( $_POST ) ){
	
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$_SESSION["code"]==$_POST["captcha"]) {
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
		echo $_SESSION["code"];
		//die("Wrong Code Entered");
		
	}
}

$values = json_decode(file_get_contents("msg.json"), true);	    
//echo json_encode($values);
      
?>