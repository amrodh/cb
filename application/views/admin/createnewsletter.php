<?php include('header.php'); ?>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="container-fluid">
           
           <div class="row" style="min-height:610px;">
               <div class="col-lg-12">
                   <div class="panel panel-info">
                       <div class="panel-heading">
                          <h3 class="panel-title">Newsletter Creation</h3>
                        </div>
                        <div class="panel-body">
                            
                            <label for="">Type : </label>
                            <select name="" id="newsletterSelect">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="properties">Properties</option>
                                <option value="banners">Banners</option>
                            </select>
                            <div class="content">

                                <div class="hide newsletterContent" id="single">
                                    <form action="" method="post" enctype="multipart/form-data">
                                    <table class="table table-user-information">
                                    <tbody>
                                      <tr>
                                        <td>Upper Text:</td>
                                        <td><input type="text" name="upper">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Lower Text:</td>
                                        <td>
                                        <textarea name="lower" id="" cols="30" rows="10">
        Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. 
                                            
                                        </textarea>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Image:</td>
                                        <td><input type="file" name="userfile" required>
                                        </td>
                                      </tr>
                                  </tbody>
                                    </table>
                                    <input type="submit" name="singlepreview" class="btn btn-primary" value="Preview">
                                    </form>
                                </div>
                                


                            

                            </div>
                        </div>
                        <!-- <div class="panel-footer">
                            <input type="submit" name="singlepreview" class="btn btn-primary" value="Preview">
                        </div> -->
                   </div>
               </div>
           </div>
            

        </div>
    </div>
</div>

<?php include('footer.php') ?>