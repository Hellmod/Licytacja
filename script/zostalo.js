var data;

function start(data){

	this.data=data;
	odliczanie();
	
}

function czy(element) {
	if (element < 10) return element = "0" + element;
	return element;
}
function odliczanie(){

		var currentYear = data.substring(0,6);
		var month = data.substring(7,9);
		var day = data.substring(10,12);
		var hours = data.substring(12,15);
		var minutes = data.substring(16,18);
		var seconds = data.substring(19,22);
		var dateToday = new Date();

        //rok, miesiąc, dzień, godzina, minuta
		var uberImportantDate = new Date(currentYear, month-1, day, hours, minutes, seconds);
		var msInADay = 24 * 60 * 60 * 1000; //1 dzień w milisekundach - to w nich przecież zwracany czas metodą getTime

		var timeDifference = (uberImportantDate.getTime() - dateToday.getTime());

        var eDaysToDate = timeDifference / msInADay;
        var daysToDate = Math.floor(eDaysToDate);
		//alert(timeDifference+' /'+ msInADay);

		if(daysToDate!=0)
			var eHoursToDate = (eDaysToDate % daysToDate)*24;
		else 
			var eHoursToDate = eDaysToDate*24;
		var hoursToDate = Math.floor(eHoursToDate);

        var eMinutesToDate = (eHoursToDate - hoursToDate)*60;
        var minutesToDate = Math.floor(eMinutesToDate);
		minutesToDate=czy(minutesToDate);

        var eSecondsToDate = Math.floor((eMinutesToDate - minutesToDate)*60);
        var secondsToDate = Math.floor(eSecondsToDate);
		secondsToDate=czy(secondsToDate);
		
		if(daysToDate>=1)
			document.getElementById("zostalo").innerHTML = daysToDate+" dni do końca licytacji";
		else
			document.getElementById("zostalo").innerHTML = "Czas do końca licytacji: "+hoursToDate+":"+minutesToDate+":"+secondsToDate;
		setTimeout("odliczanie()",1000);
/*
		var dzisiaj = new Date();
		var rok = data.substring(0,6)-dzisiaj.getFullYear();

		var miesiac = data.substring(7,9)-(dzisiaj.getMonth()+1);		

		var dzien = data.substring(10,12)-dzisiaj.getDate();

		var godzina = data.substring(12,15)-dzisiaj.getHours();
		if(godzina<0) godzina="0";
		else if (godzina<10) godzina = "0"+godzina;			
		
		var minuta = data.substring(16,18)-dzisiaj.getMinutes();
		if(minuta<0) minuta="00";
		else if (minuta<10) minuta = "0"+minuta;		

		var sekunda = data.substring(19,22)-dzisiaj.getSeconds();
		if(sekunda<0) sekunda="0";
		else if (sekunda<10) sekunda = "0"+sekunda;		
				
		document.getElementById("zostalo").innerHTML = rok+"-"+miesiac+"-"+dzien+" "+godzina+":"+minuta+":"+sekunda;

		//document.getElementById("zostalo").innerHTML = czasDoWydarzenia(data.substring(0,6), data.substring(7,9), data.substring(10,12), data.substring(12,15), data.substring(16,18), data.substring(19,22));

		//alert(rok+"-"+miesiac+"-"+dzien+" "+godzina+":"+minuta+":"+sekunda);
		
*/		
	}

	