<?php include '../formato/head.php'; ?>
<?php error_reporting(0); //oculta errores
?>

<?php
$formatos = array('.txt'); //aquí pongo los formatos que quiera poner jpg, txt, png, doc, etc.. para el caso sólo txt
if (isset($_POST['boton'])) {
    $nombreArchivo = $_FILES['archivo']['name'];
    $nombreTmpArchivo = $_FILES['archivo']['tmp_name']; //nombre temporal del archivo
    $ext = substr($nombreArchivo, strrpos($nombreArchivo, '.')); //buscar la posición del último punto del nomre del archivo, es para a partir de ahí extraer la extensión
    if ((in_array($ext, $formatos) && ($nombreArchivo === 'varianza.txt'))) { //si esta extensión está dentro de la regla formatos

        if (move_uploaded_file($nombreTmpArchivo, "../archivosVarianza/$nombreArchivo")) {
            $archivo = fopen("../archivosVarianza/varianza.txt", 'r');
            $numlinea = 0;
            while ($linea = fgets($archivo)) {
                $aux[] = getfloat($linea); //aquí se llenan los números en el arreglo aux, q luego pasará a una matríz
                $numlinea++;
            }
        }
?>

        <?php



        $largoElemento = strlen($aux[0]); //obtener el largo de un elemento
        $largoElemento = $largoElemento - 2; //le quito el primer dígito y la como 0,
        echo "Cantidad decimales = " . $largoElemento . "";
        echo "<h4 align='center'>Contenido del Archivo</h4>";
        $porcentajeConfianza = $_POST['porcentajeConfianza'];
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


        $r = 0;
        for ($i = 0; $i < $n; $i++) { //promedio
            $r = $r + $aux[$i];
        }
        $r = $r / $n;


        $LI = 0;
        $LS = 0;

        $LI = (1 / 2) - (1.65) * (1 / sqrt(12 * $n));
        $LI = number_format($LI, 4, ',', '');
        $LI = Getfloat($LI);

        $LS = (1 / 2) + (1.65) * (1 / sqrt(12 * $n));
        $LS = number_format($LS, 4, ',', '');
        $LS = Getfloat($LS);

        $promedio = 0;
        $promedio = ($LI + $LS) / 2;

        //$largoElemento=(pow(10,$largoElemento));

        $restoConfianza = 100 - $porcentajeConfianza;

        $a = (($restoConfianza / 2) / 100);

        $UNO_menos_a = 1 - $a;

        echo "<p class='alert alert-success'>
        Varianza = σ² = 1/12 = 0,08333   
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        r=" . $r .

            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         n=" . $n .
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         Confianza=" . $porcentajeConfianza . " a=" . $restoConfianza . "% a=" . $a . 
         "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <br>1-a=".$UNO_menos_a."
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

        <?php
    } else {
        ?>


    <?php echo " <table border='0' align='center'>
                <tr><td> <br> <div class='alert alert-danger'>Archivo no permitido! Debe tener extensión '.txt' y llamarse 'varianza.txt'</div></td></tr>                
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