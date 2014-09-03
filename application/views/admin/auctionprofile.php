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
                <div class="usersLandingContent">
                    
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?= base_url();?>application/static/upload/auctions/<?= $auction->image; ?>" alt="">
                        </div>
                        <div class="col-lg-9">
                            <h3><?= $auction->title ?></h3>
                            <p><?= $auction->date_held;  ?></p>
                            <p><?= $auction->text;  ?></p>
                        </div>
                    </div>

                    
                        
                 </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>