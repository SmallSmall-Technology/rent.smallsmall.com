// duration of scroll animation
var scrollDuration = 300;
// paddles
var leftPaddle = document.getElementsByClassName('left-but');
var rightPaddle = document.getElementsByClassName('right-but');
// get items dimensions
var itemsLength = $('.home-prop-item').length;
var itemSize = $('.home-prop-item').outerWidth(true);
// get some relevant size for the paddle triggering point
var paddleMargin = 20;

// get wrapper width
var getMenuWrapperSize = function() {
	return $('.homeProps').outerWidth();
}
var menuWrapperSize = getMenuWrapperSize();
// the wrapper is responsive
$(window).on('resize', function() {
	menuWrapperSize = getMenuWrapperSize();
});
// size of the visible part of the menu is equal as the wrapper size 
var menuVisibleSize = menuWrapperSize;

// get total width of all menu items
var getMenuSize = function() {
	return itemsLength * itemSize;
};
var menuSize = getMenuSize();
// get how much of menu is invisible
var menuInvisibleSize = menuSize - menuWrapperSize; 

// get how much have we scrolled to the left
var getMenuPosition = function() {
	return $('.prop-holder').scrollLeft();
};

// finally, what happens when we are actually scrolling the menu
$('.prop-holder').on('scroll', function() {

	// get how much of menu is invisible
	menuInvisibleSize = menuSize - menuWrapperSize;
	// get how much have we scrolled so far
	var menuPosition = getMenuPosition();

	var menuEndOffset = menuInvisibleSize - paddleMargin;

	// show & hide the paddles 
	// depending on scroll position
	if (menuPosition <= paddleMargin) {
		$(leftPaddle).addClass('hidden');
		$(rightPaddle).removeClass('hidden');
	} else if (menuPosition < menuEndOffset) {
		// show both paddles in the middle
		$(leftPaddle).removeClass('hidden');
		$(rightPaddle).removeClass('hidden');
	} else if (menuPosition >= menuEndOffset) {
		$(leftPaddle).removeClass('hidden');
		$(rightPaddle).addClass('hidden');
}



});

// scroll to left
$(rightPaddle).on('click', function() {
	$('.prop-holder').animate( { scrollLeft: menuInvisibleSize}, scrollDuration);
});

// scroll to right
$(leftPaddle).on('click', function() {
	$('.prop-holder').animate( { scrollLeft: '0' }, scrollDuration);
});
/*$(function() {
		"use strict";
       var print = function(msg) {
		   
         alert(msg);
		   
       };

       var setInvisible = function(elem) {
		   
         elem.css('visibility', 'hidden');
		   
       };
       var setVisible = function(elem) {
		   
         elem.css('visibility', 'visible');
		   
       };

       var elem = $("#studio-container");
       var items = elem.children();
	
		//console.log(items);

       // Inserting Buttons
       //elem.prepend('<div id="right-button" style="visibility: hidden;"><a href="#"><</a></div>');
       //elem.append('  <div id="left-button"><a href="#">></a></div>');

       // Inserting Inner
       items.wrapAll('<div id="inner" />');

       // Inserting Outer
       //debugger;
       elem.find('#inner').wrap('<div id="outer"/>');

       var outer = $('#outer');

       var updateUI = function() {
         var maxWidth = outer.outerWidth(true);
         var actualWidth = 0;
         $.each($('#inner >'), function(i, item) {
           actualWidth += $(item).outerWidth(true);
         });

         if (actualWidth <= maxWidth) {
           setVisible($('#left-button'));
         }
       };
       updateUI();



       $('#right-button').click(function() {
         var leftPos = outer.scrollLeft();
         outer.animate({
           scrollLeft: leftPos - 200
         }, 800, function() {
           debugger;
           if ($('#outer').scrollLeft() <= 0) {
             setInvisible($('#right-button'));
           }
         });
       });

       $('#left-button').click(function() {
         setVisible($('#right-button'));
         var leftPos = outer.scrollLeft();
         outer.animate({
           scrollLeft: leftPos + 200
         }, 800);
       });

       $(window).resize(function() {
         updateUI();
       });
     });

*/