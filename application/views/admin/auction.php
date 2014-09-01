<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Auctions
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="usersLandingContent">
            
       
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Auctions" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Title</th>
                                <th>Date Held</th>
                            </tr>
                            </thead>
                            <?php foreach($auctions as $auction): ?>
                                <tr>
                                <td>
                                    <?= $auction->title; ?>
                                </td>
                                <td><?php echo $auction->date_held; ?></td>
                                <td>
                                    <a href="auctions/<?= $auction->id; ?>">
                                        <span class="glyphicon glyphicon-arrow-right"></span>
                                    </a>
                                </td>
                            </tr>          
                            <?php endforeach ?>                       
                        </table>
                    </div>
                   
                </div>
         </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>