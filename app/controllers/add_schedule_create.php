<?php
require_once './app/controllers/checkLogin.php';
require_once './app/models/teacher.php';
require_once './app/models/subject.php';

class AddScheduleCreate{
    public function __construct(){
        $_SESSION['add-schedule'] = '';
        if(isset($_REQUEST['confirm'])){
            if(empty($_REQUEST['khoa-hoc'])){
                $_SESSION['add-schedule']="Hãy chọn khóa học";
            }
            else if(empty($_REQUEST['subject'])){
                $_SESSION['add-schedule']="Hãy chọn môn học";
            }
            else if(empty($_REQUEST['teacher'])){
                $_SESSION['add-schedule']="Hãy chọn giáo viên";
            }
            else if(empty($_REQUEST['day'])){
                $_SESSION['add-schedule']="Hãy chọn thứ";
            }
            else if(empty($_REQUEST['tiethoc'])){
                $_SESSION['add-schedule']="Hãy chọn tiết học";
            }
            else if(empty(trim($_REQUEST['description']))){
                $_SESSION['add-schedule']="Hãy nhập chú ý";
            }
            else{
                $khoa = $_REQUEST['khoa-hoc'];
                $subject = $_REQUEST['subject'];
                $teacher = $_REQUEST['teacher'];
                $day = $_REQUEST['day'];
                $lesson = $_REQUEST['tiethoc'];
                $description = $_REQUEST['description'];
                $_SESSION['add-schedule'] =[$khoa, $subject,  $teacher, $day , $lesson, $description];
                header('location:http://localhost/manage_timetable/?router=add-schedule-confirm');
            }
            
            

        }
    }
}
$AddScheduleCreate = new AddScheduleCreate();

$allSubject = $Subject->searchAllSubject();
$allTeacher = $Teacher->searchAllTeacher();

require_once './app/views/add_schedule_create.php';