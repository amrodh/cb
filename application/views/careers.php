<!DOCTYPE html>
<html>
    <body>
        <?php include('header.php'); ?>
    <div id="careers_body">
        <div class="container" id="careers_top_div">
            <div class="row" id="careers_overlay_div">
                <div class="col-lg-6 col-sm-3 careers_cols" id="careers_overlay_left_div">
                    <div class="careers_overlay_div_title">
                        Upload Your CV Now!
                    </div>
                    <div class="careers_overlay_div_content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam no nummy nibh euismod tincidunt ut laoreet. 
                    </div>
                    <div class="careers_overlay_div_btn">
                        <a href="<?= base_url();?>uploadCV">
                            Post Your CV
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-3 careers_cols">
                    <div class="careers_overlay_div_title">
                        Join Us Now!
                    </div>
                    <div class="careers_overlay_div_content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam no nummy nibh euismod tincidunt ut laoreet. 
                    </div>
                    <div class="careers_overlay_div_btn">
                        <a href="<?= base_url();?>joinUs">
                            Current Vacancies
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php include 'property_alert.php'; ?>
        </div>
        <!-- // <script src="http://localhost/ColdwellBanker/js/bootstrap-select.min.js"></script> -->
        <!-- // <script src="http://localhost/ColdwellBanker/js/script.js"></script> -->
    </div>
        <?php include('footer.php'); ?>
    </body>
</html>
