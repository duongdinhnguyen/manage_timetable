<?php
// require_once './app/controllers/checkLogin.php';
require_once './app/common/db.php';
$DB = new DB();
error_reporting(0);
		$sql = '';
		$subjects_log = '';
		$teachers_log = '';

		$school_year = '';

		$subject_id = '';
		$teacher_id = '';

		function test_input($data) {
		  $data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		  return $data;
		}


		if ($_SERVER["REQUEST_METHOD"] == "GET") {
			$school_year = test_input($_GET["khoa"]);
			$subject_id = test_input($_GET["subject_id"]);
			$teacher_id = test_input($_GET["teacher_id"]);
		}
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$schedule_id = test_input($_POST["remove-schedule"]);
			$lesson_file = test_input($_POST["lesson"]);
			$note_file = test_input($_POST["note"]);
			if(isset($_REQUEST['change-schedule'])){
				$_SESSION['data-schedule-update'] =$_REQUEST['change-schedule'];// gán id schedule cần thay đổi
				header('location:'.URLROOT.'/?router=search-schedule-change');
			}
		}
		if($schedule_id != ''){
			$sql = "delete from schedules where id = ".$schedule_id;
			$DB->__conn->query($sql);
			unlink("./web/file/lesson/".$lesson_file);
			unlink("./web/file/note/".$note_file);
		}
		$sql = "Select schedules.id, schedules.school_year, subjects.name as nameSubject,teachers.name as nameTeacher, schedules.week_day, schedules.lesson,schedules.notes From ((schedules inner join subjects on schedules.subject_id = subjects.id) inner join teachers on schedules.teacher_id = teachers.id)";
		if($school_year != "" or $subject_id != "" or $teacher_id != ""){

			$sql = $sql."where ";
			if($school_year != "")
				$sql = $sql."schedules.school_year = '$school_year' ";
			if($subject_id != "")
				if($school_year != "")
					$sql = $sql."and schedules.subject_id = '$subject_id' ";
				else
					$sql = $sql."schedules.subject_id = '$subject_id' ";
			if($teacher_id != "")
				if($school_year != "" or $subject_id != "")
					$sql = $sql."and schedules.teacher_id = '$teacher_id' ";
				else
					$sql = $sql."schedules.teacher_id = '$teacher_id' ";
		}
		$log = $DB->__conn->query($sql);
		
		
		
require_once 'app/views/search_schedule.php';