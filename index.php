<?php
	session_start(); 
	require_once('subpage/baza.php');	
?>
<html>
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-2" />
	<meta http-equiv="reply-to" content="Adres_e-mail" />
	<meta name="generator" content="WebSite PRO 4.3" />
	<meta name="author" content="Autor_dokumentu" />
	<meta name="description" content="Opis" />
	<title>Licytacja</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body onload="zmien_kolor2()">
<div id="container">

<div id="topcontent">

<h1>Licytacje</h1>

</div>
<?php
	if(isset($_POST['wyslij']))
	{
	$l=@$_POST["Login"];
	$p=md5(@$_POST["Haslo"]);
		$q="SELECT * from user where LOGIN='".$l."' and PASSWORD='".$p."'";
		$w=mysql_query($q);
		$wiersz=@mysql_fetch_array($w);		
		if(is_null($wiersz['LOGIN'])) echo 'zły login lub chasło';
		else 
		{
			$_SESSION['Login']=$_POST['Login'];
			$_SESSION['Typ']=$wiersz['TYPE'];
			$_SESSION['ID']=$wiersz['ID']; 
			header('Location: subpage/index.php');
		}

		if ($_SESSION['Typ']=='Admin')
			header('Location: index.php?id=subpage/Admin');
		else if ($_SESSION['Typ']=='User')
			header('Location: index.php?id=subpage/User');
		else		
			header('Location: index.php?id=subpage/start');		
	}
	
	else
	{

?>

<div id="logowanie">

		<?php
			@$i=$_GET['id'];
			if(isset($_SESSION['Login']))	require('wylogowywanie.php');
			else 							require('log.php');		
		?>
</div>
<?php	}	?>
<div style="clear:both;"></div>

<div id="menu">
<a href="index.php?id=subpage/test">tset</a>
<a href="index.php?id=subpage/downolad">downolad</a>

<form id="id_kolor" method="post" action="">
	<input type="color" name="kolor" value="#ffffff" onchange="zmien_kolor()"/>
</form>
<script>
	function zmien_kolor(){
		var kolor = document.forms['id_kolor'].kolor.value;
		document.cookie = kolor;
		document.body.style.background = document.cookie.substring(0, 7);
	}
	function zmien_kolor2(){
		document.body.style.background = document.cookie.substring(0, 7);
	}
</script>
</div>
	<div id="content">
		<?php
			@$i=$_GET['id'];
			if(!isset($i))	require('subpage/start.php');
			else 			require($i.'.php');
			
		?>
	</div>
</div>
</body>
</html>
