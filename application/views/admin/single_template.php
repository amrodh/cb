<div class="col-lg-7 newsletter_container" style="border: 10px solid #233f71;padding: 5%;background-color: white;margin-top: 5%;">
        <div class="col-lg-12">
        <div id="newsletter_logo" style="width:30%;position: absolute;margin-top: -18.5%;margin-left: -2%;" src="<?= base_url();?>/application/static/images/logo.png">
            <img class="newsletter_logo img-responsive">
        </div>
        <div id="newsletter_title" style="font-size: 150%;">
            This is the 25th edition of the Coldwell Banker Newsletter
        </div>
        <div id="newsletter_image">
            <img id="newsletter_mainImg" style="width: 100%;position: relative;" class="img-responsive" src="<?= base_url();?>/application/static/upload/temp/<?= $params['image'] ?>">
            <div id="newsletter_heading" style="position: absolute;margin-top: -12%;font-size:200%;margin-left: 41%;color: gold;">
                <?php 
                    if(isset($params))
                        echo $params['upper'];
                 ?>
            </div>
        </div>
        <div id="newsletter_content" style="margin-top: 2%;margin-bottom: 2%;">
             <?php 
                    if(isset($params))
                        echo $params['lower'];
                 ?>
        </div>
        <div id="newsletter_contact" style="background-color: #ebebeb;padding: 2%;">
            <a href="">
                <img class="newsletter_social_icons" style="margin-right: 1%;" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
            </a>
            <a href="">
                <img class="newsletter_social_icons" style="margin-right: 1%;" src="<?= base_url();?>/application/static/images/icon_gmail.png">
            </a>
            <a href="">
                <img class="newsletter_social_icons" style="margin-right: 1%;" src="<?= base_url();?>/application/static/images/icon_fb.png">
            </a>
            <a href="">
                <img class="newsletter_social_icons" style="margin-right: 1%;" src="<?= base_url();?>/application/static/images/icon_twitter.png">
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