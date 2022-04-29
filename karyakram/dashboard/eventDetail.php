<?php 
    if($_GET){
        if($_GET['type'] == "a"){ 
            include "dashboard_Nav.php"; 
        }else if($_GET['type'] == "u"){
            include "../user/userDashboardNav.php";
        }
    }
    include "eventDetailCore.php";
?>

</body>

</html>