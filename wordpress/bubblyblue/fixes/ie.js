/* ie.js:
 * Bubbly Blue fixes for IE 
 * 	by Skaman Sam Tyler <skamansam@gmail.com> [http://rbe.homeip.net]
 * 
 * This file contains javascript which is included only in IE. Use this file
 * to fix certain DOM elements and styles.
 * 
 * Currently, this file uses curvycorners [http://www.curvycorners.net/] to
 * fix the lack of border-radius support in IE.
 */
jQuery(document).ready(function() {
	var cc_all = {
		tl : {radius : 10},
		tr : {radius : 10},
		bl : {radius : 10},
		br : {radius : 10},
		antiAlias : true
	};
	var cc_top = {
			tl : {radius : 10},
			tr : {radius : 10},
			bl : {radius : 0},
			br : {radius : 0},
			antiAlias : true
		};
	var cc_bottom = {
			tl : {radius : 0},
			tr : {radius : 0},
			bl : {radius : 10},
			br : {radius : 10},
			antiAlias : true
		};

	curvyCorners(cc_top, ".rounded-top");
	curvyCorners(cc_bottom, ".rounded-bottom");
	curvyCorners(cc_all, ".rounded");
});
