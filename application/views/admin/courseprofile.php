<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Course / <?= $course->title; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?= base_url();?>application/static/upload/courses/<?= $course->image; ?>" alt="">
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-12">
                         <h3><?= $course->title ?></h3>
                            <p><?= $course->feature;  ?></p>
                            <p><?= $course->text;  ?></p>
                    </div>
                    </div>

                      <div style="height:5px;width:100%;background-color:black"></div>

                     <div class="row" style="float:right">
                    <div class="col-lg-12">
                         <h3 style="float:right"><?= $course->title_ar ?></h3>
                            <p style="clear:both;" ><?= $course->feature_ar;  ?></p>
                            <p ><?= $course->text_ar;  ?></p>
                    </div>
                    </div>
                        
                 </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>