/**
 * Coin Slider - Unique jQuery Image Slider
 * @version: 1.0 - (2010/04/04)
 * @requires jQuery v1.2.2 or later 
 * @author Ivan Lazarevic
 * Examples and documentation at: http://workshop.rs/projects/coin-slider/
 
 * Licensed under MIT licence:
 *   http://www.opensource.org/licenses/mit-license.php
**/
//////////////////////////////////////////////
// Obfuscated by Javascript Obfuscator 4.2  //
// http://javascript-source.com             //
//////////////////////////////////////////////
(function ($) {var params = new Array;var order = new Array;var images = new Array;var links = new Array;var linksTarget = new Array;var titles = new Array;var interval = new Array;var imagePos = new Array;var appInterval = new Array;var squarePos = new Array;var reverse = new Array;$.fn.coinslider = $.fn.CoinSlider = function (options) {init = function (el) {order[el.id] = new Array;images[el.id] = new Array;links[el.id] = new Array;linksTarget[el.id] = new Array;titles[el.id] = new Array;imagePos[el.id] = 0;squarePos[el.id] = 0;reverse[el.id] = 1;params[el.id] = $.extend({}, $.fn.coinslider.defaults, options);$.each($("#" + el.id + " img"), function (i, item) {images[el.id][i] = $(item).attr("src");links[el.id][i] = $(item).parent().is("a") ? $(item).parent().attr("href") : "";linksTarget[el.id][i] = $(item).parent().is("a") ? $(item).parent().attr("target") : "";titles[el.id][i] = $(item).next().is("span") ? $(item).next().html() : "";$(item).hide();$(item).next().hide();});$(el).css({'background-image':"url(" + images[el.id][0] + ")", width:params[el.id].width, height:params[el.id].height, position:"relative", 'background-position':"top left"}).wrap("<div class='coin-slider' id='coin-slider-" + el.id + "' />");$("#" + el.id).append("<div class='cs-title' id='cs-title-" + el.id + "' style='position: absolute; bottom:0; left: 0; z-index: 1000;'></div>");$.setFields(el);if (params[el.id].navigation) {$.setNavigation(el);}$.transition(el, 0);$.transitionCall(el);};$.setFields = function (el) {tWidth = sWidth = parseInt(params[el.id].width / params[el.id].spw);tHeight = sHeight = parseInt(params[el.id].height / params[el.id].sph);counter = sLeft = sTop = 0;tgapx = gapx = params[el.id].width - params[el.id].spw * sWidth;tgapy = gapy = params[el.id].height - params[el.id].sph * sHeight;for (i = 1; i <= params[el.id].sph; i++) {gapx = tgapx;if (gapy > 0) {gapy--;sHeight = tHeight + 1;} else {sHeight = tHeight;}for (j = 1; j <= params[el.id].spw; j++) {if (gapx > 0) {gapx--;sWidth = tWidth + 1;} else {sWidth = tWidth;}order[el.id][counter] = i + "" + j;counter++;if (params[el.id].links) {$("#" + el.id).append("<a href='" + links[el.id][0] + "' class='cs-" + el.id + "' id='cs-" + el.id + i + j + "' style='width:" + sWidth + "px; height:" + sHeight + "px; float: left; position: absolute;'></a>");} else {$("#" + el.id).append("<div class='cs-" + el.id + "' id='cs-" + el.id + i + j + "' style='width:" + sWidth + "px; height:" + sHeight + "px; float: left; position: absolute;'></div>");}$("#cs-" + el.id + i + j).css({'background-position':- sLeft + "px " + (- sTop + "px"), left:sLeft, top:sTop});sLeft += sWidth;}sTop += sHeight;sLeft = 0;}$(".cs-" + el.id).mouseover(function () {$("#cs-navigation-" + el.id).show();});$(".cs-" + el.id).mouseout(function () {$("#cs-navigation-" + el.id).hide();});$("#cs-title-" + el.id).mouseover(function () {$("#cs-navigation-" + el.id).show();});$("#cs-title-" + el.id).mouseout(function () {$("#cs-navigation-" + el.id).hide();});if (params[el.id].hoverPause) {$(".cs-" + el.id).mouseover(function () {params[el.id].pause = true;});$(".cs-" + el.id).mouseout(function () {params[el.id].pause = false;});$("#cs-title-" + el.id).mouseover(function () {params[el.id].pause = true;});$("#cs-title-" + el.id).mouseout(function () {params[el.id].pause = false;});}};$.transitionCall = function (el) {if (params[el.id].delay < 0) {return;}clearInterval(interval[el.id]);delay = params[el.id].delay + params[el.id].spw * params[el.id].sph * params[el.id].sDelay;interval[el.id] = setInterval(function () {$.transition(el);}, delay);};$.transition = function (el, direction) {if (params[el.id].pause == true) {return;}$.effect(el);squarePos[el.id] = 0;appInterval[el.id] = setInterval(function () {$.appereance(el, order[el.id][squarePos[el.id]]);}, params[el.id].sDelay);$(el).css({'background-image':"url(" + images[el.id][imagePos[el.id]] + ")"});if (typeof direction == "undefined") {imagePos[el.id]++;} else if (direction == "prev") {imagePos[el.id]--;} else {imagePos[el.id] = direction;}if (imagePos[el.id] == images[el.id].length) {imagePos[el.id] = 0;}if (imagePos[el.id] == -1) {imagePos[el.id] = images[el.id].length - 1;}$(".cs-button-" + el.id).removeClass("cs-active");$("#cs-button-" + el.id + "-" + (imagePos[el.id] + 1)).addClass("cs-active");if (titles[el.id][imagePos[el.id]]) {$("#cs-title-" + el.id).css({opacity:0}).animate({opacity:params[el.id].opacity}, params[el.id].titleSpeed);$("#cs-title-" + el.id).html(titles[el.id][imagePos[el.id]]);} else {$("#cs-title-" + el.id).css("opacity", 0);}};$.appereance = function (el, sid) {$(".cs-" + el.id).attr("href", links[el.id][imagePos[el.id]]).attr("target", linksTarget[el.id][imagePos[el.id]]);if (squarePos[el.id] == params[el.id].spw * params[el.id].sph) {clearInterval(appInterval[el.id]);return;}$("#cs-" + el.id + sid).css({opacity:0, 'background-image':"url(" + images[el.id][imagePos[el.id]] + ")"});$("#cs-" + el.id + sid).animate({opacity:1}, 300);squarePos[el.id]++;};$.setNavigation = function (el) {$(el).append("<div id='cs-navigation-" + el.id + "'></div>");$("#cs-navigation-" + el.id).hide();$("#cs-navigation-" + el.id).append("<a href='#' id='cs-prev-" + el.id + "' class='cs-prev'>prev</a>");$("#cs-navigation-" + el.id).append("<a href='#' id='cs-next-" + el.id + "' class='cs-next'>next</a>");$("#cs-prev-" + el.id).css({position:"absolute", top:params[el.id].height / 2 - 15, left:0, 'z-index':1001, 'line-height':"30px", opacity:params[el.id].opacity}).click(function (e) {e.preventDefault();$.transition(el, "prev");$.transitionCall(el);}).mouseover(function () {$("#cs-navigation-" + el.id).show();});$("#cs-next-" + el.id).css({position:"absolute", top:params[el.id].height / 2 - 15, right:0, 'z-index':1001, 'line-height':"30px", opacity:params[el.id].opacity}).click(function (e) {e.preventDefault();$.transition(el);$.transitionCall(el);}).mouseover(function () {$("#cs-navigation-" + el.id).show();});$("<div id='cs-buttons-" + el.id + "' class='cs-buttons'></div>").appendTo($("#coin-slider-" + el.id));for (k = 1; k < images[el.id].length + 1; k++) {$("#cs-buttons-" + el.id).append("<a href='#' class='cs-button-" + el.id + "' id='cs-button-" + el.id + "-" + k + "'>" + k + "</a>");}$.each($(".cs-button-" + el.id), function (i, item) {$(item).click(function (e) {$(".cs-button-" + el.id).removeClass("cs-active");$(this).addClass("cs-active");e.preventDefault();$.transition(el, i);$.transitionCall(el);});});$("#cs-navigation-" + el.id + " a").mouseout(function () {$("#cs-navigation-" + el.id).hide();params[el.id].pause = false;});$("#cs-buttons-" + el.id).css({left:"50%", 'margin-left':- images[el.id].length * 15 / 2 - 5, position:"relative"});};$.effect = function (el) {effA = ["random", "swirl", "rain", "straight"];if (params[el.id].effect == "") {eff = effA[Math.floor(Math.random() * effA.length)];} else {eff = params[el.id].effect;}order[el.id] = new Array;if (eff == "random") {counter = 0;for (i = 1; i <= params[el.id].sph; i++) {for (j = 1; j <= params[el.id].spw; j++) {order[el.id][counter] = i + "" + j;counter++;}}$.random(order[el.id]);}if (eff == "rain") {$.rain(el);}if (eff == "swirl") {$.swirl(el);}if (eff == "straight") {$.straight(el);}reverse[el.id] *= -1;if (reverse[el.id] > 0) {order[el.id].reverse();}};$.random = function (arr) {var i = arr.length;if (i == 0) {return false;}while (--i) {var j = Math.floor(Math.random() * (i + 1));var tempi = arr[i];var tempj = arr[j];arr[i] = tempj;arr[j] = tempi;}};$.swirl = function (el) {var n = params[el.id].sph;var m = params[el.id].spw;var x = 1;var y = 1;var going = 0;var num = 0;var c = 0;var dowhile = true;while (dowhile) {num = going == 0 || going == 2 ? m : n;for (i = 1; i <= num; i++) {order[el.id][c] = x + "" + y;c++;if (i != num) {switch (going) {case 0:y++;break;case 1:x++;break;case 2:y--;break;case 3:x--;break;default:;}}}going = (going + 1) % 4;switch (going) {case 0:m--;y++;break;case 1:n--;x++;break;case 2:m--;y--;break;case 3:n--;x--;break;default:;}check = $.max(n, m) - $.min(n, m);if (m <= check && n <= check) {dowhile = false;}}};$.rain = function (el) {var n = params[el.id].sph;var m = params[el.id].spw;var c = 0;var to = to2 = from = 1;var dowhile = true;while (dowhile) {for (i = from; i <= to; i++) {order[el.id][c] = i + "" + parseInt(to2 - i + 1);c++;}to2++;if (to < n && to2 < m && n < m) {to++;}if (to < n && n >= m) {to++;}if (to2 > m) {from++;}if (from > to) {dowhile = false;}}};$.straight = function (el) {counter = 0;for (i = 1; i <= params[el.id].sph; i++) {for (j = 1; j <= params[el.id].spw; j++) {order[el.id][counter] = i + "" + j;counter++;}}};$.min = function (n, m) {if (n > m) {return m;} else {return n;}};$.max = function (n, m) {if (n < m) {return m;} else {return n;}};this.each(function () {init(this);});};$.fn.coinslider.defaults = {width:565, height:290, spw:7, sph:5, delay:3000, sDelay:30, opacity:0.7, titleSpeed:500, effect:"", navigation:true, links:true, hoverPause:true};})(jQuery);// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Last updated: 2011-06-16
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
ws_squares=function(options){var $=jQuery;var container;var $new_cont;this.init=function(aCont){$container=$(aCont);$new_cont=$("<div id=\""+$(aCont).attr("id")+"-new\"></div>");$container.append($new_cont);var As=$(aCont).find("A");var $Imgs=As.find("img");$new_cont.css({left:(options.outWidth-options.width)/2+"px",top:(options.outHeight-options.height)/2+"px",width:options.width+"px",height:options.height+"px",'background-color':"#FFF",position:"absolute"});$new_cont.append(As);$(As.get(0)).clone().css({position:"absolute",left:0,top:0}).prependTo($container);$new_cont.coinslider({hoverPause:false,navigation:0,delay:-1,width:960,height:486});};this.go=function(index){$.transition($new_cont.get(0),index);return true;};};// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Last updated: 2011-06-16
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery.fn.wowSlider=function(options){var $this=this;var $=jQuery;options=$.extend({effect:function(options){var images;this.init=function(aCont){images=aCont.find("img");images.each(function(Index){if(!Index){$(this).show();}else{$(this).hide();}});};this.go=function(new_index,curIdx){$(images.get(new_index)).fadeIn(options.duration);$(images.get(curIdx)).fadeOut(options.duration);return true;};},prev:"",next:"",duration:1000,delay:2000,outWidth:960,outHeight:360,width:960,height:360,caption:true,controls:true,autoPlay:true,bullets:true,onStep:function(){},stopOnHover:0},options);options.loop=options.loop||Number.MAX_VALUE;var $Elements=$this.find(".ws_images A");var images=$Elements.find("IMG");$Elements.each(function(index){var inner=$(this).html()||"";var pos=inner.indexOf(">",inner);if(pos>=0){$(this).data("descr",inner.substr(pos+1));if(pos<inner.length-1){$(this).html(inner.substr(0,pos+1));}}$(this).css({'font-size':0});});var elementsCount=$Elements.length;var frame=$("A.ws_frame",$this).get(0);var curIdx=0;function go(index){index=(index%elementsCount+elementsCount)%elementsCount;if(curIdx==index){return;}var current=effect.go(index,curIdx);if(!current){return;}if(typeof current!="object"){current=$Elements[index];}curIdx=index;go2(index);if(options.caption){setTitle(current);}options.onStep(curIdx);}var startX,startY,isMoving=0;var _this=$this.get(0);if(_this.addEventListener){_this.addEventListener("touchmove",function(e){if(isMoving){var dx=startX-e.touches[0].pageX;var dy=startY-e.touches[0].pageY;if(Math.abs(dx)>20||Math.abs(dy)>20){startX=startY=isMoving=0;forceGo(e,curIdx+(dx+dy>0?-1:1));}}},false);_this.addEventListener("touchstart",function(e){if(e.touches.length==1){startX=e.touches[0].pageX;startY=e.touches[0].pageY;isMoving=1;}else{isMoving=0;}},false);_this.addEventListener("touchend",function(e){isMoving=0;},false);}function go2(index){if(options.bullets){setBullet(index);}if(frame){frame.setAttribute("href",$Elements.get(index).href);frame.setAttribute("target",$Elements.get(index).target);}}var autoPlayTimer;function restartPlay(){stopPlay();if(options.autoPlay){autoPlayTimer=setTimeout(function(){go(curIdx<elementsCount-1?curIdx+1:0);if(!curIdx&&!--options.loop){options.autoPlay=0;}restartPlay();},options.delay+options.duration);}}function stopPlay(){if(autoPlayTimer){clearTimeout(autoPlayTimer);}autoPlayTimer=null;}function forceGo(event,index){stopPlay();event.preventDefault();go(index);restartPlay();}$Elements.find("IMG").css("position","absolute");if(typeof options.effect=="string"){options.effect=window["ws_"+options.effect];}var effect=new options.effect(options,images);effect.init($(".ws_images",$this));$Elements.find("IMG").css("visibility","visible");var ic=c=$(".ws_images",$this);var t="";c=t?$("<div></div>"):0;if(c){c.css({position:"absolute",right:"2px",bottom:"2px",padding:"0 0 0 0"});ic.append(c);}if(c&&document.all){var f=$("<iframe src=\"javascript:false\"></iframe>");f.css({position:"absolute",left:0,top:0,width:"100%",height:"100%",filter:"alpha(opacity=0)"});f.attr({scrolling:"no",framespacing:0,border:0,frameBorder:"no"});c.append(f);}var d=c?$(document.createElement("A")):c;if(d){d.css({position:"relative",display:"block",'background-color':"#E4EFEB",color:"#837F80",'font-family':"Lucida Grande,sans-serif",'font-size':"11px",'font-weight':"normal",'font-style':"normal",'-moz-border-radius':"5px",'border-radius':"5px",padding:"1px 5px",width:"auto",height:"auto",margin:"0 0 0 0",outline:"none"});d.attr({href:"ht"+"tp://"+t.toLowerCase()});d.html(t);d.bind("contextmenu",function(eventObject){return false;});c.append(d);}if(options.controls){var $next_photo=$("<a href=\"#\" class=\"ws_next\">"+options.next+"</a>");var $prev_photo=$("<a href=\"#\" class=\"ws_prev\">"+options.prev+"</a>");$this.append($next_photo);$this.append($prev_photo);$next_photo.bind("click",function(e){forceGo(e,curIdx+1);});$prev_photo.bind("click",function(e){forceGo(e,curIdx-1);});}function initBullets(){var $bullets_cont=$this.find(".ws_bullets>div");var $bullets=$("a",$bullets_cont);$bullets.click(function(e){forceGo(e,$(e.target).index());});var $thumbs=$bullets.find("IMG");if($thumbs.length){var mainFrame=$("<div class=\"ws_bulframe\"/>").appendTo($bullets_cont);var imgContainer=$("<div/>").css({width:$thumbs.length+1+"00%"}).appendTo($("<div/>").appendTo(mainFrame));$thumbs.appendTo(imgContainer);$("<span/>").appendTo(mainFrame);var curIndex=-1;function moveTooltip(index){if(index<0){index=0;}$($bullets.get(curIndex)).removeClass("ws_overbull");$($bullets.get(index)).addClass("ws_overbull");mainFrame.show();var mainCSS={left:$bullets.get(index).offsetLeft-mainFrame.width()/2};var contCSS={left:-$thumbs.get(index).offsetLeft};if(curIndex<0){mainFrame.css(mainCSS);imgContainer.css(contCSS);}else{if(!document.all){mainCSS.opacity=1;}mainFrame.stop().animate(mainCSS,"fast");imgContainer.stop().animate(contCSS,"fast");}curIndex=index;}$bullets.hover(function(){moveTooltip($(this).index());});var hideTime;$bullets_cont.hover(function(){if(hideTime){clearTimeout(hideTime);hideTime=0;}moveTooltip(curIndex);},function(){$bullets.removeClass("ws_overbull");if(document.all){if(!hideTime){hideTime=setTimeout(function(){mainFrame.hide();hideTime=0;},400);}}else{mainFrame.stop().animate({opacity:0},{duration:"fast",complete:function(){mainFrame.hide();}});}});$bullets_cont.click(function(e){forceGo(e,$(e.target).index());});}}function setBullet(new_index){$(".ws_bullets A",$this).each(function(index){if(index==new_index){$(this).addClass("ws_selbull");}else{$(this).removeClass("ws_selbull");}});}if(options.caption){$caption=$("<div class='ws-title' style='display:none'></div>");$this.append($caption);$caption.bind("mouseover",function(e){stopPlay();});$caption.bind("mouseout",function(e){restartPlay();});}function setTitle(A){var title=$("img",A).attr("title");var descr=$(A).data("descr");var $Title=$(".ws-title",$this);$Title.hide();if(title||descr){$Title.html((title?"<span>"+title+"</span>":"")+(descr?"<div>"+descr+"</div>":""));showWithSlide($Title,{direction:"left",easing:"easeInOutExpo",complete:function(){if($.browser.msie){$Title.get(0).style.removeAttribute("filter");}},duration:1000});}}if(options.bullets){initBullets();}go2(0);if(options.caption){setTitle($Elements[0]);}if(options.stopOnHover){this.bind("mouseover",function(e){stopPlay();});this.bind("mouseout",function(e){restartPlay();});}restartPlay();function showWithSlide(element,options){var $=jQuery;element.stop(true,true);var bkp_prop={};var props=["position","top","bottom","left","right"];for(var i=0;i<props.length;i++){bkp_prop[props[i]]=element[0].style[props[i]];}element.show();var wrap_props={width:element.outerWidth(true),height:element.outerHeight(true),'float':element.css("float"),overflow:"hidden",opacity:0},wrapper=$("<div></div>").css({fontSize:"100%",background:"transparent",border:"none",margin:0,padding:0});element.wrap(wrapper);wrapper=element.parent();if(element.css("position")=="static"){wrapper.css({position:"relative"});element.css({position:"relative"});}else{$.extend(wrap_props,{position:element.css("position"),zIndex:element.css("z-index")});$.each(["top","left","bottom","right"],function(i,pos){wrap_props[pos]=element.css(pos);if(isNaN(parseInt(wrap_props[pos],10))){wrap_props[pos]="auto";}});element.css({position:"relative",top:0,left:0,right:"auto",bottom:"auto"});}wrapper.css(wrap_props).show();var direction=options.direction||"left";var ref=direction=="up"||direction=="down"?"top":"left";var motion=direction=="up"||direction=="left"?"pos":"neg";var distance=options.distance||(ref=="top"?element.outerHeight({margin:true}):element.outerWidth({margin:true}));element.css(ref,motion=="pos"?isNaN(distance)?"-"+distance:-distance:distance);var animation={};animation[ref]=(motion=="pos"?"+=":"-=")+distance;wrapper.animate({opacity:1},{duration:options.duration,easing:options.easing});element.animate(animation,{queue:false,duration:options.duration,easing:options.easing,complete:function(){for(var p in bkp_prop){element[0].style[p]=bkp_prop[p];}element.parent().replaceWith(element);if(options.complete){options.complete();}}});}return this;};jQuery.extend(jQuery.easing,{easeInOutExpo:function(x,t,b,c,d){if(t==0){return b;}if(t==d){return b+c;}if((t/=d/2)<1){return c/2*Math.pow(2,10*(t-1))+b;}return c/2*(-Math.pow(2,-10*--t)+2)+b;}});// -----------------------------------------------------------------------------------
// http://wowslider.com/
// JavaScript Wow Slider is a free software that helps you easily generate delicious 
// slideshows with gorgeous transition effects, in a few clicks without writing a single line of code.
// Last updated: 2011-06-16
//
//***********************************************
// Obfuscated by Javascript Obfuscator
// http://javascript-source.com
//***********************************************
jQuery("#wowslider-container1").wowSlider({effect:"squares",prev:"",next:"",duration:10*100,delay:30*100,outWidth:960,outHeight:486,width:960,height:486,autoPlay:true,stopOnHover:false,loop:false,bullets:true,caption:true,controls:true});