<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <?php if (isset($PropertyFlag)): ?>
            <meta http-equiv="keywords" content="<?php foreach ($keywords as $key => $value): ?>
                <?php echo $value.', '; ?>
            <?php endforeach ?>">
            <?php if (is_array($images['src'])): ?>
                <meta property="og:image" content="<?= base_url();?>/application/static/upload/property_images/<?= $images['src'][0]; ?>"/>
                <meta property="og:description" content="<?php echo $title;?>"/>

                <meta name="twitter:description" content="<?php echo $title;?>"/>
                <meta name="twitter:image:src" content="<?= base_url();?>/application/static/upload/property_images/<?= $images['src'][0]; ?>"/>
            <?php else: ?>
                <meta property="og:image" content="<?= base_url();?>/application/static/images/No_image.svg" />
                <meta property="og:description" content="<?php echo $title;?>"/>

                <meta name="twitter:description" content="<?php echo $title;?>"/>
                <meta name="twitter:image:src" content="<?= base_url();?>/application/static/images/No_image.svg"/>
            <?php endif ?>

        <?php else: ?>
            <meta http-equiv="keywords" content=" real estate Egypt, real estate in Egypt, Egypt real estate, real estate agent Egypt, real estate for sale Egypt, real estate brokers Egypt, real estate agency Egypt, real estate property Egypt, real estate market Egypt, residential real estate Egypt, luxury real estate Egypt, buy real estate Egypt ">
        <?php endif ?>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= $title;?></title>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application/static/css/bootstrap-ar.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.css">
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>application/static/js/jquery-ui.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jssor.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/jssor.slider.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-ar.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/plug-ins/380cb78f450/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        <link href="<?php echo base_url(); ?>application/static/css/bootstrap-select.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/bootstrap-select.min.css" rel="stylesheet" />
        <script type="text/javascript" src="<?php echo base_url(); ?>application/static/js/filter.js"></script>
        <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>application/static/js/bootstrap-select.js"></script>
        <link type="text/css" href="<?= base_url();?>/application/static/css/style-ar.css" rel="stylesheet">
        <link href="<?= base_url();?>/application/static/css/jquery.bxslider.css" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Ubuntu:300,500,700" rel="stylesheet" type="text/css">
        <link href="<?= base_url();?>/application/static/css/jquery-ui.css" rel="stylesheet" />
        <link href="<?= base_url();?>/application/static/css/jquery-ui.min.css" rel="stylesheet" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '409474675892587',
              xfbml      : true,
              version    : 'v2.2'
            });
          };

      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

        (function() {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement('script');
                fbds.async = true;
                fbds.src = '//connect.facebook.net/en_US/fbds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
        })();
    </script>
    <body> 
        <div id="top_div">
            <div id="icons_div" class="hidden-xs hidden-sm">
                <a href="http://www.linkedin.com/company/coldwell-banker-egypt">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_linkedin.png">
                </a>
                <a href="http://www.youtube.com/user/ColdWellBankerEgypt1">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_gmail.png">
                </a>
                <a href="https://www.facebook.com/ColdwellBankerEgypt">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_fb.png">
                </a>
                <a href="http://www.twitter.com/CB_Egypt">
                    <img class="header_social_icons" src="<?= base_url();?>/application/static/images/icon_twitter.png">
                </a>
            </div>
            <div id="login_div">
                
                <?php if (isset($loggedIn)): ?>
                    <?php if (!isset($is_valid)): ?>
                        <button type="button" style="background-color: transparent;border: none;padding: 0;margin-top: -2%;" class="btn btn-default" title="مطلوب التحقق من الشخصية"  
                              data-container="body" data-toggle="popover" data-placement="bottom" 
                              data-content="يرجى الدخول على البريد الالكتروني للتحقق من الشخصية.">
                            <span style="margin-left:5%; color:white;" id"notifier">
                                <span class="glyphicon glyphicon-exclamation-sign"></span>
                            </span>
                        </button>
                    <?php endif ?>
                    <span style="margin-right:5%;"><b><a style="color: white; text-decoration: none;font-family: 'Ubuntu';" href="<?= base_url();?>profile">
                        <span class="glyphicon glyphicon-user"></span> <?= $user->username; ?></a></b>
                    </span>
                    <label style="">
                        <span class="glyphicon glyphicon-log-out">
                        </span>
                        <form action="<?= base_url();?>logout" method="post" style="display:inline;">
                        <input type="hidden" id="query_string" name="query_string" value="<?= $_SERVER['QUERY_STRING'] ?>">
                        <input type="hidden" name="currentUrl" id="currentUrl" value="<?= $this->uri->uri_string; ?>">
                        <input type="submit" value="خروج" name="logoutSubmit" class="logoutSubmit">
                        </form>
                    </label>
                <?php else: ?>
                    <label for="" style="margin-right:3%;">
                        <span class="glyphicon glyphicon-log-in"></span>
                        <a href="#tallModal" data-toggle="modal"><?php echo $this->lang->line('home_login'); ?></a>
                    </label>
                     /
                     <label for="" style="margin-left:3%;">
                         <span class="glyphicon glyphicon-plus-sign"></span>
                         <a href="<?= base_url();?>ar/register"><?php echo $this->lang->line('home_register'); ?></a>
                     </label>
                <?php endif ?>
            </div>
            <div id="language">
                <label for="">
                    <span class="glyphicon glyphicon-globe"></span>
                    <?php if ($uri == 'shareProperty'): ?>
                        <a style="font-family: 'Ubuntu';" href='<?= base_url().'en/'.$uri?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.$uri?>'>عربي</a>
                    <?php else: ?>
                        <a href='<?= base_url().'en/'.str_replace('ar/', '',$uri)?>'>English</a>
                        <span>/</span>
                        <a href='<?= base_url().'ar/'.str_replace('ar/', '',$uri)?>'>عربي</a>
                    <?php endif ?>
                </label>
            </div>
        </div>
        <?php if (isset($loginError)): ?>
            <input type="hidden" id="loginError" value="<?= $loginError; ?>">
        <?php endif ?>
        <form class="form-inline" role="form" action="<?= base_url();?>authenticate" method="post">
            <input type="hidden" name="currentUrl" value="<?= $this->uri->uri_string ?>">
            <input type="hidden" id="query_string" name="query_string" value="<?= $_SERVER['QUERY_STRING'] ?>">
        <div id="tallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">إدخل الأن</h4>
                      <div style="font-size: 12px;">
                          <?php echo $this->lang->line('home_login_text'); ?>
                      </div>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="margin: 0;">
                             <div class="form-group login_form">
                                <label style="width:100%" for="username" class="shareproperty_titles"><?php echo $this->lang->line('home_login_input1'); ?></label>
                                <input style="width:100%;" type="text" name="username" value="<?php if(isset($login_username)) echo $login_username; ?>" class="form-control" id="username" placeholder="<?php echo $this->lang->line('home_login_placeholder1'); ?>" autofocus required>
                             </div>
                        </div>
                        <div class="row" style="margin: 0;">
                            <div class="form-group login_form">
                                <label style="width:100%" for="password" class="shareproperty_titles"><?php echo $this->lang->line('home_login_input2'); ?></label>
                                <input style="width:100%;" type="password" name="password" class="form-control" style="margin-left: 3px;" id="password" placeholder="<?php echo $this->lang->line('home_login_placeholder2'); ?>" required>
                            </div>
                        </div>
                        <div class="row">
                            <?php if (isset($loginErrorType)): ?>
                                <div class="alert alert-danger" role="alert">
                                        <?= $loginError;?>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div id="login_modal_footer">
                            <div class="row" style="width: 130px;margin: auto;">
                                <input type="submit" class="btn btn-default search_btn_submit2" value="إدخل" name="submit">
                            </div>
                            <div class="row" style="padding-top: 4%;padding-left: 6%;">
                                <a href="<?= base_url();?>ar/forgotPassword"><?php echo $this->lang->line('home_login_forgotpassword'); ?></a>
                            </div>
                        </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </form>
        <div id="middle_div">
            <nav class="navbar" role="navigation">
                <div class="navbar-header">
                    <div class="navbar-brand">
                        <a href="<?=base_url(); ?>ar">
                            <img class="logo" src="<?= base_url();?>/application/static/images/logo.png">
                        </a>
                    </div>
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse bs-navbar-collapse">
                    <ul class="nav navbar-nav navbar-left header_navbar">
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu1'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="home_dropdown" style="">
                                <li>
                                    <a href="<?= base_url();?>ar/viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=Sale&amp;price=0&amp;area=0&amp;project=&amp;locationType=&amp;serialNum="><?php echo $this->lang->line('home_submenu1'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>ar/viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=Rent&amp;price=0&amp;area=0&amp;project=&amp;locationType=&amp;serialNum="><?php echo $this->lang->line('home_submenu3'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>ar/viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=&amp;price=0&amp;area=0&amp;project=&amp;locationType=project&amp;serialNum="><?php echo $this->lang->line('home_submenu12'); ?></a>
                                </li>
                                <!-- <li>
                                    <a href="<?= base_url();?>ar/viewAllProperties?lob=1&amp;type=&amp;city=&amp;district=&amp;contractType=&amp;price=0&amp;area=0&amp;project=&amp;locationType=unit"><?php echo $this->lang->line('home_submenu13'); ?></a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu2'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="commercial_dropdown" style="">
                                <li>
                                    <a href="<?=base_url();?>ar/viewAllProperties?lob=2&amp;type=&amp;city=&amp;district=&amp;contractType=Sale&amp;price=0&amp;area=0&amp;project=&amp;locationType=&amp;serialNum="><?php echo $this->lang->line('home_submenu4'); ?></a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>ar/viewAllProperties?lob=2&amp;type=&amp;city=&amp;district=&amp;contractType=Rent&amp;price=0&amp;area=0&amp;project=&amp;locationType=&amp;serialNum="><?php echo $this->lang->line('home_submenu5'); ?></a>
                                </li>
                                <li>
                                    <a href="<?=base_url();?>ar/viewAllProperties?lob=4&amp;type=&amp;city=&amp;district=&amp;contractType=&amp;price=0&amp;area=0&amp;project=&amp;locationType=&amp;serialNum="><?php echo $this->lang->line('home_submenu14'); ?></a>
                                </li>
                                <!-- <li>
                                    <a href="<?=base_url();?>ar/viewAllProperties?lob=2&amp;type=&amp;city=&amp;district=&amp;contractType=&amp;price=0&amp;area=0&amp;project=&amp;locationType=unit"><?php echo $this->lang->line('home_submenu15'); ?></a>
                                </li> -->
                            </ul>
                        </li>
                        <!-- <li><a class="header_items_rtl" href="<?= base_url().'ar/';?>auction"><?php echo $this->lang->line('home_menu3'); ?></a></li> -->
                        <li><a href="<?= base_url().'ar/';?>trainingAcademy" class="header_items_rtl"><?php echo $this->lang->line('home_menu4'); ?></a></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu5'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="services_dropdown" style="">
                                <!-- <li>
                                    <a href="<?= base_url().'ar/';?>marketIndex"><?php echo $this->lang->line('home_submenu6'); ?></a>
                                </li> -->
                                <li>
                                    <a href="<?= base_url().'ar/';?>shareProperty"><?php echo $this->lang->line('home_submenu7'); ?></a>
                                </li>
                                <!-- <li>
                                    <a href="#">FRANCHISE</a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu6'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="contact_dropdown" style="margin-right: 0%;">
                                <li>
                                    <a href="<?= base_url();?>ar/about"><?php echo $this->lang->line('home_submenu10'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url();?>ar/franchise"><?php echo $this->lang->line('home_submenu11'); ?></a>
                                </li>
                            </ul>
                            <!-- <a href="<?= base_url();?>ar/about" class="header_items_rtl"><?php echo $this->lang->line('home_menu6'); ?></a> -->
                        </li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle header_items_rtl" data-toggle="dropdown"><?php echo $this->lang->line('home_menu7'); ?>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu header_dropdown" id="contact_dropdown" style="">
                                <li>
                                    <a href="<?= base_url();?>ar/offices"><?php echo $this->lang->line('home_submenu8'); ?></a>
                                </li>
                                <li>
                                    <a href="<?= base_url().'ar/';?>careers"><?php echo $this->lang->line('home_submenu9'); ?></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div> 
            </nav>
        </div>
        