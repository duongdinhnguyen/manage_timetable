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
    public function addSubject($data){
 

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $created = date("Y-m-d H:m:s");

        
        $stmt = $this->__conn->prepare('insert into subjects(name,avatar,description,school_year,created) value(:fname,:favata,:fmota,:fkhoa,:fcreated)');
        // $stmt = $this->__conn->prepare('insert into subjects(name,avata,des,year,created) value(:fname,:favata,:fmota,:fkhoa,:fcreated)');
        $stmt->bindParam(':fname',$data['name']);
        $stmt->bindParam(':fkhoa',$data['khoa']);
        $stmt->bindParam(':fmota',$data['mota']);
        $stmt->bindParam(':favata',$data['avata']);
        $stmt->bindParam(':fcreated',$created);
        // Execute
        return $stmt->execute(); 
  
    }

    public function updateSubject($data){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $updated = date("Y-m-d H:m:s");

        $stmt = $this->__conn->prepare('UPDATE subjects SET name=:name_up, avatar=:avata_up, school_year=:khoa_up, description=:mota_up, updated=:updated_up where id=:id');
        // bindParam values
        $stmt->bindParam(':name_up',$data['name']);
        $stmt->bindParam(':khoa_up',$data['khoa']);
        $stmt->bindParam(':mota_up',$data['mota']);
        $stmt->bindParam(':avata_up',$data['avata']);
        $stmt->bindParam(':updated_up',$updated);
        $stmt->bindParam(':id',$data['id']);
        // Execute
        if( $stmt->execute() ){
            return true;
        } else {
            return false;
        }
    }
    public function getSubject($id){

        $stmt = $this->__conn->prepare("select * from subjects where id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
       
        return $data;
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