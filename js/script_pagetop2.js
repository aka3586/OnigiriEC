$(function(){
		
		$("a[href=#]").click(function(){
			return false;
		});

	
	$("#topBtn").hide();
	
	$(window).scroll(fadeInOut);
	
	function fadeInOut(){
		
		if($(window).scrollTop() > 50){
			$("#topBtn").fadeIn(800);
		}else{
			$("#topBtn").stop().fadeOut(800);
		};
		return false;
		
	}
	
	
	$("#topBtn").click(toPageTop);
	
	function toPageTop(){
		$("html,body").animate({scrollTop:0},800);
}
});
