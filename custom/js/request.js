$(document).ready(function() {

	$("#newRequestForm").unbind('submit').bind('submit', function() {
		var form = $(this);

		$('.text-danger').remove();
		$('.form-group').removeClass('has-error').removeClass('has-success');		
		
		var equipmentName = $("#equipmentName").val();
		var estimatedCost = $("#estimatedCost").val();
		var purchaseLinks = $("#purchaseLinks").val();
		var reason = $("#reason").val();
		
		if(equipmentName == "" || estimatedCost == "" || reason == "") {
			if(equipmentName == "") {
				$("#equipmentName").closest('.form-group').addClass('has-error');
				$("#equipmentName").after('<p class="text-danger">Equipment Name is required</p>');
			} else {
				$("#form-group").removeClass('has-error');
				$("#text-danger").remove();
			}

			if(estimatedCost == "") {
				$("#estimatedCost").closest('.form-group').addClass('has-error');
				$("#estimatedCost").after('<p class="text-danger">The Estimated Cost is required</p>');
			} else {
				$("#form-group").removeClass('has-error');
				$("#text-danger").remove();
			}
			
			if(reason == "") {
				$("#reason").closest('.form-group').addClass('has-error');
				$("#reason").after('<p class="text-danger">Reason Name is required</p>');
			} else {
				$("#form-group").removeClass('has-error');
				$("#text-danger").remove();
			}
			
		} else {
			$("#form-group").removeClass('has-error');
			$("#text-danger").remove();


			$.ajax({
				url: form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					console.log(response);
					if(response.success == true) {

						$("#newRequestForm")[0].reset();
						$('.text-danger').remove();
						$('.form-group').removeClass('has-error').removeClass('has-success');						

						$('.changePasswordMessages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');


	          			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						});    
					} else {

						$("#newRequestForm")[0].reset();
						$('.text-danger').remove();
						$('.form-group').removeClass('has-error').removeClass('has-success');						

						$('.changePasswordMessages').html('<div class="alert alert-warning">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-exclamation-sign"></i></strong> '+ response.messages +
				          '</div>');

	         		 	$(".alert-warning").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						});	          	
					}
				}
			});

		}

		return false;
	});

});
