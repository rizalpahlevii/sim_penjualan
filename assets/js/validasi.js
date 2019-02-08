function angka(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if ((charCode < 48 || charCode > 57)&&charCode>32)
		return false;
	return true;
}
function huruf(evt){
	var charCode = (evt.which) ? evt.which : event.keyCode;
	if ((charCode < 65 || charCode > 90)&&(charCode < 97 || charCode > 122)&&charCode>32 )
		return false;
	return true;
}

 



