<?php
	session_start(); 
	require_once('subpage/baza.php');	
?>
<script>
	window.onload=zmien_kolor2;
	function zmien_kolor(){
		var kolor = document.forms['id_kolor'].kolor.value;
		document.cookie = kolor;
		document.body.style.background = document.cookie.substring(0, 7);
	}
	function zmien_kolor2(){
		document.body.style.background = document.cookie.substring(0, 7);
	}
</script>
<html>
<head>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Rafał Miśkiewicz" />
	<title>Licytacja</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div id="container">

<div id="topcontent">

<h1>Licytacje</h1>

</div>
<?php
	if(isset($_POST['wyslij'])){
		$l=@$_POST["Login"];
		$p=md5(@$_POST["Haslo"]);
		$q="SELECT * from user where LOGIN='".$l."' and PASSWORD='".$p."'";
		$w=mysql_query($q);
		$wiersz=@mysql_fetch_array($w);		
		if(is_null($wiersz['LOGIN'])){
			echo "<script>alert('Zły login lub chasło')</script>";
			goto a;
		}
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
		else{
			header('Location: index.php?id=subpage/start');		
		}
	}
	else if(isset($_POST['Zarejestruj'])){
		header('Location: index.php?id=subpage/rejestracja');
	}
	else if(isset($_POST['rejestracja'])){
		
	}
	else{
	a:
?>

<div id="logowanie">

		<?php
			if(isset($_SESSION['ID']))	require('subpage/wylogowywanie.php');
			else 							require('subpage/log.php');		
		?>
</div>
<?php	}	?>
<div style="clear:both;"></div>

<div id="topbar">
	<div id="menu"><a href="index.php?id=subpage/start">Home</a></div>
	<div id="menu"><a href="index.php?id=subpage/test">tset</a></div>
	<?php if(isset($_SESSION['ID'])) echo'<div id="menu"><a href="index.php?id=subpage/konto">konto</a></div>'?>  
	<div id="menu"><a href="index.php?id=subpage/User">licytacje</a></div>
	<?php if(@$_SESSION['Typ']=="Admin") echo'<div id="menu"><a href="index.php?id=subpage/Admin">Admin</a></div>'?>  
</div>

	<div id="content">
		<?php
			@$i=$_GET['id'];
			if(!isset($i))	require('subpage/start.php');
			else 			require($i.'.php');
			
		?>
	</div>
</div>

<form id="id_kolor" method="post" action="" style="	position: absolute;	left: 0;top: 0;">
	<input type="color" name="kolor" value="#ffffff" onchange="zmien_kolor()"/>
</form>


</body>
</html>
