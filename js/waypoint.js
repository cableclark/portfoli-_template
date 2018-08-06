var $about= $("#about");
var $portfolio= $("#folio");
var $contact= $("#contact");

$portfolio.waypoint(function(){
		$portfolio.addClass("fadeIn");
}, {offset:"100%"});

$contact.waypoint(function(){
	$contact.addClass("fadeIn");
}, {offset:"100%"})
