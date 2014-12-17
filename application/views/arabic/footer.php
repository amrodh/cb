
        <div class="container" id="footer_div">
            <div class="row">
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <a href="http://newhomes.com.eg/"><img style="width:112px;" src="<?= base_url();?>/application/static/images/logo_newhomes.jpg"/></a>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu1'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href="<?= base_url();?>ar/viewAllProperties?lob=1&type=&city=&district=&contractType=Sale&price=0&area=0&project="><?php echo $this->lang->line('home_footer_submenu1'); ?><br></a>
                      <!--   <a href="<?= base_url();?>ar/viewAllProperties"><?php echo $this->lang->line('home_footer_submenu2'); ?><br></a> -->
                        <a href="<?= base_url();?>ar/viewAllProperties?lob=1&type=&city=&district=&contractType=Rent&price=0&area=0&project="><?php echo $this->lang->line('home_footer_submenu3'); ?><br></a>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu2'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href="<?=base_url();?>ar/viewAllProperties?lob=2&type=&city=&district=&contractType=Sale&price=0&area=0&project="><?php echo $this->lang->line('home_footer_submenu4'); ?><br></a>
                        <a href="<?=base_url();?>ar/viewAllProperties?lob=2&type=&city=&district=&contractType=Rent&price=0&area=0&project="><?php echo $this->lang->line('home_footer_submenu5'); ?><br></a>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 hidden-xs footer_cols">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu6'); ?>
                    </div>
                    <div class="footer_col_content">
                        <a href="<?= base_url();?>ar/about"><?php echo $this->lang->line('home_footer_submenu10'); ?><br></a>
                        <a href="<?= base_url();?>ar/careers"><?php echo $this->lang->line('home_footer_submenu9'); ?><br></a>
                        <!-- Franchise<br> -->
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols" id="footer_last_col">
                    <div class="footer_col_title">
                        <?php echo $this->lang->line('home_menu7'); ?>
                    </div>
                    <div id="bottom_div">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                        <img class="footer_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png"> 
                    </div>
                </div>
                <div class="col-xs-12 col-lg-2 col-md-4 col-sm-4 footer_cols footer_contact">
                    <img style="margin-top: -8px;" src="<?= base_url();?>/application/static/images/icon_phone_ar.png"/>
                    <div class="footer_col_title" style="margin-top: -29px;margin-right: 35px;font-size: 18px;">
                        <?php echo $this->lang->line('home_footer_submenu11'); ?><br>
                    </div>
                    <div style="margin-top: -15px;">
                    16223 
                    </div>
                    <!--<a href="http://newhomes.com.eg/"><img style="margin-top: 19px;" src="http://localhost/ColdwellBanker/img/logo_newhomes.png"/></a>-->
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-md-4 col-sm-4">
                    <div class="dropdown footer_dropdown_div" id="footer_dropdown_1">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown1">
                            فيلا
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div" id="footer_dropdown_2">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown2">
                            شقة
                            <span class="caret"></span>
                        </button>
                    </div>
                    <div class="dropdown footer_dropdown_div" id="footer_dropdown_3">
                        <button type="button" class="btn dropdown-toggle footer_dropdowns" data-toggle="dropdown" id="footer_dropdown3">
                            بناء
                            <span class="caret"></span>
                        </button>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-md-4 col-sm-4" id="footer_bottom_div">
                    <input type="hidden" id="url" value="<?= base_url(); ?>">
                    <input type="hidden" id="query_string" value="<?= $_SERVER['QUERY_STRING'] ?>">
                    <input type="hidden" name="currentUrl" id="currentUrl" value="<?= $this->uri->uri_string; ?>">
                    <input type="hidden" name="currentLanguage" id="currentLanguage" value="<?=$language?>">
                    <?php if (isset($loggedIn)): ?>
                        <?php if (isset($is_valid)): ?>
                            <?php if (!$is_subscribed): ?>
                            <div id="footer_subscribtion">
                                <input style="margin-left:0;" type="submit" value="Subscribe to our Newsletter" name="btn_subscribe" id="btn_subscribe">
                            </div>
                            <?php endif ?>
                        <?php endif ?>
                        
                    <?php else: ?>
                        <div class="footer_col_title" style="margin-bottom: 2%;margin-top:0;">
                            إشترك في النشرة الإخبارية
                        </div>
                        <div id="footer_subscribtion">
                            <input type="text" name="footer_subscribe_email" id="footer_subscribe_email" placeholder="بريدك الالكتروني"/>
                            <input type="submit" value="إشترك" name="btn_subscribe" id="btn_subscribe">
                        </div>
                    <?php endif ?>

                </div>
                <div class="row"  style="width: 100%;margin-top:4%;">
                    <div class="alert" id="successMessage" style="display:none; width: 100%;" role="alert">
                        
                    </div>
                </div>
            </div>
                <div id="footer_dropdown1_data"style="">
                    <b>المنطقة</b><br>
                    <div class="row" style="color: white;margin-top:2%;padding:1%;">
                        <p><?php foreach ($districts as $item): ?>
                           <a style="color:white;" href="<?=base_url();?>ar/viewAllProperties?lob=1&type=10&city=&district=<?=$item['id'];?>&contractType=&price=0&area=0"> <?= $item['name']; ?></a> . 
                        <?php endforeach ?></p>
                    </div>
                </div>
                <div id="footer_dropdown2_data" style="">
                    <b>المنطقة</b><br>
                    <div class="row" style="color: white;margin-top:2%;padding:1%;">
                        <p><?php foreach ($districts as $item): ?>
                           <a style="color:white;" href="<?=base_url();?>ar/viewAllProperties?lob=1&type=1&city=&district=<?=$item['id'];?>&contractType=&price=0&area=0"> <?= $item['name']; ?></a> . 
                        <?php endforeach ?></p>
                    </div>
                </div>
                <div id="footer_dropdown3_data" style="">
                    <b>المنطقة</b><br>
                    <div class="row" style="color: white;margin-top:2%;padding:1%;">
                        <p><?php foreach ($districts as $item): ?>
                           <a style="color:white;" href="<?=base_url();?>ar/viewAllProperties?lob=2&type=11&city=&district=<?=$item['id'];?>&contractType=&price=0&area=0"> <?= $item['name']; ?></a> . 
                        <?php endforeach ?></p>
                    </div>
                </div>
        </div>
        <div class="container">
            <p id="copyrights">
                ٢٠١٤ كولدويل بانكر. جميع الحقوق محفوظة.
            </p>
        </div>


        <script type="text/javascript" src="<?= base_url();?>/application/static/js/jquery.bxslider.min.js"></script>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
         <script type="text/javascript" src="<?= base_url(); ?>application/static/js/script.js"></script>

</body>
</html>


