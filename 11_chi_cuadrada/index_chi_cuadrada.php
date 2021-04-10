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
                    <input type="file" name="archivo" class="container small sm"  />
                    <br>
                    <br>

                    <label for="confianza" class="small sm">Seleccione porcentaje de confianza</label>
                    <select id="confianza" name="confianza" class="small sm ">
                        <option class="small sm" value="0.0001">99,99</option>
                        <option class="small sm" value="0.0025">99,75</option>
                        <option class="small sm" value="0.005">99,5</option>
                        <option class="small sm" value="0.01">99</option>
                        <option class="small sm" value="0.025">97,5</option>
                        <option class="small sm" value="0.05">95</option>
                        <option class="small sm" value="0.1">90</option>
                        <option class="small sm" value="0.15">85</option>
                        <option class="small sm" value="0.2">80</option>
                        <option class="small sm" value="0.25">75</option>
                        <option class="small sm" value="0.3">70</option>
                        <option class="small sm" value="0.35">65</option>
                        <option class="small sm" value="0.4">60</option>
                        <option class="small sm" value="0.45">55</option>
                        <option class="small sm" value="0.5">50</option>
                        <option class="small sm" value="0.55">45</option>
                        <option class="small sm" value="0.6">40</option>
                        <option class="small sm" value="0.65">35</option>
                        <option class="small sm" value="0.7">30</option>
                        <option class="small sm" value="0.75">25</option>
                        <option class="small sm" value="0.8">20</option>
                        <option class="small sm" value="0.85">15</option>
                        <option class="small sm" value="0.9">10</option>
                        <option class="small sm" value="0.95">5</option>
                        <option class="small sm" value="0.975">2,5</option>
                        <option class="small sm" value="0.99">1</option>
                        <option class="small sm" value="0.995">0,5</option>
                        <option class="small sm" value="0.9975">0,25</option>
                        <option class="small sm" value="0.999">0,1</option>
                        <option class="small sm" value="nulo" selected>--</option>
                    </select>
                    <label for="cars" class=" ">%</label>

                    <br>
                    <br>
                    <input class='container btn btn-danger col-3 mx-5 ' type="submit" value="Subir" name="boton" onclick="msjArchivoSubido();" />

                </div>
            </form>
        </div>
    </div>


</div>

<?php include '../formato/floor.php'; ?>