

TEST </br></br>

<hr/>


    <form enctype="multipart/form-data" method='POST'  action=''>
    	<input type='file' name='graphics'/>
    	<input type="submit" value="Utwórz" name="NewAuction"/>
    </form>

<?php
    if(isset($_POST['NewAuction'])){
		$file = $_FILES['graphics'];
		$file_name=$file['name'];
		$file_error=$file['error'];
		$file_tmp=$file['tmp_name'];
		echo $file_name;

		$file_ext = explode('.',$file_name);
		$file_ext = strtolower(end($file_ext));

    	if($file_error===0) {
			$file_destitation='graphics/'.$file_name;
			move_uploaded_file($file_tmp,$file_destitation);
    	}
	else{
		echo "dupa";    
		}
	}
?>