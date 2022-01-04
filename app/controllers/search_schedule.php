<?php
require_once './app/controllers/checkLogin.php';
require_once './app/common/db.php';
$DB = new DB();
error_reporting(0);
		$sql = '';
		$subjects_log = '';
		$teachers_log = '';

		$school_year = '';

		$subject_id = '';
		$teacher_id = '';


		$sql = "Select id,name From subjects ";
		$subjects_log = $DB->__conn->query($sql);
		$sql = "Select id,name From teachers ";
		$teachers_log = $DB->__conn->query($sql);
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
		}
		if($schedule_id != ''){
			$sql = "delete from schedules where id = ".$schedule_id;
			$DB->__conn->query($sql);
		}
		$sql = "Select * From schedules ";

		if($school_year != "" or $subject_id != "" or $teacher_id != ""){

			$sql = $sql."where ";
			if($school_year != "")
				$sql = $sql."school_year = '$school_year' ";
			if($subject_id != "")
				if($school_year != "")
					$sql = $sql."and subject_id = '$subject_id' ";
				else
					$sql = $sql."subject_id = '$subject_id' ";
			if($teacher_id != "")
				if($school_year != "" or $subject_id != "")
					$sql = $sql."and teacher_id = '$teacher_id' ";
				else
					$sql = $sql."teacher_id = '$teacher_id' ";
		}
		$log = $DB->__conn->query($sql);
		
		
		
		
		$subjects = array();
		while($row = $subjects_log->fetch(PDO::FETCH_ASSOC)){
			$subjects[] = array($row["id"],$row["name"]);
		}
		$teachers = array();
		while($row = $teachers_log->fetch(PDO::FETCH_ASSOC)){
			$teachers[] = array($row["id"],$row["name"]);
			
		}
require_once 'app/views/search_schedule.php';