<!DOCTYPE html>
<?php
// require_once './app/controllers/checkLogin.php';
if(!isset($_SESSION['login']) || $_SESSION['login']==''){
    header("location:http://localhost/manage_timetable/");
    // header('location:'.URLROOT.'/');
}

?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="./web/css/base.css">
	<title>Tìm giáo viên</title>
</head>

<body>
	<div class="timetable">
		<form action="" class="form" method="post">
			<div class="main">
				<div class="element">
				<?php 
				$specialized = [
					1=>'Khoa học máy tính',
					2=>'Khoa học dữ liệu',
					3=>'Hải dương học'
				];
				// echo $_SESSION['search-notification-tc'];
				?>
				</div>

				<div class="element">
					<label for="bo-mon">Bộ môn</label>
					<select id="bo-mon" class="select-element" name="bo-mon">
					    <option value="" name="bo-mon">Chọn bộ môn</option>
						<?php foreach($specialized as $key => $row) {
							?>
								<option value="<?= $key ?>" name="bo-mon"> <?= $row ?></option>
							<?php
						} ?>
					    <!-- <option value="com-sc" name="bo-mon">Khoa hoc m</option>
					    <option value="data-sc" name="bo-mon">Khoa hoc d</option>
					    <option value="ocean" name="bo-mon">Hai duong</option> -->
					</select>
				</div>

				<div class="element">
					<label for="tu-khoa">Từ khóa</label>
					<input type="text" id="tu-khoa" class="input-element" name="keyword">
				</div>

				<div class="element">
					<button type="submit" class="btn-submit" name="search-teacher">Tìm kiếm</button>
				</div>

				<div class="element">
				    <?php
					if(!intval($_SESSION['search-notification-tc'])):
					?>
						<p class="message-error">
							<?php
								if($_SESSION['search-notification-tc']==' '){
									echo "Không tìm thấy giáo viên"; 
								}
								else echo $_SESSION['search-notification-tc']; 
							?>
						</p>
					<?php
					else:
					?>
						<p class="message-success"><?php echo "Tìm thấy " .$_SESSION['search-notification-tc'] ." giáo viên"; ?></p>		 
					<?php
					endif;
					?>    
				</div>
				
				<?php 
				if($_SESSION['dataSearchTc']): // kiểm tra $_SESSION['dataSearch'] có value hay không? khác với kiểm tra isset
				?>
					<table>
						<tr>
						<th>ID</th>
						<th>Tên giáo viên</th>
						<th>Bộ môn</th>
						<th>Mô tả</th>
						<th>Action</th>
						</tr>

						<?php
						 $count = 1;
						foreach($_SESSION['dataSearchTc'] as $row): 
						?>
							<tr>
								<td ><?php echo $count; $count++; ?></td>
								<td ><?php echo $row['name']; ?></td>
								<td ><?php echo $specialized[$row['specialized']] ?></td>
								<td ><?php echo $row['description']; ?></td>

								<td>
								<button type="submit" name="remove-teacher" class="btn-submit btn-remove" onclick="return confirm('Bạn chắc chắn muốn xóa?');" value = "<?php echo $row['id'];?>">Xóa</button>
								<button type="submit" name="change-teacher" class="btn-submit btn-change" value = "<?php echo $row['id'];?>">Sửa</button>
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				<?php endif; ?>

				<div class="element">
				    <a href="<?= URLROOT ?>/?router=home" >Trở lại trang chủ</a>
				</div>
                
			</div>
		</form>
	</div>
</body>
</html>
