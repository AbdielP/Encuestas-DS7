<?php
    require_once('config.php');
    class modeloCredencialesBD {
        protected $_db;
        public function __construct() {
            $this->__db=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            if ($this->__db->connect_errno) {
                echo "Fallo al conectar a la base de datos " .$this->db->connect_errno;
                return;
            }
        }
    }
?>