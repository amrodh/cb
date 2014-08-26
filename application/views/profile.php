<!DOCTYPE html>
<html lang="en">
    <body>
        <?php include('header.php'); ?>
        <div class="container shareproperty_main_div">
            <div class="shareproperty_top_div">
                PERSONAL PROFILE
                <div style="font-size: 12px;font-weight: normal;">
                    
                </div>
            </div>
            <div id="properties_bottom_div">
                <div class="container" id="profile_bottom_inner_div" style="">
                    <div class="row">
                        <div class="col-lg-2 profile_titles">
                            Username:
                        </div>
                        <div class="col-lg-10 profile_content">
                            <?=$username?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 profile_titles">
                            E-mail:
                        </div>
                        <div class="col-lg-10 profile_content">
                            <?=$email?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 profile_titles">
                            Location:
                        </div>
                        <div class="col-lg-10 profile_content">
                            <?=$location?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 profile_titles">
                            Phone:
                        </div>
                        <div class="col-lg-10 profile_content">
                            <?=$phone?>
                        </div>
                    </div>
                    <div class="row" style="width: 13%; margin: auto; margin-top: 20px;">
                        <button type="submit" class="btn btn-default profile_btn_submit">Edit</button>
                    </div>
                </div>
            </div>
        </div>
        <?php include('footer.php'); ?>
    </body>
</html>