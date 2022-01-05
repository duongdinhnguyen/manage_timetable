<?php 
require_once './app/controllers/checkLogin.php';

class AddScheduleComplete{
    public function __construct(){
        $_SESSION['add-schedule-complete-notifi'] = "";
        $data = isset($_SESSION['add-schedule-data']) ? $_SESSION['add-schedule-data'] : [];
        $_SESSION['add-schedule-data'] =['','','','',[],''];
        // Sau khi lấy data để xử lý insert vào database thì trả 
        //$_SESSION['add-schedule-data'] = trống để ko hiển thị lại datainput khi vào lại screen add-schedule sau khi insert xong
        
        $data[4] = $this-> createLessonFile($data[4]);// trả về tên file (tạo và ghi) tiết học 
        $data[5] = $this-> createNoteFile($data[5]); // trả về tên file (tạo và ghi) note
        // $_SESSION['add-schedule-complete-notifi'] = $data[4] ."   " .$data[5];

        require_once './app/models/schedule.php';
        $Schedule-> insert($data);
    }

    // Tạo file chứa thông tin Tiết học và notes
    public function createLessonFile($data){
        $lessonNameFile = "l". rand(1,99999) .".txt";
        $path = "./web/file/lesson/". $lessonNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['add-schedule-complete-notifi'] = "Không tạo được file";
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
        $noteNameFile = "n". rand(1,99999) .".txt";
        $path = "./web/file/note/". $noteNameFile;
        $fp = @fopen($path, "w+");
        if(!$fp){
            $_SESSION['add-schedule-complete-notifi'] = "Không tạo được file";
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