window.addEventListener("DOMContentLoaded", init, false);
function init(){
	//document.getElementById("cut").addEventListener("click", function(event){CutToClipboard();}, false);
	//document.getElementById("copy").addEventListener("click", function(event){CopyToClipboard();}, false);
	//document.getElementById("paste").addEventListener("click", function(event){PasteFromClipboard();}, false);
	document.getElementById("ccppi").addEventListener("change", function(event){chgccp();}, false);
	document.getElementById("ccpN").addEventListener("change", function(event){fillter();}, false);
	document.getElementById("generar").addEventListener("click", function(){namsogo(document.console.ccp.value,document.console.tr.value);}, false);
	$('#iesp').hide();
	checkCookie();
}
$(document).ready(function() {
	$("#esp").click( function(){
		if($(this).is(':checked')){
			$('#agregar').hide();
			$("#ccexpdat").attr('checked', false);
			$("#ccvi").attr('checked', false);
			$("#ccbank").attr('checked', false);
			$('#iesp').show("slow");
		}else{
			$('#iesp').hide();
			$('#agregar').show("slow");
		}
	});
});