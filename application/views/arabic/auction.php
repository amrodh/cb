<?php include('header.php'); ?>
<?php include('search.php'); ?>
<div class="container auctions_main_div">
    <div class="auctions_top_div">
        المزادات
        <div id="auctions_breadcrumb">
            <ol class="breadcrumb breadcrumb_styling">
                <li><a href="http://localhost/ColdwellBanker">كولدويل بانكر الرئيسية</a></li>
                <li class="active">المزادات</li>
            </ol>
        </div>
    </div>
    <div id="auctions_bottom_div">
        <div class="row">
            <div class="col-lg-8">
                <div id="search_header" style="margin-top: -30px;">
                    <ul class="nav nav-tabs nav-justified search_box" id="search_tabs">
                       <li class="active"><a href="#recent" id="auction_anchor1" data-toggle="tab">الحديث</a></li>
                       <!-- <li><a href="#current" id="auction_anchor2" data-toggle="tab">الحالي</a></li> -->
                       <li><a href="#upcoming" id="auction_anchor3" data-toggle="tab">القادمة</a></li>
                    </ul>
                </div>
                <div class="tab-content auction_body">
                    <div class="tab-pane active" id="recent">
                        <div class="auction_body_top_div">
                            <div id="auction_div1"> نتائج <b>١ - ١٠ </b> من <b>٦٨</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; عرض </div>
                            <div id="auction_div2">
                                <select class="selectpicker" id="auction_dropdown" data-style="btn" data-title="10">
                                    <option>١٠</option> 
                                    <option>٢٠</option>
                                    <option>٣٠</option>
                                    <option>٥٠</option>
                                    <option>١٠٠</option>
                                </select> 
                            </div> 
                            <div id="auction_div3">
                                نتيجة في الصفحة. 
                            </div>
                            <div id="auction_div4">
                                <a href="#">١</a>
                                <a href="#">٢</a>
                                <a href="#">٣</a>
                                <a href="#">٤</a>
                                <a href="#">التالي</a>
                            </div>
                        </div>
                        <div class="auction_body_bottom_div">
                        <?php if (is_array($recentAuctions)): ?>
                            <?php foreach ($recentAuctions as $auction): ?>
                            <div class="row auction_content">
                                <div class="col-lg-3">
                                    <div class="auction_img">
                                        <img src="<?= base_url();?>/application/static/upload/auctions/<?= $auction->image; ?>" alt="Image" class="img-responsive">
                                    </div>
                                   <!--  <div class="auction_rating">
                                        <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                        <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                        <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                        <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                    </div> -->
                                </div>
                                <div class="col-lg-9">
                                    <div class="auction_content_title">
                                        <?= $auction->title; ?>
                                    </div>
                                    <div class="auction_content_body">
                                        <div class="row auction_date">
                                            <?= $auction->date_held; ?>
                                        </div>
                                        <div class="row">
                                            <?= $auction->text; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <?php else: ?>
                                <div class="alert alert-warning">
                                    لا يوجد
                                </div>
                        <?php endif ?>
                            
                        </div>
                    </div>
                    <div class="tab-pane" id="upcoming">
                        <div class="auction_body_top_div">
                            <div id="auction_div1"> نتائج <b>١ - ١٠ </b> من <b>٦٨</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; عرض </div>
                            <div id="auction_div2">
                                <select class="selectpicker" id="auction_dropdown" data-style="btn" data-title="10">
                                    <option>١٠</option> 
                                    <option>٢٠</option>
                                    <option>٣٠</option>
                                    <option>٥٠</option>
                                    <option>١٠٠</option>
                                </select> 
                            </div> 
                            <div id="auction_div3">
                                نتيجة في الصفحة. 
                            </div>
                            <div id="auction_div4">
                                <a href="#">١</a>
                                <a href="#">٢</a>
                                <a href="#">٣</a>
                                <a href="#">٤</a>
                                <a href="#">التالي</a>
                            </div>
                        </div>
                        <div class="auction_body_bottom_div">
                            <?php if (is_array($upcomingAuctions)): ?>
                                <?php foreach ($upcomingAuctions as $auction): ?>
                                    <div class="row auction_content">
                                        <div class="col-lg-3">
                                            <div class="auction_img">
                                                <img src="<?= base_url();?>/application/static/upload/auctions/<?= $auction->image; ?>" alt="Image" class="img-responsive">
                                            </div>
                                           <!--  <div class="auction_rating">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                                <img src="<?= base_url();?>/application/static/images/icon_star.png" alt="Image" class="img-responsive">
                                            </div> -->
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="auction_content_title">
                                                <?= $auction->title_ar; ?>
                                            </div>
                                            <div class="auction_content_body">
                                                <div class="row auction_date">
                                                    <?= $auction->date_held; ?>
                                                </div>
                                                <div class="row">
                                                    <?= $auction->text_ar; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach ?>
                            <?php else: ?>
                                <div class="alert alert-warning">
                                    لا يوجد
                                </div>
                            <?php endif ?>
                            
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
                        <button type="submit" class="search_btn_submit3">بحث</button>
                    </div>
                </div>
                <div class="row auction_top_tool">
                    <div class="auction_toptool_title">
                        الحاسبة المالية
                    </div>
                    <div class="row auction_toptool_content">
                        <div class="col-lg-2">
                            <img src="<?= base_url();?>/application/static/images/icon_calculator.png">
                        </div>
                        <div class="col-lg-6" id="auction_calculator">
                            <a href="#calculatorTallModal" data-toggle="modal">حاسبة آلة الدفع الشهري</a>
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
              <img style="width: 6%; margin-right: 15px" src="<?= base_url();?>/application/static/images/icon_calculator.png">
              <h4 class="calculator_modal_title">ألة حساب الدفع الشهري </h4>
              <div style="font-size: 12px;margin-right: 65px;font-weight: lighter;">
                  أدخل قرضك و معلومات الممتلكات الخاصة بك.
              </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6" style="border-left: 2px solid #5a7baa;">
                        <div class="calculator_col_title">
                            معلومات الشراء
                        </div>
                        <div class="calculator_col_content">
                            <div class="row calculator_rows">
                                <div class="calculator_labels col-lg-5">
                                    سعر الشراء:
                                </div>
                                <div class="calculator_inputs col-lg-7">
                                    <input type="text" class="form-control calculator_form_input" name="purchasePrice" id="purchasePrice" placeholder="0">
                                </div>
                            </div>
                            <div class="row calculator_rows">
                                <div class="calculator_labels col-lg-5">
                                    الدفعة الأولى:
                                </div>
                                <div class="calculator_inputs col-lg-7">
                                    <input type="text" class="form-control calculator_form_input" name="downPayment" id="downPayment" placeholder="0" onChange="calculatePayment(this.form);">
                                </div>
                            </div>
                            <div class="row calculator_rows">
                                <div class="calculator_labels col-lg-5">
                                    الفائدة:
                                </div>
                                <div class="calculator_inputs col-lg-7">
                                    <input type="text" class="form-control calculator_form_input" name="interestRate" id="interestRate" placeholder="0"><div style="margin-top: -25px;margin-right: 165px;"> %</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="calculator_col_title">
                            نتائجك
                        </div>
                        <div class="calculator_col_content">
                            <div class="row calculator_rows">
                                <div class="calculator_labels col-lg-5">
                                    الرصيد المتبقي:
                                </div>
                                <div class="calculator_inputs col-lg-7">
                                    <input type="text" class="form-control calculator_form_input" name="balance" id="balance" placeholder="0">
                                </div>
                            </div>
                            <div class="row calculator_rows">
                                <div class="calculator_labels col-lg-5">
                                    مجموع الدفعات:
                                </div>
                                <div class="calculator_inputs col-lg-7">
                                    <input type="text" class="form-control calculator_form_input" name="totalPayment" id="totalPayment" placeholder="0">
                                </div>
                            </div>
                            <div class="row calculator_rows">
                                <div class="calculator_labels col-lg-5">
                                    الدفع الشهري:
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
                        مدة القرض:
                    </div>
                    <div class="calculator_inputs col-lg-7">
                        <input type="text" class="form-control" name="loanTerm" id="loanTerm" placeholder="5"> 
                        <div style="margin-top: -25px;margin-right: 70px;font-weight: lighter;font-size: 12px;"> سنة. (أقصى عدد سنوات للقرض هي 5 سنوات)</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="margin: auto;width: 185px;">
                <div class="col-lg-12">
                    <input type="button" class="btn btn-default calculator_btn_submit" value="حساب" style="" onClick="cmdCalc_Click(this.form)">
               </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>
<?php include('footer.php'); ?>