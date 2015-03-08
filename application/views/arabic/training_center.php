<?php include('header.php'); ?>
	<div class="container training_main_div">
        <div class="training_top_div">
            <?php echo $this->lang->line('trainingcenter_title'); ?>
            <div id="training_breadcrumb">
            	<ol class="breadcrumb breadcrumb_styling">
                    <li><a href="<?= base_url();?>ar"><?php echo $this->lang->line('trainingcenter_breadcrumb1'); ?></a></li>
                    <li class="active"><?php echo $this->lang->line('trainingcenter_breadcrumb2'); ?></li>
                </ol>
            </div>
        </div>
        <div id="training_bottom_div">
        	<div class="row">
        		<img style="width: 100%; margin-bottom: 1%;" src="<?php echo base_url(); ?>application/static/images/training_center.png">
        	</div>
        	<div class="row" style="margin-bottom: 3%;">
        		<div class="courses_div">
        		Coldwell Banker Training Academy is considered one of the specialized institutes in Egypt that offers Real Estate education development and this should help Egypt build their leaders of  tomorrow and create a deeper pool of talents in the Real Estate sales field.
				These courses are designed to offer all candidates interested in Real Estate sales a greater insight into the profession of selling and closing deals.
				Coldwell Banker Courses are delivered by professionals with over 10 years’ experience in real estate, the courses consists of both theoretical and practical elements of the real estate sales process with the emphasis on negotiations and closings.
        		</div>
        	</div>
        	<div class="row">
        		<div class="panel-group" id="accordion">
        			<?php $count=1; ?>
        			<?php foreach ($courses as $key => $course): ?>
        				<div class="panel panel-default">
				            <div class="panel-heading">
				                <h4 class="panel-title">
				                    <?php if ($count == 1): ?>
                                        <a data-toggle="collapse" class="accordionToggle" data-parent="#accordion" style="display: block; color:#23395b;" href="#collapse<?php echo $count;?>"><?php echo $course->title_ar; ?><span class="caret-right pull-right" style="margin-top:0.6%;color:#23395b;"></span></a>
                                    <?php else: ?>
                                        <a data-toggle="collapse" class="accordionToggle" data-parent="#accordion" style="display: block; color:#23395b;" href="#collapse<?php echo $count;?>"><?php echo $course->title_ar; ?><span class="caret pull-right" style="margin-top:0.6%;color:#23395b;"></span></a>
                                    <?php endif ?>
				                </h4>
				            </div>
				            <?php if ($count == 1): ?>
				            	<div id="collapse<?php echo $count;?>" class="panel-collapse collapse in">
				            <?php else: ?>
				            	<div id="collapse<?php echo $count;?>" class="panel-collapse collapse">
				            <?php endif ?>
				                <div class="panel-body">
				                    <p>
				                    	<?php echo $course->feature_ar;?>
				                    </p>
                                    <div class="properties_contact">
                                        <a href="#contactModal" class="contact_button" id="<?php echo $course->id; ?>" style="text-decoration: none;color: white;" data-toggle="modal"> 
                                            <?php echo $this->lang->line('viewallproperties_contact'); ?>
                                        </a>
                                    </div>
				                </div>
				            </div>
				        </div>
			        <?php $count++; ?>
        			<?php endforeach ?>
		        </div>
                <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Contact</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row hide" id="success_message" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                                    <div class="alert alert-success" role="alert">
                                       Your Contact Info was inserted successfully.
                                    </div>
                                </div>
                                <div class="row hide" id="failure_message" style="width: 100%;text-align:center;margin-left:0%;margin-top:2%;">
                                    <div class="alert alert-danger" role="alert">
                                       Your Contact Info was not inserted successsfully. Please try again later.
                                    </div>
                                </div>
                                <form class="form-inline" id="property_form" role="form" method="post">
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="property_first_name"><?php echo $this->lang->line('propertydetails_firstname'); ?></label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="property_first_name" name="property_first_name" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder1'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="property_last_name"><?php echo $this->lang->line('propertydetails_lastname'); ?></label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="property_last_name" name="property_last_name" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder2'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="property_email"><?php echo $this->lang->line('propertydetails_email'); ?></label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="email" class="form-control" id="property_email" name="property_email" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder3'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <label for="property_phone"><?php echo $this->lang->line('propertydetails_phone'); ?></label>
                                        </div>
                                        <div class="col-lg-8">
                                            <input type="text" class="form-control" id="property_phone" name="property_phone" placeholder="<?php echo $this->lang->line('viewallproperties_placeholder4'); ?>">
                                        </div>
                                    </div>
                                    <div class="form-group" style="width: 97%;">
                                        <p><?php echo $this->lang->line('propertydetails_text'); ?></p>
                                        <textarea class="form-control" id="property_form_textarea" name="property_comments" rows="3"></textarea>
                                    </div>
                                    <input type="hidden" id="courseID" name="courseID">
                                    <div class="form-group">
                                        <input type="button" class="btn btn-default property_btn" name="contact_submit" id="contact_form_btn" value="<?php echo $this->lang->line('propertydetails_button'); ?>">
                                    </div>
                                     <p><?php echo $this->lang->line('propertydetails_footnote'); ?></p>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div id="search_header" style="margin-top: -30px; width: 100%;">
                    <ul class="nav nav-tabs nav-justified search_box" id="search_tabs">
                    <?php $count=1; ?>
                    <?php foreach ($courses as $course): ?>
                    	<?php if ($count == 1): ?>
                    		<li class="active" style="padding: 0; height: 25px;outline:none;">
                    			<a class="training_anchor" style="height: 100%;padding: 0;" href="#course<?=$count;?>" id="training_anchor1" data-toggle="tab">
                    				<?php //echo $course->title_ar; ?>
                    				<?php $title2 = $course->title;
                    				if(strlen($course->title_ar) > 35){
		                                    $title2 = substr($course->title_ar,0,20).'..';
		                                	}
		                                echo $title2; 
	                                ?> 
                				</a>
            				</li>
                    	<?php else: ?>
                    		<li style="padding: 0; height: 25px;outline:none;">
                    			<a class="training_anchor" style="height: 100%;padding: 0;" href="#course<?=$count;?>" id="training_anchor3" data-toggle="tab">
                    				<?php //echo $course->title_ar; ?>
                    				<?php $title2 = $course->title;
                    				if(strlen($course->title_ar) > 35){
			                                    $title2 = substr($course->title_ar,0,20).'..';
			                                }
			                                echo $title2; 
	                                ?> 
                				</a>
            				</li>
                    	<?php endif ?>
                    	<?php $count++; ?>
                    <?php endforeach ?>
                    </ul>
                </div>
                <div class="tab-content training_body">
                	<?php $count2=1; ?>
                	<?php foreach ($courses as $course): ?>
                		<?php if ($count2 == 1): ?>
                			<div class="tab-pane active courses_div" id="course<?=$count2; ?>">
                				<?php echo $course->feature_ar;?>
                			</div>
                		<?php else: ?>
                			<div class="tab-pane courses_div" id="course<?=$count2; ?>">
                				<?php echo $course->feature_ar;?>
                			</div>
                		<?php endif ?>
                		<?php $count2++ ?>
                	<?php endforeach ?>
            	</div> -->
        	</div>
    	</div>
    </div>
<?php include('footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function (){
        $('.contact_button').click(function(event) {
            var courseID = $(this).attr("id");
            var msg_length = $("#property_form_textarea").val().length;
            var email = $("#property_email").val();
            var phone = $("#property_phone").val();
            var language = $("#language").val();
            ga('send', 'event', 'ContactUs', 'Submit|Courses|Serial|'+email+'|'+phone+'|'+msg_length+'|'+language+'|'+courseID, ' ContactUs');
            // alert($('#propertyID').val());return;
        });
    });
</script>