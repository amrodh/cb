<?php include('header.php') ?>
	<div class="container auctions_main_div">
		<div class="auctions_top_div">
            <?php echo $this->lang->line('offices_title'); ?>
            <div id="auctions_breadcrumb">
                <ol class="breadcrumb breadcrumb_styling">
                    <li><a href="<?= base_url();?>"><?php echo $this->lang->line('offices_breadcrumb1'); ?></a></li>
                    <li class="active"><?php echo $this->lang->line('offices_breadcrumb2'); ?></li>
                </ol>
            </div>
        </div>
        <div id="auctions_bottom_div">
	        <div class="row">
				<div class="col-lg-12 offices_divs">
					<!-- <div class="row" style="width: 100%;">
						<div class="col-lg-6">
							<div class="row" id="offices_selector">
								<p style="font-size: 145%;"><?php echo $this->lang->line('offices_subtitle'); ?></p>
								<?php $i = 0; ?>
								<select class="selectpicker" name="offices_select" id="offices_select">
									<option value="0">Select Office</option>
		                            <?php foreach ($offices as $office): ?>
		                                <option value="<?= $offices[$i]->id ?>"><?= $offices[$i]->district_en ?></option>
		                                <?php $i++?>
		                            <?php endforeach ?>
								</select>
							</div>
							<div class="row" id="offices_info">

							</div>
						</div>
					</div> -->
					<div class="row">
						<div class="col-lg-6">
							<p style="font-size: 145%;"><?php echo $this->lang->line('offices_subtitle2'); ?></p>
							<form role="form" action="" method="post">
								<div class="form-group" style="width:100%;">
									<?php if (!isset($loggedIn)): ?>
										<div class="row contact_form_row">
				                        	<div class="col-lg-12">
					                            <label for="contact_firstName"><?php echo $this->lang->line('offices_input1'); ?></label>
					                            <input type="text" class="form-control" name="contact_firstName" id="contact_firstName" placeholder="Enter first name" required>
					                        </div>
				                        </div>
				                        <div class="row contact_form_row">
				                        	<div class="col-lg-12">
					                            <label for="contact_lastName"><?php echo $this->lang->line('offices_input2'); ?></label>
					                            <input type="text" class="form-control" name="contact_lastName" id="contact_lastName" placeholder="Enter last name" required>
					                        </div>
				                        </div>
				                        <div class="row contact_form_row"> 
				                        	<div class="col-lg-12">
					                        	<label for="contact_email"><?php echo $this->lang->line('offices_input3'); ?></label>
					                        	<input type="email" class="form-control" name="contact_email" id="contact_email" placeholder="Enter E-mail" required>
					                        </div>
				                        </div>
				                        <div class="row contact_form_row">
				                        	<div class="col-lg-12">
					                        	<label for="contact_phone"><?php echo $this->lang->line('offices_input4'); ?></label>
					                        	<input type="text" class="form-control" name="contact_phone" id="contact_phone" placeholder="Enter Phone" required>
					                        </div>
				                        </div>
				                    <?php else: ?>
				                    	<input type="hidden" name="contact_email" id="contact_email" value="<?= $user->email;?>">
				                    	<input type="hidden" name="contact_phone" id="contact_phone" value="<?= $user->phone;?>">

									<?php endif ?>
			                        
			                        <div class="row contact_form_row">
				                        <div class="col-lg-12">
				                        	<label for="contact_subject"><?php echo $this->lang->line('offices_input5');?></label>
				                        	<textarea class="form-control" name="contact_subject" id="contact_subject" rows="3" required></textarea>
				                        </div>
			                        </div>
			                        <div class="row" style="width: 38%;margin: auto;">
			                        	<div class="form-group col-lg-12">
                                            <input type="submit" style="" name="submit" class="btn btn-default property_btn" id="offices_contact_btn" onClick="" value="<?php echo $this->lang->line('propertydetails_button'); ?>">
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
						<div class="col-lg-6">
							<div class="row" style="height: 60%;width: 100%;">
								<div class="col-lg-12" id="offices_map" style="height: 100%;">

								</div>
							</div>
							<div class="row">
								<?php foreach ($offices as $key => $office): ?>
									<h4><span><?php $key2 = $key +1;echo $key2.".   "; ?></span><?php echo $office->district_en; ?></h4>
									<div class="row">
										<div class="col-lg-4 offices_titles">
											</span><?php echo $this->lang->line('offices_title2'); ?>
										</div>
										<div class="col-lg-8">
										<?php echo $office->address_en;?>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-4 offices_titles">
											<?php echo $this->lang->line('offices_title3'); ?>
										</div>
										<div class="col-lg-8" style="">
										<?php  echo $office->start_time;?> am - <?php if ($office->end_time > 12): ?>
											<?php $office->end_time = $office->end_time-12;?>
										<?php endif ?><?php echo $office->end_time;?> pm
										</div>
									</div>
									<?php if (isset($phonesResidential[$office->id])): ?>
										<div class="row">
											<div class="col-lg-4 offices_titles">
												<?php echo $this->lang->line('offices_title4'); ?>  (Residential):
											</div>
											<div class="col-lg-8">
												<?php foreach ($phonesResidential[$office->id] as $key => $phone): ?>
													<?php if ($key == 0): ?>
														<span style=""><?php  echo $phone;?></span>
													<?php else: ?>
														 / <span style=""><?php  echo $phone;?></span>
													<?php endif ?>
												<?php endforeach ?>
											</div>
										</div>
									<?php endif ?>
									<?php if (isset($phonesCommercial[$office->id])): ?>
										<div class="row">
											<div class="col-lg-4 offices_titles">
												<?php echo $this->lang->line('offices_title4'); ?>  (Commercial):
											</div>
											<div class="col-lg-8">
												<?php foreach ($phonesCommercial[$office->id] as $key => $phone): ?>
													<?php if ($key == 0): ?>
														<span><?php  echo $phone;?></span>
													<?php else: ?>
														 / <span><?php  echo $phone;?></span>
													<?php endif ?>
												<?php endforeach ?>
											</div>
										</div>
									<?php endif ?>	
									<?php if (isset($phonesHotline[$office->id])): ?>
										<div class="row">
											<div class="col-lg-4 offices_titles">
												<?php echo $this->lang->line('offices_title4'); ?>  (Hotline):
											</div>
											<div class="col-lg-8">
												<?php foreach ($phonesHotline[$office->id] as $key => $phone): ?>
													<?php if ($key == 0): ?>
														<span><?php  echo $phone;?></span>
													<?php else: ?>
														 / <span><?php  echo $phone;?></span>
													<?php endif ?>
												<?php endforeach ?>
											</div>
										</div>
									<?php endif ?>
									<div class="row">
										<div class="col-lg-4 offices_titles">
											Fax:
										</div>
										<div class="col-lg-8">
											<?php echo $office->fax;?>
										</div>
									</div> 
								<?php endforeach ?>
								<div class="hide">
									<ul class="office_addresses">
										<?php foreach ($offices as $key => $office): ?>
												<li>
													<?php if ($office->address_en == '116 & 118 Egy Build Road 90, New Cairo, Egypt'): ?>
														<span>116 S El-Teseen St</span>
													<?php else: ?>
														<?php if ($office->address_en == '1,2 Hamis center, El Hay El Motamayez entrance, 6 October city'): ?>
															<span>Madkhal Al Hay Al Motamez, 6th of October City, Giza</span>
															<?php else: ?>
																<span><?= $office->address_en?></span>
														<?php endif ?>
													<?php endif ?>
												</li>
										<?php endforeach ?>
									</ul>
								</div>
							</div>
							
						</div>
					</div>
				</div>

			</div>
			
        </div>
        <input type="hidden" name="language" id="language" value="<?=$language?>">
        <input type="hidden" name="address" id="address" value="">
	</div>
	
<?php include('footer.php') ?>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#offices_contact_btn").click(function(){
			var msg_length = $("#contact_subject").val().length;
			var email = $("#contact_email").val();
			var phone = $("#contact_phone").val();
			var language = $("#language").val();
			ga('send', 'event', 'ContactUs', 'Submit|Contact|SERIAL|'+email+'|'+phone+'|'+msg_length+'|'+language+'| UNIT_TYPE', ' ContactUs');
		});
		var map;
		var elevator;
		var myOptions = {
		    zoom: 12,
		    center: new google.maps.LatLng(30.0500, 31.2333),
		    mapTypeId: 'terrain'
		};
		map = new google.maps.Map($('#offices_map')[0], myOptions);
		var addresses = [];
		var count = 0;
		$('.office_addresses li').each(function(index, val) {
			 addresses[count] = $(this).find('span').html();
			 count = count +1;
		});
		var iconCounter = 0;
		var number = 1;
		for (var x = 0; x < addresses.length; x++) {
		    $.getJSON('http://maps.googleapis.com/maps/api/geocode/json?address='+addresses[x]+'&sensor=false', null, function (data) {
		        var p = data.results[0].geometry.location;
		        var latlng = new google.maps.LatLng(p.lat, p.lng);
		        new google.maps.Marker({
		            position: latlng,
		            map: map, 
		            icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+number+'|FF0000|000000' 
		        });
		        number++;
		    });
		}
	}); 
</script>