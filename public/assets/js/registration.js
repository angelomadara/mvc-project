$(document)
	.on('click','#register-button',function(e){
		e.preventDefault();
		$.ajax({
			url: "register/validation",
			type: "post",
			dataType: "json",
			data: $("#form-registration").serialize(),
			success:function(result){
				// console.log(result);
				elm = "";
				$.each(result.results,function(x,y){
					elm += y+"<br>";
				});
				$('.response-msg').html(elm);
			}
		})
	})