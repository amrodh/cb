<?php include('header.php'); ?>
<!-- <?php //include('search.php'); ?> -->
<div class="container auctions_main_div">
    <div class="auctions_top_div">
        <?php echo $this->lang->line('auction_title'); ?>
        <div id="auctions_breadcrumb">
            <ol class="breadcrumb breadcrumb_styling">
                <li><a href="http://localhost/ColdwellBanker"><?php echo $this->lang->line('auction_breadcrumb1'); ?></a></li>
                <li class="active"><?php echo $this->lang->line('auction_breadcrumb2'); ?></li>
            </ol>
        </div>
    </div>
    <div id="auctions_bottom_div">
        <div class="row">
            <div class="col-lg-8">
                <div id="search_header" style="margin-top: -30px;">
                    <ul class="nav nav-tabs nav-justified search_box" id="search_tabs">
                       <li class="active" style="padding: 0; height: 25px;"><a href="#recent" id="auction_anchor1" data-toggle="tab" style="height: 25px;padding: 0;padding-top: 2%;"><?php echo $this->lang->line('auction_tab1'); ?></a></li>
                               <li style="padding: 0; height: 25px;"><a href="#upcoming" id="auction_anchor3" data-toggle="tab" style="height: 25px;padding: 0;padding-top: 2%;"><?php echo $this->lang->line('auction_tab2'); ?></a></li>
                    </ul>
                </div>
                <div class="tab-content auction_body">
                    <div class="tab-pane active" id="recent">
                        <div class="auction_body_bottom_div">
                            <table id="auctionsRecent" style="border:none;" class="table table-striped table-bordered" border="0" cellspacing="0" width="100%">
                                <thead id="thead">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                         
                                <tfoot id="tfoot">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (is_array($recentAuctions)): ?>
                                        <?php foreach ($recentAuctions as $auction): ?>
                                            <tr>
                                                <td>
                                                    <div class="row auction_content">
                                                        <div class="col-lg-4">
                                                            <div class="auction_img">
                                                                <img src="<?= base_url();?>/application/static/upload/auctions/<?= $auction->image; ?>" alt="Image" class="img-responsive">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
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
                                                </td>
                                            </tr>
                                    <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td>
                                                <div class="row" style="margin:auto; width:95%;">
                                                    <div class="alert alert-warning" style="text-align: center;width: 90%;margin: auto;">
                                                        لا يوجد
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="upcoming">
                        <div class="auction_body_bottom_div">
                            <table id="auctionsUpcoming" style="border:none;" class="table table-striped table-bordered" border="0" cellspacing="0" width="100%">
                                <thead id="thead">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                         
                                <tfoot id="tfoot">
                                    <tr>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <?php if (is_array($upcomingAuctions)): ?>
                                        <?php foreach ($upcomingAuctions as $auction): ?>
                                            <tr>
                                                <td>
                                                    <div class="row auction_content">
                                                        <div class="col-lg-4">
                                                            <div class="auction_img">
                                                                <img src="<?= base_url();?>/application/static/upload/auctions/<?= $auction->image; ?>" alt="Image" class="img-responsive">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8">
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
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    <?php else: ?>
                                        <tr>
                                            <td>
                                                <div class="row" style="margin:auto; width:95%;">
                                                    <div class="alert alert-warning">
                                                        لا يوجد
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row auction_top_tool">
                    <div class="auction_toptool_title">
                        <?php echo $this->lang->line('auction_calculator_title'); ?>
                    </div>
                    <div class="row auction_toptool_content">
                        <div class="col-lg-2">
                            <img src="<?= base_url();?>/application/static/images/icon_calculator.png">
                        </div>
                        <div class="col-lg-6" id="auction_calculator">
                            <a href="#calculatorTallModal" data-toggle="modal"><?php echo $this->lang->line('auction_calculator_description'); ?></a>
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


<script type="text/javascript">
    $(document).ready(function (){

            $('#auctionsRecent').dataTable();
            $('#auctionsUpcoming').dataTable();

            $("#thead").css('display', 'none');
            $("#tfoot").css('display', 'none');

            $('#auctionsUpcoming > #thead').css('display', 'none');
            $('#auctionsUpcoming > #tfoot').css('display', 'none');
        });
</script>
