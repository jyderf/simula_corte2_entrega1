<?php include '../formato/head.php'; ?>
<h3 align="Center">PRUEBA DE MEDIAS</h3>
<div class="container ">

    <div class="row">

        <div class="col">
            <h5>INDICACIÓN: </h5>
            <p>
                Cargar un archivo con una determinada cantidad de números aleatorios entre 0 y 1, de acuerdo a la imagen.
                 Puede usar una hoja de cálculo u otro software para obtener estos elementos. En los porcentajes sólo son válidos:
                 75%, 80%, 85%, 90%, 92%, 95%, 97.5% o 99%, no se admite otro.
            </p>
        </div>


    </div>

    <div class="row">
        <div class="col">
            <img src="../img/imgArchivo.jpg" width="200" height="180">
        </div>

        <div class="col">
            
            <P class="alert alert-info">
              El archivo
                debe tener una extensión .txt y debe llamarse "medias.txt".
            </P>
        </div>

        <div class="col">
            <form method="POST" action="medias.php" enctype="multipart/form-data">
                <div>
                    <input type="file" name="archivo" />
                    <br>
                    <br>

                    <input name="porcentajeConfianza" id="porcentajeConfianza" step="0.01" type="number" name="filas" placeholder="Ingrese porcentaje de cofianza " class="col-lg-12 " min="1" max="100"   required>
                    <br>
                    <label for="porcentajeConfianza" class="alert  alert-success">Ingresar sólo porcentajes admitidos</label>
                    
                    <br>
                    <input class='btn btn-danger' type="submit" value="Subir" name="boton" onclick="msjArchivoSubido();" />

                </div>
            </form>
        </div>
    </div>


</div>

<?php include '../formato/floor.php'; ?>