class UserInterface {
	poi = [];
	mappa;
	leftmenu;
	user;
	
	constructor(){
		if (user !== null)
			this.user = new User(user.username, user.name, user.cdl_id);
		
		// fill POI
		this.retrievePoi();
		
		// crea menu sinistra
		this.startLeftMenu();
		
		// crea mappa
		this.startMap();
		
		//this.updatePoi();
	}
	
	startLeftMenu(){
		this.leftmenu = new Leftmenu();
		this.leftmenu.showPoi(this.poi);
	}
	
	startMap(){
		this.mappa = new Mappa();
	}
	
	getAPI(path){
		// if (path.charAt(path.length-1) == '/') path = path.substr(0, path.length-1);
		var url = "http://teambanana/api/" + path;
		var xmlHttp = new XMLHttpRequest();
	    xmlHttp.open( "GET", url, false );
	    xmlHttp.send( null );
	    var response = xmlHttp.responseText;
	    
	    return JSON.parse(response)
	}
	
	retrievePoi(){
		// ottiene tutti i POI dalle API
		var pois;
		if (this.user == null)
			pois = this.getAPI("poi");
		else
			pois = this.getAPI("cdl/"+this.user.cdl_id+"/poi");
		
		for (var i=0; i < pois.length; i++){
			var curr_poi = pois[i];
			var new_poi = new Poi(curr_poi.name, curr_poi.description, curr_poi.x, curr_poi.y, curr_poi.service_id);
			this.addPoi(new_poi);
		}
	}
	
	searchPoi(query){
		// ottiene i POI dalle API filtrati
		if (query == "") this.retrievePoi();
		else {
			var pois;
			if (this.user == null)
				pois = this.getAPI("poi/search/"+query);
			else
				pois = this.getAPI("cdl/"+this.user.cdl_id+"/poi/search/"+query);
			
			this.poi = [];
			for (var i=0; i < pois.length; i++){
				var curr_poi = pois[i];
				var new_poi = new Poi(curr_poi.name, curr_poi.description, curr_poi.x, curr_poi.y, curr_poi.service_id);
				this.addPoi(new_poi);
			}			
		}
		
		this.updatePoi();
	}
	
	addPoi(poi){
		this.poi.push(poi);
	}
	
	updatePoi(){
		this.mappa.showPoi(this.poi);
		this.leftmenu.showPoi(this.poi);
	}
	
}

var userif = new UserInterface();