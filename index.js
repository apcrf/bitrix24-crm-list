
var iNumPage = 1;
var nPageSize = 10;
var iCntPages = 0;
document.addEventListener("DOMContentLoaded", function() { rowLoad(); });

function rowLoad(iPageDirection) {
	switch (true) {
		case iPageDirection=="prev" :
			if (iNumPage>1) iNumPage--;
			break;
		case iPageDirection=="next" :
			if (iNumPage<iCntPages) iNumPage++;
			break;
		default :
			iNumPage = 1;
			break;
	}
	document.getElementById("list-page").innerHTML = "Страница: " + iNumPage;

	var url = "index_api.php?iNumPage=" + iNumPage + "&nPageSize=" + nPageSize;
	var xhr = new XMLHttpRequest();
	xhr.open("GET", url);
	xhr.send();
	xhr.onload = function() {
		switch (xhr.status) {
			case 200 :
				var obj = JSON.parse(xhr.responseText);
				iCntPages = Math.ceil(obj.cnt / nPageSize);
				var html = "";
				for (var k in obj.rows) {
					html += "<tr>";
					html += "<td>" + obj.rows[k].ID + "</td>";
					html += "<td>" + obj.rows[k].NAME + "</td>";
					html += "<td>" + obj.rows[k].USER_ID + "</td>";
					html += "<td>" + obj.rows[k].CRM_ID + "</td>";
					html += "</tr>";
				}
				document.getElementById("list-tbody").innerHTML = html;
				break;
			default : console.log("xhr.status: " + xhr.status + " - " + xhr.statusText); break;
		}
	};
}
