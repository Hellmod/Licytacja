<?php
	session_start(); 
	require_once('baza.php');
	
?>
<html>
<head>
<meta charset="UTF-8">
</head>		
<body>
<?php

if(@$_POST["wyslij"])
	{
	
	for($i=7;$i<=22;$i++)
	{	
		@${'a'.$i}=$_POST["a$i"];
	}

    // łączymy się z bazą danych
    $connection = @mysql_connect('localhost', 'root', '')		or die('Brak połączenia z serwerem MySQL');
    $db = @mysql_select_db('firma', $connection)					or die('Nie mogę połączyć się z bazą danych');
    
    // dodajemy rekord do bazy
	for($i=7;$i<=22;$i++)
	{	
		if(${'a'.$i}!='')	
		{
			$ins = @mysql_query("UPDATE miejsca SET a$i='".$_SESSION['ID']."' WHERE ID=' ".${'a'.$i}." ' ");
			
						//".$_SESSION['Typ']."
			echo("UPDATE miejsca SET a$i='".$_SESSION['ID']."' WHERE ID=' ".${'a'.$i}." ' ");
			echo ("</br>");
			

			if($ins) 
			{
				echo "Rekord został dodany poprawnie";
				header('Location: index.php');
			}
			else echo "Błąd nie udało się dodać nowego rekordu";
			echo ("</br></br>");
		}
		// ${'a'.$i}.' DZIAŁĄ </br>';
		//$ins = @mysql_query("UPDATE miejsca SET a7='x' WHERE ID=' ".${'a'.$i}." ';");
	}

    
    mysql_close($connection);
}
else echo "nie powinno cię tu być"	 

?>


<body>
</html>