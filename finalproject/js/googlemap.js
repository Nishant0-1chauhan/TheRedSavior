var map;


function loadMap() {
	var haridwar = {lat: 29.9457, lng: 78.1642};
    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: haridwar
    });

    var marker = new google.maps.Marker({
      position: haridwar,
      map: map
    });

    

    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    var button = document.createElement("button");
    button.innerHTML = "Do Something";
    showAllLocations(allData);
    
}
 

function showAllLocations(allData) {
	var infoWind = new google.maps.InfoWindow;
	Array.prototype.forEach.call(allData, function(data){
		var content = document.createElement('div');
		var strong = document.createElement('strong');
		
		strong.textContent = data.bgroup;
		content.appendChild(strong);
		var image = 'http://localhost/exampletwo/A+marker.png';

		//var img = document.createElement('img');
		//img.src = 'img/Leopard.jpg';
		//img.style.width = '100px';
		//content.appendChild(img);
		if(data.bgroup=="A+")
		{
			 image = 'http://localhost/exampletwo/markers/A+marker.png';
		}
		else if(data.bgroup=="B+"){
			image = 'http://localhost/exampletwo/markers/B+marker.png';
		}
		else if(data.bgroup=="A-"){
			image = 'http://localhost/exampletwo/markers/A-marker.png';
		}
        else if(data.bgroup=="AB+"){
			image = 'http://localhost/exampletwo/markers/AB+marker.png';
		}else if(data.bgroup=="AB-"){
			image = 'http://localhost/exampletwo/markers/AB-marker.png';
		}else if(data.bgroup=="O+"){
			image = 'http://localhost/exampletwo/markers/O+marker.png';
		}else if(data.bgroup=="O-"){
			image = 'http://localhost/exampletwo/markers/O-marker.png';
		}
		var marker = new google.maps.Marker({

	      position: new google.maps.LatLng(data.lat, data.lng),
	      map: map,
	      icon:image
	    });

	    marker.addListener('mouseover', function(){
	    	infoWind.setContent(content);
	    	infoWind.open(map, marker);
	    })
	})
}



