<?php include '../formato/head.php'; ?>
<?php error_reporting(0); //oculta errores
?>

<?php
$porcentajeConfianza = $_POST['porcentajeConfianza'];
$validadoPorcentaje = 0;                                                                              //75 80 85 90 92 95 97.5 99
if (($porcentajeConfianza == 75) || ($porcentajeConfianza == 80) || ($porcentajeConfianza == 85) || ($porcentajeConfianza == 90) || ($porcentajeConfianza == 92) || ($porcentajeConfianza == 95) || ($porcentajeConfianza == 97.5) || ($porcentajeConfianza == 99)) {
    $validadoPorcentaje = 1;
} else {
    if (($porcentajeConfianza != 75) || ($porcentajeConfianza != 80) || ($porcentajeConfianza != 85) || ($porcentajeConfianza != 90) || ($porcentajeConfianza != 92) || ($porcentajeConfianza != 95) || ($porcentajeConfianza != 97.5) || ($porcentajeConfianza != 99)) {
        $validadoPorcentaje = 0;
    }
}


$formatos = array('.txt'); //aquí pongo los formatos que quiera poner jpg, txt, png, doc, etc.. para el caso sólo txt
if (isset($_POST['boton'])) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $nombreTmpArchivo = $_FILES['archivo']['tmp_name']; //nombre temporal del archivo
    $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.')); //buscar la posición del último punto del nomre del archivo, es para a partir de ahí extraer la extensión
    if ((in_array($ext, $formatos) && ($nombreArchivo === 'medias.txt'))&&($validadoPorcentaje==1)) { //si esta extensión está dentro de la regla formatos

        if (move_uploaded_file($nombreTmpArchivo, "../archivosMedias/$nombreArchivo")) {
            $archivo = fopen("../archivosMedias/medias.txt", 'r');
            $numlinea = 0;
            while ($linea = fgets($archivo)) {
                $aux[] = getfloat($linea); //aquí se llenan los números en el arreglo aux, q luego pasará a una matríz
                $numlinea++;
            }
        }
?>

        <?php



        $largoElemento = strlen($aux[0]); //obtener el largo de un elemento
        $largoElemento = $largoElemento - 2; //le quito 2 para q no cuente el cero y la coma,
        echo "Cantidad decimales = " . $largoElemento . "";
        echo "<h4 align='center'>Contenido del Archivo</h4>";
        
        $n = $numlinea;
        $cantElementos = $numlinea;
        $m = sqrt($n);
        $intervalo = 1 / $m;
        $cantidadIntervalos = $intervalo * 100;
        $tamaño = intval($m);
        //INICIA ORGANIZACIÓN TAMAÑO MATRIZ
        $fil = 0;
        $resto = 0;
        for ($i = 1; $i < $cantElementos; $i++) {
            if (($i % 10 === 0)) {
                $fil++;
            }
        }
        if ($fil === 0) {
            $fil = 1;
        }
        $resto = $cantElementos % 10;


        //LENANDO MATRIZ E IMPRIMIÉNDOLA
        $matrizAleatorios = array(array());

        $inc = 0;
        echo "<table border='1' >";
        echo "<tr><td colspan='10' align='center' class='bg-dark text-light'>Tus números</td></tr>";
        for ($i = 0; $i <= $fil; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 10; $j++) {
                $matrizAleatorios[$i][$j] = $aux[$inc];
                $inc++;
                echo "<td>" . $matrizAleatorios[$i][$j] . "</td>";
            }
            echo "<tr>";
        }
        echo "</table>";


        $z = 0;
        //NIVEL DE CONFIANZA Y VALOR DE Z
        if ($porcentajeConfianza == 75) {
            $z = 1.15;
        } else {
            if ($porcentajeConfianza == 80) {
                $z = 1.28;
            } else {
                if ($porcentajeConfianza == 85) {
                    $z = 1.44;
                } else {
                    if ($porcentajeConfianza == 90) {
                        $z = 1.65;
                    } else {
                        if ($porcentajeConfianza == 92) {
                            $z = 1.75;
                        } else {
                            if ($porcentajeConfianza == 95) {
                                $z = 1.96;
                            } else {
                                if ($porcentajeConfianza == 97.5) {
                                    $z = 2.24;
                                } else {
                                    if ($porcentajeConfianza == 99) {
                                        $z = 2.58;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }


        echo "valor z ==>" . $z;


        $r = 0;
        for ($i = 0; $i < $n; $i++) { //promedio
            $r = $r + $aux[$i];
        }
        $r = $r / $n;


        $LI = 0;
        $LS = 0;

        $LI = (1 / 2) - ($z) * (1 / sqrt(12 * $n));
        $LI = number_format($LI, 4, ',', '');
        $LI = Getfloat($LI);

        $LS = (1 / 2) + ($z) * (1 / sqrt(12 * $n));
        $LS = number_format($LS, 4, ',', '');
        $LS = Getfloat($LS);

        $promedio = 0;
        $promedio = ($LI + $LS) / 2;

        echo "<p class='alert alert-success'>
        Varianza = σ² = 1/12 = 0,08333   
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        r=" . $r .
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         n=" . $n .
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         Confianza=" . $porcentajeConfianza . "%
         <br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        LI=" . $LI . "
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        LS=" . $LS . "
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
        Promedio=" . $promedio . "        
         </p>";



        ?>

        <div class="row">

            <?php


            ?>

            <?php //pasando la matriz a un array
            $arrayAleatorios = array();
            $i_array = 0;
            for ($i = 0; $i < $cantidadIntervalos; $i++) {
                for ($j = 0; $j < $cantidadIntervalos; $j++) {
                    $arrayAleatorios[$i_array] = getfloat('0.0223');
                    $i_array++;
                }
            }
        } else {
            ?>


    <?php echo " <table border='0' align='center'>
                <tr><td> <br> <div class='alert alert-danger'>Archivo no permitido! Debe tener extensión '.txt' y llamarse 'medias.txt'</div></td></tr>
                <tr><td> <br> <div class='alert alert-warning'>Verificar que los porcentajes sean: 75%, 80%, 85%, 90%, 92%, 95%, 97.5% o 99%, no se admite otro. </div></td></tr>                                
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

    <?php


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