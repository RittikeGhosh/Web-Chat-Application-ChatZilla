
$(function(){
	document.getElementById('sub').disabled = true;

	$('#sub').click(function(){
		if(document.getElementById('sub').disabled == true)
		{
			alert("Please fill up all the details and the otp ");
		}
	});

		$('#sendotp label').click(function(){
			if($('#email').val() != '')
	 		{
	 			var str = document.getElementById('email').value.toLowerCase();

				$.post('includes/mail.php',{d5d55demail5rdf:str},function(data,status){
					//alert(status);
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

					if (reg.test(str) == true) 
		            {alert(data);
						if(status == 'success' && data == 'success')
						{
							alert("OTP has been succesfully sent ...")
							$("#sendotp").hide();
							$("#otp").show();
							$("#otp input").focus();
							document.getElementById('sub').disabled = false;
							setTimeout(function(){$("#sendotp").show();$.post("includes/unset.php",function(data,status){alert("Your current OTP Expired . Try resending.");})},300000);
							setTimeout(function(){$("#otp").hide();$("#otp input").blur();document.getElementById('sub').disabled = true;},300000);

						}
						else{
							alert("Unsuccessful to send otp . Try again ...\nCheck your mail id.")
						}
						
					}
					else{
						alert("This is not a valid email");
					}
					
				});
			}
			else{
				alert("Enter Email ....");
			}
		});
});