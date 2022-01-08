<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <?php
            $count =1;
            // echo $count;
            foreach($data as $row){
                echo $count;

        ?>
        <p><?php echo $row['login_id'] ; ?></p>
        <input type="text" name="dataTest<?php echo $count;?>" >
        <button type="submit" name="submit<?php echo $row['login_id'];?>" value="<?php echo $count; ?>">Reset</button>

        <br/>
        <?php
            if(isset($_SESSION['new-password'.$count])){
                $result= $_SESSION['new-password'.$count];
            }
            // $result= isset($_SESSION['new-password'.$count])  ?  $_SESSION['new-password'.$count] : '';
            echo $result;
            $_SESSION['new-password'.$count]='';
            $count++;
            }
            $_SESSION['count']= $count;


            
        ?>
    </form>
</body>
</html>