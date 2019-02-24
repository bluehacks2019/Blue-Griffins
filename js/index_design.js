$.fn.delayCss=function(Time,Name,Value){
	var This=this;
	setTimeout(function(){
		This.css(Name,Value);
	},Time);
	return this;
};
$(document).ready(function(){
// Desktop
 	if($(window).width() >= 601) {
		$("#riz-index-btn-login").click(function(){
			$("#riz-index").addClass("riz-index-move-left");
			$("#riz-index").removeClass("riz-index-move-back");
			$("#riz-index-content").addClass("riz-index-move-left");
			$("#riz-index-content").removeClass("riz-index-move-back");
			$("#riz-index-page-login").css({"z-index":"1"});
			$("#riz-index-page-new-employee").css({"z-index":"0"});
			document.getElementById("index-forms-login").reset();
			document.getElementById("index-forms-new-employee").reset();
		});
		$("#riz-index-btn-new-employee").click(function(){
			$("#riz-index").addClass("riz-index-move-left");
			$("#riz-index").removeClass("riz-index-move-back");
			$("#riz-index-content").addClass("riz-index-move-left");
			$("#riz-index-content").removeClass("riz-index-move-back");
			$("#riz-index-page-login").css({"z-index":"0"});
			$("#riz-index-page-new-employee").css({"z-index":"1"});
			document.getElementById("index-forms-login").reset();
			document.getElementById("index-forms-new-employee").reset();
		});
		$(".riz-index-exit").click(function(){
			$("#riz-index").addClass("riz-index-move-back");
			$("#riz-index").removeClass("riz-index-move-left");
			$("#riz-index-content").addClass("riz-index-move-back");
			$("#riz-index-content").removeClass("riz-index-move-left");
			document.getElementById("index-forms-login").reset();
			document.getElementById("index-forms-new-employee").reset();
		});
	} 
// Mobile	
	if($(window).width() < 601){
		$("#riz-index-btn-login").click(function(){
			$("#riz-index-content").delayCss(0,"transition","opacity 1s");
			$("#riz-index-content").delayCss(0,"opacity","0");
			$("#riz-index-content").delayCss(1000,"display","none");
			$("#riz-index").addClass("riz-index-move-left");
			$("#riz-index").removeClass("riz-index-move-back");
			$("#riz-index-page-login").css({"z-index":"1"});
			$("#riz-index-page-new-employee").css({"z-index":"0"});
			document.getElementById("index-forms-login").reset();
			document.getElementById("index-forms-new-employee").reset();
		});
		$("#riz-index-btn-new-employee").click(function(){
			$("#riz-index-content").delayCss(0,"transition","opacity 1s");
			$("#riz-index-content").delayCss(0,"opacity","0");
			$("#riz-index-content").delayCss(1000,"display","none");
			$("#riz-index").addClass("riz-index-move-left");
			$("#riz-index").removeClass("riz-index-move-back");
			$("#riz-index-page-login").css({"z-index":"0"});
			$("#riz-index-page-new-employee").css({"z-index":"1"});
			document.getElementById("index-forms-login").reset();
			document.getElementById("index-forms-new-employee").reset();
		});		
		$(".riz-index-exit").click(function(){
			$("#riz-index").addClass("riz-index-move-back");
			$("#riz-index-content").delayCss(0,"display","block");
			$("#riz-index-content").delayCss(1000,"transition","opacity 1s");
			$("#riz-index-content").delayCss(1000,"opacity","1");
			$("#riz-index").removeClass("riz-index-move-left");
			document.getElementById("index-forms-login").reset();
			document.getElementById("index-forms-new-employee").reset();
		});
	}	
});
function resize(){
	document.location.reload(); // refreshes the browser
	// because the scripts above have been implemented based on the window width at first loading
	// to re-run the script, the browser must refresh

	if($(window).width() >= 601) {
		$("#riz-index").addClass("riz-index-reset");
		$("#riz-index").removeClass("riz-index-move-left");
		$("#riz-index").removeClass("riz-index-move-back");
		$("#riz-index-content").addClass("riz-index-reset");
		$("#riz-index-content").removeClass("riz-index-move-left");
		$("#riz-index-content").removeClass("riz-index-move-back");
	} 
	if($(window).width() < 601) {
		$("#riz-index").addClass("riz-index-reset");
		$("#riz-index").removeClass("riz-index-move-left");
		$("#riz-index").removeClass("riz-index-move-back");
		$("#riz-index-content").delayCss(0,"opacity","1");
		$("#riz-index-content").delayCss(0,"display","block");
		$("#riz-index-content").removeClass("riz-index-move-left");
		$("#riz-index-content").removeClass("riz-index-move-back");
	}

	document.getElementById("index-forms-login").reset();
	document.getElementById("index-forms-new-employee").reset();
}	