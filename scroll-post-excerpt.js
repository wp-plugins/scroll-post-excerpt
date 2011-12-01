/**
 *     Scroll post excerpt
 *     Copyright (C) 2011  www.gopiplus.com
 * 
 *     This program is free software: you can redistribute it and/or modify
 *     it under the terms of the GNU General Public License as published by
 *     the Free Software Foundation, either version 3 of the License, or
 *     (at your option) any later version.
 * 
 *     This program is distributed in the hope that it will be useful,
 *     but WITHOUT ANY WARRANTY; without even the implied warranty of
 *     MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *     GNU General Public License for more details.
 * 
 *     You should have received a copy of the GNU General Public License
 *     along with this program.  If not, see <http://www.gnu.org/licenses/>.
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

