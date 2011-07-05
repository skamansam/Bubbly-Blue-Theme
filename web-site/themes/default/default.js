/*This is the default JavaScriopt File for MeHome.*/

function log(err){
	if (window.console && err){
		console.log(err);
	}
}

$(document).ready(function () {
	log("jQuery is ready!");
	$(".accordion").accordion({ header: ".title" });
	$("#sidebar").height( $("#body").height()-16 );
	log("Sidebar: " + $("#body").height()-16 );
//	$("#sidebar .accordion").height($("#body").height());

});
