<?php
        
    $nazwa_pliku=substr($_GET['id'],8,40);   
    $wykonaj=mysql_query('SELECT * from licytacje where Nazwa="'.$nazwa_pliku.'"');  
    $wiersz = mysql_fetch_object($wykonaj);
    if(!$wiersz)
        header('Location: index.php?id=subpage/start');
    $cena=$wiersz->Cena;
    $do_kiedy=$wiersz->Do_kiedy;
    $grafika=$wiersz->Grafika;
    $Tytul=$wiersz->Tytul;
    $data= date("Y-m-d H:i:s");
    $data2=  date("Y-m-d H:i:s", mktime (substr($do_kiedy,11,-6),substr($do_kiedy,14,-3),substr($do_kiedy,17),substr($do_kiedy,5,-12),substr($do_kiedy,8,-9),substr($do_kiedy,0,-15)));
    if($wiersz->Wygrywajacy==@$_SESSION['ID']){
        $wygrana="Twoja cena jest nawyższa";
        $wygrana2="Wygrałeś";
    }
    else{
        $wygrana="Zalicytuj aby wygrać licytację";
        $wygrana2="Licytacja zakończyła się";
    }
?>

<div id="a_graphics">
    <a class="example-image-link" href="graphics/<?php echo $grafika ?>" data-lightbox="<?php echo $nazwa_pliku; ?>"><img class="example-image" src="graphics/<?php echo $grafika ?>" alt="<?php echo $nazwa_pliku; ?>" /></a>
    <!--<img src="graphics/<?php //echo $grafika ?>">    -->
</div>


<?php
    if($data<$data2){
?>
<!-- ________________LICYTACJA DALEJ TRWA__________________-->
<div id="a_message">
    <h3><?php echo $Tytul; ?></h3>
    Aktualna cena: <?php echo $cena ?>zł     &emsp;	&emsp;<?php echo $wygrana ?>  
    <?php 
    if(isset($_SESSION['ID'])){
    ?>
        <form method="post" action="dodawanie.php" >
            <input type="number"  name="moja_cena" min="<?php echo $cena+1 ?>" size="6" required />
            <input type="hidden" name="nazwa" value="<?php echo $nazwa_pliku ?>" />
            <input type="hidden" name="id" value="<?php echo $_SESSION['ID']?>" />
            <input type="submit" name="nowa_cena_licytacja" value="Wyślij">
        </form>
    <?php
    }
    ?>
    <?php if(!isset($_SESSION['ID'])) echo '</br> ' ?>
    Przewidywane zakończenie licytacji:<?php echo $do_kiedy ?><br/>
    <span id="zostalo"></span><br/>
</div>
<!-- __________________________________-->
<?php
    }
    else{
?>
<!-- _______________LICYTACJA ZAKOŃCZYŁA SIĘ___________________-->
<div id="a_message">
    <h3><?php echo $Tytul; ?></h3>
    Aktualna cena: <?php echo $cena ?>zł     &emsp;	&emsp;<?php echo $wygrana2 ?>  
</div>
<!-- __________________________________-->
<?php
    }
?>
<div id="tresc">
    <hr/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. <br/>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. 
    <br/>
    <a class="example-image-link" href="graphics/case1.jpg" data-lightbox="<?php echo $nazwa_pliku; ?>"><img height="150px" class="example-image" src="graphics/case1.jpg" alt="<?php echo $nazwa_pliku; ?>" /></a>

    <a class="example-image-link" href="graphics/1.png" data-lightbox="<?php echo $nazwa_pliku; ?>"><img height="150px" class="example-image" src="graphics/1.png" alt="<?php echo $nazwa_pliku; ?>" /></a>
</div>

<script type="text/javascript" src="script/zostalo.js"></script>
<script>
window.onload = start("  <?php echo$data2 ?>   ");
</script>