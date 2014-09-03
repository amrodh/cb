<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Vacancy / <?= $vacancy->name; ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="usersLandingContent">
                    
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="<?= base_url();?>application/static/images/vacancy.png" alt="">
                        </div>
                        <div class="col-lg-9">
                            <h3><?= $vacancy->name ?></h3>
                            <p>End Date : <?= $vacancy->end_date;  ?></p>
                            <p><?= $vacancy->description;  ?></p>
                        </div>
                    </div>
                 </div>


                 <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Enrolled Users" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>First Name</th>
                                <th>Lasr Name</th>
                                <th>Application Date</th>
                                <th>Résumé</th>
                            </tr>
                            </thead>
                            <?php foreach($users as $user): ?>
                                <tr>
                                <td>
                                    <?php if (is_object($user->user_identifier)): ?>
                                        <a href="<?= base_url();?>admin/users/<?= $user->user_identifier->username  ?>">
                                            <?= $user->user_identifier->username;  ?>
                                        </a>
                                    <?php else: ?>
                                         <?= $user->user_identifier;  ?>
                                    <?php endif ?>
                                </td>
                                <td><?= $user->first_name  ?></td>
                                <td><?= $user->last_name  ?></td>
                                
                                <td><?= $user->date_joined  ?></td>
                                <td><a href="download/<?= $user->cv; ?>" target="_blank">
                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                </a></td>
                               
                            </tr>          
                            <?php endforeach ?>                       
                        </table>
                    </div>
                   
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>