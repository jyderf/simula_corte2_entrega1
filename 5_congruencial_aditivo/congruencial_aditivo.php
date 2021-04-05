<?php include '../formato/head.php'; ?>
<?php
$contadorSemillas = $_POST['contadorSemillas'];
$filas = $_POST['filas'];
$m = $_POST['m'];
$fijar_m = $m;
echo "<h4 align='center '>Calculando congruencial aditivo</h4>";
echo "<h3 align='center'> m=" . $m . "</h3>";
$contador = 0;
$semillaN = [];
$modulo = [];
for ($i = 1; $i <= $contadorSemillas; $i++) {
    $semillaN[$i] = $_POST["semillaN$i"];
    
    $contador++;
}

?>
<table border='1' align='center'>
    <?php for ($i = 0; $i <= $filas; $i++) {
        if ($i === 0) {
            echo " <tr><th>Xn</th><th>(Xn-1 + Xn-4) mod m</th><th>Número aleatorio </th>
        </tr>";
        } else {
            if (($i > 0) && ($i <= $contador)) {
                $modulo[$i]=$semillaN[$i]
    ?>

                <tr>
                    <td> <?php echo "X" . $i; ?> </td>
                    <td color="yellow" style="background-color: rgb(102, 255, 153);"><?php echo $semillaN[$i] ?></td>
                    <td> </td>
                </tr>

                <?php
            } else {
                if ($i > $contador) {
                    $modulo[$i] = ($modulo[$i - 1] + $modulo[$i - $contador]) % $fijar_m;
                    $aleatorio[$i] = round($modulo[$i]/($fijar_m-1),4);
                ?>

                    <tr>
                        <td> <?php echo "X" . $i; ?> </td>
                        <td><?php echo $modulo[$i] ?></td>
                        <td> <?php echo $aleatorio[$i]?></td>
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
            <br> <input type="button" value="<< Página anterior" onClick="history.go(-1);" class="btn btn-success btn-xs">
        </td>
    </tr>
</table>

<?php include '../formato/floor.php'; ?>