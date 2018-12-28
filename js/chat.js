$(function(){
			$("textarea").focus(function(){
				$("#textBox").css({"border":"2px solid #2e7d32"});
			});
			$("textarea").blur(function(){
				$("#textBox").css({"border":"1px solid #2e7d32"});
			});
			$("#sendBox").click(function(){
				//val msg = ;
				if ($("textarea").val() !='') {
					var str = $("textarea").val();
					var newstr = str.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/\n/gi, '<br>');
					$.post("includes/message.php",{newmessage : newstr},function(data,status){
						//alert(status);
						$("#innerChatBox").append("<div class ='outerme'><br><div class='me'>"+ data +"</div></div>");
					    $("#chatBox").animate({scrollTop:$("#innerChatBox").height()},1000);

					});
					
				    $("textarea").val("");
				    $("textarea").focus();
				}
				
			});

		});
