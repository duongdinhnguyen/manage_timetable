<?php 
require_once './app/controllers/checkLogin.php';
$data = isset($_SESSION['add-schedule']) ? $_SESSION['add-schedule'] : [];
require_once './app/models/subject.php';
require_once './app/models/teacher.php';

class AddScheduleConfirm{
    public function __construct(){
        if(isset($_REQUEST['add-new-schedule'])){
            header('location:http://localhost/manage_timetable/?router=add-schedule-complete');
        }
    }
}

$AddScheduleConfirm = new AddScheduleConfirm();

$subjectName = $Subject->searchNameSubject($data[1]); 
$teacherName = $Teacher->searchNameTeacher($data[2]); 
require_once './app/views/add_schedule_confirm.php';