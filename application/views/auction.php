<!DOCTYPE html>
<html lang="en">
    <body>
        <?php include('header.php'); ?>
        <?php include('search.php'); ?>
        <div class="container auctions_main_div">
            <div class="auctions_top_div">
                AUCTION
                <div id="auctions_breadcrumb">
                    <ol class="breadcrumb breadcrumb_styling">
                        <li><a href="http://localhost/ColdwellBanker">Coldwell Banker Home</a></li>
                        <li class="active">Auctions</li>
                    </ol>
                </div>
            </div>
            <div id="auctions_bottom_div">
                <div class="row">
                    <div class="col-lg-8">
                        <div id="search_header" style="margin-top: -30px;">
                            <ul class="nav nav-tabs nav-justified search_box" id="search_tabs">
                               <li class="active"><a href="#recent" id="auction_anchor1" data-toggle="tab">Recent</a></li>
                               <li><a href="#current" id="auction_anchor2" data-toggle="tab">Current</a></li>
                               <li><a href="#upcoming" id="auction_anchor3" data-toggle="tab">Upcoming</a></li>
                            </ul>
                        </div>
                        <div class="tab-content auction_body">
                            <div class="tab-pane active" id="recent">
                                <div class="auction_body_top_div">
                                    <div id="auction_div1"> Results <b>1 - 10</b> of <b>68</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; View </div>
                                    <div id="auction_div2">
                                        <select class="selectpicker" id="auction_dropdown" data-style="btn" data-title="10">
                                            <option>20</option> 
                                            <option>30</option>
                                            <option>40</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select> 
                                    </div> 
                                    <div id="auction_div3">
                                        results per page. 
                                    </div>
                                    <div id="auction_div4">
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#">next</a>
                                    </div>
                                </div>
                                <div class="auction_body_bottom_div">
                                    <div class="row auction_content">
                                        <div class="col-lg-3">
                                            <div class="auction_img">
                                                <img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive">
                                            </div>
                                            <div class="auction_rating">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="auction_content_title">
                                                Tips for Marketing Your Home to Potential Buyers
                                            </div>
                                            <div class="auction_content_body">
                                                <div class="row auction_date">
                                                    05-19-2010
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1 auction_tags_title">
                                                        Tags:
                                                    </div>
                                                    <div class="col-lg-11 auction_tags">
                                                        <a href="#">marketing</a>, <a href="#">home</a>, <a href="#">buy a home</a>, <a href="#">covenants</a>, <a href="#">floor plan</a>, <a href="#">home</a>, <a href="#">insurance</a>,
                                                        <a href="#">sell</a>, <a href="#">sell a home</a>, <a href="#">services providers</a>, <a href="#">termite</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row auction_content">
                                        <div class="col-lg-3">
                                            <div class="auction_img">
                                                <img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive">
                                            </div>
                                            <div class="auction_rating">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="auction_content_title">
                                                Tips for Marketing Your Home to Potential Buyers
                                            </div>
                                            <div class="auction_content_body">
                                                <div class="row auction_date">
                                                    05-19-2010
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1 auction_tags_title">
                                                        Tags:
                                                    </div>
                                                    <div class="col-lg-11 auction_tags">
                                                        <a href="#">marketing</a>, <a href="#">home</a>, <a href="#">buy a home</a>, <a href="#">covenants</a>, <a href="#">floor plan</a>, <a href="#">home</a>, <a href="#">insurance</a>,
                                                        <a href="#">sell</a>, <a href="#">sell a home</a>, <a href="#">services providers</a>, <a href="#">termite</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row auction_content">
                                        <div class="col-lg-3">
                                            <div class="auction_img">
                                                <img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive">
                                            </div>
                                            <div class="auction_rating">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="auction_content_title">
                                                Tips for Marketing Your Home to Potential Buyers
                                            </div>
                                            <div class="auction_content_body">
                                                <div class="row auction_date">
                                                    05-19-2010
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1 auction_tags_title">
                                                        Tags:
                                                    </div>
                                                    <div class="col-lg-11 auction_tags">
                                                        <a href="#">marketing</a>, <a href="#">home</a>, <a href="#">buy a home</a>, <a href="#">covenants</a>, <a href="#">floor plan</a>, <a href="#">home</a>, <a href="#">insurance</a>,
                                                        <a href="#">sell</a>, <a href="#">sell a home</a>, <a href="#">services providers</a>, <a href="#">termite</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="current">
                                <div class="auction_body_top_div">
                                    <div id="auction_div1"> Results <b>1 - 10</b> of <b>68</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; View </div>
                                    <div id="auction_div2">
                                        <select class="selectpicker" id="auction_dropdown" data-style="btn" data-title="10">
                                            <option>20</option> 
                                            <option>30</option>
                                            <option>40</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select> 
                                    </div> 
                                    <div id="auction_div3">
                                        results per page. 
                                    </div>
                                    <div id="auction_div4">
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#">next</a>
                                    </div>
                                </div>
                                <div class="auction_body_bottom_div">
                                    <div class="row auction_content">
                                        <div class="col-lg-3">
                                            <div class="auction_img">
                                                <img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive">
                                            </div>
                                            <div class="auction_rating">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="auction_content_title">
                                                Tips for Marketing Your Home to Potential Buyers
                                            </div>
                                            <div class="auction_content_body">
                                                <div class="row auction_date">
                                                    05-19-2010
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1 auction_tags_title">
                                                        Tags:
                                                    </div>
                                                    <div class="col-lg-11 auction_tags">
                                                        <a href="#">marketing</a>, <a href="#">home</a>, <a href="#">buy a home</a>, <a href="#">covenants</a>, <a href="#">floor plan</a>, <a href="#">home</a>, <a href="#">insurance</a>,
                                                        <a href="#">sell</a>, <a href="#">sell a home</a>, <a href="#">services providers</a>, <a href="#">termite</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="upcoming">
                                <div class="auction_body_top_div">
                                    <div id="auction_div1"> Results <b>1 - 10</b> of <b>68</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; View </div>
                                    <div id="auction_div2">
                                        <select class="selectpicker" id="auction_dropdown" data-style="btn" data-title="10">
                                            <option>20</option> 
                                            <option>30</option>
                                            <option>40</option>
                                            <option>50</option>
                                            <option>100</option>
                                        </select> 
                                    </div> 
                                    <div id="auction_div3">
                                        results per page. 
                                    </div>
                                    <div id="auction_div4">
                                        <a href="#">1</a>
                                        <a href="#">2</a>
                                        <a href="#">3</a>
                                        <a href="#">4</a>
                                        <a href="#">next</a>
                                    </div>
                                </div>
                                <div class="auction_body_bottom_div">
                                    <div class="row auction_content">
                                        <div class="col-lg-3">
                                            <div class="auction_img">
                                                <img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive">
                                            </div>
                                            <div class="auction_rating">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="auction_content_title">
                                                Tips for Marketing Your Home to Potential Buyers
                                            </div>
                                            <div class="auction_content_body">
                                                <div class="row auction_date">
                                                    05-19-2010
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1 auction_tags_title">
                                                        Tags:
                                                    </div>
                                                    <div class="col-lg-11 auction_tags">
                                                        <a href="#">marketing</a>, <a href="#">home</a>, <a href="#">buy a home</a>, <a href="#">covenants</a>, <a href="#">floor plan</a>, <a href="#">home</a>, <a href="#">insurance</a>,
                                                        <a href="#">sell</a>, <a href="#">sell a home</a>, <a href="#">services providers</a>, <a href="#">termite</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row auction_content">
                                        <div class="col-lg-3">
                                            <div class="auction_img">
                                                <img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive">
                                            </div>
                                            <div class="auction_rating">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="auction_content_title">
                                                Tips for Marketing Your Home to Potential Buyers
                                            </div>
                                            <div class="auction_content_body">
                                                <div class="row auction_date">
                                                    05-19-2010
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-1 auction_tags_title">
                                                        Tags:
                                                    </div>
                                                    <div class="col-lg-11 auction_tags">
                                                        <a href="#">marketing</a>, <a href="#">home</a>, <a href="#">buy a home</a>, <a href="#">covenants</a>, <a href="#">floor plan</a>, <a href="#">home</a>, <a href="#">insurance</a>,
                                                        <a href="#">sell</a>, <a href="#">sell a home</a>, <a href="#">services providers</a>, <a href="#">termite</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="row auction_search">
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="auction_search_txtbx">
                            </div>
                            <div class="col-lg-5">
                                <button type="submit" class="search_btn_submit3">Search</button>
                            </div>
                        </div>
                        <div class="row auction_top_tool">
                            <div class="auction_toptool_title">
                                Top Tool
                            </div>
                            <div class="row auction_toptool_content">
                                <div class="col-lg-2">
                                    <img src="<?= base_url();?>/application/static/images/icon_calculator.png">
                                </div>
                                <div class="col-lg-6" id="auction_calculator">
                                    <a href="#calculatorTallModal" data-toggle="modal">Monthly Payment Calculator</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <form>
            <div id="calculatorTallModal" class="modal modal-wide fade">
                <div class="modal-dialog">
                  <div class="calculator_modal_content modal-content">
                    <div class="calculator_modal_header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <img style="width: 6%;" src="<?= base_url();?>/application/static/images/icon_calculator.png">
                      <h4 class="calculator_modal_title">Monthly Payment Calculator</h4>
                      <div style="font-size: 12px;margin-left: 60px;font-weight: lighter;">
                          Input your loan and property information below.
                      </div>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6" style="border-right: 2px solid #5a7baa;">
                                <div class="calculator_col_title">
                                    Purchase Information
                                </div>
                                <div class="calculator_col_content">
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Purchase Price:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="purchasePrice" id="purchasePrice" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Down Payment:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="downPayment" id="downPayment" placeholder="0" onChange="calculatePayment(this.form);">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Interest Rate:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="interestRate" id="interestRate" placeholder="0"><div style="margin-top: -28px;margin-left: 178px;"> %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="calculator_col_title">
                                    Your Results
                                </div>
                                <div class="calculator_col_content">
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Balance:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="balance" id="balance" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Total Payment:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="totalPayment" id="totalPayment" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="row calculator_rows">
                                        <div class="calculator_labels col-lg-5">
                                            Monthly Payment:
                                        </div>
                                        <div class="calculator_inputs col-lg-7">
                                            <input type="text" class="form-control calculator_form_input" name="monthlyPayment" id="monthlyPayment" placeholder="0">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="calculator_labels col-lg-2">
                                Loan Term:
                            </div>
                            <div class="calculator_inputs col-lg-7">
                                <input type="text" class="form-control" name="loanTerm" id="loanTerm" placeholder="5"> 
                                <div style="margin-top: -25px;margin-left: 70px;font-weight: lighter;font-size: 12px;"> Yrs. (Maximum loan terms is 5 yrs.)</div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin: auto;width: 185px;">
                        <div class="col-lg-12">
                            <input type="button" class="btn btn-default calculator_btn_submit" value="Calculate" style="" onClick="cmdCalc_Click(this.form)">
                       </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            </form>
        <script type="text/javascript" src="http://localhost/ColdwellBanker/js/script.js"></script>
        <?php include('footer.php'); ?>
    </body>
</html>