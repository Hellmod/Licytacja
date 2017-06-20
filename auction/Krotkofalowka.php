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
    cena: <?php echo $cena ?>zł 
    <form method="post" action="dodawanie.php">
        <input value="5" type="number" name="moja_cena" size="6" min="<?php echo $cena ?>" required placeholder="Twoja cena" size="6"/>
        <input type="submit" name="nowa_cena_licytacja" value="Wyślij">
    </form>
     zostało:<?php echo $do_kiedy ?><br/>
    <hr/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. <br/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. 
</div>
