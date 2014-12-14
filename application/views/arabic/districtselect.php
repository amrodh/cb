<?php if ($key == 1): ?>
	<select class="selectpicker" name="district" id="searchHome_district" data-style="btn" data-title="اختار المنطقة" data-size="5">
      <option value="0">اختار المنطقة</option>
		<?php foreach ($districts as $item): ?>
			<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
		<?php endforeach ?>
	</select>
<?php else: ?>
	<?php if ($key == 2): ?>
		<div class="col-xs-12 col-lg-4 col-md-4 col-sm-4 search_cols">
           <div class="search_box_col_title title_margin" id="search_title_district">
               <!-- District --><!--  <?php echo $this->lang->line('search_drpdwn2'); ?> -->المنطقة
           </div>
           <select class="selectpicker" id="search_district_1" name="district_1" data-style="btn" data-title="اختار المنطقة" data-size="5">
                <option value="0">اختار المنطقة</option>
                <?php foreach ($districts as $item): ?>
				<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
				<?php endforeach ?>
           </select>
       </div>
       <?php else: ?>
       <?php if ($key == 3): ?>
       		<div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
		           <div class="search_box_col_title title_margin" id="search_title_district">
		               <!-- District --><!--  <?php echo $this->lang->line('search_drpdwn2'); ?> -->المنطقة
		           </div>
		           <select class="selectpicker" id="search_district_2" name="district_2" data-style="btn" data-title="اختار المنطقة" data-size="5">
		                <option value="0">اختار المنطقة</option>
		                <?php foreach ($districts as $item): ?>
						<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
						<?php endforeach ?>
		           </select>
       		</div>
       	<?php else: ?>
       		<?php if ($key == 4): ?>
       			<div class="col-xs-12 col-lg-3 col-md-4 col-sm-6 search_cols">
		           <div class="search_box_col_title title_margin" id="search_title_district">
		               <!-- District --><!--  <?php echo $this->lang->line('search_drpdwn2'); ?> -->المنطقة
		           </div>
		           <select class="selectpicker" id="search_district_3" name="district_3" data-style="btn" data-title="اختار المنطقة" data-size="5">
		                <option value="0">اختار المنطقة</option>
		                <?php foreach ($districts as $item): ?>
						<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
						<?php endforeach ?>
		           </select>
       			</div>
       		<?php else: ?>
       			<?php if ($key == 5): ?>
       				<div class="col-xs-12 col-lg-3 col-md-3 col-sm-6 search_cols">
	                   <div class="property_alert_col_title title_margin" id="property_alert_title_district">
	                       <!-- District --><!--  <?php echo $this->lang->line('search_drpdwn2'); ?> --> المنطقة
	                   </div>
	                   <select class="selectpicker" id="propertyAlert_district" name="alert_district" data-style="btn" data-title="اختار المنطقة" data-size="5">
			                <option value="0">اختار المنطقة</option>
			                <?php foreach ($districts as $item): ?>
							<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
							<?php endforeach ?>
			           </select>
	                </div>
            <?php else: ?>
            		<div class="col-xs-12 col-lg-6 col-md-6 col-sm-6 search_cols search_cols_margin">
                        <div class="shareproperty_titles title_margin" id="search_title_district">
                            <!-- District --><!--  <?php echo $this->lang->line('search_drpdwn2'); ?> -->المنطقة
                        </div>
                        <select class="selectpicker" data-style="btn" id="shareProperty_district" data-title="اختار المنطقة" name="district" data-size="5">
                             <option value="0">اختار المنطقة</option>
                             <?php foreach ($districts as $item): ?>
							<option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
							<?php endforeach ?>
                        </select>
                    </div>
       			<?php endif ?>
       		<?php endif ?>
       	<?php endif ?>	
	<?php endif ?>
<?php endif ?>
