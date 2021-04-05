<?php include '../formato/head.php'; ?>


<form action="productos_medios.php" method="POST" align="center">
    <div>
        <h1>Calculadora de productos medios</h1>
        <label for="balloons">Ingrese el primer número</label><br>
        <input id="numeroPrimero" type="number" name="numeroPrimero" required><br><br>
        <label for="balloons">Ingrese el segundo número</label><br>
        <input id="numeroSegundo" type="number" name="numeroSegundo" required><br><br>
        <label for="balloons">¿Cuántas filas desea?</label><br>
        <input id="filas" type="number" name="filas" required>
        <span class="validity"></span>
    </div>
    <br>
    <div>
        <br>
        <button class="btn btn-danger btn-xs">Productos medios</button>
        <br>

    </div>
</form>

<?php include '../formato/floor.php'; ?>