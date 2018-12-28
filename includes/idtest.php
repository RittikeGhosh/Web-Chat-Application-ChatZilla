<script type="text/javascript">
	var myname = "ghosh";
	$("#but").click(function(){
				$("#para1").html("hurray");
		});
	$("#but").dblclick(function(){
				$.post("asufsd6s4did64aasd.php",{
					name : myname
				},function(data,status){
					window.alert(status+" on 2nd call");
					window.location.href = "http://www.w3schools.com";
			}) ;
		});
</script>
<?php 
if(isset($_POST['name'])){
	
    $id = $_POST['name'];
    echo "<button id='but'>click " .rand() ."</button>";
    echo "<p id = 'para1'>hello1</p>";
    session_start();
    $_SESSION['fe956s56s6s6c46sid'] = $id;

}
?>