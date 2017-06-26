<?php
	@session_start(); 
	require_once('baza.php');	
?>
<html>
	<head>
	<meta charset="utf-8" />
	<title>Odliczanie czasu</title>
	
	<script type="text/javascript" src="subpage/wakacje.js"></script>
	
</head>
<body>

TEST </br></br>

<hr/>
<div id="test8"></div>
<script>
(function() {
    var leadingZero = function(element) {
        if (element < 10) return element = "0" + element;
        return element;
    }

    var showCount = function() {
        var currentYear = (new Date).getFullYear();
        var month = 06;
        var day = 29;
        var dateToday = new Date();

        //rok, miesiąc, dzień, godzina, minuta
        var uberImportantDate = new Date(currentYear, month-1, day, 9, 30);
        var msInADay = 24 * 60 * 60 * 1000; //1 dzień w milisekundach - to w nich przecież zwracany czas metodą getTime

        var timeDifference = (uberImportantDate.getTime() - dateToday.getTime());

        var eDaysToDate = timeDifference / msInADay;
        var daysToDate = Math.floor(eDaysToDate);

        var eHoursToDate = (eDaysToDate % daysToDate)*24;
        var hoursToDate = Math.floor(eHoursToDate);

        var eMinutesToDate = (eHoursToDate - hoursToDate)*60;
        var minutesToDate = Math.floor(eMinutesToDate);

        var eSecondsToDate = Math.floor((eMinutesToDate - minutesToDate)*60);
        var secondsToDate = Math.floor(eSecondsToDate);

        var tekst = 'Do moich kolejnych urodzin pozostało: '
                +daysToDate+' dni, '
                +hoursToDate+ ' godzin, '
                +minutesToDate+ ' minut i '
                +leadingZero(secondsToDate)+' sekund';

        var element = document.getElementById('test8');

        //jeżeli czas się skończył
        if (daysToDate + hoursToDate + minutesToDate + secondsToDate <= 0) {
            element.innerHTML = 'Czas minął';
        } else {
            element.innerHTML = tekst;

            setTimeout(function() {
                showCount()
            }, 1000);
        }
    }

    showCount();
})();
</script>

<!--
 <img src="graphics/librac.jpg" onload='test()'>
 <span id="idElement">test</span>
->
<body>
</html>