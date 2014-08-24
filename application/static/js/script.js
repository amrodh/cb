function search_validation ()
{
        return true;
}

function toggleVisibility()
{
    if ($('.search_bottom_row').css('display') == 'none')
        {
            $(".search_bottom_row").slideDown("slow");
            if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    $('.search_components2').animate({marginTop:"20px"});
                    $('.search_btn_submit2').animate({marginTop:"20px"});
                }
            else 
                {
                    $('.search_components2').animate({marginTop:"10px"});
                    $('.search_btn_submit').animate({marginTop:"67px"});
                }
        }
        else 
        {
            $(".search_bottom_row").slideUp("slow");
            if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    $('.search_components2').animate({marginTop:"54px"});
                    $('.search_btn_submit2').animate({marginTop:"0px"});
                }
            else 
                {
                    $('.search_components2').animate({marginTop:"54px"});
                    $('.search_btn_submit').animate({marginTop:"17px"});
                }
        }
}

function redirect()
{
    if (language == 'en')
        {
            window.location('http://localhost/ColdwellBanker/index.php/controller_property/compare_properties/en');
        }
        else
            {
                window.location('http://localhost/ColdwellBanker/index.php/controller_property/compare_properties/ar');
            }
    
}

function redirect_profile(language)
{
    if (language == 'en')
        {
            window.location('http://localhost/ColdwellBanker/index.php/controller_user');
        }
        else
            {
                window.location('http://localhost/ColdwellBanker/index.php/controller_user/index_ar');
            }
    
}

function toggleVisibility2 (){
    var margintop = $('#footer_div').css('margin-top');
if ($('.property_alert_bottom_row').css('display') == 'none')
    {
        
        $(".property_alert_bottom_row").slideDown("slow");
        if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    
                    $('.property_alert_btn_submit2').animate({marginTop:"20px"});
                    $('#footer_div').animate({marginTop:"260px"});
                }
            else 
                {
                    $('.property_alert_btn_submit').animate({marginTop:"67px"});
                }
    }
    else
    {
        $(".property_alert_bottom_row").slideUp("slow");
        if (($(window).width() >= '768' && $(window).width() < '992') || ($(window).width() < '768'))
                {
                    $('#footer_div').animate({marginTop: margintop});
                    $('.property_alert_btn_submit2').animate({marginTop:"17px"});
                }
            else 
                {
                    $('.property_alert_btn_submit').animate({marginTop:"17px"});
                }   
    }
};

//========================================================================================================

$('#footer_dropdown1').click(function (){
            if ($('#footer_dropdown1_data').css('display') == 'none'){
                if ($('#footer_dropdown2_data').css('display') != 'none')
                    {
                        $('#footer_dropdown2_data').slideUp('slow');
                    }
                    else if ($('#footer_dropdown3_data').css('display') != 'none')
                        {
                            $('#footer_dropdown3_data').slideUp('slow');
                        }
                $('#footer_dropdown1_data').slideDown('slow');
            }
            else
                {
                    $('#footer_dropdown1_data').slideUp('slow');
                }
        });
$('#footer_dropdown2').click(function (){
    if ($('#footer_dropdown2_data').css('display') == 'none'){
        if ($('#footer_dropdown1_data').css('display') != 'none')
            {
                $('#footer_dropdown1_data').slideUp('slow');
            }
            else if ($('#footer_dropdown3_data').css('display') != 'none')
                {
                    $('#footer_dropdown3_data').slideUp('slow');
                }
        $('#footer_dropdown2_data').slideDown('slow');
    }
    else
        {
            $('#footer_dropdown2_data').slideUp('slow');
        }
});
$('#footer_dropdown3').click(function (){
            if ($('#footer_dropdown3_data').css('display') == 'none'){
                if ($('#footer_dropdown2_data').css('display') != 'none')
                    {
                        $('#footer_dropdown2_data').slideUp('slow');
                    }
                    else if ($('#footer_dropdown1_data').css('display') != 'none')
                        {
                            $('#footer_dropdown1_data').slideUp('slow');
                        }
                $('#footer_dropdown3_data').slideDown('slow');
            }
            else
                {
                    $('#footer_dropdown3_data').slideUp('slow');
                }
        });
        
        
$(document).ready(function ()
        {
            //alert(document.title);
           if (document.title == "Properties" || document.title == "Market Index" || document.title == "Careers" || document.title == "Property Details") 
               {
                   $('#footer_div').css('margin-top' , '190px');
               }
            if (document.title == 'Share Your Property' || document.title == 'User Registration' || document.title == 'Profile' || document.title == 'Auctions' || document.title == "Home Page")
            {
                //alert ('hi');
                 $('#footer_div').css('margin-top' , '30px');
            }
//            else
//                $('#footer_div').css('margin-top' , '30px');
               
           $('.selectpicker').selectpicker();
        });
        
$(".modal-wide").on("show.bs.modal", function() {
  var height = $(window).height() - 200;
  $(this).find(".modal-body").css("max-height", height);
});


function cmdCalc_Click(form)
{
//    alert('clicked');
    var rate = $('#interestRate').val();
    
//    var interestRate = rate.options[rate.selectedIndex].value;
    if (form.purchasePrice.value == 0 || form.purchasePrice.value.length == 0) 
    {
        alert ("The Purchase Price field can't be 0!");
        $('#purchasePrice').focus();
        //form.purchasePrice.focus(); 
    }
    else 
        if (rate == 0 || rate.length == 0) 
        {
            alert ("The Interest Rate field can't be 0!");
            document.getElementById("interestRate").focus();
	}
        else 
            if (form.loanTerm.value == 0 || form.loanTerm.value.length == 0) 
            {
                alert ("The Term field can't be 0!");
                $('#loanTerm').focus();
//                form.loanTerm.focus(); 
            }
            else
                calculatePayment(form);
}

function calculatePayment(form)
{
    var rate = $("#interestRate").val();
    princ = $('#purchasePrice').val() - $('#downPayment').val();
    intRate = (rate/100);
    months = $('#loanTerm').val() * 12;
    $('#monthlyPayment').val(princ  + (princ * intRate * form.loanTerm.value) / months);
    $('#balance').val(princ);
    $('#totalPayment').val(months);
}

$( window ).resize(function() {
//    if ($(window).width() < '840px' &&  $(window).width() > '1040px')
//        {
//            alert ('hi');
//            $('.navbar-toggle').css('margin-left'
//        ,  '-850%');
//        }
//    else
//        $('.navbar-toggle').css('margin-left',  '-800%');
});
