<?php
require_once './app/controllers/checkLogin.php';
class SearchSubject{
    public function __construct(){
        $_SESSION['search-notification']='';
        // xóa và refesh lại trang
        if(isset($_REQUEST['remove-subject'])){
            require_once './app/models/subject.php';
            $Subject->removeSubject($_REQUEST['remove-subject']);
            if(isset($_SESSION['key-search'])  && $_SESSION['key-search'] != ''){
                // Nếu tồn tại key-search thì tìm kiếm lại key search sau khi xóa
                $khoa = $_SESSION['key-search'][0];
                $keyword = $_SESSION['key-search'][1];
                $_SESSION['dataSearch'] = $Subject->searchSubject($khoa, $keyword); // trả về mảng khi tìm kiếm 
                $_SESSION['key-search'] = '';
            }
            else{
                // Không tồn tại key search thì hiển thị tất cả sau khi xóa
                $_SESSION['dataSearch'] = $Subject->searchAllSubject(); // trả về mảng khi tìm kiếm 

            }
            $_SESSION['search-notification'] = "Đã xóa môn học có id = ".$_REQUEST['remove-subject'];

        }
        // Nếu nhấn vào button tìm kiếm
        else if(isset($_REQUEST['search-subject'])){
            $_SESSION['key-search']= '';
            if(empty($_REQUEST['khoa-hoc']) && empty(trim($_REQUEST['keyword']))){
                $_SESSION['search-notification']='Điền ít nhất 1 trường để tìm kiếm';

            }
        
            else {
                $khoa = !empty($_REQUEST['khoa-hoc']) ? $_REQUEST['khoa-hoc'] : null;
                $keyword = !empty(trim($_REQUEST['keyword'])) ? trim($_REQUEST['keyword']) : null;
                $_SESSION['key-search'] = [$khoa, $keyword];// Lưu tạm data search để sau khi xóa sẽ hiển thị lại
                require_once './app/models/subject.php';
                $_SESSION['dataSearch'] = $Subject->searchSubject($khoa, $keyword); // trả về mảng khi tìm kiếm
                $_SESSION['search-notification'] = "Tìm thấy " .count($_SESSION['dataSearch']) ." môn học";
                
            }

        }
        else {
            // Nếu không nhấn tìm kiếm thì hiển thị tất cả
            require_once './app/models/subject.php';
            $_SESSION['dataSearch'] = $Subject->searchAllSubject();
        }   
        
    }
}
$SearchSubject = new SearchSubject();
require_once 'app/views/search_subject.php';