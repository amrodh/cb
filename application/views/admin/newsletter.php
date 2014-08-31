<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Newsletter
                            </li>
                        </ol>
                    </div>
                </div>
        <div class="usersLandingContent">
            
       
                <div class="row">
                    <div class="col-lg-10">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Users" />
                         </div>
                        <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>Username</th>
                                <th>Date Joined</th>
                            </tr>
                            </thead>
                            <?php foreach($users as $user): ?>
                            <?php if ($user->is_active == 1): ?>
                                <tr class="list-group-item-success">
                            <?php else: ?>
                                <tr class="list-group-item-warning">
                            <?php endif ?>
                                <td><a href="users/<?php echo $user->username; ?>"><?php echo $user->username; ?></a></td>
                                <td><?php echo $user->email; ?></td>
                                <td><?php echo $user->first_name; ?></td>
                                <td><?php echo $user->last_name; ?></td>
                                <td><?php echo $user->date_joined; ?></td>
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