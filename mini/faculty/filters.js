function getData() {
	
	var year=document.getElementById('year').value
	var edugap=document.getElementById('educationgap').value;
	var YD=document.getElementById('yd').value;
	
	// var edugap=document.getElementById('year').value
	// var edugap=document.getElementById('year').value
	console.log(year+""+edugap+""+YD);

	// var xml=new XMLHttpRequest();

	// xml.open("GET","datagetfilter.php?var1="+year+"&var2="+edugap,false);
	// xml.send(null);
	// // alert(xml.responseText);
	// document.getElementById('datashow').innerHTML=xml.responseText;	
}
