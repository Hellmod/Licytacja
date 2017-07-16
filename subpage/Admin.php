<?php
	if ($_SESSION['Typ']!='Admin')
	header('Location: index.php?id=subpage/start');
?>
Witaj adminie ;)