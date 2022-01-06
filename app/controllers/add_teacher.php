<?php
// require_once './app/controllers/checkLogin.php';

// require_once './app/models/teacher.php';

class Teacher
    {
        public function __construct()
        {
      
            $this->add_input();
        }
        
        public function index()
        {
            //gọi method getuser
            
            $users  = $this->UserModel->getTeacher();
            $data = [
                'users' => $users
            ];
         
            $this->view('add_complate', $data);
        }

        public function add_input()
        {
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
            
            //Check for POST
            if (isset($_POST['submit'])) {
                // if ($_SERVER['REQUEST_METHOD']=='POST') {
                // Sanitize POST Data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Process form
                $data = [
                'specializes' => $specialized,
                'degrees' => $degree,
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

                if (empty($data['name'])){
                    $data['name_err'] = "hãy nhập tên môn học";
                }else{
                    if (strlen($data['name']) > 100){
                        $data['name_err'] = "không nhập quá 100 kí tự";
                    }
                }
                if (empty($data['specialized'])){
                    $data['specialized_err'] = "hãy chọn chuyên ngành";
                }
                if (empty($data['degree'])){
                    $data['degree_err'] = "hãy chọn học vị";
                }
                if (empty($data['description'])) {
                    $data['description_err'] = "hãy nhập mô tả chi tiết";
                }else {
                    if (strlen($data['description']) > 100){
                        $data['description_err'] = "không nhập quá 1000 kí tự";
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
                    'specializes' => $specialized,
                    'degrees' => $degree,
                    'name' => '',
                    'specialized' => '',
                    'degree' => '',
                    'description' => '',
                    'avata' => '',
                    'type' => '',
                    'temp' => '',
                    'size' => '',
                    'name_err' => '',
                    'specialized_err' => '',
                    'degree_err' => '',
                    'description_err' => '',
                    'avata_err' => ''
                ];

                $_SESSION['data'] = $data;

                require_once './app/views/add_teacher.php';

         

            }

            
            if (!empty($data['name']) && !empty($data['specialized'])&& !empty($data['degree']) && !empty($data['description']) && !empty($data['avata'])) {
             
                $this->createUserSession($data);
                

            }else{
       
                $_SESSION['data'] = $data;
                require_once './app/views/add_teacher.php';
            }

        }

        


      
        public function createUserSession($data)
        {
           
            $_SESSION['data'] = $data;
            header("location:".URLROOT."/?router=add-teacher-confirm");
        }
       

    }
$add = new Teacher();
?>