
<script>
//	window.onload=rejestracja;
function validate_pass(p,r) {
  if (document.getElementById(p).value!=document.getElementById(r).value)
	document.getElementById("ipass").innerHTML = "Hasła nie są identyczne";
  else
  	document.getElementById("ipass").innerHTML = "";
}
</script>

<form method="post" action="" id="r_rejestracja" >
	<div id="r_label">
		<label for="login" class="r_forma2">Login:</label>
		<label for="pass" class="r_forma2">Hasło:</label>
		<label for="repPass" class="r_forma2">Powtórz hasło:</label>
		<label for="email" class="r_forma2">E-mail:</label>

	</div>
	<div id="r_input">
		<input type="text" name="login"  id="login" class="r_forma" required>
		<input type="password" name="pass" id="pass" class="r_forma" required required>
		<input type="password" name="repPass" id="repPass" class="r_forma" style="display: inline ;"  required onchange="validate_pass('pass','repPass')">
		<span id="ipass" class="error"></span>
		<input type="email" name="email" id="email" class="r_forma" required>
	</div>
	<div style="clear: both;"></div>
	<input type="submit" value="Prześlij" name="rejestracja"/>
</form>

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
	$kod=losowy_ciag(4);
	
	$temp=true;
	
	$zapytanie ='SELECT * from user where login = "' .$login. '"' ;
	$wykonaj=mysql_query($zapytanie);  
    $wiersz = mysql_fetch_object($wykonaj);
	if($wiersz){
		$temp=false;
		header('Location: index.php?id=subpage/loginistnieje');
	}

	$zapytanie ='SELECT * from user where email = "' .$email. '"' ;
	$wykonaj=mysql_query($zapytanie);  
	$wiersz = mysql_fetch_object($wykonaj);
	if($wiersz){
		$temp=false;
		header('Location: index.php?id=subpage/emailistnieje');
	}

	if($temp){
		$zapytanie ="INSERT INTO `user` (`ID`, `LOGIN`, `PASSWORD`,`EMAIL`,`KOD`, `TYPE`) VALUES (NULL, '".$login."', '".md5($haslo)."','".$email."','".$kod."', 'User');" ;
		$ins = @mysql_query($zapytanie);
		if($ins){
			$tytul = "Potwierdzenie meila licytacja";
			$wiadomosc = "Kod: ".$kod;
				// użycie funkcji mail
			mail($email, $tytul, $wiadomosc);
			echo "<script>alert('Konto zostało poprawnie zarejestrowane')</script>";
			//header('Location: subpage/index.php');

		}
		else{
			echo "<script>alert('Błąd nie udało się dodać nowego konta skontaktuj się z Administratorem')</script>";
		}
	}
}
?>