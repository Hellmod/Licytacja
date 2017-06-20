<?php
	if ($_SESSION['Typ']!='User')
			header('Location: index.php?id=subpage/start');
?>

	<div class="auction" onclick= "Location: index.php?id=Test">
	<a href="index.php?id=auction/Krotkofalowka">
		<?php require('auction/Krotkofalowka_head.php');?>	
		</div>
	</a>
	<div class="auction">
	<?php require('auction/Obudowa_head.php');?>
	
	</div>


<?php
/*
	//$strona="";
	$wykonaj=mysql_query("SELECT Nazwa from licytacje");  
	while ($wiersz = mysql_fetch_object($wykonaj))
	{
		 echo'<div class="auction">';
		 require('auction/'.$wiersz->Nazwa.'_head.php');	
		 echo'</div>';
	}
*/
	
/*
		 $strona=$strona.'<div class="auction">';
		 $strona=$strona."<?php require('auction/'.$wiersz->Nazwa.'_head.php'); ?>";	
		 $strona=$strona.'</div>';
*/
	

?>