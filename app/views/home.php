<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./app/css/base.css">
    <title>Document</title>
</head>
<body>
    <div class="timetable">
        <div class="form">
            <div class="element">
                <p>Tên login: <?php echo $_SESSION['login'];?></p>
                <p>Thời gian login: <?php 
                    	
                date_default_timezone_set('Asia/Ho_Chi_Minh');

                echo date('d/m/Y') . " ". date("h:i");?>
                </p>
            </div>
            <div class="element">
                <table>
                    <tr>
                    <th>Phòng học</th>
                    <th>Giáo viên</th>
                    <th>Môn học</th>
                    <th>Thời khóa biểu</th>
                    </tr>
                    <tr>
                        <td><a href="?router=search-classroom">Tìm kiếm</a></td>
                        <td><a href="?router=search-teacher">Tìm kiếm</a> </td>
                        <td><a href="?router=search-subject">Tìm kiếm</a></td>
                        <td><a href="?router=search-schedule">Tìm kiếm</a></td>
                    </tr>
                    <tr>
                        <td><a href="?router=add-classroom">Thêm mới</a> </td>
                        <td><a href="?router=add-teacher">Thêm mới</a> </td>
                        <td><a href="?router=add-subject">Thêm mới</a> </td>
                        <td><a href="?router=add-schedule">Thêm mới</a> </td>
                        
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>