<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/base.css">
    <link rel="stylesheet" href="./web/css/create.css">
    <title>Document</title>
</head>
<body>
    
    <div class="timetable">
        <form action="" class="form" method = "POST">
            <div class="main">
                <div class="element">
                    <label for="select-phankhoa">Khóa</label>
                    <select name="" class="select-element" id="select-phankhoa">
                        <option value="" >Khoa học máy tính</option>
                        <option value="" >Khoa học máy tính</option>
                    </select>
                </div>
                <div class="element">
                    <label for="select-subject">Môn học</label>
                    <select name="" class="select-element" id="select-subject">
                        <option value="" >Khoa học máy tính</option>
                        <option value="" >Khoa học máy tính</option>
                    </select>
                </div>
                <div class="element">
                    <label for="select-teacher">Giáo viên</label>
                    <select name="" class="select-element" id="select-teacher">
                        <option value="" >Khoa học máy tính</option>
                        <option value="" >Khoa học máy tính</option>
                    </select>
                </div>
                <div class="element">
                    <label for="select-days">Thứ</label>
                    <select name="" class="select-element" id="select-days">
                        <option value="" >Khoa học máy tính</option>
                        <option value="" >Khoa học máy tính</option>
                    </select>
                </div>
                <div class="element">
                    <label for="list_lesson">Tiết học</label>
                    <ul id="list_lesson">
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 1</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 2</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 3</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 4</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 5</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 6</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 7</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 8</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 9</p>
                        </li>
                        <li class="item_lesson">
                            <input type="checkbox" name="" id="">
                            <p>Tiết 10</p>
                        </li>
                    </ul>
                </div>
                <div class="element">
                    <label for="description">Chú ý</label>
                    <textarea name="" id="description" cols="30" rows="3"></textarea>
                </div>
                <div class="element">
                    <!-- <button type="submit" class="btn-submit" name= "confirm" >Xác nhận</button> -->
                    <a href="?router=add-schedule-confirm">Xác nhận</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>