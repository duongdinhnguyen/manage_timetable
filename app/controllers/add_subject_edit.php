<?php
// require_once './app/controllers/checkLogin.php';
class Edit
    {
        public function __construct()
        {
       
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
            $path = AVATA.'tmp/'.$data['avata'];
            $directory=AVATA.'tmp/';

            if (empty($data['name'])){
                $data['name'] = $sub['name'];
            }else{
                if (strlen($data['name']) > 100){
                    $data['name'] = $sub['name'];
                }
            }
            if (empty($data['khoa'])){
                $data['khoa'] = $sub['khoa'];
            }
            if (empty($data['mota'])) {
                $data['mota'] = $sub['mota'];
            }else {
                if (strlen($data['mota']) > 100){
                    $data['mota'] = $sub['mota'];
                }
            }
            
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
                require_once './app/models/subject.php';
                $result = $Subject->addSubject($data);

                if ($result) {
                    $row = $Subject->searchAllSubject();

                    $dir = AVATA."subjects/{$row[count($row)-1]['id']}/";
    
                // Ki???m tra th?? m???c ???? t???n t???i hay ch??a
                    if(!file_exists($dir)){
                        // T???o m???t th?? m???c m???i
                        if(mkdir($dir)){
                            echo "T???o th?? m???c th??nh c??ng.";
                        } else{
                            echo "ERROR: Kh??ng th??? t???o th?? m???c.";
                        }
                    } else{
                        echo "ERROR: Th?? m???c ???? t???n t???i.";
                    }


                    $file = AVATA."tmp/".$data['avata'];
                    
                    $newfile = AVATA."subjects/{$row[count($row)-1]['id']}/".$data['avata'];
                    
                    // Ki???m tra file c???n copy c?? t???n t???i hay kh??ng
                    if(file_exists($file)){
                        // T???o file copy
                        if(rename($file, $newfile)){
                            // unlink($file);
                            echo "Copy file th??nh c??ng.";
                        } else{
                            echo "ERROR: File kh??ng th??? copy.";
                        }
                    } else{
                        echo "ERROR: File kh??ng t???n t???i.";
                    }


                    $_SESSION['Msg-add-subject'] = 'B???n ???? s???a th??nh c??ng';
            

                    header("location:".URLROOT."/?router=add-subject-complete");
                        // header('location:' . URLROOT . '/Subject/add_complate');
                }
            }
        } else if (isset($_POST['cancel'])) {
            header("location:".URLROOT."/?router=add-subject-confirm");

        }else{

            require_once './app/views/add_subject.php';
        }
    }

    public function add_update($id){ 
      
        $sub = $_SESSION['data'];
        if (isset($_POST['submit'])) {
          
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Process form
            $data = [
            'id' => $id,
            'nam' => $_SESSION['data']['nam'],
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
            $path = AVATA.'subjects/'.$data['id'].'/'.$data['avata'];
            $directory=AVATA.'subjects/'.$data['id'].'/';

            if (empty($data['name'])){
                    $data['name_err'] = "h??y nh???p t??n m??n h???c";
            }else{
                if (strlen($data['name']) > 100){
                    $data['name_err'] = "kh??ng nh???p qu?? 100 k?? t???";
                }
            }
            if (empty($data['khoa'])){
                $data['khoa_err'] = "h??y ch???n kh??a h???c";
            }
            if (empty($data['mota'])) {
                $data['mota_err'] = "h??y nh???p m?? t??? chi ti???t";
            }else {
                if (strlen($data['mota']) > 100){
                    $data['mota_err'] = "kh??ng nh???p qu?? 1000 k?? t???";
                }
            }
        
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
            
            if(empty( $data['name_err']) && empty( $data['khoa_err']) && empty( $data['mota_err']) && empty( $data['avata_err'])) {
                $_SESSION['data'] = $data;
                header("location:".URLROOT."/?router=add-subject-confirm");
            //     require_once './app/models/subject.php';
            //     $result = $Subject->updateSubject($data);
            //     if ($result) {  
            //         $_SESSION['Msg-add-subject'] = 'B???n ???? s???a th??nh c??ng';
            //         header("location:".URLROOT."/?router=add-subject-complete");
            //     }
             }else{
                $_SESSION['data'] = $data;
                header("location:".URLROOT."/?router=add-subject-edit");
             }

        } else if (isset($_POST['cancel'])) {
            if($_REQUEST['change-subject']){
                header("location:".URLROOT."/?router=search-subject");
            }else{
                header("location:".URLROOT."/?router=add-subject-confirm");
            }
        } else{
            require_once './app/views/add_subject.php';
        }
        

       
            // Init data
    }
}


$Edit = new Edit();