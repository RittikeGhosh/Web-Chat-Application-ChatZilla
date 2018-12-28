 $(document).ready(function(){
                $('#logout').click(function(){
                   window.location.href = 'includes/logout.php';
                });
                $('#home').click(function(){
                    window.location.href='landpage.php';
                });
                $('#profile').click(function(){
                    window.location.href='userprofile.php'; 
                })
                $('#messages').click(function(){
                    window.location.href='';
                })
            });