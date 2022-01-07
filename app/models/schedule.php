<?php
require_once './app/common/db.php';
class Schedule extends DB{
    // Insert data vào table Schedules
    public function insert($data){
        $sql="INSERT INTO schedules(school_year, subject_id, teacher_id, week_day, lesson, notes) VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]');";
        // $_SESSION['file'] = $sql;

        $this->__conn->exec($sql);
        $_SESSION['add-schedule-complete-notifi']= "Bạn đã tạo thêm thành công thời khóa biểu.";
    }

    //update schedule
    public function updateSchedule($data, $id){
        $sql="UPDATE schedules SET school_year='$data[0]', subject_id='$data[1]', teacher_id='$data[2]', week_day='$data[3]', lesson='$data[4]', notes='$data[5]' WHERE id='$id'";
        $this->__conn->exec($sql);
        $_SESSION['add-schedule-complete-notifi']= "Bạn đã thay đổi thành công thời khóa biểu có id = ".$id;
    }

    // search schedule from id
    public function searchScheduleFromId($id){
        $sql="SELECT school_year, subject_id, teacher_id, week_day, lesson, notes FROM schedules WHERE id='$id'";
        $data= $this->__conn->query($sql);
        foreach($data as $row){
            return [$row['school_year'], $row['subject_id'], $row['teacher_id'], $row['week_day'], $row['lesson'], $row['notes']];
        }
        // return [$id];
    }

    // Tìm kiếm trong table
    public function searchSchedule($khoa, $subject, $teacher){
        if($khoa !=null){
            if($subject !=null){
                if($teacher != null){
                    $sql_end = "WHERE schedules.school_year='$khoa' AND schedules.subject_id='$subject' AND schedules.teacher_id='$teacher'";
                }
                else{
                    $sql_end = "WHERE schedules.school_year='$khoa' AND schedules.subject_id='$subject'";
                }
            }
            else{
                if($teacher != null){
                    $sql_end = "WHERE schedules.school_year='$khoa' AND schedules.teacher_id='$teacher'";
                }
                else{
                    $sql_end = "WHERE schedules.school_year='$khoa'";
                }
            }
        }
        else{
            if($subject !=null){
                if($teacher != null){
                    $sql_end = "WHERE schedules.subject_id='$subject' AND schedules.teacher_id='$teacher'";
                }
                else{
                    $sql_end = "WHERE schedules.subject_id='$subject'";
                }
            }
            else{
                if($teacher != null){
                    $sql_end = "WHERE schedules.teacher_id='$teacher'";
                }
                
            }
        }
        // $_SESSION['search-schedule'] = $sql;
        $sql = "SELECT schedules.id, schedules.school_year, subjects.name AS nameSubject, teachers.name AS nameTeacher, schedules.week_day, schedules.lesson 
                FROM schedules 
                INNER JOIN teachers ON schedules.teacher_id = teachers.id
                INNER JOIN subjects ON schedules.subject_id = subjects.id " . $sql_end;
        $data= $this->__conn->query($sql);
        $array=[];
        foreach($data as $row){
            $array = array_merge($array, [$row]);// phương thức gộp mảng
        }
        return $array;
    }

    
}

$Schedule = new Schedule();