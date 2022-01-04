<!DOCTYPE HTML>  
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./web/css/base.css">
    <link rel="stylesheet" href="./web/css/create.css">
    <title></title>
</head>
<body>
<?php
	require_once './app/controllers/checkLogin.php';
	error_reporting(0);

	

?>
    <div class='timetable' >
        <form class="form" method="get">	
			<div class="main">
				<input name="router" value="search-schedule" type="hidden"></input>
				<div class="element">
					<label>Khóa</label>
					<select class="select-element" name="khoa" id="khoa">
						<option hidden value="" selected="selected"> Chọn khóa</option>
						<option value="2021">Năm 1</option>
						<option value="2020">Năm 2</option>
						<option value="2019">Năm 3</option>
						<option value="2018">Năm 4</option>
					</select>
				</div>
				
				<div class="element">
					<label>Môn học</label>
					<select class="select-element" name="subject_id" id="subject_id">
						<option hidden value="" selected="selected"> Chọn môn học </option>
						<?php
						foreach($subjects as $subject) {
							echo "<option value=$subject[0]>$subject[1] </option>";
						}
						?>
					</select>
				</div>
				
				<div class="element">
					<label>Giáo viên</label>
					<select class="select-element" name="teacher_id" id="teacher_id">
						<option hidden value="" selected="selected"> Chọn giáo viên </option>
						<?php
						foreach($teachers as $teacher) {
							echo "<option value=$teacher[0]>$teacher[1] </option>";
						}
						?>
					</select>
				</div>
				<div class="element">
					<input class="btn-submit" type="submit" value="Tìm kiếm" >
				</div>
				<div class="element">
					<p class="message-success">
						<?php echo "Tìm được ".$log->rowCount()." bản" ?>

					</p>

				</div>
				<table>
					<tr>
						<th>No</th>
						<th>Khóa</th>
						<th>Môn học</th>
						<th>Giáo viên</th>
						<th>Thứ</th>
						<th>Tiết học</th>
						<th>Action</th>
					</tr>
				
				
				
					
				
				<?php
					$count = 1;
					while($row = $log->fetch(PDO::FETCH_ASSOC)){
						echo "<tr>";
							echo "<td>"; echo$count; echo"</td>";
							echo "<td>"; echo$row["school_year"]; echo"</td>";
							echo "<td>"; echo$subjects[$row["subject_id"]-1][1]; echo"</td>";
							echo "<td>"; echo$teachers[$row["teacher_id"]-1][1]; echo"</td>";
							echo "<td>"; echo$row["week_day"]; echo"</td>";
							echo "<td>"; echo$row["lesson"]; echo"</td>";
							echo"<td>";
							echo"<form method='post'>";
							echo'<button class="btn-submit btn-remove" type="submit" name="remove-subject" onclick=\'javascript: return confirm("Bạn chắc chắn muốn xóa?");\' value = ';echo $row['id'];echo">Xóa</button>";
							echo'<button class="btn-submit btn-change" type="submit" name="change-subject" onclick=\'javascript: return confirm("Bạn chắc chắn muốn sửa?");\' value = ';echo $row['id'];echo">Sửa</button>";
							echo"</form>";
							echo"</td>";
						echo "</tr>";
						$count++;
					}
				?>
				</table>
				<div class="element">
						<a href="?router=home">Trở về trang chủ</a>
				</div>
			</div>
		</div>
			
    </form>
		
    </div>




</body>
</html>