            // option (1 - ON (TRUE), 0 - OFF (FALSE))
            var autoSlide = 1;
            var hoverPause = 1;
            
            // speed of autoSlide
            var autoSlide_seconds = 4000; // Variable in milliseconds, not seconds
            
            /* move the last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.*/
            $('#carouselList li:first').before($('#carouselList li:last'));
            
            // check if auto sliding is enabled
            if(autoSlide ==1){
                /* set the interval(loop) to call the function slide with option 'right'
                  and set the interval time to the variable declared above */
                var timer = setInterval('slide("right")', autoSlide_seconds);
                
                /* change the value of our hidden field that holds info about the interval, setting it to the number of milliseconds declared above */
                $('#hidden_auto_slide_seconds').val(autoSlide_seconds);
            }
            
            // check if hoverPause is enabled
            if(hoverPause ==1){
                // when hovered over the list
                $('#carouselList').hover(function(){
                    // stop the interval
                    clearInterval(timer);
                }, function(){
                    // and when mouseout start it again
                    timer = setInterval('slide("right")', autoSlide_seconds);
                });
            }
		// Funcitons below
        
		
		
        // slide function
        function slide(where){
            // get the item width
            var itemWidth = $('#carouselList li').outerWidth() + 10;
            
            /* using a if statement and the where variable check we will check where the user wants to slide (left or right) */
            if(where == 'left'){
                // calculating the new left intdent of the unordered list (ul) for the left sliding
                var leftIndent = parseInt($('#carouselList').css('left')) + itemWidth;
            } else{
                // calculating the new left intdent of the unordered list (ul) for the right sliding
                var leftIndent = parseInt($('#carouselList').css('left')) - itemWidth;
            }
            
            // make the sliding effect using jQuery's animate function
            $('#carouselList:not(:animated)').animate({'left' : leftIndent}, 500, function(){
                /* when the animation finished use the if statement again, and make an illusision of infinity by chaning place of the last or first item */
                if(where == 'left'){
                    // and if it slided to left we put the last item before the first item
                    $('#carouselList li:first').before($('#carouselList li:last'));
                } else{
                    // and if it slided to right we put the first item after the last item
                    $('#carouselList li:last').after($('#carouselList li:first'));
                }
                
                // and then just get back the default left indent
                $('#carouselList').css({'left' : '-160px'});
            });
        }