<?php
// require_once './app/controllers/checkLogin.php';
if(!isset($_SESSION['login']) || $_SESSION['login']==''){
    header("location:http://localhost/manage_timetable/");
    // header('location:'.URLROOT.'/');
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/base.css">
    <link rel="stylesheet" href="./web/css/subject.css">
    <title>Document</title>
</head>
<body>
<div class="container">
        <form method='post' action='' enctype='multipart/form-data'>        
        <!-- <form method='post' action='' enctype='multipart/form-data'>         -->
            <div class="from-from">
                <div class="from-from__group">
                    <span class="from-from__label">mon hoc</span>
                    <span><?php echo $data['name'] ?></span>
                </div>
                <div class="from-from__group">
                    <span class="from-from__label">khoa</span>
                    <span><?php echo $data['nam'][$data['khoa']] ?></span>
                </div>
                <div class="from-from__group">
                    <span class="from-from__label">Mo ta chi tiet</span>
                    <span><?php  echo $data['mota'] ?></span>
                    
                </div>
        
                <div class="from-from__group from-from__group--re">
                    <span class="from-from__label">avata</span>
                    <div class="from-from__group-avatar">
                    
                    <div class="from-from__group-image">
                    <!-- <img src="upload/tmp/" height="100" width="100" alt=""> -->
                        <?php 
                            if(isset($data['id'])){
                        ?>
                                <img src="<?= AVATA1 ?>subjects/<?= $data['id'] ?>/<?php echo $data['avata'] ?>" height="100" width="100" alt="">   
                        <?php
                            }else{
                        ?>
                                <img src="<?= AVATA1 ?>tmp/<?php echo $data['avata'] ?>" height="100" width="100" alt="">
                        <?php
                            }
                        ?>
                    </div>
                </div>

            </div>
            <div class="from-from__group from-from__group--center">
                <input type="submit" name="btn_submit" class="from-from__btn from-from__submit" value="xac nhan">
                <!-- <a href="view.php" class="from-from__btn from-from__link">sửa lại</a> -->
                <input type="submit" name="btn_edit" class="from-from__btn from-from__submit" value="sửa lại">
            </div>
            </div>
        </form>
    </div>

</body>
</html>