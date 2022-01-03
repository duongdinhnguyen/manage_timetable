<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/base.css">
    <title>Document</title>
</head>
<body>
    <div class="timetable">
        <form action="" class="form" method="POST">
            <div class="main">
            <div class="element">
                <label for="ten-mon-hoc">Tên môn học</label>
                <input id="ten-mon-hoc" type="text" class="input-element">
            </div>
            <div class="element">
                <label for="khoa-hoc">Khóa</label>
                <select name="" id="khoa-hoc" class="select-element">
                    <option value="">Chọn khóa học</option>
                    <option value="2021" name="">Năm nhất</option>
                    <option value="2020" name="">Năm 2</option>
                    <option value="2019" name="">Năm 3</option>
                    <option value="2018" name="">Năm 4</option>
                </select>
            </div>
            <div class="element">
                <label for="">Mô tả chi tiết</label>
                <textarea name="" id="description" cols="20" rows="3"></textarea>
            </div>
            <div class="element">
                <label for="Browse">Avatar</label>
                <input type="text" class="input-element" name="" id="" style="width:292px">
                <input type="file" id="Browse" title="Choose a video please" style='display: none;'/>
                <label for="Browse" class="btn-submit">Browse</label>

            </div>
            <div class="element">
                <button type="submit">Xác nhận</button>
            </div>
            </div>
        </form>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/mystyle.css">
    <title>Document</title>
</head>
<body>

<?php 
    $data=$_SESSION['data'];
?>
<div class="container">
        <form method='post' action='' enctype='multipart/form-data'>        
        <!-- <form method='post' action='' enctype='multipart/form-data'>         -->
            <div class="from-from">
                
                <span class="from-from__msg"><?php echo $data['name_err']; ?></span>
                
                <div class="from-from__group">
                    <span class="from-from__label">mon hoc</span>
                    <input value="<?= $data['name'] ?>" type="text" class="from-from__input" name="txt_mon">
                </div>

                <span class="from-from__msg"><?php echo $data['khoa_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">khoa</span>
                    <select name="txt_khoa" id="" class="from-from__select">
                   
                

                    <?php
                       
                        foreach($data['nam'] as $key => $value){
                            echo $key;
                            echo $data['khoa'];
                    ?>
                    
                    <option value="<?php echo $key ?>" <?php if ($data['khoa'] == $key) { echo "selected";}?> ><?php echo $value ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>

                <span class="from-from__msg"><?php echo $data['mota_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">Mo ta chi tiet</span>
                    <textarea name="txt_mota" class="from-from__input from-from__input-big"><?= $data['mota'] ?></textarea>
                    
                </div>
        

                <span class="from-from__msg"><?php echo $data['avata_err']; ?></span>
                <div class="from-from__group from-from__group--re">
                    <span class="from-from__label">avata</span>
                    <div class="from-from__group-avatar">
                    <input class="from-from__group-input" type="file" id="txt_file" name="txt_file"  accept=".jpg, .jpeg, .png">
                    <div class="from-from__group-image">
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
                    <div class="preview">
                        <p class="from-from__group-p">No files currently selected for upload</p>
                        <label class="from-from__group-label" for="txt_file">browser</label>
                    </div>
                </div>

            </div>
            <div class="from-from__group from-from__group--center">
                <input type="submit" name="submit" class="from-from__btn from-from__submit" value="xac nhan">
                <a href="?router=home" class="from-from__btn from-from__link">cancel</a>
            </div>
            </div>
        </form>
    </div>
    <script src="<?= URLROOT ?>/web/js/myscript.js"></script>
  
</body>
  
</html>