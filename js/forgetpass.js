$(function(){
	document.getElementById('sub').disabled = true;
	document.getElementById('otp1').disabled = true;

	$('#sub').click(function(){
		if(document.getElementById('sub').disabled == true)
		{
			alert("Please fill up all the details and the otp ");
		}
	});
	$("#repassword input").keyup(function(){
		if($('#repassword input').val() == '')
		{
			$('#repassword input').css("border","1px solid #0091ea");
		}
		else if($('#repassword input').val() == $('#password input').val() && $('#password input').val() != '')
		{
			$('#repassword input').css("border","2px solid green");
		}
		else if($('#repassword input').val() != $('#password input').val() && $('#password input').val() != ''){
			$('#repassword input').css("border","2px solid red");
		}
	})
	$('#sendotp span').click(function(){
			if($('#email input').val() != '')
	 		{
	 			var str = $('#email input').val().toLowerCase();
	 			//alert(str);

				$.post('includes/mail.php',{d5d55demail5rdf:str},function(data,status){
					//alert(status);
					var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

					if (reg.test(str) == true) 
		            {//alert(data);
						if(status == 'success' && data == 'success')
						{
							document.getElementById('otp1').disabled = false;
							alert("OTP has been succesfully sent ...");
							$("#otp input").focus();
							document.getElementById('sub').disabled = false;
							setTimeout(function(){$.post("includes/unset.php",function(data,status){alert("Your current OTP Expired . Try resending.");document.getElementById('sub').disabled = true;})},300000);
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
			else
			{
				alert("Enter Email ....");
			}
		});
});
