<?php

	$wykonaj=mysql_query("SELECT * from licytacje");
	while ($wiersz = mysql_fetch_object($wykonaj))
	{
		$nazwa=$wiersz->Nazwa;
		$_SESSION['tytul']=$wiersz->Tytul;
		$krotki_opis=$wiersz->Krotki_opis;
		$cena=$wiersz->Cena;
		$do_kiedy=$wiersz->Do_kiedy;
		$_SESSION['Grafika']=$wiersz->Grafika;

		$data= date("Y-m-d H:i:s");
		$data2=  date("Y-m-d H:i:s", mktime (substr($do_kiedy,11,-6),substr($do_kiedy,14,-3),substr($do_kiedy,17),substr($do_kiedy,5,-12),substr($do_kiedy,8,-9),substr($do_kiedy,0,-15)));
?>
		<div class="auction">
			<a href="index.php?id=auction/<?php echo $nazwa ?>">
				<div id="a_graphics">
					<img src="graphics/<?php echo $_SESSION['Grafika'] ?>">
				</div>
				<div id="a_message">
					<h3><?php echo $_SESSION['tytul']; ?></h3>
					aktualna cena: <?php echo $cena ?>zł &emsp;&emsp; <?php    if($data<$data2) echo 'przewydywany termin zakończenia:'.$do_kiedy;  else echo'Licytacja zakończyła się';?>
					
					
					<hr/>
					<?php echo $krotki_opis ?>
				</div>
			</a>
		</div>

<?php
	}
?>