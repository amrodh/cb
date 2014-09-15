<?php include('header.php') ?>
	<div class="container auctions_main_div">
		<div class="auctions_top_div">
            <?php echo $this->lang->line('offices_title'); ?>
            <div id="auctions_breadcrumb">
                <ol class="breadcrumb breadcrumb_styling">
                    <li><a href="http://localhost/ColdwellBanker"><?php echo $this->lang->line('offices_breadcrumb1'); ?></a></li>
                    <li class="active"><?php echo $this->lang->line('offices_breadcrumb2'); ?></li>
                </ol>
            </div>
        </div>
        <div id="auctions_bottom_div">
	        <div class="row">
				<div class="col-lg-6 offices_divs">
					<div class="row" id="offices_selector">
						<?php echo $this->lang->line('offices_subtitle'); ?>
						<?php $i = 0; ?>
						<select class="selectpicker" name="offices_select" id="offices_select">
							<option value="0">Select Office</option>
							<!-- <option value="0">Select City</option> -->
                            <?php foreach ($offices as $office): ?>
                                <option value="<?= $offices[$i]->id ?>"><?= $offices[$i]->district_en ?></option>
                                <?php $i++?>
                            <?php endforeach ?>
						</select>
					</div>
					<div class="row" id="offices_info">
					<?php //printme($language);?>
					</div>
				</div>
				<div class="col-lg-6" id="offices_map">
				 <?php 
				 		// generateMap('-33.8569','151.2152','100%','300px');
				  ?>
				</div>
			</div>
        </div>
        <input type="hidden" name="language" id="language" value="<?=$language?>">
	</div>
	
<?php include('footer.php') ?>