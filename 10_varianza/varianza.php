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
        $largoElemento = $largoElemento - 2; //le quito 2 para q no cuente el cero y la coma,
        //echo "Cantidad decimales = " . $largoElemento . "";
        echo "<h4 align='center'>Calculando Varianza</h4>";
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

        echo "<div class='row container'>";

        echo "<div class='col'>";
        //LENANDO MATRIZ E IMPRIMIÉNDOLA
        $matrizAleatorios = array(array());
        $inc = 0;
        echo "<table border='1' class='small sm  table-bordered'>";
        echo "<tr><td colspan='10' align='center' class='bg-dark text-light '>Tus números</td></tr>";
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
        echo "</div>";

        $r = 0;
        for ($i = 0; $i < $n; $i++) { //promedio
            $r = $r + $aux[$i];
        }
        $r = $r / $n;

        $LI = 0;
        $LS = 0;

        $promedio = 0;
        $promedio = ($LI + $LS) / 2;

        //$largoElemento=(pow(10,$largoElemento));
        $restoConfianza = 100 - $porcentajeConfianza;

        $a = (($restoConfianza / 2) / 100);
        $UNO_menos_a = 1 - $a;

        //Buscando numerador Li = a/n-1 (se necesitaría lo que vale a número de elementos  -1)
        $numerador_LI = 0;
        $posicionFila = 0;
        for ($i = 0; $i < 58; $i++) {
            if (($n - 1) == $matriz_chi[$i][0])
                $posicionFila = $i;
        }
        $posicionColumna = 0;
        for ($j = 0; $j < 30; $j++) {
            if ($a == $matriz_chi[0][$j])
                $posicionColumna = $j;
        }
        $numerador_LI = $matriz_chi[$posicionFila][$posicionColumna];

        //Buscando numerador LS = 1-a/12*n-1 (se necesitaría lo que vale a número de elementos  -1)
        $numerador_LS = 0;
        $posicionFila = 0;
        for ($i = 0; $i < 58; $i++) {
            if (($n - 1) == $matriz_chi[$i][0])
                $posicionFila = $i;
        }
        $posicionColumna = 0;
        for ($j = 0; $j < 30; $j++) {
            if ($UNO_menos_a == $matriz_chi[0][$j])
                $posicionColumna = $j;
        }
        $numerador_LS = $matriz_chi[$posicionFila][$posicionColumna];


        $LI = $numerador_LI / (12 * ($n - 1));
        $LI = number_format($LI, 8, ',', '');
        $LI = Getfloat($LI);

        $LS = $numerador_LS / (12 * ($n - 1));
        $LS = number_format($LS, 8, ',', '');
        $LS = Getfloat($LS);

        echo "<div class='col small sm'>";
        echo "<p class='alert alert-success'>
        Varianza = σ² = 1/12 = 0,08333   
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        r=" . $r .
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         n=" . $n .
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         Confianza=" . $porcentajeConfianza .
            " a=" . $restoConfianza . "% a=" . $a .
            "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <br>1-a=" . $UNO_menos_a . "
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <br>
         LI (Var)=" . $LI . "
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         <br>
         LS (Var)=" . $LS . "
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
         
         </p>";

        echo "</div>";

        echo "</div>";




        ?>

        <div class="row">

            <?php
            echo "<h5 class='container'>Busca en la tabla inferior Chi Cuadrado χ2, de acuerdo al color indicado </h5>";
            echo "<p class='small sm container'>Los valores corresponden a los utilizados para encontrar tanto LI, como LS</p>";
            echo "<p class='small sm mx-4 alert bg-danger text-light'> LI (VAR)  </p>";
            echo "<p class='small sm mx-4 alert bg-success text-light'> LI (VAR) </p>";
            echo "<p class='small sm mx-4 alert alert-danger '><= Busca desplazándote horizontal o verticalmente.=> </p>";


            // Abriendo el archivo

           
            echo"<div class='col'>";
            $inc = 0;
            echo "<div class=' small sm table-responsive my-2 mx-3 col-11  '>";
            echo "<table  class='small sm table-bordered '>";
            echo "<tbody>";
            
            for ($i = 0; $i < 58; $i++) {
                echo "<tr >";
                for ($j = 0; $j < 30; $j++) {
                    if ($numerador_LI == $matriz_chi[$i][$j]) {
                        echo "<td class='bg-danger text-light'>" . $matriz_chi[$i][$j] . "</td>";
                        $inc++;
                    } else {
                        if ($numerador_LS == $matriz_chi[$i][$j]) {
                            echo "<td class='bg-success text-light'>" . $matriz_chi[$i][$j] . "</td>";
                            $inc++;
                        } else {
                            echo "<td>" . $matriz_chi[$i][$j] . "</td>";
                            $inc++;
                        }
                    }
                }
                echo "<tr>";
            }
            echo "</tbody>";

            echo "</table>";
            echo "</div>";
            echo "</div>";
            echo"</div>";

           


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