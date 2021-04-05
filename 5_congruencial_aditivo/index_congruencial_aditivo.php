<?php include '../formato/head.php'; ?>

<form action="index_congruencial_aditivo.php" method="POST" align="lefht">
    <div>
        <h1>Algoritmo Congruencial Aditivo</h1>
        <label for="balloons">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <h5>¿Con cuántas semillas trabajará?</h5></label>
        <input id="nSemillas" type="number" name="nSemillas" placeholder="N. semillas" class="col-lg-2 " min="2" required>
        <span class="validity"></span>
        <button class="btn btn-success btn-xs">Generar entradas</button>
    </div>
</form>

<form action="congruencial_aditivo.php" method="POST" align="center">

    <br>
    <label>Ingrese las semillas en las casillas indicadas</label>
    <?php

    error_reporting(0);
    $numeroSemillas = $_POST["nSemillas"];
    echo "<input hidden='true' id='contadorSemillas' type='number' name='contadorSemillas'  value='" . $numeroSemillas . "' placeholder='" . $numeroSemillas . "' class='col-lg-6 ' ><br>";

    for ($i = 0; $i < $numeroSemillas; $i++) {

    ?>
        <label for="balloons">Semilla <?php echo  " " . $i + 1; ?></label>
        <input id="semillaN<?php echo $i + 1; ?>" type="number" name="semillaN<?php echo $i + 1; ?>" placeholder="Ingrese la semilla <?php echo " " . $i + 1; ?>" class="col-lg-6 " min="2" required><br>
    <?php
    }
    ?>

    <?php if ($i > 0) { ?>
        <br>
        <label for="balloons"> <h4>m</h4> </label>
        <input id="m" type="number" name="m" placeholder="Ingrese un valor para m" class="col-lg-3 " required>
        <label for="balloons"> <h4>&nbsp&nbsp&nbsp&nbspFilas</h4> </label>
        <input id="filas" type="number" name="filas" placeholder="Ingrese las filas deseadas" class="col-lg-4 "  required>
        
        <br><br>
        <div>
            <button class="btn btn-danger btn-xs">Congruencial aditivo</button>
            <br><br>
        </div>
    <?php } ?>
</form>



<?php include '../formato/floor.php'; ?>