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
        	<div class="row">
                <div id="search_header" style="margin-top: -30px;width:100%;">
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
                    <!-- <div class="tab-pane active" id="course1">
	                    <div class="training_body_top_div">
	                    </div>
	                    <div class="training_body_bottom_div">
	                    	<div class="row">
	                    		<div class="col-lg-6">
	                    			<img style="width: 100%;" src="<?php echo base_url(); ?>application/static/images/trainingcenter.jpg">
	                    		</div>
	                    		<div class="col-lg-6">
	                    			<div class="training_title">
	                    				Real Estate Diploma
	                    			</div>
	                    			<div class="training_content1">
	                    			 	<p>
	                    			 		Coldwell Banker Training Academy is considered the only one institute in the country for 
											real estate and development education and this should help Egypt build their leaders of 
											tomorrow and create a deeper pool of talent in the Real estate sales field.
	                    			 	</p>
	                    				<p>
	                    					This course is designed to offer all candidates interested in Real Estate sales a greater 
											insight into the profession of selling and closing deals.
	                    				</p>
										<p>	
											Coldwell Banker Diploma is delivered by professionals with over 10 years experience in real 
											estate, the course consists of both theoretical and practical elements of the real estate sales 
											process with the emphasis on negotiations and closings.
										</p>
	                    				
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="row training_content2" style="margin-left: 0;margin-right:0;">
	                    		<p style="font-weight: bolder; font-size: 110%;">
	                    			On completion of the diploma, students should have acquired:
	                    		</p>
	                    		<ol>
	                    			<li>
	                    				Introduction to real estate
	                    			</li>
	                    			<li>
	                    				Investment fundamentals of real estate
	                    			</li>
	                    			<li>
	                    				Real estate legalities
	                    			</li>
	                    			<li>
	                    				Real estate marketing
	                    			</li>
	                    			<li>
	                    				Cash flow management
	                    			</li>
	                    			<li>
	                    				Sales planning strategies
	                    			</li>
	                    			<li>
	                    				Negotiation strategies
	                    			</li>
	                    			<li>
	                    				Customer relationship management
	                    			</li>
	                    		</ol>
	                    		<p style="font-weight: bolder; font-size: 110%;">
	                    			Topics covered in diploma:
	                    		</p>
	                    		<table style="border: 3px solid black;width: 100%;text-align: center;">
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					1
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					First Real Estate Steps
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					2
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Finding and Dealing with Clients
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					3
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Office Uniqueness and Categories
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					4
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Sales planning and goal settings
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					5
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Negotiation strategies to win a deal
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					6
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Real Estate Deals Closing
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					7
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Investment fundamentals of real estate
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					8
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Cash Flow in Real estate Commercial
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					9
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					The types of commercial retail
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					10
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Real Estate Legalities
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					11
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Communication Skills
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					12
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Time Management
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;"> 
	                    					13
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Private victory
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					14
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Public Victory for Better Achievements
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					15
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Final Day And Test
	                    				</td>
	                    			</tr>
	                    		</table>
	                    		<table style="width: 100%;border: 3px solid black;text-align:center;margin-top: 5%;">
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Fees:
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					3000 L.E.
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Schedule:
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					2 Evening or Morning Sessions a Week (5 hours)
	                    				</td>
	                    			</tr>
	                    			<tr>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					Duration:
	                    				</td>
	                    				<td style="border: 3px solid black!important;padding:1%;">
	                    					12 weeks
	                    				</td>
	                    			</tr>
	                    		</table>
	                    	</div>
	                    </div>
                    </div>  -->
                    <!-- <div class="tab-pane" id="course2">
                    	<div class="training_body_top_div">
	                    </div>
	                    <div class="training_body_bottom_div">
	                    	<?php echo $courses[2]->feature; ?>
	                    	<div class="row">
	                    		<div class="col-lg-6">
	                    			<img style="width: 100%;" src="<?php echo base_url(); ?>application/static/images/trainingcenter.jpg">
	                    		</div>
	                    		<div class="col-lg-6">
	                    			<div class="training_title">
	                    				<?php echo $this->lang->line('trainingcenter_tab2'); ?>
	                    			</div>
	                    			<div class="training_content1">
	                    				Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="row training_content2">
	                    		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    		<br><br>
	                    		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    		<br><br>
	                    		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    	</div> 
	                    </div>
                    </div> -->
                    <!-- <div class="tab-pane" id="course3">
                    	<div class="training_body_top_div">
	                    </div>
	                    <div class="training_body_bottom_div">
	                    	<div class="row">
	                    		<div class="col-lg-6">
	                    			<img style="width: 100%;" src="<?php echo base_url(); ?>application/static/images/trainingcenter.jpg">
	                    		</div>
	                    		<div class="col-lg-6">
	                    			<div class="training_title">
	                    				<?php echo $this->lang->line('trainingcenter_tab3'); ?>
	                    			</div>
	                    			<div class="training_content1">
	                    				Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    			</div>
	                    		</div>
	                    	</div>
	                    	<div class="row training_content2">
	                    		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    		<br><br>
	                    		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    		<br><br>
	                    		Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.
	                    	</div>
	                    </div>
                    </div> -->
            	</div>
        	</div>
    	</div>
    </div>
<?php include('footer.php'); ?>