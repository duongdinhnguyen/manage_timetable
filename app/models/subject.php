<?php
require_once './app/common/db.php';
class Subject extends DB{
    // Trả về các bản ghi khi tìm kiếm môn học
    public function searchSubject($khoa, $keyword){
        if($khoa){
            $sql = "SELECT * FROM subjects WHERE school_year='$khoa' AND name LIKE '%$keyword%'";

        }
        else $sql = "SELECT * FROM subjects WHERE name LIKE '%$keyword%'";
        // $_SESSION['search-subject'] =$sql;
        return $this->__conn->query($sql);
    }

    // Trả về sô lượng các bản ghi
    public function countSubject($khoa, $keyword){
        if($khoa){
            $sql = "SELECT COUNT(*) FROM subjects WHERE school_year='$khoa' AND name LIKE '%$keyword%'";
        }
        else $sql = "SELECT COUNT(*) FROM subjects WHERE name LIKE '%$keyword%'";
        
        $data = $this->__conn->query($sql);
        foreach($data as $row){
            return $row['COUNT(*)'];
        }
    }
}

$Subject = new Subject();