$('.imgModal').click(function(event) {
        $('#property_details_images').remove();
        
        $('#image_body').html('<div id="property_details_images" class="" style="height:480px!important; width:535px!important;padding-left:4%;">'+
            '<div id="image_gallery" u="slides" style="cursor: move; position: absolute; width: 495px; height: 356px; overflow: hidden;">'+
                                '</div>'+
                    '<span id="first_span" u="arrowleft" class="jssora05l" style="width: 40px; height: 40px; top: 185px; left: 25px;">'+
                    '</span>'+
                    '<span u="arrowright" class="jssora05r" style="width: 40px; height: 40px; top: 185px; right: 25px">'+
                    '</span>'+
                    '<div u="thumbnavigator" class="jssort01" style="overflow: hidden; position: absolute; width: 495px; height: 100px; left:20px; bottom: 0px;">'+
                        '<div id="slides" u="slides" style="cursor: move;">'+
                            '<div u="prototype" class="p" style="position: absolute; width: 72px; height: 72px; top: 0; left: 0;">'+
                                '<div class=w><div u="thumbnailtemplate" style=" width: 100%; height: 100%; border: none;position:absolute; top: 0; left: 0;"></div></div>'+
                                '<div class=c>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                    '</div>');
        var propertyId = $(this).attr('id');
        var html_output ='';
        var image_count = 0;
        var flag = 1;
        var url = $('#base_url').val();
        $("#img"+propertyId+" .imagesList li").each(function(){
            html_output += '<div><img u="image" src="'+$(this).find('img').attr('src')+'"/>';
            html_output += '<img u="thumb" src="'+$(this).find('img').attr('src')+'"/>';
            html_output += '</div>'
        });
        $("#image_gallery").html(html_output);
        var _SlideshowTransitions = [
                {$Duration: 1200, x: 0.3, $During: { $Left: [0.3, 0.7] }, $Easing: { $Left: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear }, $Opacity: 2 }
                ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlayInterval: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 1,                                //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)
                $ArrowKeyNavigation: true,                          //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 800,                                //Specifies default duration (swipe) for slide in milliseconds

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $ArrowNavigatorOptions: {                       //[Optional] Options to specify and enable arrow navigator or not
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 1                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                },

                $ThumbnailNavigatorOptions: {                       //[Optional] Options to specify and enable thumbnail navigator or not
                    $Class: $JssorThumbnailNavigator$,              //[Required] Class to create thumbnail navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always

                    $ActionMode: 1,                                 //[Optional] 0 None, 1 act by click, 2 act by mouse hover, 3 both, default value is 1
                    $SpacingX: 8,                                   //[Optional] Horizontal space between each thumbnail in pixel, default value is 0
                    $DisplayPieces: 6,                             //[Optional] Number of pieces to display, default value is 1
                    $ParkingPosition: 200                          //[Optional] The offset position to park thumbnail
                }
            };

            var jssor_slider1 = new $JssorSlider$("property_details_images", options);
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizes
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$ScaleWidth(Math.max(Math.min(parentWidth, 800), 300));
                else
                    window.setTimeout(ScaleSlider, 30);
            }
            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
    });



// $('.imgModal').click(function(event) {
//         var propertyId = $(this).attr('id');
//         var html_output ='';
//         var image_count = 0;
//         var flag = 1;
//         var main_image_src = $("#image_"+propertyId).attr('src');
//             $("#property_mainimage").attr('src', main_image_src);

//             $('.property_thumbnail > img').click(function (){
//                $('#property_mainimage').attr("src", $(this).attr("src"));
//             }) ;

//        $("#img"+propertyId+" .imagesList li").each(function(){
//             image_count++;
//             if(image_count == 1){
//                 html_output += '<div class="item active"><div class="row">';
//             }

//             if(flag == 0){
//                 html_output += '<div class="item"><div class="row">';
//                 flag = 1;
//             }
//             html_output+= "<div class='property_thumbnail' style='margin-left:7%;'><img src='"+$(this).find('img').attr('src')+"' alt='Image' class='img-responsive'></div>";

//             if(image_count % 3 == 0 && flag == 1){
//                 html_output += '</div></div>';
//                 flag = 0;
//             }
//         });

//        if(image_count == 0){
//           $("#property_details_thumbnails").hide();
//        }

//        $("#carousal_div").html(html_output);
//        $.getScript($('#url').val()+"application/static/js/carousel.js");
//     });

// $(".paginate_button").click(function() {
//        $.getScript($('#url').val()+"application/static/js/getImages.js");
//    });


