<?php include '../formato/head.php'; ?>

<?php
$x0 = $_POST["x0"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$m = $_POST["m"];
$filas = $_POST["filas"];
$aprobado_a = 0;
$aprobado_b = 0;
$aprobado_c = 0;
$aprobado_d = 0;
$aprobado_m = 0;

$celda_modulo = 0;
$celda_num_aleatorio = 0;
$acumula_modulo = [];
$acumula_pseudoaleatorio = [];
$cuentaX = 0;

?>

<?php
//validamos a
if (($a % 2) != 0) {

    echo "
    <table border='0' align='center'>
        <tr>
            <td>
                <br> <div class='alert alert-warning'>Cuidado!!! a debe ser par... </div>
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
    $abrobado_a = 1;
    //validamos b
    $valida_b = $b - 1;
    if (($valida_b % 4) != 2) {
        echo "
                    <table border='0' align='center'>
                         <tr>
                            <td>
                               <br> <div class='alert alert-warning'>Cuidado!!! b debe ser coherente con  (b-1) mod 4=2... </div>
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
        $abrobado_b = 1;
        //validamos c
        if (($c % 2) === 0) {
            echo "
                    <table border='0' align='center'>
                         <tr>
                            <td>
                               <br> <div class='alert alert-warning'>Cuidado!!! c debe ser impar </div>
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
            $aprobado_c = 1;
            //validamos m
            $valida_m = 0;
            $tamaño_for = ($m / 2) + 1;
            $acumula_productos = 0;
            for ($i = 0; $i <= $tamaño_for; $i++) {
                $acumula_productos =  $i * 2;
                if ($acumula_productos == $m)
                    $valida_m++;
            }
            if ($valida_m == 0) {
                echo "
                <table border='0' align='center'>
                     <tr>
                        <td>
                           <br> <div class='alert alert-warning'>Cuidado!!! m debe responder a m = 2g </div>
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
                $aprobado_m = 1;
            }
        }
    }
}

if (($aprobado_a === 0) && ($aprobado_b === 0) && ($aprobado_c) && ($aprobado_m === 1)) {
    echo " <h4>Calculando Congruencial cuadrático</h4>";
    echo "<h5> VALORES:  <br>x0 = " . $x0 . "<br> a = " . $a . "<br> b = " . $b . " <br>c = " . $c . " <br>m = " . $m . "</h5> <br>";
    echo "<table border='2' align='center'>";
    for ($i = 0; $i < $filas; $i++) { //INICIO TABLA
        if ($i === 0) {
            echo "<tr><td>Xn</td><td>(aXn-1²+bx n-1+c) mod m </td><td>Número aleatorio</td></tr>";
        }
        if ($i === 1) {
            $acumula_modulo[$i] = $x0;
            echo "<tr><td>X" .$cuentaX++ . "</td><td>" . $acumula_modulo[$i] . "</td><td></td></tr>";
        }
        if ($i > 1) {
            $acumula_modulo[$i] = (($a * pow($acumula_modulo[$i - 1], 2)) + ($b * $acumula_modulo[$i - 1]) + $c) % $m;
            
            
            
            $acumula_pseudoaleatorio[$i] = substr($acumula_modulo[$i] / ($m - 1),0,6);

?>

            <tr>
                <td><?php echo "X" . $cuentaX++;  ?></td>
                <td> <?php echo $acumula_modulo[$i]; ?> </td>
                <td><?php echo $acumula_pseudoaleatorio[$i]; ?></td>
            </tr>




<?php
        }
    }
} //FIN TABLA
echo "</table>";

?>





<table border="0" align="center">
    <tr>
        <td>
            <input type="button" value="<< Página anterior" onClick="history.go(-1);" class="btn btn-success btn-xs">
        </td>
    </tr>
</table>


<?php include '../formato/floor.php'; ?>