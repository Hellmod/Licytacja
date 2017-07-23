var data;
var czyPow=true;

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
	//	alert(timeDifference);
		 if(timeDifference<0)
			location.reload()	
		 	

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
	//	alert(eSecondsToDate);
		
		if(daysToDate>=1)
			document.getElementById("zostalo").innerHTML = daysToDate+" dni do końca licytacji";
		else
			document.getElementById("zostalo").innerHTML = "Czas do końca licytacji: "+hoursToDate+":"+minutesToDate+":"+secondsToDate;
		setTimeout("odliczanie()",1000);
	
	
}

	