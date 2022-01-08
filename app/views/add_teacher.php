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

<?php 
    $data=$_SESSION['data'];
?>
<div class="container">
        <form method='post' action='' enctype='multipart/form-data'>        
        <!-- <form method='post' action='' enctype='multipart/form-data'>         -->
            <div class="from-from">
                
                <span class="from-from__msg"><?php echo $data['name_err']; ?></span>
                
                <div class="from-from__group">
                    <span class="from-from__label">Tên</span>
                    <input value="<?= $data['name'] ?>" type="text" class="from-from__input" name="txt_name">
                </div>

                <span class="from-from__msg"><?php echo $data['specialized_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">Chuyên ngành</span>
                    <select name="txt_specialized" id="" class="from-from__select">
                   
                

                    <?php
                       
                        foreach($data['specializes'] as $key => $value){
                    ?>
                    
                    <option value="<?php echo $key ?>" <?php if ($data['specialized'] == $key) { echo "selected";}?> ><?php echo $value ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <span class="from-from__msg"><?php echo $data['degree_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">Học vị</span>
                    <select name="txt_degree" id="" class="from-from__select">
                   
                

                    <?php
                       
                        foreach($data['degrees'] as $key => $value){
                    ?>
                    
                    <option value="<?php echo $key ?>" <?php if ($data['degree'] == $key) { echo "selected";}?> ><?php echo $value ?></option>
                    <?php
                    }
                    ?>
                    </select>
                </div>
                <span class="from-from__msg"><?php echo $data['description_err']; ?></span>
                <div class="from-from__group">
                    <span class="from-from__label">Mo ta chi tiet</span>
                    <textarea name="txt_description" class="from-from__input from-from__input-big"><?= $data['description'] ?></textarea>
                    
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
                                <img src="<?= AVATA1 ?>teachers/<?= $data['id'] ?>/<?php echo $data['avata'] ?>" height="100" width="100" alt="">   
                        <?php
                            }else{
                        ?>
                                <img src="<?= AVATA1 ?>tmp/<?php echo $data['avata'] ?>" height="100" width="100" alt="">
                        <?php
                            }
                        ?>
                        
                    </div>
                    <div class="preview">
                        <p class="from-from__group-p"><?= $data['avata'] ?></p>
                        <label class="from-from__group-label" for="txt_file">browser</label>
                    </div>
                </div>

            </div>
            <div class="from-from__group from-from__group--center">
                <input type="submit" name="submit" class="from-from__btn from-from__submit" value="xac nhan">
                <!-- <a href="?router=home" class="from-from__btn from-from__link">cancel</a> -->
                <input type="submit" name="cancel" class="from-from__btn from-from__link" value="cancel">
            </div>
            </div>
        </form>
    </div>
    <script src="<?= URLROOT ?>/web/js/myscript.js"></script>
  
</body>
  
</html>