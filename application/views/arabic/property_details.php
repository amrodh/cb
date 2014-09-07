<?php include('header.php'); ?>
        <div class="container" id="property_address_div">
            الكيلو ١٩، سيتي فيو، الطريق الصحراوي، طريق مصر - إسكندرية الصحراوي
        </div>
        <div class="container" id="property_details_container">
            <div id="property_tabs_header">
                <ul class="nav nav-tabs nav-justified" id="property_tabs">
                    <li class="active"><a href="#details" data-toggle="tab">التفاصيل</a></li>
                    <li><a href="#map" data-toggle="tab">الخريطة</a></li>
                </ul>
            </div>

            <div class="tab-content property_details_body">
                <div class="tab-pane active" id="details">
                    <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 property_details_cols">
                        <div id="property_details_images" class="property_borders">
                            <div id="property_details_mainimage">
                                <img id="property_mainimage" src="<?= base_url();?>/application/static/images/sample_property_image.png">
                            </div>
                            <div class="visible-xs hidden-lg hidden-md hidden-sm" id="property_image_btn_div">
                                <button type="button" class="btn btn-default property_btn">عرض المزيد من الصور</button>
                            </div>
                            <div id="property_details_thumbnails" class="hidden-xs">
                                <p id="property_thumbnails_count">١ من ٤٥ صورة</p>
                                <div class="well property_well">
                                    <div class="carousel slide" id="property_carousel">
                                        <div class="carousel-inner">
                                            <div class="item active" style="margin-left: 10px;">
                                                <div class="row">
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <div class="row">
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                    <div class="property_thumbnail"><img src="<?= base_url();?>/application/static/images/sample_property_image.png" alt="Image" class="img-responsive"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="left carousel-control" href="#property_carousel" data-slide="prev"><img src="<?= base_url();?>/application/static/images/left_arrow.png">  </a>
                                        <a class="right carousel-control" href="#property_carousel" data-slide="next"> <img src="<?= base_url();?>/application/static/images/right_arrow.png"> </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="property_features_div" class="property_borders">
                            <div class="property_titles">
                                مميزات
                            </div>
                            <div id="property_features_details">
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        مميزات عامة
                                    </div>
                                    <div class="property_features_divs_details">
                                        برنامج خاص: عرض مسبق
                                    </div>
                                </div>
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        ميزة
                                    </div>
                                    <div class="property_features_divs_details">
                                        وصف المرأب
                                    </div>
                                </div>
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        وسائل الراحة
                                    </div>
                                    <div class="property_features_divs_details">
                                        ٤+ مدافئ
                                    </div>
                                </div>
                                <div class="property_features_divs">
                                    <div class="property_features_divs_title">
                                        الخارج
                                    </div>
                                    <div class="property_features_divs_details">
                                        نمط: نمط أخر
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 property_details_cols">
                        <div id="property_description" class="property_borders">
                            <div class="property_titles">
                                وصف
                            </div>
                            <div id="property_description_content">
                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy ni 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                im veniam, quis nostrud exerci tation ullamcorper.. Lorem ipsum dolor sit amet, co
                                ectetuer adipiscing elit, sed diam nonummy nibh.. Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy ni 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                im veniam, quis nostrud exerci tation ullamcorper.. Lorem ipsum dolor sit amet, co
                                ectetuer adipiscing elit, sed diam nonummy nibh. <br>
                                Price: <b>EGP 2,000,000</b>.
                            </div>
                        </div>
                        <div id="property_calculator" class="property_borders">
                            <div id="property_calculator_title">
                                الحاسبة المالية
                            </div>
                            <div id="property_calculator_content">
                                <div>
                                    <img src="<?= base_url();?>/application/static/images/icon_calculator.png"/>
                                </div>
                                <div id="property_calculator_details">
                                    <div class="property_titles">
                                        الدفعة الشهرية
                                    </div>
                                    <div class="property_calculator_data">
                                        Understanding your monthly costs can help you plan ahead and make important housing decisions. <a href="#calculatorTallModal" data-toggle="modal"> فتح الألة الحاسبة</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="property_contact" class="property_borders">
                            <p>
                                كيف تريد أن يتم الاتصال بك؟
                            </p>
                            <div id="property_contact_content">
                                <div class="row">
                                    <form class="form-inline" id="property_form" role="form">
                                            <div class="form-group">
                                                <label for="property_first_name">الاسم الأول</label>
                                                <input type="text" class="form-control" style="margin-right: 35px;" id="property_first_name" placeholder="يرجى إدخال الإسم الأول">
                                            </div>
                                            <div class="form-group">
                                                <label for="property_email">البريد الالكتروني</label>
                                                <input type="text" class="form-control" style="margin-right: 4px;" id="property_email" placeholder="يرجى إدخال البريد الإلكتروني">
                                            </div>
                                            <div class="form-group">
                                                <label for="property_last_name">إسم العائلة</label>
                                                <input type="text" class="form-control" style="margin-right: 34px;" id="property_last_name" placeholder="يرجى إدخال إسم العائلة">
                                            </div>
                                            <div class="form-group">
                                                <label for="property_phone">رقم الهاتف</label>
                                                <input type="text" class="form-control" style="margin-right: 34px;" id="property_phone" placeholder="يرجى إدخال رقم الهاتف">
                                            </div>
                                        <div class="form-group">
                                           <p> أنا مهتم في: 
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx1"value="buying"> شراء
                                                </label>
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx2"value="selling"> بيع
                                                </label>
                                                <label class="checkbox-inline">
                                                   <input type="checkbox" id="inlineChkbx3"value="renting"> إيجار
                                                </label>
                                           </p>
                                        </div>
                                        <div class="form-group">
                                            <p>يرجى إستخدم مربع النص أدناه لتقديم أي تعليقات أو اسئلة </p>
                                            <textarea class="form-control" id="property_form_textarea" rows="3"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-default property_btn" id="property_form_btn" onClick="">إرسال</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="row">
                        <div id="similar_properties" class="property_borders">
                            <div class="property_titles">
                                عقارات مشابهة
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 property_details_cols">
                                <div class="similiar_properties_content">
                                    <div>
                                        <img class="similar_properties_img" src="<?= base_url();?>/application/static/images/sample_property.png"/>
                                    </div>
                                    <div class="similar_properties_content">
                                        <p>
                                            26880 Pacific Coast Hwy
                                            Malibu, CA 90265
                                        </p>
                                        <p>
                                            $54,000,000
                                            13 bed, 14 bath
                                        </p>
                                        <p>
                                            <a href="#">عرض التفاصيل  </a><img src="<?= base_url();?>/application/static/images/orange_arrow_ar.png"/>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 property_details_cols">
                                <div class="similiar_properties_content">
                                    <div>
                                        <img class="similar_properties_img" src="<?= base_url();?>/application/static/images/sample_property.png"/>
                                    </div>
                                    <div class="similar_properties_content">
                                        <p>
                                            26880 Pacific Coast Hwy
                                            Malibu, CA 90265
                                        </p>
                                        <p>
                                            $54,000,000
                                            13 bed, 14 bath
                                        </p>
                                        <p>
                                            <a href="#">عرض التفاصيل </a><img src="<?= base_url();?>/application/static/images/orange_arrow_ar.png"/>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 property_details_cols">
                                <div class="similiar_properties_content">
                                    <div>
                                        <img class="similar_properties_img" src="<?= base_url();?>/application/static/images/sample_property.png"/>
                                    </div>
                                    <div class="similar_properties_content">
                                        <p>
                                            26880 Pacific Coast Hwy
                                            Malibu, CA 90265
                                        </p>
                                        <p>
                                            $54,000,000
                                            13 bed, 14 bath
                                        </p>
                                        <p>
                                            <a href="#">عرض التفاصيل  </a><img src="<?= base_url();?>/application/static/images/orange_arrow_ar.png"/>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="map">

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
        </div>
        <div id="property_notifier">
            <?php include 'property_alert.php'; ?>
        </div>
        <script type="text/javascript" src="<?= base_url();?>/application/static/js/script.js"></script>
        <script>
        $(function () {
          $('#property_tabs a:first').tab('show');
        });
        $(document).ready(function (){
           $('.property_thumbnail > img').click(function (){
               $('#property_mainimage').attr("src", $(this).attr("src"));
           }) ;
        });
    </script>
    <?php include('footer.php'); ?>