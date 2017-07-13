<?php if ($_SESSION['Typ']!=="User")        header('Location: index.php?id=subpage/start');	?>

<script>
function validate_pass(p,r) {
  if (document.getElementById(p).value!=document.getElementById(r).value)
	document.getElementById("ipass").innerHTML = "Hasła nie są identyczne";
  else
  	document.getElementById("ipass").innerHTML = "";
}
</script>

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
		<label for="pass" class="r_forma2">Noew email:</label>
	</div>
	<div id="r_input">
		<input type="email" name="email" id="pass" class="r_forma" required onchange="validate_pass('pass','repPass')" required>		
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
       	$zapytanie ="UPDATE `user` SET `EMAIL` = '".$email."' WHERE `user`.`ID` = ".$_SESSION['ID'].";";
	    $ins = @mysql_query($zapytanie);
		if($ins){
			echo "<script>alert('Email zmieniony')</script>";
		}
		else{
			echo "<script>alert('Błąd podczas zmiany email skontaktuj się z administratorem')</script>";
		} 
	}

?>
