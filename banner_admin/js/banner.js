function getXmlHttp() {
	try {
		return new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			return new ActiveXObject("Microsoft.XMLHTTP");
		} catch (ee) {
		}
	}
	if (typeof XMLHttpRequest!='undefined') {
		return new XMLHttpRequest();
	}
}

var pathname=window.location.pathname;//получаем путь страницы
var	url=pathname.substr(1);
if(url=='')
{
	url="index";
}
function getBanner(author, url) {
	//отправляем данные на сервер и получаем ответ.
	var xmlhttp = getXmlHttp();
	xmlhttp.open("GET", 'server/server.php?author='+author+'&url='+url);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			var output = JSON.parse(xmlhttp.responseText);
			document.getElementById("banner").src="server/banner.php?banner_id="+output.banner_id;
			document.getElementById("banner").setAttribute("width",output.width);
			document.getElementById("banner").setAttribute("height",output.height);
			document.getElementById("banner").setAttribute("style",output.display);
		}
	}
	xmlhttp.send(null);

}