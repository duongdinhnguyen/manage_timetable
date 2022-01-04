<?php
require_once './app/common/db.php';
class Teacher extends DB {
    // Trả về các bản ghi khi tìm kiếm giáo viên
    public function searchTeacher($bo_mon, $keyword) {
        if($bo_mon)
            $sql = "SELECT * FROM teachers WHERE specialized = '$bo_mon' AND name LIKE '%$keyword%'";
        else
            $sql = "SELECT * FROM subjects WHERE name LIKE '%$keyword%'";
        // $_SESSION['search-teacher'] =$sql;
        $data = $this->__conn->query($sql);
        $array=[];
        foreach($data as $row)
            $array = array_merge($array, [$row]);
        return $array;
    }

    // Trả về all bản ghi
    public function searchAllTeacher() {
        $sql = "SELECT * FROM teachers";
        $data = $this->__conn->query($sql);

        // vì PDO không cho phép gán data vào SESSION khi truy vấn sql
        // nên dùng mảng để gán cho SESSION
        $array=[];
        foreach($data as $row){
            $array = array_merge($array, [$row]);// phương thức gộp mảng
        }
        return $array;
    }

    // Xóa giáo viên
    public function removeTeacher($id) {
        $sql= "DELETE FROM teachers WHERE id='$id'";
        $this->__conn->exec($sql);
    }

     // search name teacher
     public function searchNameTeacher($id){
        $sql = "SELECT name FROM teachers WHERE id='$id'";
        $data = $this->__conn->query($sql);
        foreach($data as $row){
            return $row['name'];
        }
    }
}

$Teacher = new Teacher();
