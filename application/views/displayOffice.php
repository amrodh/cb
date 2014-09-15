<?php if ($currentLang == 'en'): ?>
	<div class="row">
		<div class="col-lg-4">
			<?php echo $this->lang->line('offices_title1'); ?>
		</div>
		<div class="col-lg-8">
			<?php printme($officeInfo->district_en);?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<?php echo $this->lang->line('offices_title2'); ?>
		</div>
		<div class="col-lg-8">
		<?php printme($officeInfo->address_en);?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<?php echo $this->lang->line('offices_title3'); ?>
		</div>
		<div class="col-lg-8" style="font-weight: lighter;">
		<?php  echo $officeInfo->start_time;?> - <?php echo $officeInfo->end_time;?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">
			<?php echo $this->lang->line('offices_title4'); ?>
		</div>
		<div class="col-lg-8">
			<?php  printme($officeInfo->phone);?>
		</div>
	</div>
<?php else: ?>

<div class="row">
	<div class="col-lg-4" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title1'); ?>
		المنطقة:
	</div>
	<div class="col-lg-8" style="text-align: right;">
	<?php printme($officeInfo->district_ar);?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title2'); ?>
		العنوان:
	</div>
	<div class="col-lg-8" style="text-align: right;">
	<?php printme($officeInfo->address_ar);?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title3'); ?>
		ساعات العمل:
	</div>
	<div class="col-lg-8" style="font-weight: lighter;text-align: right;direction: ltr;">
	<?php  echo $officeInfo->start_time;?> - <?php echo $officeInfo->end_time;?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title4'); ?>
		رقم التليفون:
	</div>
	<div class="col-lg-8" style="text-align: right;">
		<?php  printme($officeInfo->phone);?>
	</div>
</div>

<?php endif ?>







<!-- <div class="row">
	<div class="col-lg-4">
		<?php echo $this->lang->line('offices_title1'); ?>
	</div>
	<div class="col-lg-8">
	<?php if ($currentLang == 'en'): ?>
		<?php printme($officeInfo->district_en);?>
	<?php else: ?>
		<?php printme($officeInfo->district_ar);?>
	<?php endif ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<?php echo $this->lang->line('offices_title2'); ?>
	</div>
	<div class="col-lg-8">
	<?php if ($currentLang == 'en'): ?>
	<?php printme($officeInfo->address_en);?>
	<?php else: ?>
		<?php printme($officeInfo->address_ar);?>
	<?php endif ?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<?php echo $this->lang->line('offices_title3'); ?>
	</div>
	<div class="col-lg-8" style="font-weight: lighter;">
	<?php  echo $officeInfo->start_time;?> - <?php echo $officeInfo->end_time;?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4">
		<?php echo $this->lang->line('offices_title4'); ?>
	</div>
	<div class="col-lg-8">
		<?php  printme($officeInfo->phone);?>
	</div>
</div>
 -->