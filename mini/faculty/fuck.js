function getData() {
	// alert("hey");
	var year=document.getElementById('year').value
	var edugap=document.getElementById('edugap').value;
	var YD=document.getElementById('yd').value;
	
	// alert(year);
	
	// var edugap=document.getElementById('year').value
	// var edugap=document.getElementById('year').value
	// alert(year+""+edugap+""+YD);

	var xml=new XMLHttpRequest();

	xml.open("GET","datagetfilter.php?var1="+year+"&var2="+edugap+"&var3="+YD,false);
	xml.send(null);
	// alert(xml.responseText);
	document.getElementById('datashow').innerHTML=xml.responseText;	
}
