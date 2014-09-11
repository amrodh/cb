
        <div class="container" id="footer_div">
            <div class="row">
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <a href="http://newhomes.com.eg/"><img style="width:112px;" src="<?= base_url(); ?>application/static/images/logo_newhomes.jpg"/></a>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu1'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href="<?= base_url().'ar/';?>viewAllProperties"><?php echo $this->lang->line('home_footer_submenu1'); ?><br></a>
                        <a href="<?= base_url().'ar/';?>viewAllProperties"><?php echo $this->lang->line('home_footer_submenu2'); ?><br></a>
                        <a href="<?= base_url().'ar/';?>viewAllProperties"><?php echo $this->lang->line('home_footer_submenu3'); ?><br></a>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu2'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href=""><?php echo $this->lang->line('home_footer_submenu4'); ?><br></a>
                        <a href=""><?php echo $this->lang->line('home_footer_submenu5'); ?><br></a>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu6'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href=""><?php echo $this->lang->line('home_footer_submenu10'); ?><br></a>
                        <a href="<?= base_url().'ar/';?>careers"><?php echo $this->lang->line('home_footer_submenu9'); ?><br></a>
                        <!-- Franchise<br> -->
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols" id="footer_last_col">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu7'); ?>
                    </div>
                    <div id="bottom_div">
                        <img class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_twitter.png">
                        <img class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_fb.png">
                        <img class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_gmail.png">
                        <img class="footer_social_icons" src="<?= base_url(); ?>application/static/images/icon_linkedin.png"> 
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols footer_contact">
                    <img style="margin-top: -8px;" src="<?= base_url(); ?>application/static/images/icon_phone.png"/>
                    <div class="footer_col_title" style="margin-top: -29px;margin-left: 35px;font-size: 18px;">
                        <?php echo $this->lang->line('home_footer_submenu11'); ?><br>
                    </div>
                    <div style="margin-top: -15px;">
                    16223 
                    </div>
                    <!--<a href="http://newhomes.com.eg/"><img style="margin-top: 19px;" src="http://localhost/ColdwellBanker/images/logo_newhomes.png"/></a>-->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-md-4 col-sm-4">
                    <div class="dropdown footer_dropdown_div">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown1">
                            Villas
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown2">
                            Apartment
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown3">
                            Building
                            <span class="caret"></span>
                        </button>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4" id="footer_bottom_div">
                <input type="hidden" id="url" value="<?= base_url(); ?>">
                <?php if (isset($loggedIn)): ?>
                    <?php if (!$is_subscribed): ?>
                        <!-- <div class="footer_col_title" style="margin-bottom: 0;margin-top:0;">
                            SUBSCRIBE TO OUR NEWSLETTER
                        </div> -->
                        <div id="footer_subscribtion">
                            <input style="margin-left:0;" type="submit" value="Subscribe to our Newsletter" name="btn_subscribe" id="btn_subscribe">
                        </div>
                    <?php endif ?>
                <?php else: ?>
                    <div class="footer_col_title" style="margin-bottom: 0;margin-top:0;">
                        SUBSCRIBE TO OUR NEWSLETTER
                    </div>
                    <div id="footer_subscribtion">
                        <input type="text" name="footer_subscribe_email" id="footer_subscribe_email" placeholder="Your E-mail"/>
                        <input type="submit" value="Subscribe" name="btn_subscribe" id="btn_subscribe">
                    </div>
                <?php endif ?>
                        <div class="row"  style="width: 100%;">
                            <div class="alert" id="successMessage" style="display:none; width: 100%;" role="alert">
                                
                            </div>
                        </div>
                </div>
            </div>
                <div id="footer_dropdown1_data"style="">
                    <b>By District</b><br>
                    <p style="margin-top: 20px;">
                        <a href="">Mohandeseen  </a> . 
                        <a href="">Zamalek </a> . 
                        <a href="">Maadi </a> . 
                        <a href="">Nasr City </a> . 
                        <a href="">Helipolis </a> . 
                        <a href="">5th Settlement </a> . 
                        <a href="">6<sup>th</sup> October </a> . 

                    </p>
                    <p>
                        <a href="">Alexandria </a> . 
                        <a href="">Port Said </a> . 
                        <a href="">Haram</a> . 
                        <a href="">Sahrawy</a> . 
                        <a href="">Abasia</a> . 
                        <a href="">Dokki</a> . 
                        <a href="">Helwan</a> . 
                        <a href="">Agouza</a> . 
                    </p>
                    <p>
                        <a href="">Sohag</a> . 
                        <a href="">Qena</a> . 
                        <a href="">Agamy</a> . 
                        <a href="">North Coast</a> . 
                    </p>
                </div>
                <div id="footer_dropdown2_data" style="">
                    <b>By District</b><br>
                    <p style="margin-top: 20px;">
                        <a href="">Mohandeseen  </a> . 
                        <a href="">Zamalek </a> . 
                        <a href="">Maadi </a> . 
                        <a href="">Nasr City </a> . 
                        <a href="">Helipolis </a> . 
                        <a href="">5th Settlement </a> . 
                        <a href="">6<sup>th</sup> October </a> . 

                    </p>
                    <p>
                        <a href="">Alexandria </a> . 
                        <a href="">Port Said </a> . 
                        <a href="">Haram</a> . 
                        <a href="">Sahrawy</a> . 
                        <a href="">Abasia</a> . 
                        <a href="">Dokki</a> . 
                        <a href="">Helwan</a> . 
                        <a href="">Agouza</a> . 
                    </p>
                    <p>
                        <a href="">Sohag</a> . 
                        <a href="">Qena</a> . 
                        <a href="">Agamy</a> . 
                        <a href="">North Coast</a> . 
                    </p>
                </div>
                <div id="footer_dropdown3_data" style="">
                    <b>By District</b><br>
                    <p style="margin-top: 20px;">
                        <a href="">Mohandeseen  </a> . 
                        <a href="">Zamalek </a> . 
                        <a href="">Maadi </a> . 
                        <a href="">Nasr City </a> . 
                        <a href="">Helipolis </a> . 
                        <a href="">5th Settlement </a> . 
                        <a href="">6<sup>th</sup> October </a> . 

                    </p>
                    <p>
                        <a href="">Alexandria </a> . 
                        <a href="">Port Said </a> . 
                        <a href="">Haram</a> . 
                        <a href="">Sahrawy</a> . 
                        <a href="">Abasia</a> . 
                        <a href="">Dokki</a> . 
                        <a href="">Helwan</a> . 
                        <a href="">Agouza</a> . 
                    </p>
                    <p>
                        <a href="">Sohag</a> . 
                        <a href="">Qena</a> . 
                        <a href="">Agamy</a> . 
                        <a href="">North Coast</a> . 
                    </p>
                </div>
            <!--</div>-->
        </div>
        <div class="container">
            <p id="copyrights">
                2014 Coldwell Banker. All Rights Reserved.
            </p>
        </div>
        </body>


      
        <script type="text/javascript" src="<?= base_url();?>application/static/js/jquery.bxslider.min.js"></script>
        
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
                    'margin-bottom': parseInt($("#middle_div").css("margin-bottom")) + navHeight
                   }, 300);
            });
            
            $('.navbar-collapse').on('hide.bs.collapse', function(){
                navHeight = $(this).height();
                $('#middle_div').animate({
                  'margin-bottom': '23px'
                 }, 300);
              });
            
        </script>
<script type="text/javascript" src="<?= base_url(); ?>application/static/js/script.js"></script>
</body>

</html>