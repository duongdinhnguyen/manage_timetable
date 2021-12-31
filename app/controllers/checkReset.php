<?php
    if(!isset($_SESSION['reset'])  || $_SESSION['reset']==''){
        header('location:htttp://localhost/manage_timetable/?router=reset-password');
    }
?>