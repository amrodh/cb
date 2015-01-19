<?php include('header.php'); ?>
        <div id="search_div">
            <?php include('search.php'); ?>
        </div>
        <?php if (isset($user)): ?>
            <input type="hidden" id="userID" name="userID" value="<?php echo $user->id?>">
        <?php endif ?>
        
        <div class="container properties_main_div" id="main_div">
            <img style="width:2%;margin-left:50%;" src="<?= base_url();?>application/static/images/loader.gif" alt="">
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
        // alert(currentUrl);return;
        var currentLanguage = $('#currentLanguage').val();
        $.ajax({
            type: "GET",
            url: url,
            data:{language : currentLanguage, data: currentUrl}
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
        
    });
</script>
