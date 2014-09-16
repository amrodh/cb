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
                            <form action="">
                            <label for="">Type : </label>
                            <select name="" id="newsletterSelect">
                                <option value=""></option>
                                <option value="single">Single</option>
                                <option value="properties">Properties</option>
                                <option value="banners">Banners</option>
                            </select>
                            <div class="content">
                                <table class="table table-user-information hide newsletterContent" id="single">
                                    <tbody>
                                      <tr>
                                        <td>Upper Text:</td>
                                        <td><input type="text" name="title" required pattern=".{4,}" title="4 characters minimum" required>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Lower Text:</td>
                                        <td><input type="text" name="title" required pattern=".{4,}" title="4 characters minimum" required>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Image:</td>
                                        <td><input type="file" name="userfile" required>
                                        </td>
                                      </tr>
                                  </tbody>
                                </table>
                                <table class="table table-user-information hide newsletterContent" id="properties">
                                    <tbody>
                                      <tr>
                                        <td>Upper Text:</td>
                                        <td><input type="text" name="title" required pattern=".{4,}" title="4 characters minimum" required>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Lower Text:</td>
                                        <td><input type="text" name="title" required pattern=".{4,}" title="4 characters minimum" required>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Weekly Listing:</td>
                                        <td><input type="checkbox" name="" required>
                                        </td>
                                      </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <input type="submit" name="submit" class="btn btn-primary" value="Preview">
                            </form>
                        </div>
                   </div>
               </div>
           </div>
            

        </div>
    </div>
</div>

<?php include('footer.php') ?>