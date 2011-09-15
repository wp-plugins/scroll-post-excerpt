/*
##########################################################################################################
###### Project   : Continuous announcement scroller  												######
###### File Name : continuous-announcement-scroller.js                   							######
###### Purpose   : This javascript is to scroll the announcement.  									######
###### Created   : Aug 30th 2010                  													######
###### Modified  : Aug 30th 2010                  													######
###### Author    : Gopi.R (http://www.gopiplus.com/work/)                       					######
###### Link      : http://www.gopiplus.com/work/2010/09/04/continuous-announcement-scroller/        ######
##########################################################################################################
*/
	

function spe_scroll() {
	spe_obj.scrollTop = spe_obj.scrollTop + 1;
	spe_scrollPos++;
	if ((spe_scrollPos%spe_heightOfElm) == 0) {
		spe_numScrolls--;
		if (spe_numScrolls == 0) {
			spe_obj.scrollTop = '0';
			spe_content();
		} else {
			if (spe_scrollOn == 'true') {
				spe_content();
			}
		}
	} else {
		setTimeout("spe_scroll();", 10);
	}
}

var spe_Num = 0;
/*
Creates amount to show + 1 for the scrolling ability to work
scrollTop is set to top position after each creation
Otherwise the scrolling cannot happen
*/
function spe_content() {
	var tmp_vsrp = '';

	w_vsrp = spe_Num - parseInt(spe_numberOfElm);
	if (w_vsrp < 0) {
		w_vsrp = 0;
	} else {
		w_vsrp = w_vsrp%spe_array.length;
	}
	
	// Show amount of vsrru
	var elementsTmp_vsrp = parseInt(spe_numberOfElm) + 1;
	for (i_vsrp = 0; i_vsrp < elementsTmp_vsrp; i_vsrp++) {
		
		tmp_vsrp += spe_array[w_vsrp%spe_array.length];
		w_vsrp++;
	}

	spe_obj.innerHTML 	= tmp_vsrp;
	
	spe_Num 			= w_vsrp;
	spe_numScrolls 	= spe_array.length;
	spe_obj.scrollTop 	= '0';
	// start scrolling
	setTimeout("spe_scroll();", 2000);
}

