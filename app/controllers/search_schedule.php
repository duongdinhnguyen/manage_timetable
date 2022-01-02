<?php
require_once './app/controllers/checkLogin.php';
require_once './app/models/subject.php';
require_once './app/models/teacher.php';
class SearchSchedule{
    public function __construct(){
        $_SESSION['search-schedule'] = '';
        $_SESSION['data-search-schedule']=null;
        if(isset($_REQUEST['search-schedule'])){
            if(empty($_REQUEST['khoa'])  && empty($_REQUEST['subject'])  &&  empty($_REQUEST['teacher'])){
                $_SESSION['search-schedule'] = 'Chọn ít nhất 1 trường';
            }
            else{
                $khoa = !empty($_REQUEST['khoa']) ? $_REQUEST['khoa'] : null;
                $subject = !empty($_REQUEST['subject']) ? $_REQUEST['subject'] : null;
                $teacher = !empty($_REQUEST['teacher']) ? $_REQUEST['teacher'] : null;

                // $_SESSION['search-schedule'] = $khoa ." ". $subject ." ". $teacher;
                require_once './app/models/schedule.php';
                $_SESSION['data-search-schedule']= $Schedule -> searchSchedule($khoa, $subject, $teacher);
                if(count($_SESSION['data-search-schedule'])==0){
                    $_SESSION['search-schedule'] = "Không tìm thấy thời khóa biểu nào";
                } 
                else {
                    $_SESSION['search-schedule'] = "Tìm thấy " .count($_SESSION['data-search-schedule']) . " thời khóa biểu";

                }

            }
        }
    }
}
$SearchSchedule = new SearchSchedule();
$allSubject = $Subject->searchAllSubject();
$allTeacher = $Teacher->searchAllTeacher();

require_once './app/views/search_schedule.php';