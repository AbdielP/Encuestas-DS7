<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../estilos/estilos.css">
    <title>Reportes</title>
</head>
<body>
    <div class="container mt-5 mb-5 p-5">
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
            <h2>Reportes de Encuestas</h2>
            <p class="lead">A continuación se listan los reportes de las encuestas, basadas en los datos recopilados por los participantes.</p>
        </div>

        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Total de votos</span>
                    <?php
                        require_once("../class/encuesta.php");
                        $obj_count_total= new encuesta();
                        $count_total= $obj_count_total->count_total_votos();
                        foreach ($count_total as $total) {
                            echo "<span class='badge badge-secondary badge-pill'>".$total['total']."</span>";
                        }
                    ?>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">Total</h6>
                            <small class="text-muted">Total de votos realizados</small>
                        </div>
                    <?php
                        require_once("../class/encuesta.php");
                        $obj_count_total= new encuesta();
                        $count_total= $obj_count_total->count_total_votos();
                        foreach ($count_total as $total) {
                            echo "<span class='text-muted'>".$total['total']." votos</span>";
                        }
                    ?>
                    </li>
                </ul>
            </div>

            <div class="col-md-8 order-md-1">
                <!-- <form class="needs-validation" novalidate> -->
                <!-- REPORTE POR SEXO  -->
                <h4 class="mb-3">Encuestas por sexo</h4>
                    <div class="row">
                    <?php
                        require_once("../class/encuesta.php");
                        $obj_count_sex = new encuesta();
                        $count_sex = $obj_count_sex->count_sex();
                        foreach ($count_sex as $sex) {
                            echo "<div class='col-md-6 mb-3'>";
                            echo    "<div>";
                            echo        "<h6 class='my-0'>Resultado por genero másculino</h6>";
                            echo        "<small class='text-muted'>Total de votantes / participantes</small>";
                            echo    "</div>";
                            echo    "<span class='badge badge-secondary badge-pill'>".$sex['m']."</span>";
                            echo "</div>";

                            echo "<div class='col-md-6 mb-3'>";
                            echo    "<div>";
                            echo        "<h6 class='my-0'>Resultado por genero femenino</h6>";
                            echo        "<small class='text-muted'>Total de votantes / participantes</small>";
                            echo    "</div>";
                            echo    "<span class='badge badge-secondary badge-pill'>".$sex['f']."</span>";
                            echo "</div>";
                        }

                    ?>
                    </div>
                    <hr class="mb-4">
                    <!-- REPORTES POR EDAD  -->
                    <h4 class="mb-3">Encuestas por rango de edad</h4>
                    <div class="row">
                    <?php
                        require_once("../class/encuesta.php");
                        $obj_count_edad = new encuesta();
                        $count_edad = $obj_count_edad->count_edad();
                        foreach ($count_edad as $key => $value) {
                            // echo $key;
                            // echo $value;
                            foreach ($value as $k => $v) {
                                echo "<div class='col-md-6 mb-3'>";
                                echo    "<div>";
                                if ($k == '-18')
                                    echo        "<h6 class='my-0'>(-18) Resultado para menores de 18 años.</h6>";
                                if ($k == '18-30')
                                    echo        "<h6 class='my-0'>Resultado 18 a 30 años.</h6>";
                                if ($k == '31-40')
                                    echo        "<h6 class='my-0'>Resultado 31 a 40 años.</h6>";
                                if ($k == '41-50')
                                    echo        "<h6 class='my-0'>Resultado 41 a 50 años.</h6>";
                                if ($k == '51+')
                                    echo        "<h6 class='my-0'>(51+) Resultado mayores de 51 años.</h6>";
                                echo        "<small class='text-muted'>Total de votantes / participantes</small>";
                                echo    "</div>";
                                if ($k == '-18')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == '18-30')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == '31-40')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == '41-50')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == '51+')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                echo "</div>";
                                // if( $k == '-18'){
                                //     echo $v;
                                // }
                            }
                        }
                    ?>
                    </div>
                    <hr class="mb-4">
                    
                    <!-- ENCUESTAS SALARIO  -->
                    <h4 class="mb-3">Encuestas realizadas por salario</h4>
                    <div class="row">
                    <?php
                        require_once("../class/encuesta.php");
                        $obj_count_salario = new encuesta();
                        $count_salario = $obj_count_salario->count_salario();
                        foreach ($count_salario as $key => $value) {
                            foreach ($value as $k => $v) {
                                echo "<div class='col-md-6 mb-3'>";
                                echo    "<div>";
                                if ($k == 'cwp')
                                    echo        "<h6 class='my-0'>Resultado para salario extremadamente bajo.</h6>";
                                if ($k == 'mp')
                                    echo        "<h6 class='my-0'>Resultado para salario muy bajo.</h6>";
                                if ($k == 'p')
                                    echo        "<h6 class='my-0'>Resultado para salario bajo.</h6>";
                                if ($k == 'as')
                                    echo        "<h6 class='my-0'>Resultado para salario minimo.</h6>";
                                if ($k == 'sg')
                                    echo        "<h6 class='my-0'>Salarios por encima del minimo.</h6>";
                                echo        "<small class='text-muted'>Total de votantes / participantes</small>";
                                echo    "</div>";
                                if ($k == 'cwp')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'mp')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'p')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'as')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'sg')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                echo "</div>";
                            }
                        }
                    ?>
                    </div>
                    <hr class="mb-4">

                    <!-- ENCUESTAS PROVINCIA  -->
                    <h4 class="mb-3">Encuestas realizadas por provincia</h4>
                    <div class="row">
                    <?php
                        require_once("../class/encuesta.php");
                        $obj_count_provincia = new encuesta();
                        $count_provincia = $obj_count_provincia->count_provincia();
                        foreach ($count_provincia as $key => $value) {
                            foreach ($value as $k => $v) {
                                echo "<div class='col-md-6 mb-3'>";
                                echo    "<div>";
                                if ($k == 'bt')
                                    echo        "<h6 class='my-0'>Bocas Del Toro.</h6>";
                                if ($k == 'cc')
                                    echo        "<h6 class='my-0'>Coclé.</h6>";
                                if ($k == 'cl')
                                    echo        "<h6 class='my-0'>Colón.</h6>";
                                if ($k == 'ch')
                                    echo        "<h6 class='my-0'>Chiriquí.</h6>";
                                if ($k == 'da')
                                    echo        "<h6 class='my-0'>Darién.</h6>";
                                if ($k == 'he')
                                    echo        "<h6 class='my-0'>Herrera.</h6>";
                                if ($k == 'ls')
                                    echo        "<h6 class='my-0'>Los Santos.</h6>";
                                if ($k == 'pa')
                                    echo        "<h6 class='my-0'>Panamá.</h6>";
                                if ($k == 've')
                                    echo        "<h6 class='my-0'>Veraguas.</h6>";
                                if ($k == 'po')
                                    echo        "<h6 class='my-0'>Panamá Oeste.</h6>";
                                echo        "<small class='text-muted'>Total de votantes / participantes</small>";
                                echo    "</div>";
                                if ($k == 'bt')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'cc')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'cl')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'ch')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'da')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'he')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'ls')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'pa')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 've')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                if ($k == 'po')
                                    echo "<span class='badge badge-secondary badge-pill'>".$v."</span>";
                                echo "</div>";
                            }
                        }
                    ?>
                    </div>
                <!-- </form> -->
            </div>


        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2020 - Proyecto 1 Desarrollo de software 7</p>
            <ul class="list-inline">
            <li class="list-inline-item"><a href="../mantenimiento/mantenimiento.php">Administrar</a></li>
        </ul>
    </footer>
</body>
</html>