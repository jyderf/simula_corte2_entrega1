<?php include '../formato/head.php'; ?>
<h3 align="Center">Prueba Chi Cuadrada</h3>
<div class="container ">

    <div class="row">

        <div class="col">
            <h5>INDICACIÓN: </h5>
            <p>
                Cargar un archivo con una determinada cantidad de números aleatorios generados
                previamente con el formato correspondiente. Como los valores van de 0 a 1,
                cada elemento debe generarse entre 1 y 999, luego debe dividirse entre 1000. El contenido pueden obtenerse
                en una hoja de cálculo o en otro software; una vez logrados, pegarlos en un archivo de texto en forma de columna,
                 tal como se ve en la figura.
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
                debe tener una extensión .txt y debe llamarse "miarchivo.txt".
            </P>
        </div>

        <div class="col">
            <form method="POST" action="chi_cuadrada.php" enctype="multipart/form-data">
                <div>
                    <input type="file" name="archivo" />
                    <br>
                    <br>
                    <input class='btn btn-danger' type="submit" value="Subir" name="boton" onclick="msjArchivoSubido();" />

                </div>
            </form>
        </div>
    </div>


</div>