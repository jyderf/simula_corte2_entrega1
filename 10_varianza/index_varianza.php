<?php include '../formato/head.php'; ?>
<h3 align="Center">VARIANZA</h3>
<div class="container ">

    <div class="row">

        <div class="col">
            <h5>INDICACIÓN: </h5>
            <p>
                Cargar un archivo con una determinada cantidad de números aleatorios generados
                previamente con el formato correspondiente, de acuerdo a la imagen. Puede usar una hoja de 
                cálculo u otro software para obtener estos elementos.
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
                debe tener una extensión .txt y debe llamarse "varianza.txt".
            </P>
        </div>

        <div class="col">
            <form method="POST" action="varianza.php" enctype="multipart/form-data">
                <div>
                    <input type="file" name="archivo" />
                    <br>
                    <br>
                    <input name="porcentajeConfianza" id="porcentajeConfianza" type="number" name="filas" placeholder="Ingrese porcentaje de cofianza" class="col-lg-10 " min="1" max="100"   required>
                    <br>
                    <br>
                    <input class='btn btn-danger' type="submit" value="Subir" name="boton" onclick="msjArchivoSubido();" />

                </div>
            </form>
        </div>
    </div>


</div>

<?php include '../formato/floor.php'; ?>