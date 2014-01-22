function ajaxRun(page){
	var xmlHttp;
	var a;
	if (window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
	else{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
			document.getElementById("main").innerHTML = xmlHttp.responseText;
		}
	}
	xmlHttp.open("GET",page,true);
	xmlHttp.send();

}

function ajaxRun2(page,text1){
	var xmlHttp;
	if (window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
	else{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlHttp.onreadystatechange = function(){
	//respon new data from server
	if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
		
			document.getElementById("main").innerHTML = xmlHttp.responseText;
		}
	}
		xmlHttp.open("get",page+"?text1="+text1,true);
	
	
	xmlHttp.send();
	
}


function ajaxRun4(page,text1,text2,text3){
	var xmlHttp;
	if (text1 == ""){
		var text1 = "";
	}
	else{
		var text1=document.getElementById(text1).value;
	}
	if (text2 == ""){
		var text2 = "";
	}
	else{
		var text2=document.getElementById(text2).value;
	}
	
	if (text3 == ""){
		var text3 = "";
	}
	else{
		var text3=document.getElementById(text3).value;
	}
	if (window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
	else{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlHttp.onreadystatechange = function(){
	//respon new data from server
	if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
		
			document.getElementById("main").innerHTML = xmlHttp.responseText;
		}
	}
		xmlHttp.open("get",page+"?text1="+text1+"&text2="+text2+"&text3="+text3,true);
	
	
	xmlHttp.send();
	
}

function ajaxRun14(){
	var xmlHttp;
	var a;
	if (window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
	else{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
			document.getElementById("berita").innerHTML = xmlHttp.responseText;
		}
	}
	xmlHttp.open("GET","FILE/berita PDAM/berita5.html",true);
	xmlHttp.send();

}
function ajaxRun15(){
	var xmlHttp;
	var a;
	if (window.XMLHttpRequest){
		xmlHttp = new XMLHttpRequest();
	}
	else{
		xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlHttp.onreadystatechange = function(){
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200){
			document.getElementById("berita").innerHTML = xmlHttp.responseText;
		}
	}
	xmlHttp.open("GET","FILE/berita PDAM/berita4.html",true);
	xmlHttp.send();

}

/*fungsi simulasi*/
	function hapusHasil(){
		document.getElementById("hasil").innerHTML="";
	}
	function getHasil(){
		var arr = new Array();
		arr[0] = new Array(900,900,1000,2000,2600,3300,2100,2900,4600,4900,6000);
		arr[1] = new Array(900,900,1600,3600,4600,6000,3800,5300,7200,7500,9600);
		arr[2] = new Array(900,1400,2300,5700,7400,9400,6000,8700,10700,11300,13300);
		arr[3] = new Array(1300,2900,5500,8800,10700,12600,8500,12600,14400,14300,16300);
		
		for(var i=0;i<6 ;i++){
		if(document.getElementsByName("ukuran")[i].checked)
		var a = document.getElementsByName("ukuran")[i].value;
		}
		a=Number(a);
		
		var j = 0;
			
			if(document.getElementById("pemakaian").value<=10 && document.getElementById("pemakaian").value>0)
				var i=0;
			else if(document.getElementById("pemakaian").value<=20)
				var i=1;
			else if(document.getElementById("pemakaian").value<=30)
				var i=2;
			else
				var i=3;
				
			for(var k=0;k<11;k++){
				if(document.getElementsByName("gol")[k].checked){
					var j = k;
					}
				}
			var b = arr[i][j] * document.getElementById("pemakaian").value;
			b = Number(b);
			var hasil = a+b+10000;
			hasil = numberWithCommas(hasil);
		document.getElementById("hasil").style.fontWeight='bold';
		document.getElementById("hasil").innerHTML="Rp. " + hasil;
	}
	
	function numberWithCommas(x) {
    	var parts = x.toString().split(".");
	    parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    	return parts.join(".");
}
/*function komen*/
function bca()
{
	var allow =1;
	if(document.getElementById("nama").value==""){
		document.getElementById("namaErr").innerHTML= 'data harus diisi!';
		allow =0;
	}
	
	if(allow ==1)
		return true;
	else
		return false;
	
}
