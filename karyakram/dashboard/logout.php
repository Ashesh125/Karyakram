<?php
session_start();
    session_unset();
    session_destroy();

    header("location:https://karyakram0.000webhostapp.com/index.php");

?>