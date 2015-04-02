<?php include('header.php') ?>



<div class="container" style="padding: 0px; width: 100%;">
    <?php include('slider.php'); ?>
    <?php include('search_home.php'); ?>

	    <div class="visible-sm visible-xs hidden-lg hidden-md">
	        <?php include('search.php'); ?>
	    </div>

    <?php include('property_alert.php'); ?>
    

	<!-- Featured Properties	 -->
<div style="width: 100%;">
    <div id="featuredProperty_header">
        <ul class="nav nav-tabs nav-justified property_alert_box" id="featuredProperty_tabs">
           <li class="active">
                <a href="#alert" data-toggle="tab" style="color:#eb7f00!important;">
                    <span style="color:#eb7f00;" id"notifier">
                        <span class="glyphicon glyphicon-tower"></span>
                    </span>
                    <?php echo $this->lang->line('featured_title'); ?>
               </a>
           </li>
        </ul>
    </div>
    <div class="tab-content featuredProperty_body">
        <img style="width:10%;margin-left:50%;" src="<?= base_url();?>application/static/images/loader.gif" alt="">
    </div>
</div>
</div>
<div class="hide">
    Coldwell Banker Egypt, Real Estate Egypt
    Coldwell Banker Egypt is the premier Egypt real estate agency for full-service residential and commercial real estate property. Being the majorreal estate Egypt brokerage firm amongst all other real estate brokers locally & globally; Coldwell Banker Egypt is committed to play an important role in real estate Egypt investment and development to support long term growth plan for real estate market in Egypt. We provide our customers with all facilitates to find real estate for sale, rent, sell, buy real estate, legal services & property evaluation for luxury real estate.
</div>

<?php include('footer.php'); ?>

<script>
	jQuery(document).ready(function($) {

		var url = $("#url").val();
    var currentUrl = $("#currentUrl").val();
           url = url+"getFeaturedProperties";
           $.ajax({
              type: "POST",
              url: url,
              data:{language : currentUrl}
            })
              .success(function( html ) {
                $(".featuredProperty_body").html(html);
				        $(".propertyImages").each(function(){

			        var image_src = $(this).find(".imagesList > li:nth-child(1) > img").attr('src');
			        if(!image_src){
			            var id = $(this).attr('id');
			            var id = id.replace('img','');
			            $('#'+id).attr('disabled','disabled');
			            image_src = $("#url").val()+'/application/static/images/no_image.svg';
			        }
			        
			        var id = $(this).attr('id');
			        var id = id.replace('img','');

			        $("#image_"+id).attr('src',image_src);
				       
				   });
              });
	});
</script>
