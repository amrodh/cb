<?php if ($key == 1): ?>
	<select class="selectpicker" name="type" id="searchHome_type" data-style="btn" data-title="Select Type" data-size="5">
	    <option value="0">Select Type</option> 
	    <?php foreach ($propertyType as $index => $type): ?>
	        <option value="<?= $index; ?>"><?= $type ?></option>
	    <?php endforeach ?>
	</select>
<?php else: ?>
	<?php if ($key == 2): ?>
		<div class="col-xs-12 col-lg-3 col-md-6 col-sm-6 search_cols search_cols_margin">
            <div class="shareproperty_titles title_margin">
                <?php echo $this->lang->line('shareproperty_input2'); ?>
            </div>
            <select class="selectpicker" data-style="btn" data-title="Select Type" name="shareProperty_type" id="shareProperty_type">
                <option value="0">Select Type</option> 
                	<?php foreach ($propertyType as $index => $type): ?>
			        <option value="<?= $index; ?>"><?= $type ?></option>
			    <?php endforeach ?>
            </select>
        </div>
	<?php endif ?>
<?php endif ?>
