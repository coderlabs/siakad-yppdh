var panel = new Array('panel1', 'panel2', 'panel3');
var tab = new Array('tab1', 'tab2', 'tab3');
function tampilPanel(nval){
	for(i=0; i<panel.length; i++){
		document.getElementById(panel[i]).style.display = (nval-1 == i) ? 'block':'none';
		document.getElementById(tab[i]).className=(nval-1 == i) ? 'tab_sel':'tab';
	}
}