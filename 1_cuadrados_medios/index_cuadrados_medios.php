<?php include '../formato/head.php'; ?>


<form action="cuadrados_medios.php" method="POST" align="center">
    <div>
        <h1>Calculadora de cuadrados medios</h1>
        <label for="balloons">Ingrese un número</label><br>
        <input id="numero" type="number" name="numero" required><br><br>
        <label for="balloons">¿Cuántas filas desea?</label><br>
        <input id="filas" type="number" name="filas" required>
        <span class="validity"></span>
    </div>
    <br>
   
        <button class="btn btn-danger btn-xs">Cuadrados medios</button>
        
   
</form>

<?php include '../formato/floor.php'; ?>