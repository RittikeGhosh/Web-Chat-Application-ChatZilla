$(function(){
	var img ;
	$("#infoupdate #info #image #profileimg img").click(function(){
		$("#infoupdate #info #image input").click();

		//alert(img);
	})
	$("#infoupdate #info #details #update").click(function(ev){
		ev.preventDefault();
		if($("#password input").val() == '')
		{
			$("#password span").text("Password field cant be empty").show();
		}
		else if($("#name").val() == '')
		{
            alert("name");
		}
		else{
			$("#infoform").submit();
		}
	})
})