
<div class="hidden-sm hidden-xs slider" dir="ltr">
    <ul class="bxslider" style="height: 455px!important;" dir="ltr">
          <?php foreach ($slides as $slide): ?>
            <?php //printme($slide->id);exit(); ?>
              <li dir="rtl">
                  <a href="<?php echo base_url().$slide->link_ar; ?>"><img class="slider_imgs" src="<?php echo base_url(); ?>application/static/upload/slider/<?php echo $slide->image;?>"></a>
                  <div class="slider_logo">
                      <img src="<?php echo base_url(); ?>application/static/upload/slider/<?php echo $slide->alt_logo;?>">
                  </div>
                  <div class="slider_components">
                      <p><?php echo $slide->h1_ar;?></p>
                      <p><?php echo $slide->h2_ar;?></p>
                  </div>
              </li>
          <?php endforeach ?>
      </ul>
</div>
