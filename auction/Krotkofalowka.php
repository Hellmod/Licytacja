<?php
    $nazwa_pliku="Krotkofalowka";
    $wykonaj=mysql_query('SELECT Cena,Do_kiedy,Wygrywajacy from licytacje where Nazwa="'.$nazwa_pliku.'"');  
    $wiersz = mysql_fetch_object($wykonaj);
    $cena=$wiersz->Cena;
    $do_kiedy=$wiersz->Do_kiedy;
    $data= date("Y-m-d H:i:s");
    $data2=  date("Y-m-d H:i:s", mktime (substr($do_kiedy,11,-6),substr($do_kiedy,14,-3),substr($do_kiedy,17),substr($do_kiedy,5,-12),substr($do_kiedy,8,-9),substr($do_kiedy,0,-15)));
    //echo $data2.'_________'.$data;
    if($wiersz->Wygrywajacy==$_SESSION['ID']){
        $wygrana="Twoja cena jest nawyższa";
        $wygrana2="Wygrałeś";
    }
    else{
        $wygrana="Zalicytuj aby wygrać licytację";
        $wygrana2="...";
    }

    if($data<$data2){
?>


<!-- __________________________________-->

<div id="a_graphics">
    <img src='graphics/librac.jpg'>
    
</div>
<div id="a_message">
    <h3>KRÓTKOFALÓWKA</h3>
    Aktualna cena: <?php echo $cena ?>zł     &emsp;	&emsp;<?php echo $wygrana ?>  
    <form method="post" action="dodawanie.php">
        <input type="number"  name="moja_cena" min="<?php echo $cena+1 ?>" size="6" required />
        <input type="hidden" name="nazwa" value="<?php echo $nazwa_pliku ?>" />
        <input type="hidden" name="id" value="<?php echo $_SESSION['ID']?>" />
        <input type="submit" name="nowa_cena_licytacja" value="Wyślij">
    </form>
    Przewidywane zakończenie licytacji:<?php echo $do_kiedy ?><br/>
    <span id="zostalo"></span><br/>
    <hr/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. <br/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. 
</div>

<!-- __________________________________-->
<?php
    }
    else{
?>
     <!-- __________________________________-->
<div id="a_graphics">
    <img src="graphics/librac.jpg" >
</div>
<div id="a_message">
    <h3>KRÓTKOFALÓWKA</h3>
    cena: <?php echo $cena ?>zł     &emsp;	&emsp;<?php echo $wygrana2 ?>  
    <hr/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. <br/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. 
</div>

<!-- __________________________________-->
<?php
    }
?>
<script type="text/javascript" src="script/zostalo.js"></script>
<script>

window.onload = start("  <?php echo$data2 ?>   ");

//alert("start startu");
</script>

