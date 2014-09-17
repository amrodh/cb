<div class="col-lg-7 newsletter_container">
        <div class="col-lg-12">
        <div id="newsletter_logo">
            <img class="newsletter_logo img-responsive" src="<?= base_url();?>/application/static/images/logo.png">
        </div>
        <div id="newsletter_title">
            This is the 25th edition of the Coldwell Banker Newsletter
        </div>
        <div id="newsletter_image">
            <img id="newsletter_mainImg" class="img-responsive" src="<?= base_url();?>/application/static/upload/temp/<?= $params['image'] ?>">
            <div id="newsletter_heading">
                <?php 
                    if(isset($params))
                        echo $params['upper'];
                 ?>
            </div>
        </div>
        <div id="newsletter_content">
             <?php 
                    if(isset($params))
                        echo $params['lower'];
                 ?>
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
            <div style="float:right;margin-top:-1%;">
            <img style="margin-top: -5px;" src="<?= base_url(); ?>application/static/images/icon_phone.png"/>
               <div class="footer_col_title" style="margin-top: -29px;margin-left: 35px;font-size: 150%; color: #233f71;">
                   Contact Us<br>
               </div>
               <div style="margin-top: -10%;font-size: 200%;color: #233f71;margin-left: 20%;">
               16223 
               </div>
           </div>
            </div>
    </div>
    
    </div>