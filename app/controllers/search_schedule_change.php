<?php
class SearchScheduleChange{
    // public $dataTest;
    public function __construct(){
        require_once './app/models/schedule.php';

        $id =$_SESSION['data-schedule-update'];

        $data= $Schedule->searchScheduleFromId($id);
        $data[4] = $this->readLesson($data[4]);
        // $this->dataTest = $this->readLesson($data[4]);
        $data[5] = $this->readNote($data[5]);
        $_SESSION['add-schedule-data'] =[$data[0],$data[1],$data[2],$data[3],$data[4],$data[5]];
        header('location:'.URLROOT.'/?router=add-schedule');
    }

    //read Lesson
    public function readLesson($lessonFileName){
        $path = "./web/file/lesson/". $lessonFileName;
        $fp = @fopen($path,"r");
        $result=[];
        if($fp){
            while(!feof($fp)){
                $result=array_merge($result,[fgets($fp)]);
            }
            fclose($fp);
        }
        return $result;
    }

    //read Note
    public function readNote($noteFileName){
        $path = "./web/file/note/". $noteFileName;
        $fp = @fopen($path,"r");
        if($fp){
            $result = fread($fp, filesize($path));
        }
        fclose($fp);
        return $result;
    }
}
$SearchScheduleChange = new SearchScheduleChange();
// $data = $SearchScheduleChange->dataTest;
// require_once './app/views/search_schedule_change.php';