<?php
// require_once './app/controllers/checkLogin.php';
class SearchTeacher{
    public function __construct(){
        require_once './app/models/teacher.php';
        $_SESSION['search-notification-tc']='';
        $_SESSION['dataSearchTc'] = $Teacher->searchAllTeacher();
        // xóa và refesh lại trang
        if(isset($_REQUEST['remove-teacher'])){
            $Teacher->removeTeacher($_REQUEST['remove-teacher']);
            $this->delete_files(AVATA.'teachers/'.$_REQUEST['remove-teacher']);
            // if(isset($_SESSION['key-search'])  && $_SESSION['key-search'] != ''){
            //     // Nếu tồn tại key-search thì tìm kiếm lại key search sau khi xóa
            //     $khoa = $_SESSION['key-search'][0];
            //     $keyword = $_SESSION['key-search'][1];
            //     $_SESSION['dataSearchTc'] = $Teacher->searchTeacher($khoa, $keyword); // trả về mảng khi tìm kiếm 
            //     $_SESSION['key-search'] = '';
            // }

            $_SESSION['dataSearchTc'] = $Teacher->searchAllTeacher();
            $_SESSION['search-notification-tc'] = "Đã xóa môn học có id = ".$_REQUEST['remove-teacher'];

        }
        else if(isset($_REQUEST['change-teacher'])){
            // $_SESSION['id'] = $_REQUEST['search-subject'];
            $sub = $Teacher->getTeacher($_REQUEST['change-teacher']);
            $specialized = [
                1=>'Khoa học máy tính',
                2=>'Khoa học dữ liệu',
                3=>'Hải dương học'
            ];
            $degree  = [
                1=>'Cử nhân',
                2=>'Thạc sĩ',
                3=>'Tiến sĩ',
                4=>'Phó giáo sư',
                5=>'Giáo sư'

            ];
            // print_r($sub);
            $data = [
                'id' =>  $sub['id'],
                'specializes' => $specialized,
                'degrees' => $degree,
                'name' => $sub['name'],
                'degree' => $sub['degree'],
                'specialized' => $sub['specialized'],
                'description' => $sub['description'],
                'avata' => $sub['avatar'],
                'name_err' => '',
                'specialized_err' => '',
                'degree_err' => '',
                'description_err' => '',
                'avata_err' => ''
                ];
            $_SESSION['data'] = $data;
            // print_r($data);
            header("location:".URLROOT."/?router=add-teacher-edit");
        }
        // Nếu nhấn vào button tìm kiếm
        else if(isset($_REQUEST['search-teacher'])){
            $_SESSION['key-search']= '';
            if(empty($_REQUEST['bo-mon']) && empty(trim($_REQUEST['keyword']))){
                $_SESSION['search-notification-tc']='Điền ít nhất 1 trường để tìm kiếm';

            }
        
            else {
                $khoa = !empty($_REQUEST['bo-mon']) ? $_REQUEST['bo-mon'] : null;
                $keyword = !empty(trim($_REQUEST['keyword'])) ? trim($_REQUEST['keyword']) : null;
                // $_SESSION['key-search'] = [$khoa, $keyword];// Lưu tạm data search để sau khi xóa sẽ hiển thị lại
                $_SESSION['dataSearchTc'] = $Teacher->searchTeacher($khoa, $keyword); // trả về mảng khi tìm kiếm
                $_SESSION['search-notification-tc'] = count($_SESSION['dataSearchTc']);
                
            }

        }
         
        
    }

    public function delete_files($target) {

        if (is_dir($target)) {
            $files = glob( $target . '*', GLOB_MARK ); //GLOB_MARK adds a slash to directories returned
    
            foreach( $files as $file )
            {
                $this->delete_files( $file );
            }
            if (file_exists($target)){
                rmdir( $target );
            }
        } elseif (is_file($target)) {
            unlink( $target );
        }

    }
}
$SearchTeacher = new SearchTeacher();
require_once './app/views/search_teacher.php';
