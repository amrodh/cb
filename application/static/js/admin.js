jQuery(document).ready(function($) {
	$(".changePasswordAnchor").click(function(){
		$(".changePasswordContainer").slideDown('slow');
		$(this).hide();
	});

	$(".changePasswordCancel").click(function(){
		$(".changePasswordContainer").slideUp('slow');
		$(".changePasswordAnchor").fadeIn('slow');
	});	
});

$('[name="bannerspreview"]').click(function(event) {
	var neighborhoods = [];
	$('.neighborhoods').each(function(index, el) {
		neighborhoods[index] = $(this).val();
	});
	$('[name="neigborhoodArray"]').val(neighborhoods);
	// alert(neighborhoods);return;
});


$('#add_more_nums').click(function(event) {
	var count = $('#count').val();
	$('#tr_fax').before($('<tr><td>Phone'+count+'</td><td><select id="phone_category" name="phone_category_' + count + '" class="phone_category"><option value="residential">Residential</option><option value="commercial">Commercial</option><option value="hotline">Hotline</option></select></td><td id="td_phone"><input type="text" id="phones" name="phones[]"></td></tr>', {
	    id: 'phonediv'
	    })).fadeIn('slow');
	count = parseInt(count) +1;
	$('#count').val(count);
});

$('#office_submit').click(function(event) {
	var phone_categories = [];
	$('.phone_category').each(function(index, el) {
		phone_categories[index] = $(this).val();
	});
	$('[name="phone_categories"]').val(phone_categories);
	// alert(phone_categories);return;
});



var abc = 0; 

$('#add_more').click(function() {
	var count = $('#count').val();
	$(this).before($("<div/>", {
	    id: 'filediv'
	    }).fadeIn('slow').append($("<input/>", {
	    name: 'img[]',
	    type: 'file',
	    id: 'file'
	    })).append("<select id='neighborhoods' name='neighborhoods_" + count+"' class='neighborhoods'></select>"));
	    // $('#filediv').append("<select id='neighborhoods' name='neighborhoods'></select>");
	count = parseInt(count) +1;
	$('#count').val(count);
	var url = $('#url').val();
	url = url + 'admin/getAllNeighborhoods';
	$.ajax({
		url: url,
		type: 'POST'
	})
	.success(function(html) {
		var html2 = JSON.parse(html);
		for(var c in html2) {
			$('.neighborhoods').append('<option value="'+html2[c].neighborhood+'">'+html2[c].neighborhood+'</option>');
	    }
		// alert(html);
	});
	
            
          });

          $('body').on('change', '#file', function() {
              if (this.files && this.files[0]) {
                  abc += 1; // Incrementing global variable by 1.
                  var z = abc - 1;
                  var x = $(this).parent().find('#previewimg' + z).remove();
                  $(this).before("<div id='abcd" + abc + "' class='abcd'><img style='margin-bottom: 3%;width: 55%;height:100px;' id='previewimg" + abc + "' src=''/></div>");
                  var reader = new FileReader();
                  reader.onload = imageIsLoaded;
                  reader.readAsDataURL(this.files[0]);
                  $(this).hide();
                  $("#abcd" + abc).append($("<img/>", {
                    id: 'img',
                    src: '../../application/static/images/x.png',
                    alt: 'delete'
                  }).click(function() {
                    $(this).parent().parent().remove();
                  }));
              }
          });
// To Preview Image
      function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
      };
      $('#upload').click(function(e) {
          var name = $(":file").val();
          if (!name) {
              alert("First Image Must Be Selected");
              e.preventDefault();
          }
      });


$("#newsletterSelect").change(function(){

		$(".newsletterContent").each(function(){
			$(this).addClass('hide');
		});

		value = $(this).val();
		$("#"+value).removeClass('hide');
	});

$('#addMoreIDs').click(function(event) {
	$.getScript("../../application/static/js/getDelete.js");
	if ($('#propertyID').val().match(/^\d+$/))
	{
		$('#propertiesIDs').append('<tr id="'+$('#propertyID').val()+'"><td>'+$('#propertyID').val()+'<input type="hidden" name="properties[]" value="'+$('#propertyID').val()+'"></td><td><img id"'+$('#propertyID').val()+'" src="../../application/static/images/x.png" class="deleteBtn"></td></tr>');
	}
	else{
		$('#numeric_alert').removeClass('hide');
		jQuery("#numeric_alert").delay(2000).fadeOut("slow",function(){
            $('#numeric_alert').addClass('hide');
        });
		
		// alert('');
	}
	
	
});

	

$('.bxslider').bxSlider({
    auto:true
});


$("#checkall").click(function(){
	if($('#checkall').is(':checked')){
		$(".singlecheck").each(function(){
			$(this).prop('checked', true); 
			$(this).attr('disabled','disabled');
		});
	}else{
		$(".singlecheck").each(function(){
			$(this).prop('checked', false); 
			$(this).removeAttr('disabled');
		});
	}
});


function checkSingleNewsletterForm()
{
	if($('#checkall').is(':checked'))
		$("#singleFormID").submit();


	$(".singlecheck").each(function(){
		if($(this).is(':checked'))
			$("#singleFormID").submit();
	});

	return false;
}

function completeChangePassword()
{
	var currentPassword = $("#changePassword_current").val();
	var newPassword_1   = $("#changePassword_new_1").val();
	var newPassword_2   = $("#changePassword_new_2").val();

	if(newPassword_1 != newPassword_2){
		alert('Password not confirmed right');
		return false;
	}

	if(currentPassword == newPassword_2){
		alert('Pick a new password and try again');
		return false;
	}

	var userID          = $("#userID").val();
	var url  			= $("#url").val();


	url = url+"admin/checkpasswordchange.php";

		$.ajax({
		  type: "GET",
		  url: url,
		  data: { current: currentPassword , new_1 : newPassword_1 , id : userID  }
		})
		  .success(function( msg ) {
		     if(msg == 'false')
		     	{
		     		alert('Proccess Failed, Try again');
		     		return false;
		     	}
		     else
			     {
					$("#passwordChangeForm").hide();
					$("#successAlert").removeClass('hide');
					$("#successAlert").fadeIn('slow');
			     }
		  });

	
}