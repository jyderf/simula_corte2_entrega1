<?php include '../formato/head.php'; ?>
<h3 align="Center">VARIANZA</h3>
<div class="container ">

    <div class="row">

        <div class="col">
            <h5>INDICACIÓN: </h5>
            <p class="small sm">
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
                    

                    <label for="porcentajeConfianza" class="">Seleccione porcentaje de confianza</label>
                    <select id="porcentajeConfianza" name="porcentajeConfianza" class="small sm ">
                        <option class="small sm" value="99,99">99,99</option>
                        <option class="small sm" value="99,75">99,75</option>
                        <option class="small sm" value="99,5">99,5</option>
                        <option class="small sm" value="99">99</option>
                        <option class="small sm" value="97">97,5</option>
                        <option class="small sm" value="95">95</option>
                        <option class="small sm" value="90">90</option>
                        <option class="small sm" value="85">85</option>
                        <option class="small sm" value="80">80</option>
                        <option class="small sm" value="75">75</option>
                        <option class="small sm" value="70">70</option>
                        <option class="small sm" value="65">65</option>
                        <option class="small sm" value="60">60</option>
                        <option class="small sm" value="55">55</option>
                        <option class="small sm" value="50">50</option>
                        <option class="small sm" value="45">45</option>
                        <option class="small sm" value="40">40</option>
                        <option class="small sm" value="35">35</option>
                        <option class="small sm" value="30">30</option>
                        <option class="small sm" value="25">25</option>
                        <option class="small sm" value="20">20</option>
                        <option class="small sm" value="15">15</option>
                        <option class="small sm" value="10">10</option>
                        <option class="small sm" value="5">5</option>
                        <option class="small sm" value="2.5">2,5</option>
                        <option class="small sm" value="1">1</option>
                        <option class="small sm" value="0.5">0,5</option>
                        <option class="small sm" value="0.25">0,25</option>
                        <option class="small sm" value="0.1">0,1</option>
                        <option class="small sm" value="nulo" selected>--</option>
                    </select>
                    <label for="cars" class=" ">%</label>



                    <br>
                    <br>
                    <input class='btn btn-danger' type="submit" value="Subir" name="boton" onclick="msjArchivoSubido();" />

                </div>
            </form>
        </div>
    </div>


</div>

<?php include '../formato/floor.php'; ?>