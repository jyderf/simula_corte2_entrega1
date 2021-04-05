<?php include '../formato/head.php'; ?>
<h3 align="Center">Prueba de Medias</h3>
<div class="container ">

    <div class="row">

        <div class="col">
            <h5>INDICACIÓN: </h5>
            <p>
                Cargar un archivo con una determinada cantidad de números aleatorios generados
                previamente con el formato correspondiente, de acuerdo a la imagen. 
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
                    <input class='btn btn-danger' type="submit" value="Subir" name="boton" onclick="msjArchivoSubido();" />

                </div>
            </form>
        </div>
    </div>


</div>