<?php
    $nazwa_pliku="Krotkofalowka";
    $wykonaj=mysql_query('SELECT Cena,Do_kiedy from licytacje where Nazwa="'.$nazwa_pliku.'"'); 
    $wiersz = mysql_fetch_object($wykonaj);
    $cena=$wiersz->Cena;
    $do_kiedy=$wiersz->Do_kiedy;
	

?>
<div id="a_graphics">
    <img src="graphics/librac.jpg">
</div>
<div id="a_message">
    <h3>KRÓTKOFALÓWKA</h3>
    cena: <?php echo $cena ?>zł &emsp;&emsp; zostało:<?php echo $do_kiedy ?><br/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. 
</div>
