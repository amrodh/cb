    <div class="container" id="footer_div" style="">

            <div class="row">
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <a href="http://newhomes.com.eg/"><img alt="" style="width:112px;" src="<?= base_url(); ?>application/static/images/logo_newhomes.jpg"/></a>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu1'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href="<?= base_url().'en/';?>viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=Sale&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_footer_submenu1'); ?><br></a>
                       <!--  <a href="<?= base_url().'en/';?>viewAllProperties"><?php echo $this->lang->line('home_footer_submenu2'); ?><br></a> -->
                        <a href="<?= base_url().'en/';?>viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=Rent&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_footer_submenu3'); ?><br></a>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu2'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href="<?=base_url();?>en/viewAllProperties?lob=2&amp;type=&amp;city=&amp;district=&amp;contractType=Sale&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_footer_submenu4'); ?><br></a>
                        <a href="<?=base_url();?>en/viewAllProperties?lob=2&amp;type=&amp;city=&amp;district=&amp;contractType=Rent&amp;price=0&amp;area=0&amp;project="><?php echo $this->lang->line('home_footer_submenu5'); ?><br></a>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu6'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href="<?= base_url().'en/';?>about"><?php echo $this->lang->line('home_footer_submenu10'); ?><br></a>
                        <a href="<?= base_url().'en/';?>careers"><?php echo $this->lang->line('home_footer_submenu9'); ?><br></a>
                        <!-- Franchise<br> -->
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols" id="footer_last_col">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu7'); ?>
                    </div>
                    <div id="bottom_div">
                        <img alt="" class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_twitter.png">
                        <img alt="" class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_fb.png">
                        <img alt="" class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_gmail.png">
                        <img alt="" class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_linkedin.png"> 
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols footer_contact">
                    <img alt="" style="margin-top: -8px;" src="<?= base_url(); ?>application/static/images/icon_phone.png"/>
                    <div class="footer_col_title" style="margin-top: -29px;margin-left: 35px;font-size: 18px;">
                        <?php echo $this->lang->line('home_footer_submenu11'); ?><br>
                    </div>
                    <div style="margin-top: -15px;">
                    16223 
                    </div>
            
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-md-4 col-sm-4">
                    <div class="dropdown footer_dropdown_div" id="footer_dropdown_1">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown1">
                            Villas
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div" id="footer_dropdown_2">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown2">
                            Apartment
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div" id="footer_dropdown_3">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown3">
                            Building
                            <span class="caret"></span>
                        </button>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4" id="footer_bottom_div">
                <input type="hidden" id="url" value="<?= base_url(); ?>">
                <input type="hidden" id="query_string" value="<?= $_SERVER['QUERY_STRING'] ?>">
                <input type="hidden" name="currentUrl" id="currentUrl" value="<?= $this->uri->uri_string; ?>">
                <?php if (isset($loggedIn)): ?>
                    <?php if (isset($is_valid)): ?>
                        <?php if (!$is_subscribed): ?>
                        <!-- <div class="footer_col_title" style="margin-bottom: 0;margin-top:0;">
                            SUBSCRIBE TO OUR NEWSLETTER
                        </div> -->
                        <div id="footer_subscribtion">
                            <input style="margin-left:0;" type="submit" value="Subscribe to our Newsletter" name="btn_subscribe" id="btn_subscribe">
                        </div>
                        <?php endif ?>
                    <?php endif ?>
                    
                <?php else: ?>
                    <div class="footer_col_title" style="margin-bottom: 2%;margin-top:0;">
                        SUBSCRIBE TO OUR NEWSLETTER
                    </div>
                    <div id="footer_subscribtion">
                        <input type="text" name="footer_subscribe_email" id="footer_subscribe_email" placeholder="Your E-mail"/>
                        <input type="submit" value="Subscribe" name="btn_subscribe" id="btn_subscribe">
                    </div>
                <?php endif ?>
                        
                </div>
                <div class="row"  style="width: 100%;">
                    <div class="alert" id="successMessage" style="display:none; width: 100%;" role="alert">
                        
                    </div>
                </div>
            </div>
                <div id="footer_dropdown1_data" style="">
                    <b>By District</b><br>
                    <div class="row" style="color: white;margin-top:2%;padding:1%;">
                        <p><?php foreach ($districts as $item): ?>
                        <?php //printme($item); ?>
                        <!-- ?lob=1&amp;type=villa&amp;city=&amp;district=<?=$item['name'];?>&amp;contractType=&amp;price=0&amp;area=0 -->
                           <a style="color:white;" href="<?=base_url();?>viewAllProperties?lob=1&amp;type=10&amp;city=&amp;district=<?=$item['id'];?>&amp;contractType=&amp;price=0&amp;area=0"> <?= $item['name']; ?></a> . 
                        <?php endforeach ?></p>
                    </div>
                </div>
                <div id="footer_dropdown2_data" style="">
                    <b>By District</b><br>
                    <div class="row" style="color: white;margin-top:2%;padding:1%;">
                        <p><?php foreach ($districts as $item): ?>
                           <a style="color:white;" href="<?=base_url();?>viewAllProperties?lob=1&amp;type=1&amp;city=&amp;district=<?=$item['id'];?>&amp;contractType=&amp;price=0&amp;area=0"> <?= $item['name']; ?></a> . 
                        <?php endforeach ?></p>
                    </div>
                </div>
                <div id="footer_dropdown3_data" style="">
                    <b>By District</b><br>
                    <div class="row" style="color: white;margin-top:2%;padding:1%;">
                        <p><?php foreach ($districts as $item): ?>
                           <a style="color:white;" href="<?=base_url();?>viewAllProperties?lob=2&amp;type=11&amp;city=&amp;district=<?=$item['id'];?>&amp;contractType=&amp;price=0&amp;area=0"> <?= $item['name']; ?></a> . 
                        <?php endforeach ?></p>
                    </div>
                </div>
            <!--</div>-->
        </div>
        <div class="container">
            <p id="copyrights">
                2014 Coldwell Banker. All Rights Reserved.
            </p>
        </div>
        <input type="hidden" name="currentLanguage" id="currentLanguage" value="<?=$language?>">
        </body>


      
        <script type="text/javascript" src="<?= base_url();?>application/static/js/jquery.bxslider.min.js"></script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <!--<script type="text/javascript" src="<?= base_url();?>application/static/js/jquery.uploadify.min.js"></script>-->
        <script>
            $(document).ready(function() {
                $('.bxslider').bxSlider({
                    auto:true
                });
                $("[data-toggle='popover']").popover();
            });
            
            var navHeight = $('.navbar-collapse').height();
            $('.navbar-collapse').on('show.bs.collapse', function(){
                if($(this).height() != 0)
                {
                    navHeight = $(this).height();
                }
                $('#middle_div').animate({
                    'margin-bottom': '50%'
                   }, 300);
            });
            
            $('.navbar-collapse').on('hide.bs.collapse', function(){
                navHeight = $(this).height();
                $('#middle_div').animate({
                  'margin-bottom': '4%'
                 }, 300);
              });
        </script>
        
        <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;callback=initialize"></script>
        
        <script type="text/javascript" src="<?= base_url(); ?>application/static/js/script.js"></script>
</body>

</html>