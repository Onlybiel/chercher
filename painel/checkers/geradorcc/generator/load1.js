var z;
for(z=1;z<=12;z++){
	if(z<10){
		document.writeln('<option value="0'+z+'">0'+z+'</option>');
	}else{
		document.writeln('<option value="'+z+'">'+z+'</option>');
	}
}