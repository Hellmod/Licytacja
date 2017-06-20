<?php
    @session_start();
    if(isset($_SESSION['Login']))
	{
		if ($_SESSION['Typ']=='Admin')
			header('Location: index.php?id=subpage/Admin');
		else if ($_SESSION['Typ']=='User')
			header('Location: index.php?id=subpage/User');
	} 
	else{
?>
Zaloguj się
<?php 
	}
?>

