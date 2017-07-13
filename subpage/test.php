<?php
	@session_start(); 
	require_once('baza.php');	
?>
<html>
	<head>
	<meta charset="utf-8" />
	<title>Odliczanie czasu</title>
	
	<script type="text/javascript" src="subpage/wakacje.js"></script>
	
</head>
<body>

TEST </br></br>

<hr/>
<div id="test8"></div>
<?php

function losowy_ciag_2($dlugosc){
    $znaki= "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $losowy_ciag="";
        for ($i=0; $i < $dlugosc; $i++)
        {
            $losowy_ciag .= substr($znaki, rand(0, strlen($znaki)-1), 1);
        }
    return $losowy_ciag;
}

echo losowy_ciag_2(4);
?>

<!--
 <img src="graphics/librac.jpg" onload='test()'>
 <span id="idElement">test</span>
->
<body>
</html>