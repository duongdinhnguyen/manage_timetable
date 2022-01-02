<?php
require_once './app/common/db.php';
class Schedule extends DB{
    // Insert data vào table Schedules
    public function insert($data){
        $sql="INSERT INTO schedules(school_year, subject_id, teacher_id, week_day, lesson, notes) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]');";
        // $_SESSION['file'] = $sql;

        $this->__conn->exec($sql);
        $_SESSION['file']= "Bạn đã tạo thêm thành công môn học.";
    }
}

$Schedule = new Schedule();