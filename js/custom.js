// JavaScript Document

// cufon font replacement class/id
Cufon.replace('h1,h2,h3,h4,h5,#header_top p,.button_1 a,.sub_header a,form.contact_form label,form#loginform label',{textShadow: '0px 1px 0px #ffffff'});   
Cufon.replace('#footer h4');    
  
$(document).ready(function(){

//Nivo slider
$('#slider').nivoSlider({
        effect:'random', // Specify sets like: 'fold,fade,sliceDown' or choose 'random' for mixed effects
        slices:15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed:500, // Slide transition speed
        pauseTime:5000, // How long each slide will show
		pauseOnHover:true,
       directionNav:true, // Next & Prev navigation
        directionNavHide:true, // Only show on hover
        controlNav:false // 1,2,3... navigation
	
});




//Contact form
$(function() {
		var v = $("#form").validate({
			submitHandler: function(form) {
				$(form).ajaxSubmit({
					target: "#result",
					clearForm: true
				});
			}
		});
		
});	
$('#form #message').val('');
$('#form #email').val('');

//Fancybox for feature image / gallery
$("a[rel=next]").fancybox({
		'opacity'		: true,
		'overlayShow'	       : true,
		'overlayColor': '#000000',
		'overlayOpacity'     : 0.9,
		'titleShow':true,
		'transitionIn'	: 'elastic',
		'transitionOut'	: 'elastic'
});

//On Hover Event for gallery / feature image
$('ul.features li img').hover(function(){
			$(this).animate({opacity: 0.6}, 300);
		}, function () {
			$(this).animate({opacity: 1}, 300);
});

//Slideshow for testimonial
$('.testimonial').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, scrollLeft etc... 
   		speed: 1000,
		timeout: 4000,  // milliseconds between slide transitions (0 to disable auto advance)
		cleartypeNoBg:   true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
		pause:  1
});

}); // close document.ready

<!--
	getTwitters('twitter', {
        id: 'envato', 
        count: 2, 
        enableLinks: true, 
        ignoreReplies: false,
        template: '<span class="twitterPrefix" style=" padding-bottom: 10px;"><span class="twitterStatus">%text%</span> <span class="username"><a href="http://twitter.com/%user_screen_name%"><br/></span>',
        newwindow: true
});
-->