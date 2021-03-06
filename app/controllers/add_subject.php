<?php
// require_once './app/controllers/checkLogin.php';

require_once './app/models/subject.php';

class Subjects
    {
        public function __construct()
        {
        
            $this->add_input();
        }
        
        public function index()
        {
            //gọi method getuser
            
            $users  = $this->UserModel->getSubjects();
            $data = [
                'users' => $users
            ];
          
            $this->view('add_complate', $data);
        }

        public function add_input()
        {
            $khoa  = [
                1=>'Năm 1',
                2=>'Năm 2',
                3=>'Năm 3',
                4=>'Năm 4',

            ];
            
            //Check for POST
            if (isset($_POST['submit'])) {
                
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process form
                $data = [
                'nam' => $khoa,
                'name' => $_POST['txt_mon'],
                'khoa' => $_POST['txt_khoa'],
                'mota' => $_POST['txt_mota'],
                'avata' => $_FILES['txt_file']['name'],
                'type' => $_FILES['txt_file']['type'],
                'temp' => $_FILES['txt_file']['tmp_name'],
                'size' => $_FILES['txt_file']['size'],
                'name_err' => '',
                'khoa_err' => '',
                'mota_err' => '',
                'avata_err' => ''
                ];

                if (empty($data['name'])){
                    $data['name_err'] = "hãy nhập tên môn học";
                }else{
                    if (strlen($data['name']) > 100){
                        $data['name_err'] = "không nhập quá 100 kí tự";
                    }
                }
                if (empty($data['khoa'])){
                    $data['khoa_err'] = "hãy chọn khóa học";
                }
                if (empty($data['mota'])) {
                    $data['mota_err'] = "hãy nhập mô tả chi tiết";
                }else {
                    if (strlen($data['mota']) > 100){
                        $data['mota_err'] = "không nhập quá 1000 kí tự";
                    }
                }
                if (empty($data['avata'])){
                    $data['avata_err'] = "hãy chọn avata";
                }
                else if ($data['type']=="image/jpg" || $data['type']=="image/jpeg" || $data['type']=="image/png"){
                    if(!file_exists(AVATA.'tmp/'.$data['avata'])){
                        if($data['size'] <5000000){
                            move_uploaded_file($data['temp'], AVATA.'tmp/'.$data['avata']);
        
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

            } else if (isset($_POST['cancel'])) {
                header("location:".URLROOT."/?router=home");

            } else {
                // Init data
                $data = [
                    'nam' => $khoa,
                    'name' => '',
                    'khoa' => '',
                    'mota' => '',
                    'avata' => '',
                    'type' => '',
                    'temp' => '',
                    'size' => '',
                    'name_err' => '',
                    'khoa_err' => '',
                    'mota_err' => '',
                    'avata_err' => ''
                ];

                $_SESSION['data'] = $data;

                require_once './app/views/add_subject.php';

         

            }

            
            if (!empty($data['name']) && !empty($data['khoa']) && !empty($data['mota']) && !empty($data['avata'])) {
             
                $this->createUserSession($data);
                

            }else{
       
                $_SESSION['data'] = $data;
                require_once './app/views/add_subject.php';
            }

        }

        


      
        public function createUserSession($data)
        {
           
            $_SESSION['data'] = $data;
            header("location:".URLROOT."/?router=add-subject-confirm");
        }
    

    }
$add = new Subjects();
?>