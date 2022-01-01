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
</html>