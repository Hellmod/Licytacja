<?php


    // łączymy się z bazą danych
    $connection = @mysql_connect('localhost', 'root', '')		or die('Brak połączenia z serwerem MySQL');
    $db = @mysql_select_db('firma', $connection)					or die('Nie mogę połączyć się z bazą danych');
    
?>