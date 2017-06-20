<?php
    require_once('baza.php');
    @session_start(); 
	if ($_SESSION['Typ']=="Admin"){
        $dane="";
        $wykonaj=mysql_query("SELECT * from miejsca");  
		while ($wiersz = mysql_fetch_object($wykonaj))
		{

			 $dane.=$wiersz->ID.'	'.$wiersz->MIEJSCE.'	'.$wiersz->DATA.'	'. $wiersz->a7.'	'.$wiersz->a8.'	'.$wiersz->a9 .'	'.$wiersz->a10 .'	'.$wiersz->a11 .'	'.$wiersz->a12 .'	'.$wiersz->a13 .'	'.$wiersz->a14 .'	'.$wiersz->a15 .'	'.$wiersz->a16 .'	'.$wiersz->a17 .'	'.$wiersz->a18 .'	'.$wiersz->a19 .'	'.$wiersz->a20 .'	'.$wiersz->a21 .'	'.$wiersz->a22.'
';
//tak tu muci być takie zagiecie ^
		}
		mysql_close($connection);

        
        $fp = fopen("dane.txt", "w");
        fputs($fp,$dane);
        fclose($fp);
		echo 'cześć';
        
       header('Location: subpage/dane.txt');
    }
    else{
        header('Location: index.php?id=start');	
    }
?>

