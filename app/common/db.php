<?php 
    class DB{
        private $host='localhost';
        private $user ='root';
        private $password ='';
        private $DB ='manage_timetable';

        public $__conn = null;

        public function __construct(){
            try {
                $this->__conn = new PDO("mysql:host=$this->host;dbname=$this->DB", $this->user, $this->password);
                $this->__conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
              } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
              }

        }
    }
    
?>