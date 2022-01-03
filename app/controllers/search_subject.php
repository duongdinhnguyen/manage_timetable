<?php
require_once './app/controllers/checkLogin.php';
class SearchSubject{
    public function __construct(){
        $_SESSION['search-notification']='';
        $_SESSION['dataSearch'] = null;
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
            
            $_SESSION['search-notification'] = "Đã xóa môn học có id = ".$_REQUEST['remove-subject'];

        }
        else if(isset($_REQUEST['change-subject'])){
            // $_SESSION['id'] = $_REQUEST['search-subject'];
            require_once './app/models/subject.php';
            $sub = $Subject->getSubject($_REQUEST['change-subject']);
            $khoa  = [
                '1'=>'Năm 1',
                '2'=>'Năm 2',
                '3'=>'Năm 3',
                '4'=>'Năm 4',

            ];
            // print_r($sub);
            $data = [
                'nam' => $khoa,
                'id' => $sub['id'],
                'name' => $sub['name'],
                'khoa' => $sub['school_year'],
                'mota' => $sub['description'],
                'avata' => $sub['avatar'],
                'name_err' => '',
                'khoa_err' => '',
                'mota_err' => '',
                'avata_err' => ''
            ];
            $_SESSION['data'] = $data;
            print_r($data);
            header("location:".URLROOT."/?router=add-subject-edit");
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
         
        
    }
}
$SearchSubject = new SearchSubject();
require_once './app/views/search_subject.php';