<?php include '../formato/head.php'; ?>
<h1>Algoritmo Congruencial Multiplicativo</h1>


<form action="congruencial_multiplicativo.php" method="POST" align="center">
    <label for="balloons">
        <h5>Digite los valores solicitados</h5>
    </label><br>





    <table class="table table-center text-lefht table-responsive ">
        <tr>
            <td>
                <h4><span>x0</span></h4>
            </td>

            <td class="bg-warning">
                <input id="x0" type="number" name="x0" placeholder="Ingrese x0" min="1" required>
            </td>

            <td>

            </td>
        </tr>
        <tr>
            <td>

                <h4><span>a</span></h4>
            </td>
            <td class="bg-success">
                <input id="x0" type="number" name="x0" placeholder="???" disabled="disabled" >
            </td>
            <td>

            </td>
            <td>
                <h4><span>k</span></h4>
            </td>
            <td class="bg-warning">
                <input id="k" type="number" name="k" placeholder="Ingrese k" min="1" required>
            </td>
        </tr>
        <tr>
            <td>
                <h4><span>m</span></h4>
            </td>
            <td class="table bg-success">
                <input id="m" type="number" name="m" placeholder="???" disabled="disabled" >
            </td>
            <td>

            </td>
            <td>
                <h4><span>g</span></h4>
            </td>

            <td class="bg-warning">
                <input id="g" type="number" name="g" placeholder="Ingrese g" min="1"  required>
            </td>
        </tr>
    </table>

    <td class="bg-dark">
    ¿Cuántas filas deseas?
                <input id="filas" type="number" name="filas" placeholder="Digite filas deseadas" min="1" required>
            </td>

    <div>
        <br><button class="btn btn-danger btn-xs">Congruencial multiplicativo</button>
    </div>

</form>







<?php include '../formato/floor.php'; ?>