<?php include('header.php'); ?>
	<div class="container auctions_main_div">
        <div class="auctions_top_div">
            <?php echo $this->lang->line('forgotpassword_title'); ?>
        </div>
        <div id="auctions_bottom_div">
            <div class="row">
            	<?php echo $this->lang->line('forgotpassword_subtitle'); ?>
            	<form role="form"  method="post" style="margin-top:1%;">
					<input type="email" name="email" placeholder="<?php echo $this->lang->line('forgotpassword_placeholder'); ?>">
					<input type="submit" name="submit" value="<?php echo $this->lang->line('forgotpassword_button'); ?>">
				</form>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>