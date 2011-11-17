/*
* Add KML Layers
*/
function locationHighlightLite_init()
{
	var layerURL = "/media/uploads/LocationHighlightLite.kml" + "?" + Math.random();

	//create new layer
	var layer = new OpenLayers.Layer.Vector("Location", {
		projection: map.displayProjection,
		strategies: [new OpenLayers.Strategy.Fixed()],
		protocol: new OpenLayers.Protocol.HTTP({
			url: layerURL,
			format: new OpenLayers.Format.KML({
				extractStyles: true,
				extractAttributes: true
			})
		})
	});


	// Add New Layer
	map.addLayer(layer);

	return false;
}


// can't find better way for binding to 'map' var, which isn't initialized at this time
jQuery(document).ready(function($) {
		window.setTimeout(function() {
	    map.events.register("loadend", locationHighlightLite_init());
		}, 2000);
});
