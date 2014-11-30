<?php include('header.php'); ?>
        <div id="search_div">
            <?php include('search.php'); ?>
        </div>
        <?php if (isset($user)): ?>
            <input type="hidden" id="userID" name="userID" value="<?php echo $user->id?>">
        <?php endif ?>
        
        <div class="container properties_main_div" id="main_div">
            <img style="width:5%;margin-left:50%;" src="<?= base_url();?>application/static/images/loader.gif" alt="">
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
        }else if(currentUrl == 'category=home&contractType2=buy'){
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
            // alert(url);
            if (mystring.length > 2){
                var submit = mystring[8].split('=');
                submit = submit[1];
                // alert(mystring);
                if (submit == 'searchSubmit1'){
                    // alert('hi');
                    var lob = mystring[0].split('=');
                    lob = lob[1];
                    var city = mystring[2].split('=');
                    city = city[1];
                    var contractType = mystring[3].split('=');
                    contractType = contractType[1];
                    var price = mystring[4].split('=');
                    price = price[1];
                    var area = mystring[5].split('=');
                    area = area[1];
                    var districtName = mystring[6].split('=');
                    districtName = districtName[1];
                    var typeName = mystring[7].split('=');
                    typeName = typeName[1];
                    
                    $.ajax({
                        type: "POST",
                        url: url,
                        data:{language : currentLanguage, lob:lob, typeName:typeName, city:city, districtName : districtName, contractType: contractType, price:price, area:area, searchSubmit1: true}
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
                }else if(submit == 'searchSubmit3'){
                    var lob = mystring[0].split('=');
                    lob = lob[1];
                    var city = mystring[2].split('=');
                    city = city[1];
                    var contractType = mystring[3].split('=');
                    contractType = contractType[1];
                    var price = mystring[4].split('=');
                    price = price[1];
                    var area = mystring[5].split('=');
                    area = area[1];
                    var districtName = mystring[6].split('=');
                    districtName = districtName[1];
                    var typeName = mystring[7].split('=');
                    typeName = typeName[1];
                    
                    $.ajax({
                        type: "POST",
                        url: url,
                        data:{language : currentLanguage, lob:lob, typeName:typeName,city:city, districtName : districtName, contractType: contractType, price:price, area:area, searchSubmit3: true}
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
                }else if(submit == 'searchSubmit4'){
                    var lob = mystring[0].split('=');
                    lob = lob[1];
                    var city = mystring[2].split('=');
                    city = city[1];
                    var contractType = mystring[3].split('=');
                    contractType = contractType[1];
                    var price = mystring[4].split('=');
                    price = price[1];
                    var area = mystring[5].split('=');
                    area = area[1];
                    var districtName = mystring[6].split('=');
                    districtName = districtName[1];
                    var typeName = mystring[7].split('=');
                    typeName = typeName[1];
                    
                    $.ajax({
                        type: "POST",
                        url: url,
                        data:{language : currentLanguage, lob:lob, typeName:typeName,city:city, districtName : districtName, contractType: contractType, price:price, area:area, searchSubmit4: true}
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
