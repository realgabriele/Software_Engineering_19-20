class Leftmenu {
	
	constructor(){
		var searchbar = document.createElement("input");
		searchbar.type = "text";
		searchbar.id = "searchbar";
		
		var searchbutton = document.createElement("button");
		//searchbutton.onclick = "userif.leftmenu.search()";
		searchbutton.onclick = function(){
			var query = document.getElementById("searchbar").value;
			userif.searchPoi(query);
		};
		
		searchbutton.innerText = "search";

		var lista = document.createElement("div");
		lista.id = "listapoi";
        
		document.getElementById("left-menu").appendChild(searchbar);
		document.getElementById("left-menu").appendChild(searchbutton);
        document.getElementById("left-menu").appendChild(lista);
	}
	
	showPoi(poi){
		document.getElementById("listapoi").innerHTML = "";
		
		for (var i = 0; i < poi.length; i++){
			var curr_poi = poi[i];
			
			var new_div = document.createElement("div");
			new_div.className = "poi-item";
			new_div.innerHTML = "<b>" + curr_poi.name + "</b>" +
								"<br/>" + curr_poi.description;
			
			document.getElementById("listapoi").appendChild(new_div);
		}
	}
}
