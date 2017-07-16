<?php
	session_start(); 
	require_once('subpage/baza.php');

if(@$_POST["nowa_cena_licytacja"])	{
	$cena=@$_POST[moja_cena];
	$id=$_SESSION['ID'];
	$name=@$_POST[nazwa];
	$data= date("Y-m-d H:i:s", mktime (date('H'),date('i'),date('s'),date('m'),date('d')+1,date('Y')));


	$zapytanie ='SELECT Cena from licytacje WHERE Nazwa = "' .$name. '"' ;
	$wykonaj=mysql_query($zapytanie);  
    $wiersz = mysql_fetch_object($wykonaj);
	if($wiersz->Cena>$cena){
		echo "<script>alert('Ktoś zalicytował za więkrzą cenę')</script>";
	}
	else{


		$zapytanie ="UPDATE licytacje SET Cena='".$cena."',Wygrywajacy='".$id."', Do_kiedy='".$data."' WHERE Nazwa='".$name."' ";
		$ins = @mysql_query($zapytanie);
		if($ins){
			$sciezka='Location: index.php?id=auction/'.$name.'';
			header($sciezka);
		}
		else{
			echo "Błąd nie udało się dodać nowego rekordu <br/>";
			echo $zapytanie;
		}
	}
}
else echo "nie powinno cię tu być"	 

?>

<a href="index.php?id=auction/<?php echo $name ?>">Powrót</a>