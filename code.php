<?php
session_start();
$code=rand(1000,9999);
$_SESSION["code"]=$code;
?>