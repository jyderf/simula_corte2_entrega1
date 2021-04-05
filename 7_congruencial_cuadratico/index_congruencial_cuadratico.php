<?php include '../formato/head.php'; ?>


<form action="congruencial_cuadratico.php" method="POST" align="center">
    <div>
        <h1>Algoritmo Congruencial cuadrático</h1>
       
        <label for="balloons" >x0</label>
        <input id="x0" type="number" name="x0" placeholder="Ingrese x0" class="col-lg-4 " min="1" required><br>
        
        <label for="balloons"> &nbsp a</label>
        <input id="a" type="number" name="a" placeholder="Ingrese a" class="col-lg-4 " min="1" required><br>

        <label for="balloons"> &nbsp b</label>
        <input id="b" type="number" name="b" placeholder="Ingrese b" class="col-lg-4 " min="1" required><br>

        <label for="balloons"> &nbsp c</label>
        <input id="c" type="number" name="c" placeholder="Ingrese c" class="col-lg-4 " min="1" required><br>

        <label for="balloons">m</label>
        <input id="m" type="number" name="m" placeholder="Ingrese módulo" class="col-lg-4 " min="1" required><br>

        <label for="balloons">¿Cuántas filas desea?</label><br>
        <input id="filas" type="number" name="filas" min="1" required>

        <span class="validity"></span>
    </div>
    <br>
    <div>
        
        <button class="btn btn-danger btn-xs">Calcular Congruencial Cuadrático</button>
        <br>
    </div>
</form>

<?php include '../formato/floor.php'; ?>