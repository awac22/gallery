'use strict';

// mobile menu js
$(".navbar-collapse>ul>li>a, .navbar-collapse ul.sub-menu>li>a").on("click", function() {
  const element = $(this).parent("li");
  if (element.hasClass("open")) {
    element.removeClass("open");
    element.find("li").removeClass("open");
  }
  else {
    element.addClass("open");
    element.siblings("li").removeClass("open");
    element.siblings("li").find("li").removeClass("open");
  }
});

let img=$('.bg_img');
img.css('background-image', function () {
	let bg = ('url(' + $(this).data('background') + ')');
	return bg;
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

	$('.niceSelect').niceSelect();
	
	// lightcase plugin init
	$('a[data-rel^=lightcase]').lightcase();


//preloader js code
$(".preloader").delay(300).animate({
	"opacity" : "0"
	}, 300, function() {
	$(".preloader").css("display","none");
});


$(".header-serch-btn").on('click', function(){
  //$(".header-top-search-area").toggleClass("open");
  if ($(this).hasClass('toggle-close')) {
      $(this).removeClass('toggle-close').addClass('toggle-open');
      $('.header-top-search-area').addClass('open');
  }
  else {
      $(this).removeClass('toggle-open').addClass('toggle-close');
      $('.header-top-search-area').removeClass('open');
  }
});

//close when click off of container
$(document).on('click touchstart', function (e){
  if (!$(e.target).is('.header-serch-btn, .header-serch-btn *, .header-top-search-area, .header-top-search-area *')) {
    $('.header-top-search-area').removeClass('open');
    $('.header-serch-btn').addClass('toggle-close');
  }
});

$('#hero-search-field').focus(function(){
  $(this).parent().find(".label-txt").addClass('label-active');
});

$("#hero-search-field").focusout(function(){
  if ($(this).val() == '') {
    $(this).parent().find(".label-txt").removeClass('label-active');
  };
});

$('#commentOpenBtn').on('click', function(){
  $('#photo-comment-sidebar').addClass('active');
});
$('#commentCloseBtn').on('click', function(){
  $('#photo-comment-sidebar').removeClass('active');
});

$('.close__sidenav').on('click', function(){
  $('.author-widget').removeClass('active');
})
$('.dashboard__toggler').on('click', function(){
  $('.author-widget').toggleClass('active');
})


// category-slider 
$('.category-slider').slick({
  slidesToShow: 6,
	slidesToScroll: 1,
  speed: 700,
	dots: false,
  arrows: true,
  autoplay:true,
	prevArrow: '<div class="prev"><i class="las la-long-arrow-alt-left"></i></div>',
  nextArrow: '<div class="next"><i class="las la-long-arrow-alt-right"></i></div>',
	responsive: [
		{
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
      }
    },
    {
      breakpoint: 992,
      settings: {
				slidesToShow: 4,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 320,
      settings: {
        slidesToShow: 2,
      }
    }
  ]
});


// related-photo-slider 
$('.related-photo-slider').slick({
  slidesToShow: 3,
	slidesToScroll: 1,
	dots: false,
  arrows: true,
	prevArrow: '<div class="prev"><i class="las la-long-arrow-alt-left"></i></div>',
  nextArrow: '<div class="next"><i class="las la-long-arrow-alt-right"></i></div>',
	responsive: [
		{
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
      }
    },
    {
      breakpoint: 992,
      settings: {
				slidesToShow: 4,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 320,
      settings: {
        slidesToShow: 2,
      }
    }
  ]
});


$('.testimonial-slider').slick({
  slidesToShow: 1,
	slidesToScroll: 1,
  speed: 700,
	dots: false,
  arrows: true,
	prevArrow: '<div class="prev"><i class="las la-angle-left"></i></div>',
  nextArrow: '<div class="next"><i class="las la-angle-right"></i></div>',
});

$('.faq-wrapper .faq-title').on('click', function (e) {
  var element = $(this).parent('.faq-item');
  if (element.hasClass('open')) {
    element.removeClass('open');
    element.find('.faq-content').removeClass('open');
    element.find('.faq-content').slideUp(200, "swing");
  } else {
    element.addClass('open');
    element.children('.faq-content').slideDown(200, "swing");
    element.siblings('.faq-item').children('.faq-content').slideUp(200, "swing");
    element.siblings('.faq-item').removeClass('open');
    element.siblings('.faq-item').find('.faq-title').removeClass('open');
    element.siblings('.faq-item').find('.faq-content').slideUp(200, "swing");
  }
});
