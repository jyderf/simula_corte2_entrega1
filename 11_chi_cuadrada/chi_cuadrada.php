<?php include '../formato/head.php'; ?>
<?php error_reporting(0); //oculta errores
?>

<?php //lectura del archivo chi cuadrado
$fichero = file_get_contents("../recurso_chi/recurso_chi.txt");
$inc_vec = 0;
$lineas = explode("\n", $fichero);
foreach ($lineas as $linea) {
    $valores = explode(" ", preg_replace('/\s\s+/', ' ', trim($linea)));
    $vector_chi[$inc_vec] = $valores[0];
    $inc_vec++;
}
$inc = 0;
$matriz_chi = array(array()); //creando y llenando matriz chi
for ($i = 0; $i < 58; $i++) {
    echo "<tr >";
    for ($j = 0; $j < 30; $j++) {
        $matriz_chi[$i][$j] = $vector_chi[$inc];

        $inc++;
    }
    echo "<tr>";
}
?>

<?php
$formatos = array('.txt'); //aquí pongo los formatos que quiera poner jpg, txt, png, doc, etc.. para el caso sólo txt
if (isset($_POST['boton'])) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $nombreTmpArchivo = $_FILES['archivo']['tmp_name']; //nombre temporal del archivo
    $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.')); //buscar la posición del último punto del nomre del archivo, es para a partir de ahí extraer la extensión
    if ((in_array($ext, $formatos) && ($nombreArchivo === 'chicuadrado.txt'))) { //si esta extensión está dentro de la regla formatos

        if (move_uploaded_file($nombreTmpArchivo, "../archivos/$nombreArchivo")) {
            $archivo = fopen("../archivos/chicuadrado.txt", 'r');
            $numlinea = 0;
            while ($linea = fgets($archivo)) {
                $aux[] = ($linea); //aquí se llenan los números en el arreglo aux, q luego pasará a una matríz
                $numlinea++;
            }
        }
?>

        <?php
        $confianza = $_POST["confianza"];
        
        $n = $numlinea;
        if ($n === 100) {



            echo "<h4 align='center'>Resolviendo chi cuadrado</h4>";

            $m = sqrt($n);
            $intervalo = 1 / $m;

            $cantidadIntervalos = $intervalo * 100;
            /*
            echo $n . "<== n <br>";
            echo $m . "<== m <br>";
            echo $intervalo . "<== intervalo <br>";
            echo $cantidadIntervalos . "<== cantidadIntervalos <br>";
            */

            $matrizAleatorios = array(array());
            $indiceCelda = array(array());
            $z = 0;
            for ($i = 0; $i < $cantidadIntervalos; $i++) {
                for ($j = 0; $j < $cantidadIntervalos; $j++) {
                    $matrizAleatorios[$i][$j] = $aux[$z]; //el arreglo aux, pasa a la matrizAleatorios
                    $indiceCelda[$j][$i] = $z;
                    $z++;
                }
            }
            echo "<div class='alert alert-success small sm'> n="
             . $n . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; m=raiz(n) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; m="
              . $cantidadIntervalos .
              "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Confianza = ".$confianza.
               "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Oi=Frecuencia observada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Ei=Frecuencia esperada</div>";
        ?>

            <div class="row container">
                <?php
                echo "<div class='col small sm'>";
                echo "<table align='center' border='2' class='small sm  table-bordered'>";
                echo "<tr class='alert alert-dark bg-dark text-light'><td align='center' colspan='" . $cantidadIntervalos . "'>Tus números aleatorios</td></tr>";
                $z = 0;
                $minimoEnIntervalo = array();
                $incrementadorMinimo = 0;
                $maximoEnIntervalo = array();
                $inccrementadorMaximo = 0;
                $arrayAleatorios = array();
                for ($i = 0; $i < $cantidadIntervalos; $i++) {
                    echo "<tr class=''>";
                    for ($j = 0; $j < $cantidadIntervalos; $j++) {
                        echo "<td class='bg-light'>" .  ($matrizAleatorios[$i][$j]) . "</td>";

                        if (($i === 0) && ($j === 0)) {
                            $minimoEnIntervalo[$incrementadorMinimo] = 0;
                            $incrementadorMinimo++;
                        } else {
                            if (($j === 0) && ($i > 0)) {
                                $minimoEnIntervalo[$incrementadorMinimo] = (number_format(($z / 100), 3) + 0.001);
                                $incrementadorMinimo++;
                            } else {
                                if ($j == ($cantidadIntervalos - 1)) {
                                    $maximoEnIntervalo[$inccrementadorMaximo] = (number_format(($z / 100), 3) + 0.01);
                                    $inccrementadorMaximo++;
                                }
                            }
                        }
                        $z++;
                    }
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";

                ?>

            <?php //pasando la matriz a un array y sacando posiciones
            $arrayAleatorios = array();
            $i_array = 0;
            for ($i = 0; $i < $cantidadIntervalos; $i++) {
                for ($j = 0; $j < $cantidadIntervalos; $j++) {
                    $arrayAleatorios[$i_array] = getfloat($matrizAleatorios[$i][$j]);
                   

                    $i_array++;
                }
            }

            

            

            echo "<div class=' table-bordered small sm'>";
            echo "<table class='small sm  table-bordered'>";
            echo "<tr class='bg-dark  text-light'><td colspan='2' > Intervalos </td></tr>";
            for ($i = 0; $i < $cantidadIntervalos; $i++) {
                echo "<tr>";
                echo "<td>" . $minimoEnIntervalo[$i] . "</td>";
                echo "<td>" . $maximoEnIntervalo[$i] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</div>";

            $f_observada = array(); //CONTAR FRECUENCIA OBSERVADA
            $contador = 0;
            for ($i = 0; $i < $cantidadIntervalos; $i++) {
                for ($j = 0; $j < $n; $j++) {
                    if ((($arrayAleatorios[$j]) <= ($maximoEnIntervalo[$i])) && (($arrayAleatorios[$j]) >= ($minimoEnIntervalo[$i]))) {
                        $contador++;
                    }
                }
                $f_observada[$i] = $contador;
                $contador = 0;
            }
            $suma = 0;
            echo "<div class='col-3 small sm'>"; //IMPRIMIR FRECUENCIA OBSERVADA
            echo "<table border='2' class='small sm  table-bordered'>";
            echo "<tr><td colspan='1' class='bg-dark  text-light'>Oi</td><td colspan='1' class='bg-dark  text-light'>Ei</td><td colspan='1' class='bg-dark  text-light'> ( (Ei - Oi)^2 ) / (Ei) </td></tr>";
            for ($i = 0; $i < $cantidadIntervalos; $i++) {
                echo "<tr>";
                echo "<td>" . ($f_observada[$i]) . "</td><td>" . $n / $m . "</td><td class='text-center'>" . floatval((pow((($n / $m) - ($f_observada[$i])), 2)) / ($n / $m)) . "</td>";
                echo "</tr>";
                $suma = $suma + (floatval((pow((($n / $m) - ($f_observada[$i])), 2)) / ($n / $m)));
            }
            echo "<tr class='Container bg-info text-light'><td colspan='3' align='right'> (𝑋^2)0 = " . $suma . "</td></tr>";
            echo "</table>";
            echo"</div>";

            echo "<div class='col '>";
            $posicionFila = 0;
            $posicionColumna = 0;           
            for ($i = 0; $i < 58; $i++) {//matriz CHI Buscando el número en la posición
                for ($j = 0; $j < 30; $j++) {
                    if(($confianza) == (getfloat($matriz_chi[$i][$j]))){
                        $posicionFila=$j;                        
                    }   
                }
            }
            $posicionColumna=$m-1;
            echo"<table class=' container small sm'>";
            echo"<tr>";
            echo "<td class=''> ELEMENTO EN TABLA CHI </td>";
            echo"</tr>";
            echo"<tr>";
            echo "<td class='alert alert-danger'>  ".$matriz_chi[$posicionColumna][$posicionFila]."</td>";
            echo"</tr>";
            echo"<tr>";
            echo "<td class=''>  Identificarlo con el color rojo en la tabla CHI ubicada en la parte inferior</td>";
            echo"</tr>";
            echo"</table>";
            echo "</div>";

            
            echo"<div class='col small sm'>";
            echo"<br>";
            echo"<h5 class='container text-center text-danger'>Tabla de Chi Cuadrado</h5>";
            $inc = 0;
            echo "<div class='table-responsive my-2 mx-3 col-11  '>";
            echo "<table  class='small  table-bordered '>";
            echo "<tbody>";
            
            for ($i = 0; $i < 58; $i++) {
                echo "<tr >";
                for ($j = 0; $j < 30; $j++) {
                    if ($matriz_chi[$posicionColumna][$posicionFila] == $matriz_chi[$i][$j]) {
                        echo "<td class='bg-danger text-light'>" . $matriz_chi[$i][$j] . "</td>";
                        $inc++;
                    } else {
                            echo "<td>" . $matriz_chi[$i][$j] . "</td>";
                            $inc++;
                        
                    }
                }
                echo "<tr>";
            }
            echo "</tbody>";

            echo "</table>";
            echo "</div>";
            echo "</div>";



            echo "</div>";
        } else {
            echo " <table border='0' align='center'>
                <tr><td> <br> <div class='alert alert-danger'>El archivo debe tener sólo 100 números aleatorios o verificar que al final de la columna no haya algún salgo de línea.</div></td></tr>                
               </table> ";
        }
    } else {
            ?>

    <?php echo " <table border='0' align='center'>
                <tr><td> <br> <div class='alert alert-danger'>Archivo no permitido! Debe tener extensión '.txt' y llamarse 'chicuadrado.txt'</div></td></tr>                
               </table> ";
    }
}
    ?>

    <?php
    function Getfloat($str) //funciòn para convertir cualquier string con decimales a un float
    {
        if (strstr($str, ",")) {
            $str = str_replace(".", "", $str); // replace dots (thousand seps) with blancs
            $str = str_replace(",", ".", $str); // replace ',' with '.'
        }
        if (preg_match("#([0-9\.]+)#", $str, $match)) { // search for number that may contain '.'
            return floatval($match[0]);
        } else {
            return floatval($str); // take some last chances with floatval
        }
    }
    ?>

            </div>
            <table border="0" align="center">
                <tr>
                    <td>
                        <input type="button" value="<< Página anterior" onClick="history.go(-1);" class="btn btn-success btn-xs">
                    </td>
                </tr>
            </table>

            <?php include '../formato/floor.php'; ?>