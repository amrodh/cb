<?php include('header.php') ?>



<div class="container" style="padding: 0px; width: 100%;">
    <?php include('slider.php'); ?>
    <?php include('search_home.php'); ?>

	    <div class="visible-sm visible-xs hidden-lg hidden-md">
	        <?php include('search.php'); ?>
	    </div>

    <?php include('property_alert.php'); ?>
    

	<!-- Featured Properties	 -->
<div style="width: 100%; margin-top: 8%;">
    <div id="featuredProperty_header">
        <ul class="nav nav-tabs nav-justified property_alert_box" id="featuredProperty_tabs">
           <li class="active">
                <a href="#alert" data-toggle="tab" style="color:#eb7f00!important;">
                    <span style="color:#eb7f00;" id"notifier"><b>
                        <span class="glyphicon glyphicon-tower"></span>
                    </span>
                    <?php echo $this->lang->line('featured_title'); ?>
               </a>
           </li>
        </ul>
    </div>
    <div class="tab-content featuredProperty_body">
        <img style="width:2%;margin-left:50%;" src="<?= base_url();?>application/static/images/loader.gif" alt="">
    </div>
</div>

	<!-- End of Featured Properties -->
	<?php //include('featuredProperties.php'); ?>  
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
