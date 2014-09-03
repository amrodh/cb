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
                           		<tr>
                                <td>
                                	<?php if (is_object($user->user_identifier)): ?>
                                		<a href="users/<?= $user->user_identifier->username; ?>">
                                				<?= $user->user_identifier->username;  ?>
                                		</a>
                                	<?php else: ?>
                                		<?= $user->user_identifier;  ?>
                                	<?php endif ?>
                                </td>
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