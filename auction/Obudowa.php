<?php
    $nazwa_pliku="Obudowa";
    $wykonaj=mysql_query('SELECT Cena,Do_kiedy,Wygrywajacy from licytacje where Nazwa="'.$nazwa_pliku.'"');  
    $wiersz = mysql_fetch_object($wykonaj);
    $cena=$wiersz->Cena;
    $do_kiedy=$wiersz->Do_kiedy;
    if($wiersz->Wygrywajacy==$_SESSION['ID'])
        $wygrana="Wygrywasz tą licytacje";
    else
        $wygrana="Przegrywasz tą licytacje";

?>
<div id="a_graphics">
    <img src="graphics/case1.jpg" >
</div>
<div id="a_message">
    <h3>Obudowa</h3>
    cena: <?php echo $cena ?>zł     &emsp;	&emsp;<?php echo $wygrana ?>  
    <form method="post" action="dodawanie.php">
        <input type="number"  name="moja_cena" min="<?php echo $cena+1 ?>" size="6" required />
        <input type="hidden" name="nazwa" value="<?php echo $nazwa_pliku ?>" />
        <input type="hidden" name="id" value="<?php echo $_SESSION['ID']?>" />
        <input type="submit" name="nowa_cena_licytacja" value="Wyślij">
    </form>
     zostało:<?php echo $do_kiedy ?><br/>
    <hr/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. <br/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. 
</div>
