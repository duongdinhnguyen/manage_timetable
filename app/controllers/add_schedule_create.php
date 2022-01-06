<?php
// require_once './app/controllers/checkLogin.php';
require_once './app/models/teacher.php';
require_once './app/models/subject.php';

class AddScheduleCreate{
    public  $__dataAdd=['','','','',[],'']; // Khởi tạo data trống để check selected và checked ở screen add schedule
    public function __construct(){
        if(isset($_SESSION['add-schedule-data'])){
            $this->__dataAdd=  $_SESSION['add-schedule-data']; // Nếu đã tồn tại data nhập ở form input thì gán vào __dataAdd để hiển thị checked và selected
            $_SESSION['add-schedule-data'] =['','','','',[],''];// Sau đó refesh về mặc định để khi refesh lại screen add-schedule sẽ ko hiển thị các dữ liệu cũ
        }
        
        $_SESSION['add-schedule-notifi'] = '';// dùng để thông báo ở screen add schedule
        
        if(isset($_REQUEST['confirm'])){
            if(empty($_REQUEST['khoa-hoc'])){
                $_SESSION['add-schedule-notifi']="Hãy chọn khóa học";
            }
            else if(empty($_REQUEST['subject'])){
                $_SESSION['add-schedule-notifi']="Hãy chọn môn học";
            }
            else if(empty($_REQUEST['teacher'])){
                $_SESSION['add-schedule-notifi']="Hãy chọn giáo viên";
            }
            else if(empty($_REQUEST['day'])){
                $_SESSION['add-schedule-notifi']="Hãy chọn thứ";
            }
            else if(empty($_REQUEST['tiethoc'])){
                $_SESSION['add-schedule-notifi']="Hãy chọn tiết học";
            }
            else if(empty(trim($_REQUEST['description']))){
                $_SESSION['add-schedule-notifi']="Hãy nhập chú ý";
            }
            else{
                $khoa = $_REQUEST['khoa-hoc'];
                $subject = $_REQUEST['subject'];
                $teacher = $_REQUEST['teacher'];
                $day = $_REQUEST['day'];
                $lesson = $_REQUEST['tiethoc'];
                $description = $_REQUEST['description'];
                $_SESSION['add-schedule-data'] =[$khoa, $subject,  $teacher, $day , $lesson, $description];// SESSION này sẽ rỗng khi refesh
                // header('location:http://localhost/manage_timetable/?router=add-schedule-confirm');
                header('location:'.URLROOT.'/?router=add-schedule-confirm');
            }
            
            

        }
    }
}
$AddScheduleCreate = new AddScheduleCreate();

$allSubject = $Subject->searchAllSubject();
$allTeacher = $Teacher->searchAllTeacher();
$dataCreateSchedule = $AddScheduleCreate->__dataAdd;
require_once './app/views/add_schedule_create.php';