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
                                        <td>Title:</td>
                                        <td><input type="text" name="title">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Upper Text:</td>
                                        <td><textarea name="upper" id="" cols="30" rows="10"></textarea>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Lower Text:</td>
                                        <td>
                                        <textarea name="lower" id="" cols="30" rows="10"></textarea>
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
                                <div class="hide newsletterContent" id="banners">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>Title:</td>
                                                    <td><input type="text" name="title">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Upper Text:</td>
                                                    <td><textarea name="upper" id="" cols="30" rows="10"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lower Text:</td>
                                                    <td>
                                                    <textarea name="lower" id="" cols="30" rows="10"></textarea>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Banners:</td>
                                                    <td>
                                                        <input type="file" id="file" name="img[]" required>
                                                        <input type="button" id="add_more" class="upload" value="Add More Images"/>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <input type="submit" name="bannerspreview" class="btn btn-primary" value="Preview">
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