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
				<div class="col-lg-12 offices_divs">
					<div class="row" style="width: 100%;">
						<div class="col-lg-6">
							<div class="row" id="offices_selector">
								<p style="font-size: 145%;"><?php echo $this->lang->line('offices_subtitle'); ?></p>
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

							</div>
						</div>
						<div class="col-lg-6" id="offices_map" style="">
						 <?php 
						 		// generateMap('-33.8569','151.2152','100%','300px');
						  ?>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<p style="font-size: 145%;"><?php echo $this->lang->line('offices_subtitle2'); ?></p>
							<form role="form" action="" method="post">
								<div class="form-group" style="width:100%;">
									<?php if (!isset($loggedIn)): ?>
										<div class="row contact_form_row">
				                        	<div class="col-lg-6">
					                            <label for="contact_firstName"><?php echo $this->lang->line('offices_input1'); ?></label>
					                            <input type="text" class="form-control" name="contact_firstName" id="contact_firstName" placeholder="Enter first name" required>
					                        </div>
				                        </div>
				                        <div class="row contact_form_row">
				                        	<div class="col-lg-6">
					                            <label for="contact_lastName"><?php echo $this->lang->line('offices_input2'); ?></label>
					                            <input type="text" class="form-control" name="contact_lastName" id="contact_lastName" placeholder="Enter last name" required>
					                        </div>
				                        </div>
				                        <div class="row contact_form_row"> 
				                        	<div class="col-lg-6">
					                        	<label for="contact_email"><?php echo $this->lang->line('offices_input3'); ?></label>
					                        	<input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Enter E-mail" required>
					                        </div>
				                        </div>
				                        <div class="row contact_form_row">
				                        	<div class="col-lg-6">
					                        	<label for="contact_phone"><?php echo $this->lang->line('offices_input4'); ?></label>
					                        	<input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Enter Phone" required>
					                        </div>
				                        </div>
									<?php endif ?>
			                        
			                        <div class="row contact_form_row">
				                        <div class="col-lg-12">
				                        	<label for="contact_subject"><?php echo $this->lang->line('offices_input5');?></label>
				                        	<textarea class="form-control" name="contact_subject" id="contact_subject" rows="3" required></textarea>
				                        </div>
			                        </div>
			                        <div class="row">
			                        	<div class="form-group" style="width: 10%; margin: auto;">
                                            <input type="submit" style="margin-top: 0;margin-left: 0;" name="submit" class="btn btn-default property_btn" id="offices_contact_btn" onClick="" value="<?php echo $this->lang->line('propertydetails_button'); ?>">
                                        </div>
			                        </div>
			                    </div>
							</form>
							<?php if (isset($contactError)) :?>
	                            <div class="row" style="width: 100%;margin-left: 0;margin-right: 0;">
	                                <div class="alert alert-danger" role="alert" style="text-align: center;width: 100%;margin: auto;">
	                                   <?= $contactError; ?>
	                                </div>
	                            </div>
                            <?php else: ?>
                                <?php if (isset($contactSuccess)): ?>
                                    <div class="row"  style="width: 100%;margin-left: 0;margin-right: 0;">
                                        <div class="alert alert-success" role="alert" style="text-align: center;width: 100%;margin: auto;">
                                            <?= $contactSuccess; ?>
                                        </div>
                                    </div>
                                <?php endif ?>
                            <?php endif ?>
						</div>
					</div>
				</div>

			</div>
			
        </div>
        <input type="hidden" name="language" id="language" value="<?=$language?>">
        <input type="hidden" name="address" id="address" value="">
	</div>
	
<?php include('footer.php') ?>