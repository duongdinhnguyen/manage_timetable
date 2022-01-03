<?php
    if(!isset($_SESSION['login']) || $_SESSION['login']==''){
        // header("location:http://localhost/manage_timetable/");
        header('location:'.URLROOT.'/');
    }
?>