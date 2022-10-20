$(function(){

	$("#nav-side li").click(function(){
		$('#nav-side li').removeClass('active');
		$(this).addClass('active');
	});
});