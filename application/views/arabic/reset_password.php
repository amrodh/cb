<?php include('header.php'); ?>
	<div class="container auctions_main_div">
        <div class="auctions_top_div">
            تعديل كلمة المرور
        </div>
        <div id="auctions_bottom_div">
            <div class="row">
            	<form role="form"  method="post" >
					<input type="password" name="password" placeholder="رجاءً أدخل كلمة السر الجديدة">
                    <input type="password" name="confrimpassword" placeholder="رجاءً أدخل كلمة السر الجديدةd">
                    <?php if (isset($user_email)): ?>
                         <input type="hidden" name="email" value="<?= $user_email; ?>" >
                         <input type="hidden" name="token" value="<?= $token; ?>" >
                    <?php endif ?>
                   
					<input type="submit" name="submit" value="تعديل">
				</form>
            </div>
        </div>
    </div>
<?php include('footer.php'); ?>