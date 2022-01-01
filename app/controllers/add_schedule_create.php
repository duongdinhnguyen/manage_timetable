<?php
require_once './app/controllers/checkLogin.php';
require_once './app/models/teacher.php';
require_once './app/models/subject.php';

class AddScheduleCreate{
    public function __construct(){
        $_SESSION['add-schedule'] = '';
        if(isset($_REQUEST['confirm'])){
            $_SESSION['add-schedule'] = 'đã nhấn';

        }
    }
}
$AddScheduleCreate = new AddScheduleCreate();

$allSubject = $Subject->searchAllSubject();
$allTeacher = $Teacher->searchAllTeacher();

require_once './app/views/add_schedule_create.php';