<?php 
// require_once './app/controllers/checkLogin.php';
// require_once './app/views/add_subject_confirm.php';
// require_once './app/controllers/checkLogin.php';


class Confirm
    {

        public function __construct()
        {

            
            if(isset($_SESSION['data']['id'])){
                $this->edit_confirm();
            }else{

                $this->add_confirm();
            }
        }

        public function add_confirm(){ 
            $data = $_SESSION['data'];
            if (isset($_POST['btn_submit'])) {
            
                require_once './app/models/subject.php';
                
                $result = $Subject->addSubject($data);
               
                if ($result) {
                    $row = $Subject->searchAllSubject();

                    $dir = AVATA."subjects/{$row[count($row)-1]['id']}/";
    
                // Kiểm tra thư mục đã tồn tại hay chưa
                    if(!file_exists($dir)){
                        // Tạo một thư mục mới
                        if(mkdir($dir)){
                            echo "Tạo thư mục thành công.";
                        } else{
                            echo "ERROR: Không thể tạo thư mục.";
                        }
                    } else{
                        echo "ERROR: Thư mục đã tồn tại.";
                    }


                    $file = AVATA."tmp/".$data['avata'];
                    
                    $newfile = AVATA."subjects/{$row[count($row)-1]['id']}/".$data['avata'];
                    
                    // Kiểm tra file cần copy có tồn tại hay không
                    if(file_exists($file)){
                        // Tạo file copy
                        if(rename($file, $newfile)){
                            // unlink($file);
                            echo "Copy file thành công.";
                        } else{
                            echo "ERROR: File không thể copy.";
                        }
                    } else{
                        echo "ERROR: File không tồn tại.";
                    }


                    $_SESSION['Msg-add-subject'] = 'Bạn đã đăng kí thành công';
                   

                    header("location:".URLROOT."/?router=add-subject-complete");

            
                }
            }else if (isset($_POST['btn_edit'])) {
                header("location:".URLROOT."/?router=add-subject-edit");
            }else{
                // $this->view('add_confirm',$data);
                // require_once './app/views/add_subject_confirm.php';
                require_once './app/views/add_subject_confirm.php';

            }

        }

        public function edit_confirm(){ 
            $data = $_SESSION['data'];
            if (isset($_POST['btn_submit'])) {
            
                require_once './app/models/subject.php';
                $result = $Subject->updateSubject($data);
                if ($result) {  
                    $_SESSION['Msg-add-subject'] = 'Bạn đã sửa thành công';
                    header("location:".URLROOT."/?router=add-subject-complete");
                }
            }else if (isset($_POST['btn_edit'])) {
                header("location:".URLROOT."/?router=add-subject-edit");
            }else{
                // $this->view('add_confirm',$data);
                // require_once './app/views/add_subject_confirm.php';
                require_once './app/views/add_subject_confirm.php';

            }

        }
    
    }

$Confirm = new Confirm();