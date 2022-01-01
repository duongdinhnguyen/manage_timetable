<?php
require_once './app/common/db.php';
class Teacher extends DB{
    // Trả về các bản ghi khi tìm kiếm giáo viên
    // public function searchSubject($khoa, $keyword){
    //     if($khoa){
    //         $sql = "SELECT * FROM subjects WHERE school_year='$khoa' AND name LIKE '%$keyword%'";
    //     }
    //     else $sql = "SELECT * FROM subjects WHERE name LIKE '%$keyword%'";
    //     // $_SESSION['search-subject'] =$sql;
    //     $data = $this->__conn->query($sql);
    //     $array=[];
    //     foreach($data as $row){
    //         $array = array_merge($array, [$row]);
    //     }
    //     return $array;
    // }

    // Trả về all bản ghi
    public function searchAllTeacher(){
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
    // public function removeSubject($id){
    //     $sql= "DELETE FROM subjects WHERE id='$id'";
    //     $this->__conn->exec($sql);
    // }
}

$Teacher = new Teacher();