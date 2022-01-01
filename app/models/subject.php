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
        $data = $this->__conn->query($sql);
        $array=[];
        foreach($data as $row){
            $array = array_merge($array, [$row]);
        }
        return $array;
    }

    // Trả về all bản ghi
    public function searchAllSubject(){
        $sql = "SELECT * FROM subjects";
        $data = $this->__conn->query($sql);

        // vì PDO không cho phép gán data vào SESSION khi truy vấn sql
        // nên dùng mảng để gán cho SESSION
        $array=[];
        foreach($data as $row){
            $array = array_merge($array, [$row]);// phương thức gộp mảng
        }
        return $array;
    }

    // Xóa môn học
    public function removeSubject($id){
        $sql= "DELETE FROM subjects WHERE id='$id'";
        $this->__conn->exec($sql);
    }

    // search name subject
    public function searchNameSubject($id){
        $sql = "SELECT name FROM subjects WHERE id='$id'";
        $data = $this->__conn->query($sql);
        foreach($data as $row){
            return $row['name'];
        }
    }
}

$Subject = new Subject();