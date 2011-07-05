/* options.js: 
 * 	Javascript functions used to dynamically alter the header from the theme admin panel
 * 	WARNING: this script requires jQuery to function.
 * */

//shortname for theme. must be same as $sname in functions.php 
window.themeshort="bubblyblue";

//build selector strings for jquery
var logo_left_sel='#'+themeshort+'_logo_left';
var logo_top_sel='#'+themeshort+'_logo_top';
var logo_opacity_sel='#'+themeshort+'_logo_opacity';

jQuery(document).ready(function ($) {

	/* CSS selectors we will be working with, as jQuery objects */
	window.the_header=jQuery('#header'); //: the header block
	window.the_fx=jQuery('#header_fx'); //: the FX block. Text is on this layer
	window.the_logo=jQuery('#header_logo'); //: a img containing the logo
	window.the_menu=jQuery('#page_menu'); //: the dropdown menu

//	console.log('Ready!');
	window.the_logo_left=parseInt(the_logo.css('left').replace(/px/,''));
	window.the_logo_top=parseInt(the_logo.css('top').replace(/px/,''));
	window.the_logo_opacity=parseFloat(the_logo.css('opacity'));
//	console.log(the_logo_left);
	$(logo_left_sel).val(the_logo_left);
	$(logo_top_sel).val(the_logo_top);
	$(logo_opacity_sel).val(the_logo_opacity);
});

function move_logo_top(i){
	the_logo_top+=i;
	the_logo.css('top',the_logo_top);
	jQuery(logo_top_sel).val(the_logo_top);	
//	console.log(window.the_logo_top);
}
function move_logo_left(i){
	the_logo_left+=i;
	the_logo.css('left',the_logo_left);
	jQuery(logo_left_sel).val(the_logo_left);	
//	console.log(the_logo_left);
}

function set_logo_opacity(i){
	the_logo_opacity+=i;
	if(the_logo_opacity>1.0) the_logo_opacity=1.0;
	if(the_logo_opacity<0.0) the_logo_opacity=0.0;
	the_logo.css('opacity',the_logo_opacity);
	jQuery(logo_opacity_sel).val(the_logo_opacity);	
}
//changes the header logo. occurs when the dropdown list is selected 
// or the input box loses focus
function set_logo_image(src){
	jQuery('#'+themeshort+'_header_logo_path').val(src);
	jQuery('#header_logo_path_image').val(mess_path('/wp-conte',src));
}

function mess_path(server_path,file){
	if(file.match(/^http\:\/\//)) return file;
	return server_path+file;
}
