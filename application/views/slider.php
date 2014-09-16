<div class="hidden-sm hidden-xs slider">
    <ul class="bxslider" style="height: 455px!important;">

          <?php foreach ($slides as $slide): ?>
            <?php //printme($slide->id);exit(); ?>
              <li>
                  <a href="<?php echo base_url().$slide->link_en; ?>"><img class="slider_imgs" src="<?php echo base_url(); ?>application/static/upload/slider/<?php echo $slide->image;?>"></a>
                  <div class="slider_logo">
                      <img src="<?php echo base_url(); ?>application/static/upload/slider/<?php echo $slide->logo;?>">
                  </div>
                  <div class="slider_components">
                      <p><?php echo $slide->h1_en;?></p>
                      <p><?php echo $slide->h2_en;?></p>
                  </div>
              </li>
          <?php endforeach ?>
      </ul>
</div>