<html>
<head>
<title>The file to email</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
<table style="width:95%; border: 10px solid #233f71;">
    <tr>
        <td style="width: 30%">
            <img class="newsletter_logo img-responsive" style="width: 100%;" src="http://localhost/ColdwellBanker/application/static/images/logo.png">
        </td>
        <td style="font-size: 190%;padding: 4%;">
            <?php 
                if(isset($data['title']))
                    echo $data['title'];
            ?>
        </td>
    </tr>
    <?php $count = 0; ?>
    <tr>
    <?php foreach ($data['properties'] as $property): ?>
            <?php if ($count % 3 != 0): ?>
                <td style="background-color: #f6f6f6; width:30%; border: 1px solid #d4d4d4!important;padding: 1% 1%;">
                    <div class="compare_img">
                        <?php if ($data['images'][$property['PropertyId']][0] == 'http://localhost/ColdwellBanker/application/static/images/No_image.svg'): ?>
                            <a href="localhost/ColdwellBanker/en/propertyDetails/<?= $property['PropertyId'];?>"><img class="compare_images" style="max-height: 104px;" id="image_<?= $property['PropertyId'];  ?>" src="<?php echo $data['images'][$property['PropertyId']][0]; ?>"/></a>
                        <?php else: ?>
                            <a href="localhost/ColdwellBanker/en/propertyDetails/<?= $property['PropertyId'];?>"><img class="compare_images" style="max-height: 104px;" id="image_<?= $property['PropertyId'];  ?>" src="<?php echo 'http://localhost/ColdwellBanker/application/static/upload/property_images/'.$data['images'][$property['PropertyId']][0]; ?>"/></a>
                        <?php endif ?>
                    </div>
                    <div class="compare_description" style="padding-left: 0;padding-right: 0;">
                        <div class="compare_description_content" style="text-align: center;">
                            <?php if ($property['LocationProject'] != ''): ?>
                                <?php echo $property['LocationProject']; ?>, <?php echo $property['LocationDistrict']; ?>, <?php echo $property['LocationCity']; ?>
                            <?php else: ?>
                                <?php echo $property['LocationProject']; ?>, <?php echo $property['LocationCity']; ?>
                            <?php endif ?>
                            <br>
                            Bedrooms: <?php echo $property['BedRoomsNumber'];?> 
                            <?php if ($property['BathRoomsNumber'] != 0): ?>
                                , Bathrooms: <?php echo $property['BathRoomsNumber'];?>
                            <?php endif ?>
                            <br>
                            <?php if ($property['SalesTypeStr'] == 'Sale'): ?>
                                <b style="color: #5a7baa;"> Sale Price: </b> <span style="font-size: 120%;color: orange;"> <?php echo $property['SaleCurrency'].' '.number_format(explode('.',$property['SalePrice'])[0]); ?></span>
                            <?php else: ?>
                                <b style="color: #5a7baa;"> Rent Price: </b> <span style="font-size: 120%;color: orange;"> <?php echo $property['RentCurrency'].' '.number_format(explode('.',$property['RentPrice'])[0]); ?></span>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="compare_price">
                        <div class="compare_price_text">
                        </div>
                    </div>
                </td>
            <?php else: ?>
                </tr>
                <tr>
                    <td style="background-color: #f6f6f6; width:30%; border: 1px solid #d4d4d4!important;padding: 1% 1%;">
                        <div class="compare_img">
                            <?php if ($data['images'][$property['PropertyId']][0] == 'http://localhost/ColdwellBanker/application/static/images/No_image.svg'): ?>
                            <a href="localhost/ColdwellBanker/en/propertyDetails/<?= $property['PropertyId'];?>"><img class="compare_images" style="max-height: 104px;" id="image_<?= $property['PropertyId'];  ?>" src="<?php echo $data['images'][$property['PropertyId']][0]; ?>"/></a>
                        <?php else: ?>
                            <a href="localhost/ColdwellBanker/en/propertyDetails/<?= $property['PropertyId'];?>"><img class="compare_images" style="max-height: 104px;" id="image_<?= $property['PropertyId'];  ?>" src="<?php echo 'http://localhost/ColdwellBanker/application/static/upload/property_images/'.$data['images'][$property['PropertyId']][0]; ?>"/></a>
                        <?php endif ?>
                        </div>
                        <div class="compare_description" style="padding-left: 0;padding-right: 0;">
                            <div class="compare_description_content">
                                <?php if ($property['LocationProject'] != ''): ?>
                                    <?php echo $property['LocationProject']; ?>, <?php echo $property['LocationDistrict']; ?>, <?php echo $property['LocationCity']; ?>
                                <?php else: ?>
                                    <?php echo $property['LocationDistrict']; ?>, <?php echo $property['LocationCity']; ?>
                                <?php endif ?>
                                <br>
                                Bedrooms: <?php echo $property['BedRoomsNumber'];?> 
                                <?php if ($property['BathRoomsNumber'] != 0): ?>
                                    , Bathrooms: <?php echo $property['BathRoomsNumber'];?>
                                <?php endif ?>
                                <br>
                                <?php if ($property['SalesTypeStr'] == 'Sale'): ?>
                                    <b style="color: #5a7baa;"> Sale Price: </b> <span style="font-size: 120%;color: orange;"> <?php echo $property['SaleCurrency'].' '.number_format(explode('.',$property['SalePrice'])[0]); ?></span>
                                <?php else: ?>
                                    <b style="color: #5a7baa;"> Rent Price: </b> <span style="font-size: 120%;color: orange;"> <?php echo $property['RentCurrency'].' '.number_format(explode('.',$property['RentPrice'])[0]); ?></span>
                                <?php endif ?>
                                <!-- Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna -->
                            </div>
                        </div>
                        <div class="compare_price">
                            <div class="compare_price_text">
                                <!-- EGP 2,000,000 -->
                            </div>
                        </div>
                    </td>
            <?php endif ?>
            <?php $count++; ?>
    <?php endforeach ?>
    <tr>
      <td>
        <div id="newsletter_contact" style="background-color: #ebebeb;padding: 2%;width: 300%;">
                <a style="text-decoration: none;" href="www.linkedin.com"><img class="newsletter_social_icons" src="http://localhost/ColdwellBanker/application/static/images/icon_linkedin.png"></a>
                <a style="text-decoration: none;" href="www.google.com"><img class="newsletter_social_icons" src="http://localhost/ColdwellBanker/application/static/images/icon_gmail.png"></a>
                <a style="text-decoration: none;" href="www.facebook.com"><img class="newsletter_social_icons" src="http://localhost/ColdwellBanker/application/static/images/icon_fb.png"></a>
                <a style="text-decoration: none;" href="www.twitter.com"><img class="newsletter_social_icons" src="http://localhost/ColdwellBanker/application/static/images/icon_twitter.png"></a>
                <img style="margin-top: -5px;margin-left: 54%" src="http://localhost/ColdwellBanker/application/static/images/callcenter.png"/>        
        </div>
        
     </td>
    </tr>
</table>
</body>
</html>
