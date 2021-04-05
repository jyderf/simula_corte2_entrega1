<?php
$valor = $_POST["numero"];
$filas = $_POST["filas"];
$filas = $filas + 1;
$n = 0;
$extrae = $valor;
$potencia = $extrae * $extrae;
$aleatorio = 0;
?>

<?php include '../formato/head.php'; ?>


  <div>
    <h3 align="center">Calculando cuadrados medios de <?php echo " " . $valor ?></h3>

    <h4 align="center">Resutados</h4>

  </div>

  <table border='3' align='center'>
    <tr>
      <th>Xn </th>
      <th>(Xn - 1)^2 </th>
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
          <td><?php echo $extrae ?></td>
          <td></td>
        </tr>

        <?php
      } else {
        if ($i > 0) {
        ?>

          <tr>
            <td> <?php echo "X" . $n++; ?> </td>
            <td><?php echo  $potencia++; ?></td>
            <td><?php echo $extrae ?></td>
            <td><?php echo $aleatorio ?></td>
          </tr>

    <?php

        }
      }

      $potencia =   ($extrae) * ($extrae);
      $parametroExtrae1 = $potencia;
      $parametroExtrae2 = floatval(floor((floatval(strlen($potencia)) - floatval(strlen($valor))) / 2) + 1);
      $parametroExtrae3 = strlen($valor);
      $extrae = (substr($parametroExtrae1, $parametroExtrae2 - 1, $parametroExtrae3)) . PHP_EOL;
      $extrae = floatval($extrae);
      $aleatorio = $extrae / (pow(10, intval(strlen($extrae))));
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