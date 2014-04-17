// JavaScript Document
$(document).ready(function(e) {
    $(".view").colorbox({rel:'group4'});
	$(".group4").colorbox({rel:'group4'});	
	$(".group4").hover(function()
	{
		var url = $(this).attr('href');
		$('.view').find('img').attr('src',url);
	});
});

function setlang(nn)
{
	$.ajax({  
		url: $('#url').val() + "home/setlang.html",  
		type: "POST",
		cache: false,
		data: {lang: nn}
	}).done(function(data) {location.reload();});
}