jQuery(document).ready(function($) {

	$('.btn').tooltip();

	     $('.selectpicker').selectpicker({
  });



	$("#meCheckbox").click(function(){
		value = $("#meCheckbox").attr('value');
		if(value == 0)
			$("#meCheckbox").val(1);
		else
			$("#meCheckbox").val(0);

		if($("#meCheckbox").val() == 1){
			$("#usernameSelect").attr('disabled','disabled');
			$("#usernameSelect").val('0');
		}else{
			$("#usernameSelect").attr('disabled',false);
		}
		
	});

	$("#addNewUsrBtn").click(function(){
		$(".usersLandingContent").slideUp('slow');
	});

	$(".tr_showmore").click(function(){
		var name = $(this).attr('name');
		$("."+name).each(function(){
			if($(this).hasClass('hide')){
				$(this).slideDown(function(){
				$(this).removeClass('hide');
				});
			}else{
				$(this).slideUp(function(){
				$(this).addClass('hide');
				});
			}
			
		});
	});


	// $('#circleEdit_name').on('change', function() {
	//   	alert('hello');
	// });

	$('#circleEdit_name').keydown(function(){
		$("#nameChanged").val('1');
		$("#circleEdit_name").css('border','2px solid #f0ad4e');
	});

	

	$('#usernameField').keydown(function(){
		$("#usernameChanged").val('1');
		$("#usernameField").css('border','2px solid #f0ad4e');
	});

	$('#emailField').keydown(function(){
		$("#emailChanged").val('1');
		$("#emailField").css('border','2px solid #f0ad4e');
	});


});


function checkCirleName()
{	
		
	var change = $("#nameChanged").val();
	if(change == 0){
		$("#circleEdit_name").css('border','2px solid green');
		return;
	}
	var oldName = $("#circleNameOrig").val();

	var name = $("#circleEdit_name").val();

	if(name == oldName){
		$("#circleEdit_name").css('border','2px solid green');
		return;
	}

	if(name == ''){
		$("#circleEdit_name").css('border','2px solid #f0ad4e');
		alert('Name cannot be empty');
		return;
	}

	var url = $("#url").val();
	url = url+"admin/checkcirclename.php";
		$.ajax({
		  type: "POST",
		  url: url,
		  data: { name: name }
		})
		  .success(function( msg ) {
		     if(msg == 'false')
		     	{
		     		alert('Circle Name is not available');
		     		return false;
		     	}
		     else
			     {
					$("#circleEdit_name").css('border','2px solid green');
					$("#nameChanged").val('0');
			     }
		  });
}


function completeCircleEditAndRedirect()
{	
	var circleName = $("#circleEdit_name").val();
	var amount = $("#circleEdit_amount").val();
	var monthly = $("#circleEdit_monthly").val();
	var url = $("#url").val();
	var nameChanged = $("#nameChanged").val();

	if(!$.isNumeric(amount)) {
		alert('Amount value should be an integer value');
		return false;
	}

	if(!$.isNumeric(monthly)) {
		alert('Monthly Instalment value should be an integer value');
		return false;
	}

	if(nameChanged == 1){
		alert('Check Name availability first');
		return false;
	}

	$("#circleEditFormId").submit();
}


function cancelClicked()
{	
	var amount = $("#circleEdit_amount").val('0');
	var monthly = $("#circleEdit_monthly").val('0');
	$("#nameChanged").val('0');
	$("#circleEditFormId").submit();
}

function userEditCancel()
{
	$("#phoneField").val('0');
	$("#usernameChanged").val('0');
	$("#emailChanged").val('0');
	$("#userEditFormId").submit();
}


function completeUserEditAndRedirect()
{
	
	phoneField = $("#phoneField").val();

	if(!$.isNumeric(phoneField)) {
		alert('Phone value should be an integer value');
		return false;
	}

	if($("#usernameChanged").val() == 1){
		alert('Check Name availability first');
		return false;
	}

	if($("#emailChanged").val() == 1){
		alert('Check Email availability first');
		return false;
	}

	$("#userEditFormId").submit();
}


function checkUserName()
{
	var change = $("#usernameChanged").val();

	if(change == 0){
		$("#usernameField").css('border','2px solid green');
		return;
	}
	var oldName = $("#userNameOrig").val();

	var name = $("#usernameField").val();

	if(name == oldName){
		$("#usernameField").css('border','2px solid green');
		return;
	}

	if(name == ''){
		$("#usernameField").css('border','2px solid #f0ad4e');
		$("#usernameChanged").val('1');
		alert('Name cannot be empty');
		return;
	}

	var url = $("#url").val();
	url = url+"admin/checkusername.php";
		$.ajax({
		  type: "POST",
		  url: url,
		  data: { name: name }
		})
		  .success(function( msg ) {
		     if(msg == 'false')
		     	{
		     		alert('User Name is not available');
		     		return false;
		     	}
		     else
			     {
					$("#usernameField").css('border','2px solid green');
					$("#usernameChanged").val('0');
			     }
		  });
}



function checkUserEmail()
{
	var change = $("#emailChanged").val();

	if(change == 0){
		$("#email").css('border','2px solid green');
		return;
	}
	var oldName = $("#emailOrig").val();

	var name = $("#emailField").val();

	if(name == oldName){
		$("#emailField").css('border','2px solid green');
		return;
	}

	if(name == ''){
		$("#emailField").css('border','2px solid #f0ad4e');
		$("#emailChanged").val('1');
		alert('Email cannot be empty');
		return;
	}

	var url = $("#url").val();
	url = url+"admin/checkuseremail.php";
		$.ajax({
		  type: "POST",
		  url: url,
		  data: { name: name }
		})
		  .success(function( msg ) {
		     if(msg == 'false')
		     	{
		     		alert('Email is not available');
		     		return false;
		     	}
		     else
			     {
					$("#emailField").css('border','2px solid green');
					$("#emailChanged").val('0');
			     }
		  });
}


function deleteParticipant(id)
{
		     
	var check = confirm("Are you sure you want to remove this participant from the circle?");
		if (check == true) {
		var element = $("#removeParticipantID").val(id);
			$("#deleteParticipantForm").submit();
		}
}


function addParticipant()
{
	var participantID = $("#participantID").val();
	if(participantID == 0){
		alert('Choose a User');
		return false;
	}

	var participantIDRank = $("#participantIDRank").val();
	if(participantIDRank == 0){
		alert('Choose a Rank');
		return false;
	}

	var check = confirm("Are you sure you want to Add this participant to the Circle?");
		if (check == true) {
				$("#addParticipantForm").submit();
		}
}













