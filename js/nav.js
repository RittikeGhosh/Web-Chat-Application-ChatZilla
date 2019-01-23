 $(document).ready(function(){
                $('#logout').click(function(){
                   var r = confirm("Are you sure you want to logout ?");
                   if(r == true)
                   {
                     window.location.href = 'includes/logout.php';
                   }
                });
                $('#home').click(function(){
                    window.location.href='landpage.php';
                });
                $('#profile').click(function(){
                    window.location.href='userprofile.php'; 
                });
                $('#messages').click(function(){
                    window.location.href='';
                });
                $('#search-bar input').focus(function(){
                    $('#search-bar').css({'box-shadow':'5px 5px 5px #888','height':'auto'});
                    
                });
                $('#search-bar').blur(function(){
                    $('#search-bar').css({'box-shadow':'0px 0px 0px #888','height':'2.2em'});
                    $('#search-bar input').css({'border-bottom':'0'});
                });
                $('#search-bar input').keyup(function(){
                     var str = $('#search-bar input').val();
                     $('#search-bar #result').load("includes/search.php",{data : str},function(result,status)
                     {
                        if($('#search-bar input').val() !='')
                    {
                         $('#search-bar input').css({'border-bottom':'1px solid #888'});

                    }//alert(status);
                     });
                });
            });