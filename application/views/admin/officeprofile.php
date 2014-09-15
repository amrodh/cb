<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
               
               <div class="tab-pane active col-lg-8" id="profile">
              <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Office Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>District:</td>
                        <td><?php echo $office->district_en; ?></td>
                      </tr>
                      <tr>
                        <td width="20%">Address:</td>
                        <td width="80%"><?php echo $office->address_en; ?></td>
                      </tr>
                      <tr>
                        <td width="20%">Phone:</td>
                        <td width="80%"><?php echo $office->phone; ?></td>
                      </tr>
                      <tr>
                        <td width="20%">Longitude:</td>
                        <td width="80%"><?php echo $office->longitude; ?></td>
                      </tr>
                      <tr>
                        <td>Latitude:</td>
                        <td><?php echo $office->latitude; ?></td>
                      </tr>
                      <tr>
                        <td>Working Hours:</td>
                        <td> from <b> <?= $office->start_time; ?> </b> to <b> <?= $office->end_time; ?> </b>
                        </td>
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
                          <input type="hidden" name="id" value="<?php echo $office->id; ?>">
                           <input style="color:white" type="submit" name="edit"   class="button btn btn-sm " value="Edit"> 
                           <input style="color:white" type="submit" name="delete" class="button btn btn-sm " value="Delete">
                        </form>
                    </span>
                </div>
            
          </div>
            </div>

            <div class="col-lg-4" style="margin-top:1%;">
                <div class="panel-body">
                <iframe
                  width="100%"
                  height="350"
                  frameborder="0" style="border:0"
                  src="https://www.google.com/maps/embed/v1/view?key=AIzaSyCNNfcTu6tsiWJkLtEZWyaPk2_syUlGue0&center=-33.8569,151.2152&zoom=18&maptype=satellite">
                </iframe>
                </div>
            </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>