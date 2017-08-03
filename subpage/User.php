
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

		$data = date("Y-m-d H:i:s");
		$data2 = date("Y-m-d H:i:s", mktime (substr($do_kiedy,11,-6),substr($do_kiedy,14,-3),substr($do_kiedy,17),substr($do_kiedy,5,-12),substr($do_kiedy,8,-9),substr($do_kiedy,0,-15)));
?>
		<div class="auction">
			<!--<a href="index.php?id=auction/<?php //echo $nazwa; ?>">-->
				<div id="a_graphics">
					<a class="example-image-link" href="graphics/<?php echo $_SESSION['Grafika'] ?>" data-lightbox="<?php echo $nazwa; ?>"><img class="example-image" src="graphics/<?php echo $_SESSION['Grafika'] ?>" alt="<?php echo $nazwa; ?>" /></a>					
				</div>
				<div id="a_message">
					<form action="" style="float: right;">
						<input type=button onClick="location.href='index.php?id=auction/<?php echo $nazwa; ?>'" value='Licytacja'>
					</form>
					<h3><?php echo $_SESSION['tytul']; ?></h3>
					Aktualna cena: <?php echo $cena ?>zł &emsp;&emsp; <?php    if($data<$data2) echo 'przewydywany termin zakończenia licytacji:'.$do_kiedy;  else echo'Licytacja zakończyła się';?>
					<hr/>
					<?php echo $krotki_opis ?>
				</div>
			<!--</a>-->
		</div>

<?php


	}
?>