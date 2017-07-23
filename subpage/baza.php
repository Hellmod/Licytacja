<?php
    $connection = @mysql_connect('localhost', 'root', '')		or die('Brak połączenia z serwerem MySQL');
    mysql_set_charset("UTF8", $connection);
    $db = @mysql_select_db('licytacja', $connection)					or die('Nie mogę połączyć się z bazą danych');    
?>