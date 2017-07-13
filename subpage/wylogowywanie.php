<form method="post" action=""  >
	<input type="submit" value="Wyloguj" name="Wyloguj"/>
</form>
<?php
	echo'</br>Witaj  '.$_SESSION['Login'].'</br>';
	
if(@$_POST["Wyloguj"])	{
	session_start();
    session_destroy();
    $_session[]=array();   
    header('Location: index.php?id=subpage/start');
}

?>