<?php
require_once('dbmodel.php');

class encuesta extends modeloCredencialesBD {
    public function __construct() {
        parent:: __construct();
    }

    public function insertar_encuesta_binaria($form) {
        // echo "<script type='text/javascript'>alert('$form');</script>";
        $instruccion = "INSERT INTO binarias (pregunta) VALUES ('".$form."')";
        $query = $this->__db->query($instruccion);
        return "<p>Pregunta binaria insertada con éxito.</p>";
        $query->close();
        $this->__db->close();
    }
}
?>