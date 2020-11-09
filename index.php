<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="estilos/estilos.css">
    <link rel="stylesheet" href="estilos/encuesta.css">
    <title>Encuestas aleatorias.</title>
</head>
<body>
    <div class="container mt-5 mb-5 p-5">
        <div class="col-md-12">
            <h1>Encuesta DS-7 <i class="fas fa-feather-alt"></i></h1>
            <p class="lead">Gracias por participar en esta breve encuesta. Recuerde rellenar los datos del participante antes de proceder a contestar el formulario. La encuesta está compuesta por 10 preguntas de tipo binario y selección simple o múltiple.</p>

            <h3>Datos del participante.</h3>
            <p>El contenido y las respuestas de esta encuesta son anónimas. Por favor, rellene el siguiente formulario para proceder con la encuesta.</p>
        </div>
        
        <div class="col-md-12 order-md-1">
            <form class="needs-validation" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="state">Sexo <i class="fas fa-male"></i> <i class="fas fa-female"></i></label>
                        <select class="custom-select d-block w-100" id="state" name="sexo" required>
                            <option value="" disabled selected>Seleccione su sexo...</option>
                            <option>Másculino</option>
                            <option>Femenino</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="state">Rango de edad <i class="far fa-calendar-alt"></i></label>
                        <select class="custom-select d-block w-100" id="state" name="edad" required>
                            <option value="" disabled selected>Seleccione rango de edad...</option>
                            <option>Menos de 18 años. (-18)</option>
                            <option>18 a 30 años.</option>
                            <option>31 a 40 años.</option>
                            <option>41 a 50 años.</option>
                            <option>51 o más</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="state">Rango salarial <i class="far fa-money-bill-alt"></i></label>
                        <select class="custom-select d-block w-100" id="state" name="salario" required>
                            <option value="" disabled selected>Seleccione su nivel de pobreza...</option>
                            <option>Colaborador de CWP</option>
                            <option>Muy pobre</option>
                            <option>Pobre</option>
                            <option>Ahí sobrevivo..</option>
                            <option>Subsidiado por el gobierno</option>
                        </select>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="state">Provincia (PA) <i class="fas fa-globe-americas"></i></label>
                        <select class="custom-select d-block w-100" id="state" name="provincia" required>
                            <option value="" disabled selected>Seleccione en que provincia reside.</option>
                            <option>Bocas Del Toro</option>
                            <option>Coclé</option>
                            <option>Colón</option>
                            <option>Chiriquí</option>
                            <option>Darién</option>
                            <option>Herrera</option>
                            <option>Los Santos</option>
                            <option>Panamá</option>
                            <option>Veraguas</option>
                            <option>Panamá Oeste</option>
                        </select>
                    </div>
                </div>
               
                <hr class="mb-4">
                <div class="row mb-2">
                    <div class="col-md-12">
                        <h3>Cuestionario <i class="fas fa-check-double"></i></h3>
                    </div>
                </div>
                <?php
                    require_once("class/encuesta.php");
                    $obj_binarias = new encuesta();
                    // BINARIA 
                    $encuestas_binarias = $obj_binarias->get_encuesta_binaria();
                    foreach ($encuestas_binarias as $encuesta_binaria) {
                        echo "<div class='row mb-4'>";
                        echo    "<div class='col-md-12 preguntas p-3'>";
                        echo        "<h5><i class='far fa-flag'></i> ".$encuesta_binaria['pregunta']."</h5>";
                        echo        "<div class='form-check form-check-inline'>";
                        echo            "<input class='form-check-input' type='radio' name='tipo' id='inlineRadio1' value='1' required>";
                        echo            "<label class='form-check-label' for='inlineRadio1'>Si</label>";
                        echo        "</div>";
                        echo        "<div class='form-check form-check-inline'>";
                        echo            "<input class='form-check-input' type='radio' name='tipo' id='inlineRadio2' value='0' required>";
                        echo            "<label class='form-check-label' for='inlineRadio2'>No</label>";
                        echo        "</div>";
                        echo    "</div>";
                        echo "</div>";
                    }

                    // ELECCIÓN SIMPLE
                    $encuestas_multiples = $obj_binarias->get_encuesta_multiple();
                    foreach ($encuestas_multiples as $encuesta_multiple) {
                        if ($encuesta_multiple["tipo"] == 0) {
                            echo "<div class='row mb-4'>";
                            echo    "<div class='col-md-12 preguntas p-3'>";
                            echo        "<h5><i class='far fa-flag'></i> ".$encuesta_multiple['pregunta']."</h5>";
                            if( $encuesta_multiple['op1'] != "") {
                                echo         "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios1' value='option1'>";
                                echo            "<label class='form-check-label' for='exampleRadios1'>";
                                echo                $encuesta_multiple['op1'];
                                echo            "</label>";
                                echo       "</div>";
                            }
                            if( $encuesta_multiple['op2'] != "") {
                                echo       "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios2' value='option2'>";
                                echo            "<label class='form-check-label' for='exampleRadios2'>";
                                echo                $encuesta_multiple['op2'];
                                echo            "</label>";
                                echo        "</div>";
                            }
                            if( $encuesta_multiple['op3'] != "") {
                                echo       "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios3' value='option3'>";
                                echo            "<label class='form-check-label' for='exampleRadios3'>";
                                echo                $encuesta_multiple['op3'];
                                echo            "</label>";
                                echo        "</div>";
                            }
                            if( $encuesta_multiple['op4'] != "") {
                                echo       "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='radio' name='exampleRadios' id='exampleRadios4' value='option4'>";
                                echo            "<label class='form-check-label' for='exampleRadios4'>";
                                echo                $encuesta_multiple['op4'];
                                echo            "</label>";
                                echo        "</div>";
                            }
                            echo    "</div>";
                            echo "</div>";
                        }
                        // ELECCIÓN MULTIPLE
                        if ($encuesta_multiple["tipo"] == 1) {
                            echo "<div class='row mb-4'>";
                            echo    "<div class='col-md-12 preguntas p-3'>";
                            echo        "<h5><i class='far fa-flag'></i> ".$encuesta_multiple['pregunta']."</h5>";
                            if( $encuesta_multiple['op1'] != "") {
                                echo         "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='checkbox' name='examplecheckboxs' id='examplecheckboxs1' value='option1'>";
                                echo            "<label class='form-check-label' for='examplecheckboxs1'>";
                                echo                $encuesta_multiple['op1'];
                                echo            "</label>";
                                echo       "</div>";
                            }
                            if( $encuesta_multiple['op2'] != "") {
                                echo       "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='checkbox' name='examplecheckboxs' id='examplecheckboxs2' value='option2'>";
                                echo            "<label class='form-check-label' for='examplecheckboxs2'>";
                                echo                $encuesta_multiple['op2'];
                                echo            "</label>";
                                echo        "</div>";
                            }
                            if( $encuesta_multiple['op3'] != "") {
                                echo       "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='checkbox' name='examplecheckboxs' id='examplecheckboxs3' value='option3'>";
                                echo            "<label class='form-check-label' for='examplecheckboxs3'>";
                                echo                $encuesta_multiple['op3'];
                                echo            "</label>";
                                echo        "</div>";
                            }
                            if( $encuesta_multiple['op4'] != "") {
                                echo       "<div class='form-check'>";
                                echo            "<input class='form-check-input' type='checkbox' name='examplecheckboxs' id='examplecheckboxs4' value='option4'>";
                                echo            "<label class='form-check-label' for='examplecheckboxs4'>";
                                echo                $encuesta_multiple['op4'];
                                echo            "</label>";
                                echo        "</div>";
                            }
                            echo    "</div>";
                            echo "</div>";
                        }
                    }
                ?>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar encuesta <i class="far fa-paper-plane"></i></button>
            </form>
            
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if(isset($_REQUEST['sexo']) && isset($_REQUEST['edad']) && isset($_REQUEST['salario']) && isset($_REQUEST['provincia'])) {
                        $sexo = $_POST['sexo'];
                        $edad = $_POST['edad'];
                        $salario = $_POST['salario'];
                        $provincia = $_POST['provincia'];
                        require_once("class/encuesta.php");
                        $obj_insertar_registro = new encuesta();
                        $resultado_insertar_registro = $obj_insertar_registro->insertar_registros($sexo, $edad, 
                            $salario, $provincia);
                        // echo $resultado_insertar_registro;
                        echo "<div class='alert alert-success text-center mt-3' role='alert'>";
                        echo    "$resultado_insertar_registro <i class='far fa-thumbs-up'></i>";
                        echo "</div>";
                    }
                }
            ?>

        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020 - Proyecto 1 Desarrollo de software 7</p>
            <ul class="list-inline">
            <li class="list-inline-item"><a href="mantenimiento/mantenimiento.php">Administrar</a></li>
        </ul>
    </footer>
</div>

    <!-- BOOTSTRAP 4.5  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" 
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>
</html>