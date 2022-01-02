<?php 
require_once './app/controllers/checkLogin.php';

class AddScheduleComplete{
    public function __construct(){
        $_SESSION['file'] = "";
        $data = isset($_SESSION['add-schedule']) ? $_SESSION['add-schedule'] : [];
        $data[4] = $this-> createLessonFile($data[4]);// trả về tên file (tạo và ghi) tiết học 
        $data[5] = $this-> createNoteFile($data[5]); // trả về tên file (tạo và ghi) note
        // $_SESSION['file'] = $data[4] ."   " .$data[5];

        require_once './app/models/schedule.php';
        $Schedule-> insert($data);
    }

    // Tạo file chứa thông tin Tiết học và notes
    public function createLessonFile($data){
        $lessonNameFile = "lesson". rand() .".txt";
        $path = "./web/file/lesson/". $lessonNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['file'] = "Không tạo được file";
        }
        else{
            foreach($data as $row){
                fwrite($fp, $row."\n");
            }
            fclose($fp);
        }
        return $lessonNameFile;

    }

    //Tạo file chưa thông tin Note
    public function createNoteFile($data){
        $noteNameFile = "note". rand() .".txt";
        $path = "./web/file/note/". $noteNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['file'] = "Không tạo được file";
        }
        else{
            
            fwrite($fp, $data);
            
            fclose($fp);
        }
        return $noteNameFile;
    }
}

$AddScheduleComplete = new AddScheduleComplete();
require_once './app/views/add_schedule_complete.php';