<?php
function losowy_ciag($dlugosc){
    $znaki= "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $losowy_ciag="";
        for ($i=0; $i < $dlugosc; $i++)
        {
            $losowy_ciag .= substr($znaki, rand(0, strlen($znaki)-1), 1);
        }
    return $losowy_ciag;
}
	
require_once('subpage/baza.php');


if(@$_POST["rejestracja"])	{
	$login=$_POST['login'];
    $haslo=$_POST['pass'];
    $email=$_POST['email'];
	
	
	$zapytanie ='SELECT * from user where login = "' .$login. '"' ;
	$wykonaj=mysql_query($zapytanie);  
    $wiersz = mysql_fetch_object($wykonaj);
	if($wiersz)
		header('Location: index.php?id=subpage/loginistnieje');
	else{
		$zapytanie ="INSERT INTO `user` (`ID`, `LOGIN`, `PASSWORD`,`EMAIL`,`KOD`, `TYPE`) VALUES (NULL, '".$login."', '".md5($haslo)."','".$email."','".losowy_ciag(4)."', 'User');" ;
		$ins = @mysql_query($zapytanie);
		if($ins){
			echo "<script>alert('Konto zostało poprawnie zarejestrowane')</script>";
		}
		else{
			echo "<script>alert('Błąd nie udało się dodać nowego konta skontaktuj się z Administratorem')</script>";
		}
	}
}
?>