<?php 
// require_once './app/controllers/checkLogin.php';

class AddScheduleComplete{
    public function __construct(){
        require_once './app/models/schedule.php';

        $_SESSION['add-schedule-complete-notifi'] = "";
        $data = isset($_SESSION['add-schedule-data']) ? $_SESSION['add-schedule-data'] : [];
        $_SESSION['add-schedule-data'] =['','','','',[],''];
        // Sau khi lấy data để xử lý insert vào database thì trả 
        //$_SESSION['add-schedule-data'] = trống để ko hiển thị lại datainput khi vào lại screen add-schedule sau khi insert xong
        
        

        if(isset($_SESSION['data-schedule-update'])  && $_SESSION['data-schedule-update'] !=0){
            // Nếu đúng thì thực hiện update vào data và update vào 2 file note và lesson
            $schedule = $Schedule->searchScheduleFromId($_SESSION['data-schedule-update']);// Lấy ra schedule theo $id
            $lessonNameFile = $schedule[4];
            $noteNameFile = $schedule[5];

            //update data vào file lesson
            $this->updateLesson( $lessonNameFile, $data[4]);
            $this->updateNote( $noteNameFile, $data[5]);

            $Schedule->updateSchedule($data, $_SESSION['data-schedule-update']);// đưa dữ liệu cần thay đổi và id để update vào table schedule
            $_SESSION['data-schedule-update'] =0;

        }
        else{
            // Thực hiện add schedule mới và insert vào database
            $data[4] = $this-> createLessonFile($data[4]);// trả về tên file (tạo và ghi) tiết học 
            $data[5] = $this-> createNoteFile($data[5]); // trả về tên file (tạo và ghi) note
            // $_SESSION['add-schedule-complete-notifi'] = $data[4] ."   " .$data[5];
            $Schedule-> insert($data);

        }

    }

    // Tạo file chứa thông tin Tiết học và notes
    public function createLessonFile($data){
        
        do{
            //Tạo file chưa thông tin Note
            $lessonNameFile = "l". rand(1,99999) .".txt";
            $path = "./web/file/lesson/". $lessonNameFile;
        }
        while(file_exists($path));// nếu nó đã tồn tại(trùng với file khác trên database) thì tạo lại
        
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
        
        do{
            // tạo mới một file để chứa note
            $noteNameFile = "n". rand(1,99999) .".txt";
            $path = "./web/file/note/". $noteNameFile;
        }
        while(file_exists($path));// nếu nó đã tồn tại(trùng với file khác trên database) thì tạo lại
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

    //update file lesson
    public function updateLesson($lessonNameFile, $data){
        $path = "./web/file/lesson/".$lessonNameFile;
        $fp =@fopen($path, "w");
        if(!$fp){
            $_SESSION['add-schedule-complete-notifi'] = "Không mở được file";
        }
        else{
            foreach($data as $row){
                fwrite($fp, $row."\n");
            }
            fclose($fp);
        }
    }

    //update file note
    public function updateNote($noteNameFile, $data){
        $path = "./web/file/note/".$noteNameFile;
        $fp =@fopen($path, "w");
        if(!$fp){
            $_SESSION['add-schedule-complete-notifi'] = "Không mở được file";
        }
        else{
            fwrite($fp, $data);
            fclose($fp);
        }
    }
}

$AddScheduleComplete = new AddScheduleComplete();
require_once './app/views/add_schedule_complete.php';