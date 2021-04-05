<?php
$valorUno = $_POST["numeroPrimero"];
$valorDos = $_POST["numeroSegundo"];
$filas = $_POST["filas"];
$filas = $filas + 1;
$n = 0;

$acumulador = 0;
$acumulaExtrae = [];
$aleatorio = 0;
?>

<?php include '../formato/head.php'; ?>


    <div>
        <h3 align="center">Calculando productos medios de <?php echo " " . $valorUno . " y " . $valorDos ?></h3>

        <h4 align="center">Resutados</h4>

    </div>

    <table border='3' align='center'>
        <tr>
            <th>Xn </th>
            <th>(Xn - 2) * (Xn-1) </th>
            <th>Extrae</th>
            <th>Número aleatorio </th>
        </tr>
        <?php
        for ($i = 0; $i < $filas; $i++) {
            if ($i === 0) {
        ?>
                <tr>
                    <td> <?php echo "X" . $n++; ?> </td>
                    <td></td>
                    <td><?php echo $valorUno ?></td>
                    <td></td>
                </tr>

                <?php
                $acumulaExtrae[$i] = $valorUno;
            } else {
                if ($i === 1) {
                ?>
                    <tr>
                        <td> <?php echo "X" . $n++; ?> </td>
                        <td></td>
                        <td><?php echo $valorDos ?></td>
                        <td></td>
                    </tr>

                    <?php
                    $acumulaExtrae[$i] = $valorDos;
                } else {

                    if ($i > 1) {

                        $acumulador =   $acumulaExtrae[$i - 2] * ($acumulaExtrae[$i - 1]);

                        $parametroExtrae1 = $acumulador;
                        $parametroExtrae2 = floatval(floor((floatval(strlen($acumulador)) - floatval(strlen($valorUno))) / 2) + 1);
                        $parametroExtrae3 = strlen($valorUno);
                        $extrae = (substr($parametroExtrae1, $parametroExtrae2 - 1, $parametroExtrae3)) . PHP_EOL;

                        $extrae = floatval($extrae);
                        $acumulaExtrae[$i] = $extrae;
                        $valorDos = $extrae;

                        $aleatorio = $extrae / (pow(10, intval(strlen($extrae))));


                    ?> <tr>
                            <td> <?php echo "X" . $n++; ?> </td>
                            <td><?php echo  $acumulador; ?></td>
                            <td><?php echo $extrae ?></td>
                            <td><?php echo $aleatorio ?></td>
                        </tr>

        <?php


                    }
                }
            }
        }

        ?>

    </table>

    <table border="0" align="center">
        <tr>
            <td>
                <input type="button" value="<< Página anterior" onClick="history.go(-1);" class="btn btn-success btn-xs">
            </td>
        </tr>
    </table>



    <?php include '../formato/floor.php'; ?>