<?php if ($_SESSION['Typ']!=="User")        header('Location: index.php?id=subpage/start');	?>

<script>
function validate_pass(p,r) {
  if (document.getElementById(p).value!=document.getElementById(r).value)
	document.getElementById("ipass").innerHTML = "Hasła nie są identyczne";
  else
  	document.getElementById("ipass").innerHTML = "";
}
</script>

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


	$zapytanie ='SELECT Kod, email from User WHERE ID = "' .$_SESSION['ID']. '"' ;
	$wykonaj=mysql_query($zapytanie);  
    $wiersz = mysql_fetch_object($wykonaj);
	$kod=$wiersz->Kod;
	$email=$wiersz->email;
	if($kod!=""){
//----------------------------------
?>
<form method="post" action="" id="r_rejestracja" >
	<div id="r_label">
		<label for="pass" class="r_forma2">Kod z emaila:</label>
	</div>
	<div id="r_input">
		<input type="text" name="kod" id="pass" class="r_forma">	
	</div>
	<div style="clear: both;"></div>
	<input type="submit" value="OK" name="EmailConf"/></br>
	<input type="submit" value="Wyślij jeszcze raz kod potwierdzający email " name="EmailSend"/>	

</form>


<?php
//-----------------------------------
	}
?>

<form method="post" action="" id="r_rejestracja" >
	<div id="r_label">
		<label for="pass" class="r_forma2">Nowe hasło:</label>
		<label for="repPass" class="r_forma2">Powtórz hasło:</label>

	</div>
	<div id="r_input">
		<input type="password" name="pass" id="pass" class="r_forma" required onchange="validate_pass('pass','repPass')" required>
		<input type="password" name="repPass" id="repPass" class="r_forma" style="display: inline ;"  required onchange="validate_pass('pass','repPass')">
		<span id="ipass" class="error"></span>
	</div>
	<div style="clear: both;"></div>
	<input type="submit" value="OK" name="PassChange"/>
</form>

<form method="post" action="" id="r_rejestracja" >
	<div id="r_label">
		<label for="email" class="r_forma2">Nowy email:</label>
	</div>
	<div id="r_input">
		<input type="email" name="email" id="email" class="r_forma" required>		
	</div>
	<div style="clear: both;"></div>
	<input type="submit" value="OK" name="EmailChange"/>
</form>

<?php
	if(isset($_POST['PassChange'])){
        $haslo=$_POST['pass'];
       	$zapytanie ="UPDATE `user` SET `PASSWORD` = '".md5($haslo)."' WHERE `user`.`ID` = ".$_SESSION['ID'].";";
	    $ins = @mysql_query($zapytanie);
		if($ins){
			echo "<script>alert('Chasło zminione')</script>";
		}
		else{
			echo "<script>alert('Błąd podczas zminiony chasła skontaktuj się z administratorem')</script>";
		} 
	}
	else if(isset($_POST['EmailChange'])){
		$email=$_POST['email'];
		$zapytanie ='SELECT * from user where email = "' .$email. '"' ;
		$wykonaj=mysql_query($zapytanie);  
		$wiersz = mysql_fetch_object($wykonaj);
		if($wiersz)
			header('Location: index.php?id=subpage/emailistnieje');


		
       	$zapytanie ="UPDATE `user` SET `EMAIL` = '".$email."',`KOD`='".losowy_ciag(4)."' WHERE `user`.`ID` = ".$_SESSION['ID'].";";
	    $ins = @mysql_query($zapytanie);
		if($ins){
			echo "<script>alert('Email zmieniony')</script>";
		}
		else{
			echo "<script>alert('Błąd podczas zmiany email skontaktuj się z administratorem')</script>";
		} 
	}
	else if(isset($_POST['EmailConf'])){
		if($kod==$_POST['kod']){
			$zapytanie ="UPDATE `user` SET `kod` = '' WHERE `user`.`ID` = ".$_SESSION['ID'].";";
			$ins = @mysql_query($zapytanie);
			if($ins){
				echo "<script>alert('Email potwierdzony')</script>";
			}
			else{
				echo "<script>alert('Błąd podczas potwierdzania email'a skontaktuj się z administratorem')</script>";
			} 
		}
		else{
			echo "<script>alert('Kod nie poprawny spróbuj jeszcze raz')</script>";
		} 
	}
	else if(isset($_POST['EmailSend'])){
		$tytul = "Potwierdzenie meila licytacja";
		$wiadomosc = "Kod: ".$kod;
		mail($email, $tytul, $wiadomosc);
		echo "<script>alert('kod potwierdzający meil'a został ponownie wysłany')</script>";
	}

	
	

?>
