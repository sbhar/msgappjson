<?php

header('Access-Control-Allow-Origin: *');

$code = file_get_contents("code.txt",true);	

if (!file_exists('uploads')) {
	mkdir('uploads', 0700, true);
}
if( !empty( $_POST ) ){
	
	if(isset($_POST["captcha"])&&$_POST["captcha"]!=""&&$code==$_POST["captcha"]) {
		echo "Correct Code Entered";
		$str = htmlentities($_POST['request'], ENT_QUOTES, "UTF-8");
		//echo base64_decode($str);

		$filename_path ='output.jpg';

		$decoded=base64_decode($str); 

		file_put_contents("uploads/".$filename_path,$decoded);
	}
}

?>