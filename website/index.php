<?php 

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CREATE MEGA</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<style type="text/css">
.wrapper {
    text-align: center;
	font-family:arial, helvetica, sans-serif;
}
.button_example{
	border:0px solid #a30007; -webkit-border-radius: 50px; -moz-border-radius: 50px;border-radius: 50px;font-size:16px;font-family:arial, helvetica, sans-serif; padding: 42px 42px 42px 42px; text-decoration:none; display:inline-block;text-shadow: -1px -1px 0 rgba(0,0,0,0.3);font-weight:bold; color: #FFFFFF;
	background-color: #DB0009; background-image: -webkit-gradient(linear, left top, left bottom, from(#DB0009), to(#FF2229));
	background-image: -webkit-linear-gradient(top, #DB0009, #FF2229);
	background-image: -moz-linear-gradient(top, #DB0009, #FF2229);
	background-image: -ms-linear-gradient(top, #DB0009, #FF2229);
	background-image: -o-linear-gradient(top, #DB0009, #FF2229);
	background-image: linear-gradient(to bottom, #DB0009, #FF2229);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#DB0009, endColorstr=#FF2229);
}

.button_example:hover{
 border:0px solid #750005;
 background-color: #a80007; background-image: -webkit-gradient(linear, left top, left bottom, from(#a80007), to(#ee0008));
 background-image: -webkit-linear-gradient(top, #a80007, #ee0008);
 background-image: -moz-linear-gradient(top, #a80007, #ee0008);
 background-image: -ms-linear-gradient(top, #a80007, #ee0008);
 background-image: -o-linear-gradient(top, #a80007, #ee0008);
 background-image: linear-gradient(to bottom, #a80007, #ee0008);filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#a80007, endColorstr=#ee0008);
}
</style> 
<script>
//select stuff
jQuery.fn.selectText = function(){
    
    this.find('input').each(function() {
        if($(this).prev().length == 0 || !$(this).prev().hasClass('p_copy')) { 
            $('<p class="p_copy" style="position: absolute; z-index: -1;"></p>').insertBefore($(this));
        }
        $(this).prev().html($(this).val());
    });
    
    var doc = document;
    var element = this[0];
    console.log(this, element);
    if (doc.body.createTextRange) {
        var range = document.body.createTextRange();
        range.moveToElementText(element);
        range.select();
    } else if (window.getSelection) {
        var selection = window.getSelection();        
        var range = document.createRange();
        range.selectNodeContents(element);
        selection.removeAllRanges();
        selection.addRange(range);
    }
};

function setMiddle(){
	var width = ($(window).width()/2) - ($(".button_example").outerWidth() / 2);
	var top = ($(window).height() / 2) - ($(".button_example").outerHeight() / 2);
	console.log(width+" x "+top);
	
    $("#middle").css("left", width);
    $("#middle").css("top", top);
}
$(document).ready(function() {
	$("#content").hide();
	$("#gif").hide();
	setMiddle();
	
	$(".button_example").click(function() {
		$("#gif").show();
		$("#content").hide();
		$.get( "submit.php", function( data ) {
			if(data != "0"){
				var arr = data.split(':');
				$("#user").html(arr[0]);
				$("#pass").html(arr[1]);
			}else{
				$("#content").html("ERROR#"+data+". Please contact <a href='mailto:max@maxis.me'>max@maxis.me</a>");
			}
			$("#content").show();
			$("#gif").hide();
		});
    });
	
	$("#user").click(function(e) {
        $(this).selectText();
    });
	
	$("#pass").click(function(e) {
        $(this).selectText();
    });
});
</script>
</head>
<body>
<!--- fork on github banner -->
<a href="https://github.com/maxisme"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://camo.githubusercontent.com/365986a132ccd6a44c23a9169022c0b5c890c387/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f7265645f6161303030302e706e67" alt="Fork me on GitHub" data-canonical-src="https://s3.amazonaws.com/github/ribbons/forkme_right_red_aa0000.png"></a>

<div align="center" class="wrapper">
	<div style="position: absolute;" id="middle">
        <a class="button_example" href="#">GENERATE MEGA ACCOUNT</a>
        <div id="gif"><img src='https://maxis.me/gif.svg'/></div>
        <div id="content">
        	<br>
        	USERNAME: <strong><span id="user"></span></strong><BR>
            PASSWORD: <strong><span id="pass"></span></strong>
        </div>
        <br><br>
        <div>
        	<a target="_blank" href="https://mega.nz"><img src="https://lh4.ggpht.com/b3xcDImNhXLh4ui_3ass5KoXE5-FeCmGQMA_w7dG1wQrZz3YLNFc1qeQI3GhvK8MXHI=w300" height="20px"/></a>
        </div>
    </div>
</div>
</body>
</html>