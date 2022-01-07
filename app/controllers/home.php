<?php
require_once './app/views/home.php';
$_SESSION['data-schedule-update']=0; 
// Khi nhấn sửa schedule thì đã lưu id vào $_SESSION['data-schedule-update']
// Vì screen sửa schedule dùng chung screen của add-schedule nên đến đoạn nhấn confirm sẽ thực hiện khác nhau
// check thằng $_SESSION['data-schedule-update'] để quyết định là thêm hay là sửa
// $_SESSION['data-schedule-update'] chỉ mất sau khi đã sửa xong, nhưng nếu thoát về login hoặc home thì nó vẫn còn nên khi add schedule mới 
// nó sẽ tính là sửa nên ở home mới refesh $_SESSION['data-schedule-update']=0; 