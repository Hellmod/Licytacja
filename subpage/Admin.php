<?php
	if ($_SESSION['Typ']!='Admin')
	header('Location: index.php?id=subpage/start');
?>

<form method="post" action="wyjscie.php">

<table border="1">
<tr>	
		<td>ID</td><td>MIEJSCE</td><td>DATA</td><td>7</td><td>8</td><td>9</td><td>10</td><td>11</td><td>12</td><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td><td>20</td><td>21</td><td>22</td>
</tr>




<?php

		$wykonaj=mysql_query("SELECT * from miejsca");  
		while ($wiersz = mysql_fetch_object($wykonaj))
		{
			for($i=7;$i<=22;$i++)
			{
				$a='a'.$i;
				${'a'.$i}=$wiersz->$a;

				//dostajemy w wiersz->$a zawartosci kolejnych kolumn następnie pętlą for przechodzimy po kolejnych kolumnach doposując numer kilumny do $a np $a1 
				
				$wykonaj2=mysql_query('SELECT * from user where id="'.$wiersz->$a.'"');//where id="$wiersz->$a"

				while ($wiersz2 = mysql_fetch_object($wykonaj2))
				{
					//echo'dzialam';
					${'a'.$i}=$wiersz->$a.'- '.$wiersz2->LOGIN;
				}
			}
			 echo'<tr>';	
			 echo '<td>'.$wiersz->ID.'</td><td>'.$wiersz->MIEJSCE.'</td><td>'.$wiersz->DATA.'</td><td>'. $a7 .'</td><td>'.$a8 .'</td><td>'.$a9 .'</td><td>'.$a10 .'</td><td>'.$a11 .'</td><td>'.$a12 .'</td><td>'.$a13 .'</td><td>'.$a14 .'</td><td>'.$a15 .'</td><td>'.$a16 .'</td><td>'.$a17 .'</td><td>'.$a18 .'</td><td>'.$a19 .'</td><td>'.$a20 .'</td><td>'.$a21 .'</td><td>'.$a22 .'</td>';
			 echo'</tr>';
			 
			
		}
		mysql_close($connection);
?>