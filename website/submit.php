<?php
$dom = "https://createmega.xyz/";
if(substr($_SERVER['HTTP_REFERER'],0,strlen($dom)) != $dom){
	 die("1");
}
$shell = shell_exec("/home/max/createForPHP");
if (strpos($shell, 'Account registered successfully!') !== false) {
	$arr = explode('----->', $shell);
	echo $arr[1];
}else{
	//echo $shell;
	die("2");
}
?>