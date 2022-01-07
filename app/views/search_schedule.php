<!DOCTYPE HTML>  
<?php
// require_once './app/controllers/checkLogin.php';
if(!isset($_SESSION['login']) || $_SESSION['login']==''){
    header("location:http://localhost/manage_timetable/");
    // header('location:'.URLROOT.'/');
}

?>
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
		<div class="main">
        <form class="form" method="get">
            
			
			<div class="main">
				<input name="router" value="search-schedule" type="hidden"></input>
				<div class="element">
				<label>Khóa</label>
				<select class="select-element" name="khoa" id="khoa">
					<option hidden value="" selected="selected"> </option>
					<option value="1">Năm 1</option>
					<option value="2">Năm 2</option>
					<option value="3">Năm 3</option>
					<option value="4">Năm 4</option>
				</select>
				</div>
				
				<div class="element">
				<label>Môn học</label>
				<select class="select-element" name="subject_id" id="subject_id">
					<option hidden value="" selected="selected"> </option>
					<?php
					foreach($subjects as $subject) {
						echo "<option value=$subject[0]>$subject[1] </option>";
					}
					?>
				</select>
				</div>
				
				<div class="element">
				<label>Môn học</label>
				<select class="select-element" name="teacher_id" id="teacher_id">
					<option hidden value="" selected="selected"> </option>
					<?php
					foreach($teachers as $teacher) {
						echo "<option value=$teacher[0]>$teacher[1] </option>";
					}
					?>
				</select>
				</div>
			
				<input class="btn-submit" type="submit" value="Tìm kiếm" >
			</div>
			
			
        </form>
		<div class="main">
			<?php echo "Tìm được ".$log->rowCount()." bản" ?>
			<table class="element">
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
						echo "<td>"; 
						
						$txt_file = fopen("./web/file/lesson/".$row["lesson"],'r');
						while ($line = fgets($txt_file)) {
						 echo($line." ");
						}
						fclose($txt_file);
						
						
						
						echo"</td>";
						echo"<td>";
						echo"<form method='post' action='?router=search-schedule'>";
						echo'<button class="btn-submit btn-remove" type="submit" name="remove-schedule" onclick=\'javascript: return confirm("Bạn chắc chắn muốn xóa?");\' value = ';echo $row['id'];echo">Xóa</button>";
						echo'<input name="lesson" value="';echo $row['lesson'];echo '" type="hidden"></input>';
						echo'<input name="note" value="';echo $row['notes'];echo '" type="hidden"></input>';
						echo'<button class="btn-submit btn-change" type="submit" name="change-schedule" onclick=\'javascript: return confirm("Bạn chắc chắn muốn sửa?");\' value = ';echo $row['id'];echo">Sửa</a>";
						echo"</form>";
						echo"</td>";
					echo "</tr>";
					$count++;
				}
			  ?>

			  
			</table>
		</div>
			<div class="element">
                    <a href="?router=home">Trở về trang chủ</a>
            </div>
		</div>
    </div>




</body>
</html>