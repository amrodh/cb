<?php include('header.php'); ?>
	<div class="container training_main_div">
        <div class="training_top_div">
            <?php echo $this->lang->line('trainingcenter_title'); ?>
            <div id="training_breadcrumb">
                <ol class="breadcrumb breadcrumb_styling">
                    <li><a href="<?= base_url();?>"><?php echo $this->lang->line('trainingcenter_breadcrumb1'); ?></a></li>
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
				                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $count;?>"><?php echo $course->title; ?></a>
				                </h4>
				            </div>
				            <?php if ($count == 1): ?>
				            	<div id="collapse<?php echo $count;?>" class="panel-collapse collapse in">
				            <?php else: ?>
				            	<div id="collapse<?php echo $count;?>" class="panel-collapse collapse">
				            <?php endif ?>
				                <div class="panel-body">
				                    <p>
				                    	<?php echo $course->feature;?>
				                    </p>
				                </div>
				            </div>
				        </div>
			        <?php $count++; ?>
        			<?php endforeach ?>
		        </div>

<!--                 <div id="search_header" style="margin-top: -30px;width:100%;">
                    <ul class="nav nav-tabs nav-justified search_box" id="search_tabs">
                    <?php $count=1; ?>
                    <?php foreach ($courses as $course): ?>
                    	<?php if ($count == 1): ?>
                    		<li class="active" style="padding: 0; height: 25px;outline:none;min-width: 100px;max-width: 145px;">
                    			<a class="training_anchor" style="height: 100%;padding: 0;" href="#course<?=$count;?>" id="training_anchor1" data-toggle="tab">
                    				<?php //echo $course->title; ?>
                    			<?php 
                    			$title2 = $course->title;
                    			if(strlen($course->title) > 35){
			                                    $title2 = substr($course->title,0,20).'..';
			                                }
			                                echo $title2; 
	                                ?> 
                				</a>
            				</li>
                    	<?php else: ?>
                    		<li style="padding: 0; height: 25px;outline:none;min-width: 100px;max-width: 145px;">
                    			<a class="training_anchor" style="height: 100%;padding: 0;" href="#course<?=$count;?>" id="training_anchor3" data-toggle="tab">
                    				<?php //echo $course->title; ?>
                    				<?php $title2 = $course->title;
                    				if(strlen($course->title) > 35){
			                                    $title2 = substr($course->title,0,20).'..';
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
                				<?php echo $course->feature;?>
                			</div>
                		<?php else: ?>
                			<div class="tab-pane courses_div" id="course<?=$count2; ?>">
                				<?php echo $course->feature;?>
                			</div>
                		<?php endif ?>
                		<?php $count2++ ?>
                	<?php endforeach ?>
            	</div> -->
        	</div>
    	</div>
    </div>
<?php include('footer.php'); ?>