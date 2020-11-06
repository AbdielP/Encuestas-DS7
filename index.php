<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Encuestas aleatorias.</title>
</head>

<body>
    <h2>Prueba de encuestas.</h2>

    <?php
        function connect()
        {
            $con = mysqli_connect("127.0.0.1", "root", "", "proy1_ds7");
            // Check connection
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            } else {
                return $con;
            }
        }
        ?>
        <?php function renderContent($con)
        {
            $j = 1;
            $idIncrement = 1;
            $idIncrement2 = 2;
            $sql = "SELECT pregunta FROM binarias";
            $result = $con->query($sql);

            if ($con && ($result->num_rows > 0)) {
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<h3>Pregunta: ' .$j. ' <br></h3>';
                    echo $row["pregunta"] . "<br>";
                    echo    '<div class="custom-control custom-radio">
                                <input type="radio" id="customRadio'.$idIncrement.'" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio'.$idIncrement.'">Si</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio'.$idIncrement2.'" name="customRadio" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio'.$idIncrement2.'">No</label>
                            </div>';
                    $idIncrement+=2;
                    $idIncrement2+=2; 
                    $j++;
                }
            } else {
                echo "error";
            }
        }
        ?>
        <?php $con = connect(); ?>
        <div><?php renderContent($con); ?> </div>

    <a href="mantenimiento/mantenimiento.php">Administrar.</a>

    <!-- BOOTSTRAP 4.5  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
</body>

</html>