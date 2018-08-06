// JavaScript Document
$(document ).ready(function () {
	$(".nav-btn").click(function ()
	{  $( ".navin" ).toggleClass("nav");


	$(".nav-btn").click(function ()
	{  $( ".navin li" ).animate(
	{opacity: 1 },

	 500);
		}) ;

	 })	;

	$(".slide").click (function (e) {
		e.preventDefault();
		var linked = $(this).attr("href");
		$("html, body").animate({
		scrollTop:$(linked).offset().top}, 1200, );

});

	});



  // do your stuff
$(function () {

    var documentEl=$(document),
        fadeElem= $(".fadeout");
    documentEl.on ('scroll', function () {
        var curScrol = documentEl.scrollTop();
        fadeElem.each (function () {

            var $this=$(this),
                elemoffsettop=$this.offset().top;
            if (curScrol>elemoffsettop) {

                $this.css("opacity", 1-(curScrol-elemoffsettop)/400)
            }

        })
    })

})

$(document).ready ( function () {

	$('.hey').magnificPopup({type:'image'});

});
