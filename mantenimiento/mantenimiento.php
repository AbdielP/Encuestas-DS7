<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Administración de preguntas</title>
</head>
<body>
    <div class="container mt-3">
        <!-- TITULO  -->
        <div class="row">
            <h2>Módulo de administración y mantenimiento de preguntas.</h2>
        </div>
        <hr>
        <!-- FORM  -->
        <div class="row">
            <div class="col-md-12">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Crear pregunta de elección binaria: (Si / No)</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="binaria" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
    
    <br><br>
    <a href="../index.php">Volver</a>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['binaria'];
            if (empty($name)) {
                echo "Name is empty";
            } else {
                require_once("../class/encuesta.php");
                $obj_crear_encuesta = new encuesta();
                $resultado_encuesta = $obj_crear_encuesta->insertar_encuesta_binaria($name);
                echo $resultado_encuesta;
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