import "@theme/front/init.scss";

import "bootstrap/js/dist/dropdown";
import "bootstrap/js/dist/collapse";
import "bootstrap/js/dist/collapse";
import "bootstrap/js/dist/tab";

// import "@/front/cookie";

import Nette from "@/front/netteForms";
Nette.initOnLoad();
window.Nette = Nette;

document.addEventListener("DOMContentLoaded", () => {

});

// lazy-load google map
const $googleMap = $('#google-map');
let mapInitialized = false;

window.addEventListener('scroll', function (e) {

	if (window.scrollY > window.innerHeight && !mapInitialized) {
		$googleMap.attr('src', $googleMap.data('src'));
		mapInitialized = true;
	}
});

var $nav = $("nav");
var $navopen = $("#navbarText");
// add navigation background on scroll/mobile
$(document).scroll(function () {
	if (!$navopen.hasClass("show")) {
		$nav.toggleClass('navbar-light-bg', $(this).scrollTop() > $nav.height());
	}
});

// set navbar background when opened on top
$('.navbar-toggler').click(function(){
	if (window.scrollY <= $nav.height()) {
		($nav.hasClass('navbar-light-bg')) ? $nav.removeClass('navbar-light-bg') : $nav.addClass('navbar-light-bg');
	}
});

$(document).ready(function(){
	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
	});
});

var $nav = $("nav");
// make navbar smaller on scroll
$(document).scroll(function () {
	$nav.toggleClass('shrink', $(this).scrollTop() > $nav.height());
});

// close navbar on link click
$('#nav .scroll').click(function(){
	$(".navbar-collapse").collapse('hide');
});
