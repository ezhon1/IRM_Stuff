$(document).ready(function(){
	$("#bigger").click(function(){
		$("h4").css("font-size", "20px");
		$("ul").css("font-size", "18px");
		$("p").css("font-size", "18px");
	});
	
	$("#smaller").click(function(){
		$("h4").css("font-size", "16px");
		$("ul").css("font-size", "16px");
		$("#para").css("font-size", "16px");
		$("#footnote").css("font-size", "14px");
	});
	
	$("#footnote").on({
		mouseenter: function(){ 
			$(this).css({"background-color":"yellow", "font-size":"larger"});
		},
		mouseleave: function(){
			$(this).css({"background-color":"white", "font-size":"smaller"}); 
		},
	});
});