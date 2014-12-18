<?php if ($currentLang != 'ar'): ?>
	<div class="row">
		<div class="col-lg-4 offices_titles">
			<?php echo $this->lang->line('offices_title1'); ?>
		</div>
		<div class="col-lg-8">
			<?php printme($officeInfo->district_en);?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 offices_titles">
			<?php echo $this->lang->line('offices_title2'); ?>
		</div>
		<div class="col-lg-8">
		<?php printme($officeInfo->address_en);?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 offices_titles">
			<?php echo $this->lang->line('offices_title3'); ?>
		</div>
		<div class="col-lg-8" style="font-weight: lighter;font-size: 120%;">
		<?php  echo $officeInfo->start_time;?> - <?php echo $officeInfo->end_time;?>
		</div>
	</div>
	<?php // printme($phonesResidential);exit(); ?>
	<?php if (isset($phonesResidential)): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>  (Residential)
			</div>
			<div class="col-lg-8">
				<?php foreach ($phonesResidential as $key => $phone): ?>
					<?php if ($key == 0): ?>
						<span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php else: ?>
						 / <span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>
	<?php if (isset($phonesCommercial)): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>  (Commercial)
			</div>
			<div class="col-lg-8">
				<?php foreach ($phonesCommercial as $key => $phone): ?>
					<?php if ($key == 0): ?>
						<span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php else: ?>
						 / <span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>	
	<?php if (isset($phonesHotline)): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>  (Commercial)
			</div>
			<div class="col-lg-8">
				<?php foreach ($phonesHotline as $key => $phone): ?>
					<?php if ($key == 0): ?>
						<span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php else: ?>
						 / <span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>
	
<!-- 	<?php foreach ($phones as $key => $phone): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>   (<?php  echo $phone->category;?>)
			</div>
			<div class="col-lg-8">
				<?php  printme($phone->phone);?>
			</div>
		</div> 
	<?php endforeach ?> -->
	<div class="row">
		<div class="col-lg-4 offices_titles">
			Fax:
		</div>
		<div class="col-lg-8">
			<?php  printme($officeInfo->fax);?>
		</div>
	</div> 
<?php else: ?>

<div class="row">
	<div class="col-lg-4 offices_titles" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title1'); ?>
		المنطقة:
	</div>
	<div class="col-lg-8" style="text-align: right;">
	<?php printme($officeInfo->district_ar);?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 offices_titles" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title2'); ?>
		العنوان:
	</div>
	<div class="col-lg-8 offices_titles" style="text-align: right;font-size: 80%;">
	<?php printme($officeInfo->address_ar);?>
	</div>
</div>
<div class="row">
	<div class="col-lg-4 offices_titles" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title3'); ?>
		ساعات العمل:
	</div>
	<div class="col-lg-8" style="text-align: right;direction: ltr;font-family: 'droidarabickufi_regular';font-weight: lighter;">
	<?php  echo $officeInfo->start_time;?> - <?php echo $officeInfo->end_time;?>
	</div>
</div>

<?php if (isset($phonesResidential)): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>  (Residential)
			</div>
			<div class="col-lg-8">
				<?php foreach ($phonesResidential as $key => $phone): ?>
					<?php if ($key == 0): ?>
						<span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php else: ?>
						 / <span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>
	<?php if (isset($phonesCommercial)): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>  (Commercial)
			</div>
			<div class="col-lg-8">
				<?php foreach ($phonesCommercial as $key => $phone): ?>
					<?php if ($key == 0): ?>
						<span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php else: ?>
						 / <span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>	
	<?php if (isset($phonesHotline)): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>  (Commercial)
			</div>
			<div class="col-lg-8">
				<?php foreach ($phonesHotline as $key => $phone): ?>
					<?php if ($key == 0): ?>
						<span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php else: ?>
						 / <span style="font-size: 120%;"><?php  echo $phone;?></span>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	<?php endif ?>

<!-- 	<?php foreach ($phones as $key => $phone): ?>
		<div class="row">
			<div class="col-lg-4 offices_titles">
				<?php echo $this->lang->line('offices_title4'); ?>   <?php  echo $phone->category;?>
			</div>
			<div class="col-lg-8">
				<?php  printme($phone->phone);?>
			</div>
		</div> 
	<?php endforeach ?> -->
<div class="row">
	<div class="col-lg-4 offices_titles">
		الفاكس:
	</div>
	<div class="col-lg-8">
		<?php  printme($officeInfo->fax);?>
	</div>
</div> 
<!-- <div class="row">
	<div class="col-lg-4 offices_titles" style="text-align: right;">
		<?php //echo $this->lang->line('offices_title4'); ?>
		رقم التليفون:
	</div>
	<div class="col-lg-8" style="text-align: right;">
		<?php  printme($officeInfo->phone);?>
	</div>
</div> -->

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