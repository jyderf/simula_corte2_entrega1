<?php include '../formato/head.php'; ?>

<?php
$x0 = $_POST["x0"];
$m = $_POST["m"];
$filas = $_POST["filas"];
$cuenta_x = 0;
$acumula_modulo = [];
$acumula_pseudoaleatorio=0;
?>

<br>
<h1>Calculando Blum, Blum y Shub</h1>
<h3>Valores</h3>
<h5><?php echo "x0 = ".$x0."<br>m = ".$m;?></h5>

<table border="2" align="center">
    <?php
    for ($i = 0; $i < $filas; $i++) { //for inicio tabla
    ?>

        <?php //primera fila
        if ($i === 0) {
            echo "<tr> <td> Xn </td> <td> (aXn-1²) mod m  </td> <td>Núm. pseudoaleatorio</td> </tr>";
        }else{
            if($i===1){
                $acumula_modulo[$i]=$x0;
                echo "<tr> <td> X".($i-1)." </td> <td>". $acumula_modulo[$i]."</td><td></td> </tr>";
            }
            else{
                if($i>1){
                    $acumula_modulo[$i]=(pow($acumula_modulo[$i-1],2))%$m;
                    $acumula_pseudoaleatorio=$acumula_modulo[$i]/($m-1);
                    $acumula_pseudoaleatorio=substr($acumula_pseudoaleatorio,0,6);


                    echo "<tr> <td> X".($i-1)." </td> <td>". $acumula_modulo[$i]."</td><td>".$acumula_pseudoaleatorio."</td> </tr>";
                }
            }
        }

        ?>

    <?php
    }
    //fin for tabla
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