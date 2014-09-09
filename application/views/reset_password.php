<?php include('header.php'); ?>
	<div class="container auctions_main_div">
        <div class="auctions_top_div">
            RESET PASSWORD
        </div>
        <div id="auctions_bottom_div">
            <div class="row">
            	<form role="form"  method="post" >
					<input type="password" name="password" placeholder="Please enter your password">
                    <input type="password" name="confrimpassword" placeholder="Please re-enter your password">
                    <?php if (isset($user_email)): ?>
                         <input type="hidden" name="email" value="<?= $user_email; ?>" >
                         <input type="hidden" name="token" value="<?= $token; ?>" >
                    <?php endif ?>
                   
					<input type="submit" name="submit">
				</form>
            </div>
        </div>
    </div>


	
<?php include('footer.php'); ?>