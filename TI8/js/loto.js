 function getLoto(){
	var lotoArray = [];
	var hexString=[];
	var bingo=[];
	var OK=0;
	var inputVal = [];
	var regex = new RegExp("[A-F0-9]{2}");
	
	for(var i=0;i<8;i++)
		inputVal[i] = document.getElementsByClassName("lotoIn")[i].value;
	
	for(var i=0;i<8;i++){
		if(inputVal[i]){
			if(regex.test(inputVal[i]))
				OK=1;
			else{
				OK=0;
				alert("Nu ai introdus corect numerele!");
				break;
			}
		}
		else{
			OK=0;
			alert("Nu ai introdus toate numerele!");			
			break;
		}
	}
	
	if(OK===1){
		for(var i=0;i<8;i++){ // generare vector cu nr random
			lotoArray[i]=Math.floor(Math.random()*255);
		}
		
		for(var i=7;i>=0;i--)//verificare duplicari
			for(var j=0;j<8;j++)
				if(lotoArray[i] === lotoArray[j] && j!==7-i){
					lotoArray[i]=Math.floor(Math.random()*255);
					hexString[i]=lotoArray[i].toString(16);
					hexString[i]=" "+hexString[i].toUpperCase();
				}
					
		document.getElementById("extracted").innerHTML = hexString;
		
			for(var i=0;i<8;i++){
				for(var j=0;j<8;j++){
					if(" "+inputVal[j] == hexString[i]){
						bingo.push(hexString[i]);
					}
				}
			}
		if(bingo.length)
			document.getElementById("bingo").innerHTML ="Numere ghicite: "+bingo;
		else
			document.getElementById("bingo").innerHTML ="Nu ați ghicit nici un număr";
		
		document.getElementById("btnExtr").disabled = true;
			
	}
}