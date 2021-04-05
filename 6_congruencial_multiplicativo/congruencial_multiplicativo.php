<?php include '../formato/head.php'; ?>
<?php
$x0 = $_POST["x0"];

if ($x0 % 2 === 0) {
    echo "
    
    <table border='0' align='center'>
    <tr>
        <td>
            <br> <div class='alert alert-danger'>Cuidado!!! <h4>x0 </h4>debe ser impar.</div>
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

    




        $k = $_POST["k"];
        $g = $_POST["g"];
        $filas = $_POST["filas"];
        $a = 3 + 8 * $k;
        $m = pow(2, $g);
        $acumulaModulo = [];
        $aleatorio = 0;
?>
        <h1>Congruencial multiplicativo</h1>
        <h3 class="table tabla-center">Resultados</h3>

        <table class="table table-center text-lefht table-responsive ">
            <tr>
                <td>
                    <h4><span>x0</span></h4>
                </td>
                <td class="bg-warning">
                    <input id="x0" type="number" name="x0" placeholder="<?php echo $x0 ?>" required>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <h4><span>a</span></h4>
                </td>
                <td class="bg-success">
                    <input id="a" type="number" name="a" placeholder="<?php echo $a ?>" disabled="disabled" required>
                </td>
                <td>
                </td>
                <td>
                    <h4><span>k</span></h4>
                </td>
                <td class="bg-warning">
                    <input id="k" type="number" name="k" placeholder="<?php echo $k ?>" required>
                </td>
            </tr>
            <tr>
                <td>
                    <h4><span>m</span></h4>
                </td>
                <td class="table bg-success">
                    <input id="m" type="number" name="m" placeholder="<?php echo $m ?>" disabled="disabled" required>
                </td>
                <td>
                </td>
                <td>
                    <h4><span>g</span></h4>
                </td>
                <td class="bg-warning">
                    <input id="g" type="number" name="g" placeholder="<?php echo $g ?>" required>
                </td>
            </tr>
        </table>


        <table align="center" border="1">
            <?php
            for ($i = 0; $i <= $filas + 1; $i++) {

                if ($i === 0) {
                    echo "<tr><th>Xn</th><th>(aXn-1) mod (m)<th>Número aleatorio </th>";
                } else {
                    if ($i === 1) {
                        echo "<tr><td>x0</td><td>" . $x0 . "</td><td>Número aleatorio </td></tr>";
                        $acumulaModulo[$i] = $x0;
                    } else {
                        if ($i > 1) {
                            $acumulaModulo[$i] = ($a * $acumulaModulo[$i - 1]) % $m;
                            $aleatorio = round($acumulaModulo[$i] / ($m - 1), 5);
                        }

            ?>
                        <tr>
                            <td>X<?php echo $i - 1; ?></td>
                            <td> <?php echo $acumulaModulo[$i] ?> </td>
                            <td><?php echo $aleatorio ?> </td>
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
                    <br> <input type="button" value="<< Página anterior" onClick="history.go(-1);" class="btn btn-success btn-xs">
                </td>
            </tr>
        </table>

    <?php } ?>



<?php include '../formato/floor.php'; ?>