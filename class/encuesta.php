<?php
require_once('dbmodel.php');

class encuesta extends modeloCredencialesBD {
    public function __construct() {
        parent:: __construct();
    }

    public function get_encuesta_binaria() {
        $instruccion = "SELECT * FROM binarias ORDER BY RAND() LIMIT 4";
        $consulta = $this->__db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado) {
            echo "Fallo al consultar la tabla 'binarias'";
        } else {
            return $resultado;
            $resultado->close();
            $this->__db->close();
        }
    }

    public function get_encuesta_multiple() {
        $instruccion = "SELECT * FROM multiples ORDER BY RAND() LIMIT 6";
        $consulta = $this->__db->query($instruccion);
        $resultado = $consulta->fetch_all(MYSQLI_ASSOC);

        if(!$resultado) {
            echo "Fallo al consultar la tabla 'multiples'";
        } else {
            return $resultado;
            $resultado->close();
            $this->__db->close();
        }
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

    // INSERTAR REGISTROS (Datos de la encuesta)
    public function insertar_registros($sexo, $edad, $salario, $provincia) {
        $message = "Datos de la encuesta registrados con éxito.";
        $instruccion = "INSERT INTO registros (sexo, edad, salario, provincia) VALUES ('".$sexo."','".$edad."',
            '".$salario."','".$provincia."')";
        $query = $this->__db->query($instruccion);
        return $message;
        $query->close();
        $this->__db->close();
    }

    // COUNT TOTAL ENCUESTAS
    public function count_total_encuestas() {
        $instruccion = "CALL count_total_encuestas()";
        $consulta=$this->__db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado) {
            echo "Fallo al consultar total de encuestas";
        } else {
            return $resultado;
            $resultado->close();
            $this->__db->close();
        }
    }

    // COUNT SEX
    public function count_sex() {
        $instruccion = "CALL count_sex()";
        $consulta=$this->__db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado) {
            echo "Fallo al consultar encuestas por sexo";
        } else {
            return $resultado;
            $resultado->close();
            $this->__db->close();
        }
    }

    // COUNT EDAD
    public function count_edad() {
        $instruccion = "CALL count_edad()";
        $consulta=$this->__db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado) {
            echo "Fallo al consultar encuestas por edad";
        } else {
            return $resultado;
            $resultado->close();
            $this->__db->close();
        }
    }

    // COUNT SALARIO
    public function count_salario() {
        $instruccion = "CALL count_salario()";
        $consulta=$this->__db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado) {
            echo "Fallo al consultar encuestas por salario";
        } else {
            return $resultado;
            $resultado->close();
            $this->__db->close();
        }
    }

    // COUNT PROVINCIA
    public function count_provincia() {
        $instruccion = "CALL count_provincia()";
        $consulta=$this->__db->query($instruccion);
        $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
        if(!$resultado) {
            echo "Fallo al consultar encuestas por provincia";
        } else {
            return $resultado;
            $resultado->close();
            $this->__db->close();
        }
    }
}
?>