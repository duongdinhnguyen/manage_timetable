<?php 
require_once './app/controllers/checkLogin.php';
require_once './app/models/subject.php';
require_once './app/models/teacher.php';

class AddScheduleConfirm{
    public function __construct(){
        if(isset($_REQUEST['add-new-schedule'])){
            // header('location:http://localhost/manage_timetable/?router=add-schedule-complete');
            header('location:'.URLROOT.'/?router=add-schedule-complete');
        }
    }
}
$data = isset($_SESSION['add-schedule-data']) ? $_SESSION['add-schedule-data'] : [];


$AddScheduleConfirm = new AddScheduleConfirm();

$subjectName = $Subject->searchNameSubject($data[1]); 
$teacherName = $Teacher->searchNameTeacher($data[2]); 
require_once './app/views/add_schedule_confirm.php';