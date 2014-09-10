<?php include('header.php'); ?>
	<div class="container auctions_main_div">
        <div class="auctions_top_div">
            <?php echo $this->lang->line('resetpassword_title'); ?>
        </div>
        <div id="auctions_bottom_div">
            <div class="row">
            	<form role="form"  method="post" >
					<input type="password" name="password" placeholder="<?php echo $this->lang->line('resetpassword_placeholder1'); ?>">
                    <input type="password" name="confrimpassword" placeholder="<?php echo $this->lang->line('resetpassword_placeholder2'); ?>">
                    <?php if (isset($user_email)): ?>
                         <input type="hidden" name="email" value="<?= $user_email; ?>" >
                         <input type="hidden" name="token" value="<?= $token; ?>" >
                    <?php endif ?>
                   
					<input type="submit" name="submit" value="<?php echo $this->lang->line('resetpassword_button'); ?>">
				</form>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>