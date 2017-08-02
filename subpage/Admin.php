<?php
	if ($_SESSION['Typ']!='Admin')
	header('Location: index.php?id=subpage/start');
?>
<script type="text/javascript" src="script/jquery-1.12.4.js"></script>
<script type="text/javascript" src="script/jquery-ui.js"></script>
<link rel="stylesheet" href="script/jquery-ui.css" type="text/css">
<script>
    $(function() {
        $("#datepicker").datepicker();
    });	
</script>


Witaj adminie ;)

<form method="post" action="" id="r_rejestracja" enctype="multipart/form-data">
	<div id="r_label">
		<label for="name" class="r_forma2">Nazwa:</label>
		<label for="title" class="r_forma2">Tytuł:</label>		
		<label for="price" class="r_forma2">Cena:</label>
		<label for="datepicker" class="r_forma2">Data:</label>
		<label for="graphics" class="r_forma2">Grafika:</label>
		<label for="note" class="r_forma2">Krótki opis:</label>
	</div>
	<div id="r_input">
		<input size="40" type="text" name="name" id="name" class="r_forma" maxlength="40" required>		
		<input size="40" type="text" name="title" id="title" class="r_forma" maxlength="40" required>			
		<input size="40" type="number" name="price" id="price" class="r_forma" maxlength="40" required>	
		<input size="40" type="text" name="date" id="datepicker" class="r_forma" maxlength="40" required>
		<input size="40" type="file" name="graphics" id="graphics" class="r_forma" maxlength="40"  accept="image/jpeg,image/gif,image/png" required>	
		<textarea cols="42" rows="5" name="note" id="note" class="r_forma" maxlength="400" required></textarea >	
	</div>
	<div style="clear: both;"></div>
	<input type="hidden" name="MAX_FILE_SIZE" value="512000" />
	<input type="submit" value="Utwórz" name="NewAuction"/>
</form>

<?php
	if(isset($_POST['NewAuction'])){
        $name=$_POST['name'];
		$title=$_POST['title'];
		$price=$_POST['price'];
		$note=$_POST['note'];
		$data=@$_POST["date"];			
		$tab = explode("/", $data);		
		$data= $tab[2].'-'.$tab[0].'-'.$tab[1].' 24:00:00';
		$dataNow = date("Y-m-d H:i:s");

		$zapytanie ='SELECT * from licytacje where Nazwa = "' .$name. '"' ;
		$wykonaj=mysql_query($zapytanie);  
		$wiersz = mysql_fetch_object($wykonaj);
		if($wiersz){
			echo "<script>alert('Identyczna nazwa licytacji już istnieje')</script>";
		}
		else if($data<$dataNow){
			echo "<script>alert('Data już mineła')</script>";
			echo 'data obecna '.$dataNow.' data wybrana '.$data;
		}
		else{

			$file = $_FILES['graphics'];
			$file_name=$file['name'];
			$file_error=$file['error'];
			$file_tmp=$file['tmp_name'];
			

			if($file_error===0) {
				$file_destitation='graphics/'.$file_name;
				move_uploaded_file($file_tmp,$file_destitation);
			}
			else{
				echo "<script>alert('Błąd podczas dodawania grafiki skontaktuj się z administratorem')</script>";
				goto error;
			}

			$zapytanie ="INSERT INTO `licytacje` (`ID`, `Tytul`, `Krotki_opis`, `Grafika`, `Nazwa`, `Cena`, `Do_kiedy`, `Wygrywajacy`) VALUES (NULL, '".$title."', '".$note."', '".$file_name."', '".$title."', '".$price."', '".$data."', '');" ;
			$ins = @mysql_query($zapytanie);
			if($ins){
				echo "<script>alert('Licytacja dodana')</script>";
			}
			else{
				echo "<script>alert('Błąd podczas dodawania licytacji skontaktuj się z administratorem')</script>";
			} 

//__________________Tworzenie pliku__________________________________

			$dane = fread(fopen("auction/auction.txt", "r"), filesize("auction/auction.txt"));
			
			$fp = fopen("auction/".$name.".php", "w");
			fputs($fp,$dane);
			fclose($fp);
		}

		error:

	}

?>
