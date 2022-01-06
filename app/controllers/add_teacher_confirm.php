<?php 
require_once './app/controllers/checkLogin.php';
// require_once './app/views/add_subject_confirm.php';

class Confirm
    {

        public function __construct()
        {
        
            
            $this->add_confirm();
        }

        public function add_confirm(){ 
            $data = $_SESSION['data'];
            if (isset($_POST['btn_submit'])) {
            
                require_once './app/models/teacher.php';
               
                $result = $Teacher->addTeacher($data);
                // $result = $Subject->se();
                if ($result) {
                    $row = $Teacher->searchAllTeacher();

                    $dir = AVATA."teachers/{$row[count($row)-1]['id']}/";
    
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
                    
                    $newfile = AVATA."teachers/{$row[count($row)-1]['id']}/".$data['avata'];
                    
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


                    $_SESSION['Msg-add-teacher'] = 'Bạn đã đăng kí thành công';
                    // header("refresh:3;view.php");

                    header("location:".URLROOT."/?router=add-teacher-complete");

                    
                }
            }else if (isset($_POST['btn_edit'])) {
                header("location:".URLROOT."/?router=add-teacher-edit");
            }else{
                
                require_once './app/views/add_teacher_confirm.php';

            }

        }
    
    }

$Confirm = new Confirm();