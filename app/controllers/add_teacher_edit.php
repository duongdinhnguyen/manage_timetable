<?php
require_once './app/controllers/checkLogin.php';
class Edit
    {
        public function __construct()
        {
        //   $this->UserModel = $this->model('Classroom');
        //   $this->postModel = $this->model('Post');
            if (isset($_SESSION['data']['id'])){
                $this->add_update($_SESSION['data']['id']);
            }else{

                $this->add_edit();
            }
        }

    public function add_edit(){ 

        $sub = $_SESSION['data'];
        if (isset($_POST['submit'])) {
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process form
            $data = [
                'name' => $_POST['txt_name'],
                'degree' => $_POST['txt_degree'],
                'specialized' => $_POST['txt_specialized'],
                'description' => $_POST['txt_description'],
                'avata' => $_FILES['txt_file']['name'],
                'type' => $_FILES['txt_file']['type'],
                'temp' => $_FILES['txt_file']['tmp_name'],
                'size' => $_FILES['txt_file']['size'],
                'name_err' => '',
                'specialized_err' => '',
                'degree_err' => '',
                'description_err' => '',
                'avata_err' => ''
                ];
            $path = AVATA.'tmp/'.$data['avata'];
            $directory=AVATA.'tmp/';
            
            if ($data['avata']){
                if ($data['type']=="image/jpg" || $data['type']=="image/jpeg" || $data['type']=="image/png"){
                    if(!file_exists($path)){
                    if($data['size'] <5000000){
                            unlink($directory.$sub['avata']);
                            move_uploaded_file($data['temp'], $path);
    
                        }
                        else {
                            $data['avata_err']="your file to large pls uuload 5mb size";
                        }
                    }
                    else {
                        $data['avata_err'] = "file already exit check upload folder";
                    }
                }
                else{
                    $data['avata_err'] = "upload jpg jpeg png & gif formate ... check file";
                }
            }
            else{
                $data['avata'] = $sub['avata'];
            }
            // $data['avata'] = $sub->avata;
            
            if(empty( $data['avata_err'])) {
                require_once './app/models/teacher.php';
                $result = $Teacher->addTeacher($data);

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


                    $_SESSION['Msg-add-teacher'] = 'Bạn đã sửa thành công';
            

                    header("location:".URLROOT."/?router=add-teacher-complete");
                        // header('location:' . URLROOT . '/Subject/add_complate');
                }
            }
        } else if (isset($_POST['cancel'])) {
            header("location:".URLROOT."/?router=add-teacher-confirm");

        }else{
            // $sub = $_SESSION['data'];
            // header("location:".URLROOT."/?router=add-subject");
            require_once './app/views/add_teacher.php';
        }
    }

    public function add_update($id){ 
      
        $sub = $_SESSION['data'];
        if (isset($_POST['submit'])) {
          
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process form
            $data = [
            'id' => $id,
            'name' => $_POST['txt_name'],
            'specialized' => $_POST['txt_specialized'],
            'degree' => $_POST['txt_degree'],
            'description' => $_POST['txt_description'],
            'avata' => $_FILES['txt_file']['name'],
            'type' => $_FILES['txt_file']['type'],
            'temp' => $_FILES['txt_file']['tmp_name'],
            'size' => $_FILES['txt_file']['size'],
            'name_err' => '',
            'specialized_err' => '',
            'degree_err' => '',
            'description_err' => '',
            'avata_err' => ''
            ];
            $path = AVATA.'teachers/'.$data['id'].'/'.$data['avata'];
            $directory=AVATA.'teachers/'.$data['id'].'/';
            
            if ($data['avata']){
                if ($data['type']=="image/jpg" || $data['type']=="image/jpeg" || $data['type']=="image/png"){
                    if(!file_exists($path)){
                       if($data['size'] <5000000){
                            unlink($directory.$sub['avata']);
                            move_uploaded_file($data['temp'], $path);
    
                        }
                        else {
                            $data['avata_err']="your file to large pls uuload 5mb size";
                        }
                    }
                    else {
                        $data['avata_err'] = "file already exit check upload folder";
                    }
                }
                else{
                    $data['avata_err'] = "upload jpg jpeg png & gif formate ... check file";
                }
            }
            else{
                $data['avata'] = $sub['avata'];
            }
            // $data['avata'] = $sub->avata;
            
            if(empty( $data['avata_err'])) {
                require_once './app/models/teacher.php';
                $result = $Teacher->updateTeacher($data);
                if ($result) {  
                    $_SESSION['Msg-add-teacher'] = 'Bạn đã sửa thành công';
                    header("location:".URLROOT."/?router=add-teacher-complete");
                }
            }

        } else if (isset($_POST['cancel'])) {
            header("location:".URLROOT."/?router=search-teacher");
        } else{
            require_once './app/views/add_teacher.php';
        }
        

       
            // Init data
    }
}


$Edit = new Edit();