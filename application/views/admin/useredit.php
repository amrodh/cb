<?php include('header.php'); ?>

    <div id="wrapper">

        

        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
              
                <div class="row">
                    <div class="col-lg-12">
      <div class="row">
        <div class="col-lg-12" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Edit <b><?= $user->username; ?></b></h3>
            </div>
            <div class="panel-body">
              <div class="row">
              <form action="" method="post">
                
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" id="usernameField" required pattern=".{4,}" title="4 characters minimum" value="<?php if(isset($params)) echo $params['username']; ?>">
                        </td>
                      </tr>
                      <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" value="<?php if(isset($params)) echo $params['email']; ?>" required>
                        </td>
                      </tr>
                      <tr>
                        <td>First Name</td>
                        <td><input type="text" name="first_name" required pattern=".{2,}" title="2 characters minimum" value="<?php if(isset($params)) echo $params['first_name']; ?>"></td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td><input type="text" name="last_name" required pattern=".{2,}" title="2 characters minimum" value="<?php if(isset($params)) echo $params['last_name']; ?>"></td>
                      </tr>
                       
                      <tr>
                        <td>Phone</td>
                        <td><input type="text" name="phone" value="<?php if(isset($params)) echo $params['phone']; ?>" required>
                        </td>
                      </tr>
                      <tr>
                        <td>Location</td>
                        <td><input type="text" name="location" value="<?php if(isset($params)) echo $params['location']; ?>" >
                        </td>
                      </tr>

                     
                      
                     
                    </tbody>
                  </table>
                 
                  <input type="hidden" name="id" value="<?= $user->id; ?>">
                  <input type="submit" name="confirmedit" class="btn btn-primary" value="Submit">
                  <input type="submit" name="cancel" class="btn btn-primary" value="Cancel">
                   </form>
                </div>
               
              </div>
            </div>
            <?php if (isset($error)): ?>
              <div id="successAlert" class="alert alert-danger " role="alert">
                      <?= $error; ?> 
              </div>
            <?php endif ?>
           
            
          </div>
        </div>
      </div>
                    </div>
                </div>
       

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

<?php include('footer.php') ?>