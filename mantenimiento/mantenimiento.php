<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <title>Administración de preguntas</title>
</head>
<body>
    <div class="container mt-5 mb-5 p-5">
        <!-- TITULO  -->
        <div class="row">
            <h2>Módulo de administración y mantenimiento de preguntas <i class="fas fa-toolbox"></i></h2>
        </div>
        <hr>
        <!-- FORM BINARIO-->
        <div class="row">
            <div class="col-md-12">
                <h4>Creación de preguntas binarias <i class="fas fa-check-circle"></i></h4>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Crear pregunta de elección binaria: (Si / No)</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="binaria" rows="2" placeholder="Cree preguntas con respuestas binarias (si o no) con un máximo de 255 caracteres." required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Crear pregunta <i class="far fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
        <hr>

        <!-- FORM SIMPLE Y MULTIPLE  -->
        <div class="row">
            <div class="col-md-12">
                <h4>Creación de preguntas de selección multiple <i class="fas fa-list"></i></h4>
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Crear pregunta de elección simple o elección múltiple.</label> <br>
                        <small>Seleccione el tipo de pregunta, <b>simple</b> o <b>múltiple</b> en el campo 'tipo de pregunta'.</small>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="multiple" rows="2" placeholder="Ingrese aquí su pregunta. máximo 255 caracteres." required></textarea>
                    </div>
                    <!-- TIPO DE PREGUNTA  -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check-inline">
                                <h5>Tipo de pregunta:</h5>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio1" value="0" required>
                                <label class="form-check-label" for="inlineRadio1"><i class="fas fa-list"></i> Simple</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="tipo" id="inlineRadio2" value="1" required>
                                <label class="form-check-label" for="inlineRadio2"><i class="fas fa-tasks"></i> Multiple</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- OPCIONES  -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="opcion1">Opción 1.</label> <br>
                            <input id="opcion1" class="form-control form-control-sm" type="text" name="op1" placeholder="Opción/respuesta #1">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="opcion2">Opción 2.</label> <br>
                            <input id="opcion2" class="form-control form-control-sm" type="text" name="op2" placeholder="Opción/respuesta #2">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="opcion3">Opción 3.</label> <br>
                            <input id="opcion3" class="form-control form-control-sm" type="text" name="op3" placeholder="Opción/respuesta #3">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="opcion4">Opción 4.</label> <br>
                            <input id="opcion4" class="form-control form-control-sm" type="text" name="op4" placeholder="Opción/respuesta #4">
                        </div>
                        <div class="col-md-12">
                            <small>Si la pregunta simple o multiple tiene menos de 4 opciones, deje vacíos los campos que no requiera.</small>
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Crear pregunta <i class="far fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    
        <br><hr>
        <a href="../index.php"><i class="far fa-arrow-alt-circle-left"></i> Volver al sitio de encuesta</a>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // BINARIA 
            if(isset($_REQUEST['binaria'])) {
                $name = $_POST['binaria'];
                if (empty($name)) {
                    echo "Pregunta binaria vacía.";
                } else {
                    require_once("../class/encuesta.php");
                    $obj_crear_encuesta = new encuesta();
                    $resultado_encuesta = $obj_crear_encuesta->insertar_encuesta_binaria($name);
                    echo $resultado_encuesta;
                    return;
                }
            }
            // MULTIPLES
            if(isset($_REQUEST['multiple'])) {
                $multiple = $_POST['multiple'];
                $tipo = $_POST['tipo'];
                $op1 = $_POST['op1'];
                $op2 = $_POST['op2'];
                $op3 = $_POST['op3'];
                $op4 = $_POST['op4'];
                if (empty($multiple)) {
                    echo "Pregunta multiple vacía";
                } else {
                    require_once("../class/encuesta.php");
                    $obj_crear_encuesta_multiple = new encuesta();
                    $resultado_encuesta_multiple = $obj_crear_encuesta_multiple->insertar_encuesta_multiple($multiple,
                        $tipo,$op1,$op2,$op3,$op4);
                    echo $resultado_encuesta_multiple;
                    return;
                }
            }
        }
    ?>
    <!-- BOOTSTRAP 4.5  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" 
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>
</html>