<?php include('header.php'); ?>
        <div class="container uploadcv_app_div">
            <div class="uploadcv_app_top_div">
                CURRENT VACANCIES
            </div>
            <div id="joinus_app_bottom_div">
                <div class="container" id="joinus_app_bottom_inner_div">
                    <?php $i = 1; ?>
                    <?php foreach ($vacancies as $vacancy): ?>
                    <div class="joinus_app_common_div">
                            <div class="joinus_app_common_top_div">
                                <div class="joinus_app_num_div">
                                    <?=$i ;?>
                                    <?php $i++; ?>
                                </div>
                                <div class="joinus_app_title_div">
                                    <?= $vacancy->name;  ?>
                                </div>
                            </div>
                            <br><br>
                            <div class="joinus_app_common_bottom_div">
                                <div class="joinus_listing_top_div">
                                     <?= $vacancy->description;  ?>
                                </div>
                                
                                 <div class="careers_overlay_div_btn joinus_btn">
                                        <a href="uploadCV/<?= $vacancy->id; ?>">
                                            Apply Now
                                        </a>
                                </div>
                            </div>
                    </div>
                    <?php endforeach ?>
                    


                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>