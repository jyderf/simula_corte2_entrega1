<?php include '../formato/head.php'; ?>


<form action="multiplicador_constante.php" method="POST" align="center">
    <div>
        <h1>Calculadora de Multiplicador Constante</h1>
        <label for="balloons">Ingrese la constante (K)</label><br>
        <input id="constante" type="number" name="constante" required><br><br>
        <label for="balloons">Ingrese un número</label><br>
        <input id="numero" type="number" name="numero" required><br><br>

        <label for="balloons">¿Cuántas filas desea?</label><br>
        <input id="filas" type="number" name="filas" required>
        <span class="validity"></span>
    </div>
    <br>
    <div>
        
        <button class="btn btn-danger btn-xs">Multiplicador constante</button>
        <br>
    </div>
</form>

<?php include '../formato/floor.php'; ?>