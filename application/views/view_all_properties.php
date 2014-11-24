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
// alert(currentUrl);
        if (currentUrl == '')
        {
            $.ajax({
                type: "POST",
                url: url,
                data:{language : currentUrl}
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
                data:{language : currentUrl, catergory : 'home', contractType2 : 'rent'}
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
                data:{language : currentUrl, contractType : 'buy'}
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
                data:{language : currentUrl, contractType : 'rent'}
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
                data:{language : currentUrl, featured : true}
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
            // alert(mystring[1]);
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
                data:{language : currentUrl, district : district, type : type}
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
            // alert(mystring[0]);
        }

        
        // return;
        // url = url+"getFeaturedProperties";
        
    });
</script>
