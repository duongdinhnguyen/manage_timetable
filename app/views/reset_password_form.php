<!DOCTYPE html>
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
            <?php
             
                $result = $Admin->alladmins();
            ?>
        <table class="tbl" >
                <tr>
                    <th style="width: 40px"> No</th>
                    <th> Tên người dùng</th>
                    <th class="centerth"> Mật khẩu mới</th>
                    <th class="centerth"> Action </th>
                </tr>
                <tr>
                <?php
                        $count = 1;
                        foreach ($result as $row){  
                            
                ?>
                        <td><?php echo $count; ?></td>
                        <td><?php echo $row['login_id'];?></td>
                        <td><input type="text" name="newpassword<?php echo $count;?>" style="cursor:pointer" class="newpass"></td>
                        <td>
                            <button type="submit" name="action-reset<?php echo $count;?>" value="<?php echo $row['login_id'];?>" style="cursor:pointer"  class="action-reset">Reset</button>
                            </td>
                        
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>
                        <div>
                        <span class="error"><?php 
                        if(isset($_SESSION['new-password'.$count])){
                            $result = $_SESSION['new-password'.$count];
                            echo $result;
                            $_SESSION['new-password'.$count] = "";
                        } ?>
                        </span></div>
                        </td>
                    <td></td>
                </tr>
                <?php
                       
                        $count++; 
                        }
                        $_SESSION['count'] = $count;
                        
                ?>
               
            </table>
           <div class="element">
               <a href="?">Trở về đăng nhập</a>
           </div>
        </form>
    </div>
</body>
</html>