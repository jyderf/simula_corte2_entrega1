<?php include '../formato/head.php'; ?>


<form action="bbshub.php" method="POST" align="center">
    <div>
        <h1>Blum, Blum y Shub</h1>
       
        <label for="balloons" >x0</label>
        <input id="x0" type="number" name="x0" placeholder="Ingrese x0" class="col-lg-4 " min="1" required><br>
            
        <label for="balloons">m</label>
        <input id="m" type="number" name="m" placeholder="Ingrese m" class="col-lg-4 " min="1" required><br>

        <label for="balloons">¿Cuántas filas desea?</label><br>
        <input id="filas" type="number" name="filas" min="1" required>

        <span class="validity"></span>
    </div>
    <br>
    <div>
        
        <button class="btn btn-danger btn-sm">Blum, Blum y Shub</button>
        <br>
    </div>
</form>

<?php include '../formato/floor.php'; ?>