<?php
    @session_start();
    if(isset($_SESSION['Login']))
	{
		if ($_SESSION['Typ']=='Admin')
			header('Location: index.php?id=Admin');
		else if ($_SESSION['Typ']=='User')
			header('Location: index.php?id=User');
	} 
	else{
?>
Zaloguj się
<?php 
	}
?>

