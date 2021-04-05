<?php
$constante = $_POST["constante"];
$valor = $_POST["numero"];
$fijarValor = $valor;

$filas = $_POST["filas"];
$filas = $filas + 1;
$n = 0;
//$extrae = $valor;

$acumulador = 0;
$acumulaExtrae = [];
$aleatorio = 0;
?>

<?php include '../formato/head.php'; ?>


    <div>
        <h3 align="center">Calculando nultiplicador constante <?php echo " con el número " . $valor . " y " . $constante . " como constante" ?></h3>

      
        <h1 align="center"> <?php echo "K " . $constante; ?></h1>
       

        <h4 align="center">Resutados</h4>

    </div>

    <table border='3' align='center'>
        <tr>
            <th>Xn </th>
            <th>K * (Xn-1) </th>
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
                    <td><?php echo $valor ?></td>
                    <td></td>
                </tr>

                <?php
                $acumulaExtrae[$i] = $valor;
            } else {

                if ($i > 0) {
                    $acumulaExtrae[$i] = $valor;

                    $acumulador =   $acumulaExtrae[$i -1 ] * ($constante);

                    $parametroExtrae1 = $acumulador;
                    $parametroExtrae2 = floatval(floor((floatval(strlen($acumulador)) - floatval(strlen($constante))) / 2) + 1);
                    $parametroExtrae3 = strlen($fijarValor);
                    $extrae = (substr($parametroExtrae1, $parametroExtrae2 - 1, $parametroExtrae3)) . PHP_EOL;

                    $extrae = floatval($extrae);
                    $acumulaExtrae[$i] = $extrae;
                    $valor = $extrae;
                    $acumulaExtrae[$i] = $valor;

                    $aleatorio = $extrae / (pow(10, intval(strlen($valor))));


                ?> <tr>
                        <td> <?php echo "X" . $n++; ?> </td>
                        <td><?php echo  $acumulador; ?></td>
                        <td><?php echo $valor ?></td>
                        <td><?php echo $aleatorio ?></td>
                    </tr>

        <?php


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