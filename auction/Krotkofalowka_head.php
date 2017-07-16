<?php
    $nazwa_pliku="Krotkofalowka";
    $wykonaj=mysql_query('SELECT Cena,Do_kiedy from licytacje where Nazwa="'.$nazwa_pliku.'"'); 
    $wiersz = mysql_fetch_object($wykonaj);
    $cena=$wiersz->Cena;
    $do_kiedy=$wiersz->Do_kiedy;

	$data= date("Y-m-d H:i:s");
    $data2=  date("Y-m-d H:i:s", mktime (substr($do_kiedy,11,-6),substr($do_kiedy,14,-3),substr($do_kiedy,17),substr($do_kiedy,5,-12),substr($do_kiedy,8,-9),substr($do_kiedy,0,-15)));
?>
<div id="a_graphics">
    <img src="graphics/librac.jpg">
</div>
<div id="a_message">
    <h3><?php echo $nazwa_pliku; ?></h3>
    aktualna cena: <?php echo $cena ?>zł &emsp;&emsp; <?php    if($data<$data2) echo 'przewydywany termin zakończenia:'.$do_kiedy;  else echo'Licytacja zakończyła się';?><br/>
    <hr/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
</div>
