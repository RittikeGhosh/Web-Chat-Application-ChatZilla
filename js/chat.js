$(function(){

	$.post('message.php',function(data){
		alert(status);
		$('#innerChatBox').append(data);
	    $('#chatBox').animate({scrollTop:$('#innerChatBox').height()},1000);
	})
			$('textarea').focus(function(){
				$('#textBox').css({'border':'2px solid #2e7d32'});
			});
			$('textarea').blur(function(){
				$('#textBox').css({'border':'1px solid #2e7d32'});
			});
			$('#sendBox').click(function(){
				//val msg = ;
				if ($('textarea').val() !='') {
					var str = $('textarea').val();
					var newstr = str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/\n/gi, '<br>');
					$.post('includes/message.php',{newmessage : newstr},function(data,status){
						alert(data);
						$('#innerChatBox').append(data);
					    $('#chatBox').animate({scrollTop:$('#innerChatBox').height()},1000);

					});
					
				    $('textarea').val('');
				    $('textarea').focus();
				}
				
			});
			setInterval(loadnew,3000);
			function loadnew(){
				$.post('includes/loadnewmessage.php',{
					fid : },function(){
						alert(status);
						$('#innerChatBox').append(data);
					    $('#chatBox').animate({scrollTop:$('#innerChatBox').height()},1000);

					})
			}
			

		});
