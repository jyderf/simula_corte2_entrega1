<?php include '../formato/head.php'; ?>
<h3 align="Center">Prueba Chi Cuadrada</h3>
<div class="container ">

    <div class="row">

        <div class="col">
            <h5>INDICACIÓN: </h5>
            <p class="small sm">
                Cargar un archivo .txt con 100 los valores vayan de 0 a 1.
               El contenido pueden obtenerse en una hoja de cálculo o en otro software; una vez logrados, 
                pegarlos en un archivo de texto en forma de columna, tal como se ve en la figura inferior izquierda.
                Configurar las características del archivo en la tabla inferior para no tener inconvenientes
                con el proceso. 
            </p>
        </div>


    </div>

    <div class="row">
        <div class="col col-3 mx-3">
            <img src="../img/imgArchivo.jpg" width="160" height="142">
        </div>

        <div class="col col-3">

            <table class=" small sm table-bordered">
                <tr class="bg-dark text-light text-center">
                    <td colspan="2">Características del archivo</td>
                </tr>
                <tr>
                    <td>Extensión</td>
                    <td>.txt</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td>chicuadrado.txt</td>
                </tr>
                <tr>
                    <td>Cantidad elementos</td>
                    <td>100</td>
                </tr>
            </table>

           
        </div>

        <div class="col alert alert-dark">
            <form method="POST" action="chi_cuadrada.php" enctype="multipart/form-data" class=" container ">
                <div>
                    <input type="file" name="archivo" class="container mx-1 col-14 " />
                   <br><br>


                    <input class='container btn btn-danger col-3 mx-5' type="submit" value="Subir" name="boton" onclick="msjArchivoSubido();" />

                </div>
            </form>
        </div>
    </div>


</div>

<?php include '../formato/floor.php'; ?>