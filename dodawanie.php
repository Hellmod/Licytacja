<?php
	session_start(); 
	require_once('subpage/baza.php');
?>
<html>
<head>
<meta charset="UTF-8">
</head>		
<body>
<?php

if(@$_POST["nowa_cena_licytacja"])	{
	$cena=$_POST[moja_cena];
	$ins = @mysql_query("UPDATE licytacje SET Cena='1',Wygrywajacy='".$cena."' WHERE Nazwa='Krotkofalowka' ");
		if($ins){
			header('Location: index.php');
		}
		else{
			echo "Błąd nie udało się dodać nowego rekordu <br/>";
			echo "UPDATE licytacje SET Cena='1',Wygrywajacy='1' WHERE Nazwa='Krotkofalowka' ";
		}
}
else echo "nie powinno cię tu być"	 

?>


<body>
</html>