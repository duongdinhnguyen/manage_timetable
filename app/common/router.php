<?php 
class Router{
    public function setRouter($path){
        switch ($path) {
            case 'login':
                require_once 'app/controllers/login.php';
                break;
            case 'reset-password':
                require_once 'app/controllers/reset-password.php';
                break;
            case 'home':
                require_once 'app/controllers/home.php';
                break;
            case 'add-schedule':
                require_once 'app/controllers/add_schedule_create.php';
                break;
                
            case 'add-schedule-confirm':
                require_once 'app/controllers/add_schedule_confirm.php';
                break;
                
            case 'add-schedule-complete':
                require_once 'app/controllers/add_schedule_complete.php';
                break;
                        
            default:
                // require_once 'app/views/home.php';
                break;
        }
    }
}

$path = isset($_REQUEST['router']) ? $_REQUEST['router'] : 'login';

$router = new Router();
$router-> setRouter($path);
?>