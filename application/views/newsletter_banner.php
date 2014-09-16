<?php include('header.php'); ?>
	<div class="container newsletter_container">
		<div id="newsletter_logo">
			<img class="newsletter_logo" src="<?= base_url();?>/application/static/images/logo.png">
		</div>
		<div id="newsletter_title">
			This is the 25th edition of the Coldwell Banker Newsletter
		</div>
		<div class="newsletter_banner">
			<a href="<?php echo base_url();?>"><img class="newsletter_banner_imgs" src="<?php echo base_url(); ?>application/static/images/sliderimg.png"></a>
          	<div class="slider_logo">
              	<img src="<?php echo base_url(); ?>application/static/images/sliderlogo.png">
	        </div>
	        <div class="newsletter_components">
	            <p>NOW HALF PRICE</p>
	            <p>AND PAYMENT ON 6 YEARS</p>
	        </div>
		</div>
		<div class="newsletter_banner">
			<a href="<?php echo base_url();?>"><img class="newsletter_banner_imgs" src="<?php echo base_url(); ?>application/static/images/sliderimg.png"></a>
          	<div class="slider_logo">
              	<img src="<?php echo base_url(); ?>application/static/images/sliderlogo.png">
	        </div>
	        <div class="newsletter_components">
	            <p>NOW HALF PRICE</p>
	            <p>AND PAYMENT ON 6 YEARS</p>
	        </div>
		</div>

		<div id="newsletter_contact">
			<a href="">
                <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
            </a>
            <a href="">
                <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
            </a>
            <a href="">
                <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
            </a>
            <a href="">
                <img class="newsletter_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
            </a>
            <div style="float:right;">
            	<img style="margin-top: -8px;" src="<?= base_url(); ?>application/static/images/icon_phone.png"/>
                <div class="footer_col_title" style="margin-top: -29px;margin-left: 35px;font-size: 24px;color: #233f71;">
                    <?php echo $this->lang->line('home_footer_submenu11'); ?><br>
                </div>
                <div style="margin-top: -13%;font-size: 36px;color: #233f71;">
                16223 
                </div>
            </div>
            
		</div>
	</div>
<?php include('footer.php'); ?>
