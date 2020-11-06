<?php
require_once('dbmodel.php');

class encuesta extends modeloCredencialesBD {
    public function __construct() {
        parent:: __construct();
    }

    public function insertar_encuesta_binaria($form) {
        $message = "Pregunta binaria insertada con éxito.";
        $instruccion = "INSERT INTO binarias (pregunta) VALUES ('".$form."')";
        $query = $this->__db->query($instruccion);
        return '<script type="text/javascript">alert("' . $message . '")</script>';
        $query->close();
        $this->__db->close();
    }

    public function insertar_encuesta_multiple($pregunta, $tipo, $op1, $op2, $op3, $op4) {
        $message = "Pregunta con opciones multiples insertada con éxito.";
        $instruccion = "INSERT INTO multiples (pregunta, op1, op2, op3, op4, tipo) VALUES ('".$pregunta."','".$op1."',
            '".$op2."','".$op3."','".$op4."','".$tipo."')";
        $query = $this->__db->query($instruccion);
        return '<script type="text/javascript">alert("' . $message . '")</script>';
        $query->close();
        $this->__db->close();
        # multiples = 1, simple =0;
    }
}
?>