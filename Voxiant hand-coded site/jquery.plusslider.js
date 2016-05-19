(function($) {
$.plusSlider = function(el, options) {
var base = this;
base.$el = $(el);
base.el = el;
base.$el.data('plusSlider', base);
base.init = function () {
base.options = $.extend({}, $.plusSlider.defaults, options);
base.$el.addClass('plusslider-container').wrap('<div class="plusslider ' + base.$el.attr('id') + '" />');
base.$wrap= base.$el.parent();
base.$slides= base.$el.children();
base.$wrapContainer = base.$wrap.parent();
base.slideCount = base.$slides.length;
base.slideIndexCount= base.slideCount - 1;
base.sliderWidth= 0;
base.animating= false;
base.wrapContainerWidth = base.$wrapContainer.width();
base.wrapContainerHeight= base.$wrapContainer.height();
base.currentSlideIndex= base.options.defaultSlide;
base.$currentSlide= base.$slides.eq(base.currentSlideIndex);
base.currentSlideWidth= base.$currentSlide.outerWidth();
base.currentSlideHeight = base.$currentSlide.outerHeight();
base.calculateSliderWidth = function() {
for (var i = 0; i < base.slideCount; i++) {
if (i == 0) base.sliderWidth = 0;
base.sliderWidth += base.$slides.eq(i).outerWidth();
};
};
base.beginTimer = function() {
base.timer = window.setInterval(function () {
base.toSlide('next');
}, base.options.displayTime);
};
base.clearTimer = function() {
if (base.timer) {
window.clearInterval(base.timer);
};
};
base.setSliderDimensions= function() {
base.calculateSliderWidth();
base.currentSlideWidth= base.$currentSlide.outerWidth();
base.currentSlideHeight = base.$currentSlide.outerHeight();
if (base.options.fullWidth) {
base.sliderWidth= base.wrapContainerWidth * base.slideCount;
base.wrapContainerWidth = base.$wrapContainer.width();
base.$slides.width(base.wrapContainerWidth);
base.calculateSliderWidth();
base.$wrap.width(base.wrapContainerWidth).height(base.currentSlideHeight);
base.$el.width(base.sliderWidth).css('left', base.$currentSlide.position().left * -1 + 'px');
} else if (base.options.sliderType == 'slider') {
base.$wrap.width(base.currentSlideWidth);
base.$wrap.height(base.currentSlideHeight);
}}; 
base.toSlide= function(slide) {
if (base.animating == false) {
base.animating = true;
if (slide === 'next' || slide === '') {
base.currentSlideIndex += 1;
} else if (slide === 'prev') {
base.currentSlideIndex -= 1;
} else {
base.currentSlideIndex = parseInt(slide);
}
if ((base.options.disableLoop == 'first' || base.options.disableLoop == 'both' && base.currentSlideIndex < 0) || (base.options.disableLoop == 'last' || base.options.disableLoop == 'both' && base.currentSlideIndex > base.slideIndexCount)) {
return;
}
if (base.currentSlideIndex > base.slideIndexCount) {
base.currentSlideIndex = 0;
} else if (base.currentSlideIndex < 0) {
base.currentSlideIndex = base.slideIndexCount;
};
base.$currentSlide= base.$slides.eq(base.currentSlideIndex);
base.currentSlideWidth= base.$currentSlide.width();
base.currentSlideHeight = base.$currentSlide.height();
if (base.options.onSlide && typeof(base.options.onSlide) == 'function') base.options.onSlide(base);
if (base.options.sliderType == 'slider') {
if (base.options.createPagination) {
base.$sliderControls.find('li').removeClass('current').eq(base.currentSlideIndex).addClass('current');
};
base.$el.animate({
height: base.$currentSlide.outerHeight(),
left: base.$currentSlide.position().left * -1 + 'px'
}, base.options.speed, base.options.sliderEasing, function() {

base.animating = false;
if (base.options.afterSlide && typeof(base.options.afterSlide) == 'function') base.options.afterSlide(base);
if (base.options.onSlideEnd && typeof(base.options.onSlideEnd) == 'function' && base.currentSlideIndex == base.slideIndexCount) base.options.onSlideEnd(base);
});
base.$wrap.animate({
height: base.$currentSlide.outerHeight(),
width: base.$currentSlide.outerWidth()
}, base.options.speed, base.options.sliderEasing);
base.$slides.removeClass('current').eq(base.currentSlideIndex).addClass('current');
} else {
if (base.options.createPagination) {
base.$sliderControls.find('li').removeClass('current').eq(base.currentSlideIndex).addClass('current');
};
base.$slides.removeClass('current').eq(base.currentSlideIndex).addClass('current').fadeIn(base.options.speed, function() {
base.$slides.not('.current').hide();
base.animating = false;
if (base.options.afterSlide && typeof(base.options.afterSlide) == 'function') base.options.afterSlide(base);
if (base.options.onSlideEnd && typeof(base.options.onSlideEnd) == 'function' && base.currentSlideIndex == base.slideIndexCount) base.options.onSlideEnd(base);
});
};
};
if (base.options.autoPlay) {
base.clearTimer();
base.beginTimer();
};
};
if (base.slideCount === 1) {
base.options.autoPlay = false;
base.options.createArrows = false;
base.options.createPagination = false;
};
if (base.options.sliderType == 'fader') base.options.fullWidth = false;
base.$slides.addClass('child').eq(base.currentSlideIndex).addClass('current');
base.setSliderDimensions();
if (base.options.width) base.$wrap.width(base.options.width);
if (base.options.height) base.$wrap.height(base.options.height);
base.currentSlideWidth= base.$currentSlide.outerWidth();
base.currentSlideHeight = base.$currentSlide.outerHeight();
if (base.options.sliderType == 'slider') {
base.calculateSliderWidth();
base.$wrap.addClass('plustype-slider').find(base.$el).width(base.sliderWidth);
if (base.options.fullWidth) {
base.setSliderDimensions();
$(window).resize(function () {
base.clearTimer();
base.beginTimer();
base.setSliderDimensions();
});
};
base.$slides.show();
base.$el.css('left', base.$currentSlide.position().left * -1 + 'px');
} else {
base.$wrap.addClass('plustype-fader');
base.$slides.eq(0).show();
};
if (base.options.createPagination) {
base.$sliderControls = $('<ul />', {
'class': 'plusslider-pagination'
});
switch (base.options.paginationPosition) {
case 'before':
base.$sliderControls.insertBefore(base.$wrap);
break;
case 'prepend':
base.$sliderControls.prependTo(base.$wrap);
break;
case 'after':
base.$sliderControls.insertAfter(base.$wrap);
break;
default: 
base.$sliderControls.appendTo(base.$wrap);
break;
}base.$sliderControls.wrap('<div class="plusslider-pagination-wrapper" />');
for (var i = 0; i < base.slideCount; i++) {
$('<li />', {
'data-index': i,
text: base.options.paginationTitle ? base.$slides.eq(i).attr('data-title') : i + 1
}).appendTo(base.$sliderControls);
};
if (base.options.paginationWidth) base.$sliderControls.width(base.$sliderControls.find('li').outerWidth(true) * base.slideCount);
base.$sliderControls.find('li').click(function() {
var controlIndex = $(this).index();
base.toSlide(controlIndex);
}).eq(base.currentSlideIndex).addClass('current');
};
if (base.options.createArrows) {
base.$arrows = $('<ul />', {
'class': 'plusslider-arrows'
});
switch (base.options.arrowsPosition) {
case 'before':
base.$arrows.insertBefore(base.$wrap);
break;
case 'append':
base.$arrows.appendTo(base.$wrap);
break;
case 'after':
base.$arrows.insertAfter(base.$wrap);
break;
default:
base.$arrows.prependTo(base.$wrap);
break;
}base.$arrows.wrap('<div class="plusslider-arrows-wrapper" />');
$('<li />', {
'class': 'next',
text: base.options.nextText
}).prependTo(base.$arrows);
$('<li />', {
'class': 'prev',
text: base.options.prevText
}).prependTo(base.$arrows);
base.$wrap.hover(
	function(){
	$(this).find('.next,.prev').hide().stop('true','true').fadeIn();
	},
	function(){
	$(this).find('.next,.prev').hide();
	}
);
base.$arrows.find('.next').click(function() {
base.toSlide('next');
}); 
base.$arrows.find('.prev').click(function() {
base.toSlide('prev');
}); 
}; 
if (base.options.autoPlay) {
base.beginTimer();
if (base.options.pauseOnHover) {
base.$el.hover(function () {
base.clearTimer();
}, function() {
base.beginTimer();
});
};
};
if (base.options.keyboardNavigation) {
base.$el.click(function () {
$('#pslider').removeClass('plusslider-container');
$(this).addClass('plusslider-container');
});
$(window).keyup(function (e) {
if (base.$el.is('.plusslider-container')) {
if (e.keyCode == 39) {
base.toSlide('next');
} else if (e.keyCode == 37) {
base.toSlide('prev');
};
};
});
};
if(base.options.paginationThumbnails){
if($.browser.msie ? $.browser.version >= 9 : true == true){
for(i = 0; i < base.$slides.length; i++){
var $this = base.$slides.eq(i);
if(!$this.attr('id')){
$this.attr('id', 'plusSlider-slide-' + $this.index());
}
}
base.$el.after(
$('<div />').addClass('plusSlider-thumbnails')
);
var sliderThumbnail = base.$el.next('.plusSlider-thumbnails');
base.$slides.clone().removeAttr('style').appendTo(sliderThumbnail);
base.$sliderControls.children().hover(function(){
sliderThumbnail.addClass('plusSlider-active').children().hide().eq($(this).index()).fadeIn(300);
}, function(){
sliderThumbnail.removeClass('plusSlider-active').children().fadeOut(300);
});
};
};
if (base.options.onInit && typeof(base.options.onInit) == 'function') base.options.onInit(base);
};
base.init();
};
$.plusSlider.defaults = {
sliderType: 'slider',
disableLoop : false,
fullWidth : false, 
width : null,
height: null,
defaultSlide: 0,
displayTime : 4000,
sliderEasing: 'linear',
speed : 500,
autoPlay: true,
keyboardNavigation: true,
pauseOnHover: true,
createArrows: true,
arrowsPosition: 'prepend',
nextText: 'Next',
prevText: 'Previous',
createPagination: true,
paginationPosition: 'append',
paginationWidth : false,
paginationTitle : false,
paginationThumbnails: true,
onInit: null,
onSlide : null,
afterSlide: null,
onSlideEnd: null
};
$.fn.plusSlider = function(options) {
return this.each(function () {
(new $.plusSlider(this, options));
});
};
})(jQuery);