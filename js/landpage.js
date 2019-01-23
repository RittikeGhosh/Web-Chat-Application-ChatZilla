$(function(){

	$("#new").load("includes/newupdates.php",function(data,status){
	});
    setInterval(load,5000);
	function load(){
		$("#new").load("includes/newupdates.php",function(data,status){
	});
	}
	
})