$('.imgModal').click(function(event) {
        var propertyId = $(this).attr('id');
        var html_output ='';
        var image_count = 0;
        var flag = 1;
        var main_image_src = $("#image_"+propertyId).attr('src');
            $("#property_mainimage").attr('src', main_image_src);

            $('.property_thumbnail > img').click(function (){
               $('#property_mainimage').attr("src", $(this).attr("src"));
            }) ;

       $("#img"+propertyId+" .imagesList li").each(function(){
            image_count++;
            if(image_count == 1){
                html_output += '<div class="item active"><div class="row">';
            }

            if(flag == 0){
                html_output += '<div class="item"><div class="row">';
                flag = 1;
            }
            html_output+= "<div class='property_thumbnail' style='margin-left:7%;'><img src='"+$(this).find('img').attr('src')+"' alt='Image' class='img-responsive'></div>";

            if(image_count % 3 == 0 && flag == 1){
                html_output += '</div></div>';
                flag = 0;
            }
        });

       if(image_count == 0){
          $("#property_details_thumbnails").hide();
       }

       $("#carousal_div").html(html_output);
       $.getScript($('#url').val()+"application/static/js/carousel.js");
    });

$(".paginate_button").click(function() {
       $.getScript($('#url').val()+"application/static/js/getImages.js");
   });


