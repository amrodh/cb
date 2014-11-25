<?php include('header.php'); ?>
        <div id="search_div">
            <?php include('search.php'); ?>
        </div>
        <?php if (isset($user)): ?>
            <input type="hidden" id="userID" name="userID" value="<?php echo $user->id?>">
        <?php endif ?>
        
        <div class="container properties_main_div" id="main_div">
            <img style="width:5%;margin-left:50%;" src="<?= base_url();?>application/static/images/bx_loader.gif" alt="">
        </div>


        <div id="property_notifier">
            <?php include 'property_alert.php'; ?>
        </div>
        
        <!-- // <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script> -->
        <?php include('footer.php'); ?>


<script>
    jQuery(document).ready(function($) {

        var url = $("#url").val();
        url = url+"getSearchResults";
        var currentUrl = $("#query_string").val();
        var currentLanguage = $('#currentLanguage').val();
// alert();
        if (currentUrl == '')
        {
            $.ajax({
                type: "POST",
                url: url,
                data:{language : currentLanguage}
            })
            .success(function( html ) {
                $("#main_div").html(html);
                $(".propertyImages").each(function(){

                    var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                    if(!image_src){
                        var id = $(this).attr('id');
                        var id = id.replace('img','');
                        $('#'+id).attr('disabled','disabled');
                        image_src = $("#url").val()+'/application/static/images/No_image.svg';
                    }

                    var id = $(this).attr('id');
                    var id = id.replace('img','');

                    $("#image_"+id).attr('src',image_src);
                });
            });
        }else if(currentUrl == 'category=home&contractType2=rent'){
            $.ajax({
                type: "POST",
                url: url,
                data:{language : currentLanguage, catergory : 'home', contractType2 : 'rent'}
            })
            .success(function( html ) {
                $("#main_div").html(html);
                $(".propertyImages").each(function(){

                    var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                    if(!image_src){
                        var id = $(this).attr('id');
                        var id = id.replace('img','');
                        $('#'+id).attr('disabled','disabled');
                        image_src = $("#url").val()+'/application/static/images/No_image.svg';
                    }

                    var id = $(this).attr('id');
                    var id = id.replace('img','');

                    $("#image_"+id).attr('src',image_src);
                });
            });
        }else if(currentUrl == 'contractType=buy'){
            $.ajax({
                type: "POST",
                url: url,
                data:{language : currentLanguage, contractType : 'buy'}
            })
            .success(function( html ) {
                $("#main_div").html(html);
                $(".propertyImages").each(function(){

                    var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                    if(!image_src){
                        var id = $(this).attr('id');
                        var id = id.replace('img','');
                        $('#'+id).attr('disabled','disabled');
                        image_src = $("#url").val()+'/application/static/images/No_image.svg';
                    }

                    var id = $(this).attr('id');
                    var id = id.replace('img','');

                    $("#image_"+id).attr('src',image_src);
                });
            });
        }else if(currentUrl == 'contractType=rent'){
            $.ajax({
                type: "POST",
                url: url,
                data:{language : currentLanguage, contractType : 'rent'}
            })
            .success(function( html ) {
                $("#main_div").html(html);
                $(".propertyImages").each(function(){

                    var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                    if(!image_src){
                        var id = $(this).attr('id');
                        var id = id.replace('img','');
                        $('#'+id).attr('disabled','disabled');
                        image_src = $("#url").val()+'/application/static/images/No_image.svg';
                    }

                    var id = $(this).attr('id');
                    var id = id.replace('img','');

                    $("#image_"+id).attr('src',image_src);
                });
            });
        }else if(currentUrl == 'featured=true'){
            $.ajax({
                type: "POST",
                url: url,
                data:{language : currentLanguage, featured : true}
            })
            .success(function( html ) {
                $("#main_div").html(html);
                $(".propertyImages").each(function(){

                    var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                    if(!image_src){
                        var id = $(this).attr('id');
                        var id = id.replace('img','');
                        $('#'+id).attr('disabled','disabled');
                        image_src = $("#url").val()+'/application/static/images/No_image.svg';
                    }

                    var id = $(this).attr('id');
                    var id = id.replace('img','');

                    $("#image_"+id).attr('src',image_src);
                });
            });
        }else{
            var mystring = currentUrl.split('&');
            alert(mystring);
            if (mystring.length > 2){
                var lob = mystring[0].split('=');
                lob = lob[1];
                var type = mystring[1].split('=');
                type = type[1];
                var city = mystring[2].split('=');
                lob = lob[1];
                var lob = mystring[3].split('=');
                lob = lob[1];
                var lob = mystring[4].split('=');
                lob = lob[1];
                var lob = mystring[5].split('=');
                lob = lob[1];
                var lob = mystring[6].split('=');
                lob = lob[1];
                var lob = mystring[7].split('=');
                lob = lob[1];
                var lob = mystring[8].split('=');
                lob = lob[1];
                var lob = mystring[9].split('=');
                lob = lob[1];
                var lob = mystring[10].split('=');
                lob = lob[1];

                // alert(lob);
            }else{
                var district = mystring[0].split('=');
                district = district[1];
                district = district.replace('%20', ' ');
                // alert(district);
                var type = mystring[1].split('=');
                type = type[1];
                // alert(type);
                $.ajax({
                    type: "POST",
                    url: url,
                    data:{language : currentLanguage, district : district, type : type}
                })
                .success(function( html ) {
                    $("#main_div").html(html);
                    $(".propertyImages").each(function(){

                        var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
                        if(!image_src){
                            var id = $(this).attr('id');
                            var id = id.replace('img','');
                            $('#'+id).attr('disabled','disabled');
                            image_src = $("#url").val()+'/application/static/images/No_image.svg';
                        }

                        var id = $(this).attr('id');
                        var id = id.replace('img','');

                        $("#image_"+id).attr('src',image_src);
                    });
                });
            }

            
            // alert(mystring[0]);
        }

        
        // return;
        // url = url+"getFeaturedProperties";
        
    });
</script>
