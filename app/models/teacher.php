<?php
require_once './app/common/db.php';
class Teacher extends DB {
    // Trả về các bản ghi khi tìm kiếm giáo viên
    public function searchTeacher($bo_mon, $keyword) {
        if($bo_mon)
            $sql = "SELECT * FROM teachers WHERE specialized = '$bo_mon' AND name LIKE '%$keyword%'";
        else
            $sql = "SELECT * FROM teachers WHERE name LIKE '%$keyword%'";
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
        foreach($data as $row)
            $array = array_merge($array, [$row]);// phương thức gộp mảng
        return $array;
    }

    // Xóa giáo viên
    public function removeTeacher($id) {
        $sql= "DELETE FROM teachers WHERE id='$id'";
        $this->__conn->exec($sql);
    }

     // search name teacher
     public function searchNameTeacher($id) {
        $sql = "SELECT name FROM teachers WHERE id='$id'";
        $data = $this->__conn->query($sql);
        foreach($data as $row)
            return $row['name'];
     }

     public function addTeacher($data){
        // $sql= "DELETE FROM subjects WHERE id='$id'";
        // $this->__conn->exec($sql);

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $created = date("Y-m-d H:m:s");

        
        $stmt = $this->__conn->prepare('insert into teachers(name,avatar,specialized,degree,description,created) value(:fname,:favata,:fspecialized,:fdegree,:fdescription,:fcreated)');
        // $stmt = $this->__conn->prepare('insert into subjects(name,avata,des,year,created) value(:fname,:favata,:fmota,:fkhoa,:fcreated)');
        $stmt->bindParam(':fname',$data['name']);
        $stmt->bindParam(':fspecialized',$data['specialized']);
        $stmt->bindParam(':fdescription',$data['description']);
        $stmt->bindParam(':fdegree',$data['degree']);
        $stmt->bindParam(':favata',$data['avata']);
        $stmt->bindParam(':fcreated',$created);
        // Execute
        return $stmt->execute(); 
      
    }

    public function updateTeacher($data){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $updated = date("Y-m-d H:m:s");

        $stmt = $this->__conn->prepare('UPDATE teachers SET name=:fname, avatar=:favata, specialized=:fspecialized, degree=:fdegree, description=:fdescription, updated=:fupdated where id=:id');
        // bindParam values
        $stmt->bindParam(':fname',$data['name']);
        $stmt->bindParam(':fspecialized',$data['specialized']);
        $stmt->bindParam(':fdescription',$data['description']);
        $stmt->bindParam(':fdegree',$data['degree']);
        $stmt->bindParam(':favata',$data['avata']);
        $stmt->bindParam(':fupdated',$updated);
        $stmt->bindParam(':id',$data['id']);
        // Execute
        if( $stmt->execute() ){
            return true;
        } else {
            return false;
        }
    }

    public function getTeacher($id){
        // $sql = "SELECT name FROM subjects WHERE id='$id'";
        $stmt = $this->__conn->prepare("select * from teachers where id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        // $array = [$data];
        // $array = array_merge($array, [$data]);
        return $data;
    }
}

$Teacher = new Teacher();
