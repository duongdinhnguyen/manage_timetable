<?php
require_once './app/controllers/checkLogin.php';
class SearchSubject{
    public $dataSearch=null;
    public function __construct(){
        $_SESSION['search-subject']='';
        
        // Nếu nhấn vào button tìm kiếm
        if(isset($_REQUEST['search-subject'])){
            if(empty($_REQUEST['khoa-hoc']) && empty(trim($_REQUEST['keyword']))){
                $_SESSION['search-subject']='Điền ít nhất 1 trường để tìm kiếm';

            }
        
            else {
                $khoa = !empty($_REQUEST['khoa-hoc']) ? $_REQUEST['khoa-hoc'] : null;
                $keyword = !empty(trim($_REQUEST['keyword'])) ? trim($_REQUEST['keyword']) : null;
                require_once './app/models/subject.php';
                $count= $Subject->countSubject($khoa, $keyword);
                $_SESSION['search-subject'] = "Tìm thấy " .$count ." môn học";
                $this->dataSearch = $Subject->searchSubject($khoa, $keyword);

            }

        }

        //Nếu nhấn vào button xóa
        
    }
}
$SearchSubject = new SearchSubject();
$dataSearch = $SearchSubject->dataSearch;
require_once 'app/views/search_subject.php';