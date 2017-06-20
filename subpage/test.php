<?php
	@session_start(); 
	require_once('baza.php');	
?>
<html>
<body>


TEST </br></br>

<a href="wyl.php">wyloguj</a>
<a href="index.php">login</a>
<a href="test.php">test</a>
<br/>


<?php
	echo $_SESSION['Typ'];

?>
<body>
</html>