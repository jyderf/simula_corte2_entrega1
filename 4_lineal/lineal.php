<?php include '../formato/head.php'; ?>

<?php
$x0 = $_POST["x0"];
$a = $_POST["a"];
$c = $_POST["c"];
$m = $_POST["m"];
$filas = $_POST["filas"];

$fijar_a = $a;
$fijar_c = $c;
$fijar_m = $m;

$filas = $filas + 1;
$n = 0;
//$extrae = $valor;

$acumulador = 0;
$acumulaMod = [];
$aleatorio = 0;

$validador = $a - 1;
if (($validador % 4) != 0) {

    echo "
    <table border='0' align='center'>
    <tr>
        <td>
            <br> <div class='alert alert-warning'>Cuidado!!! cuando se le quite  '1' a la variable 'a' y se divida por 4, el resultado debe ser un entero..</div>
        </td>
    </tr>
    <tr>
        <td>
            <br> <input type='button' value='<< Volver' onClick='history.go(-1);' class='btn btn-danger btn-xs'>
        </td>
    </tr>
</table>
";
} else {

    $bandera_m = 0;
    $almacena_m = [];
    for ($i = 1; $i <= $m; $i++) {

        $almacena_m[$i] = pow(2, $i);
        if ($m == $almacena_m[$i]) {
            $bandera_m++;
        }
    }
    if ($bandera_m === 0) {
        echo "
        <table border='0' align='center'>
        <tr>
            <td>
                <br> <div class='alert alert-danger'>Cuidado!!!   m debe responder a la FÓRMULA 2^g donde g, es un entero..</div>
            </td>
        </tr>
        <tr>
            <td>
                <br> <input type='button' value='<< Volver' onClick='history.go(-1);' class='btn btn-danger btn-xs'>
            </td>
        </tr>
    </table>
    ";
    } else {

        $acumulador_c = [];
        $cuenta_divisores_c = 0;
        $z=0;
        for ($i = 1; $i < $c; $i++) {
            if ($c % $i == 0) {
                $acumulador_c[$z] = $i;
                $z++;
                $cuenta_divisores_c++;
            }
        }

        $acumulador_m = [];
        $cuenta_divisores_m = 0;
        $r=0;
        for ($i = 1; $i < $m; $i++) {
            if ($m % $i == 0) {
                $acumulador_m[$r] = $i;
                $r++;
                $cuenta_divisores_m++;
            }
        }
        $compara_divisores = 0;
        for ($i = 1; $i < $cuenta_divisores_c; $i++) {
            for ($j = 1; $j < $cuenta_divisores_m; $j++) {
                if ($acumulador_c[$i] === $acumulador_m[$j]) {
                    $compara_divisores++;
                }
            }
        }
        if ($compara_divisores > 0) {
            echo "
        <table border='0' align='center'>
        <tr>
            <td>
                <br> <div class='alert alert-success'>Cuidado!!!   c debe ser relativamente primo de m.</div>
            </td>
        </tr>
        <tr>
            <td>
                <br> <input type='button' value='<< Volver' onClick='history.go(-1);' class='btn btn-danger btn-xs'>
            </td>
        </tr>
    </table>
    ";
        } else {











?>




            <div>
                <h3 align="center">Valores <?php echo " x0=" . $x0 . ",  a=" . $a . ",  c=" . $c . ",  m=" . $m . "" ?></h3>



                <h4 align="center">Resutados</h4>

            </div>

            <table border='1' align='center'>
                <tr>
                    <th>Xn </th>
                    <th>(aXn-1+c) mod (m)</th>
                    <th>Número aleatorio </th>
                </tr>
                <?php
                for ($i = 0; $i < $filas; $i++) {
                    if ($i === 0) {
                ?>
                        <tr>
                            <td> <?php echo "X" . $n++; ?> </td>
                            <td><?php echo $x0 ?></td>
                            <td></td>
                        </tr>

                        <?php
                        $acumulaMod[$i] = $x0;
                    } else {

                        if ($i > 0) {
                            $acumulaMod[$i] = (($fijar_a * $acumulaMod[$i - 1] + $fijar_c) % $fijar_m);

                            $aleatorio = round($acumulaMod[$i] / ($fijar_m - 1), 4);




                        ?> <tr>
                                <td> <?php echo "X" . $n++; ?> </td>
                                <td><?php echo $acumulaMod[$i] ?></td>
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

        <?php  } ?>

    <?php  } ?>
<?php  } ?>
<?php include '../formato/floor.php'; ?>