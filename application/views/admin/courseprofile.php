<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
            <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $course->title; ?> <span style="float:right"><?= $course->title_ar ?></span></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class=" col-md-9 col-lg-12 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>
                          <!-- <img style="width:300px;" src="<?= base_url();?>application/static/upload/courses/<?= $course->image; ?>" alt=""> -->
                        </td>
                      </tr>
                      <!-- <tr>
                        <td width="%">Description:</td>
                        <td width="%"><?php echo $course->text; ?></td>
                        <td width="%" >
                          <span style="float:right;">
                            <?php echo $course->text_ar; ?>
                          </span>
                          </td>
                        <td></td>
                      </tr> -->
                      <tr>
                        <td width="%">Feature:</td>
                        <td id="img_td" width="%"><?php echo $course->feature; ?></td>
                        <td width="%" >
                          <span style="float:right;">
                            <?php echo $course->feature_ar; ?>
                          </span>
                          </td>
                        <td></td>
                      </tr>
                      
                      
                      
                     
                    </tbody>
                  </table>
                  
                 <!--  <a href="#" class="btn btn-primary">Email</a>
                  <a href="#" class="btn btn-primary">Message</a> -->
                </div>
              </div>
            </div>
              <div class="panel-footer" style="height:51px;">
                  <!-- <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a> -->
                  <span class="pull-right">
                      <form action="" method="post">
                         <input style="color:white" type="submit" name="edit"   class="button btn btn-sm " value="Edit"> 
                         <input style="color:white" type="submit" name="delete" class="button btn btn-sm " value="Delete">
                      </form>
                  </span>
              </div>
          </div>
              <div class="row">
                    <div class="col-lg-12">
                        <div class="panel-body">
                            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Enrolled Users" />
                         </div>
                        
                            <?php if (is_array($users)): ?>
                                <table class="table" id="dev-table">
                            <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>E-mail</th>
                                <th>Comments</th>
                            </tr>
                            </thead>
                                 <?php foreach($users as $user): ?>
                                <tr>
                                <td><?= $user->first_name  ?></td>
                                <td><?= $user->last_name  ?></td>
                                
                                <td><?= $user->phone  ?></td>
                                <td><?= $user->email  ?></td>
                                <td><?= $user->comments  ?></td>
                               
                                </tr>          
                                <?php endforeach ?> 
                                <?php else: ?>
                                <div class="alert alert-warning">
                                    No Inquiries Yet..
                                </div>  
                            <?php endif ?>
                                               
                        </table>
                    </div>
                   
                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>


CREATE TABLE contact_training
(
id int NOT NULL PRIMARY KEY,
first_name varchar(100),
last_name varchar(100),
email varchar(255),
phone varchar(100),
comments varchar(255),
trainingId int(11)
);



<?php include('footer.php') ?>