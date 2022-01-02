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
        <div class="form">
            <div class="main">
                <div class="element">
                    <p>Tên login: <?php echo $_SESSION['login'];?></p>
                    
                </div>
                <div class="element">
                    <p>Thời gian login: <?php 
                            
                            date_default_timezone_set('Asia/Ho_Chi_Minh');
        
                            echo date('d/m/Y') . " ". date("h:i");?>
                    </p>
                </div>
                <div class="element">                  
                    <label><b>Giáo viên</b></label>
                    <label><b>Môn học</b></label>
                    <label><b>Thời khóa biểu</b></label>               
                </div>
                <div class="element">
                    <label><a href="?router=search-teacher">Tìm kiếm</a> </label>
                    <label><a href="?router=search-subject">Tìm kiếm</a></label>
                    <label><a href="?router=search-schedule">Tìm kiếm</a></label>
                </div>
                <div class="element">
                    <label><a href="?router=add-teacher">Thêm mới</a> </label>
                    <label><a href="?router=add-subject">Thêm mới</a> </label>
                    <label><a href="?router=add-schedule">Thêm mới</a> </label>
                </div>
            </div>
        </div>
    </div>
</body>
</html>