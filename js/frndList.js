	// freiind list

		$(function(){
			setInterval(frndList,5000);
			$('#frndList').load('includes/frndList.php',{call : 'frndList'});

		    function frndList(){
		    	$('#frndList').load('includes/frndList.php',{call : 'frndList'});

		    }
		});