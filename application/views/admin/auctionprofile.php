<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Auction / <?= $auction->title; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="">
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?= base_url();?>application/static/upload/auctions/<?= $auction->image; ?>" alt="">
                        </div>
                    </div>

                    <div class="row">
                    <div class="col-lg-12">
                         <h3><?= $auction->title ?></h3>
                            <p><?= $auction->date_held;  ?></p>
                            <p ><?= $auction->text;  ?></p>
                    </div>
                    </div>

                      <div style="height:5px;width:100%;background-color:black"></div>

                     <div class="row">
                    <div class="col-lg-12">
                         <h3><?= $auction->title_ar ?></h3>
                            <p><?= $auction->date_held;  ?></p>
                            <p ><?= $auction->text_ar;  ?></p>
                    </div>
                    </div>
                        
                 </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>