window.onload = odliczanie;


function odliczanie()
	{
		var dzisiaj = new Date();
		
		var dzien = 24-dzisiaj.getDate();
		var miesiac = 6-dzisiaj.getMonth()+1;
				
		var godzina = 24-dzisiaj.getHours();
		if (godzina<10) godzina = "0"+godzina;
		
		var minuta = 60-dzisiaj.getMinutes();
		if (minuta<10) minuta = "0"+minuta;
		
		var sekunda = 60-dzisiaj.getSeconds();
		if (sekunda<10) sekunda = "0"+sekunda;
		
		document.getElementById("wakacje").innerHTML = "do wakacji zostało:"+dzien+"/"+miesiac+" | "+godzina+":"+minuta+":"+sekunda;
		 
		 setTimeout("odliczanie()",1000);
	}