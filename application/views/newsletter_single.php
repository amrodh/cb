<?php include('header.php'); ?>
	<div class="container newsletter_container">
		<div id="newsletter_logo">
			<img class="newsletter_logo" src="<?= base_url();?>/application/static/images/logo.png">
		</div>
		<div id="newsletter_title">
			This is the 25th edition of the Coldwell Banker Newsletter
		</div>
		<div id="newsletter_image">
			<img id="newsletter_mainImg" src="<?= base_url();?>/application/static/images/bkgnd_careers.png">
			<div id="newsletter_heading">
				Merry Christmas
			</div>
		</div>
		<div id="newsletter_content">
			Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. 
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
