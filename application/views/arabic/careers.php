<?php include('header.php'); ?>
    <div id="careers_body">
        <div class="container" id="careers_top_div">
            <div class="row" id="careers_overlay_div">
                <div class="col-lg-6 col-sm-3 careers_cols" id="careers_overlay_left_div">
                    <div class="careers_overlay_div_title">
                        <?php echo $this->lang->line('careers_title1'); ?>
                    </div>
                    <div class="careers_overlay_div_content">
                        <?php echo $this->lang->line('careers_description1'); ?>
                    </div>
                    <div class="careers_overlay_div_btn">
                        <a href="<?= base_url().'ar/';?>uploadCV">
                            <?php echo $this->lang->line('careers_button1'); ?>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-3 careers_cols">
                    <div class="careers_overlay_div_title">
                        <?php echo $this->lang->line('careers_title2'); ?>
                    </div>
                    <div class="careers_overlay_div_content">
                        <?php echo $this->lang->line('careers_description2'); ?>
                    </div>
                    <div class="careers_overlay_div_btn">
                        <a href="<?= base_url().'ar/';?>joinUs">
                            <?php echo $this->lang->line('careers_button2'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <?php include 'property_alert.php'; ?>
        </div>
        <!-- <script src="http://localhost/ColdwellBanker/js/bootstrap-select.min.js"></script>
        // <script src="http://localhost/ColdwellBanker/js/script.js"></script> -->
    </div>
    <?php include('footer.php'); ?>
