<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pseudoaleatorios</title>

    <link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../styles.css" />





</head>

<body>

    <div class="container d-flex justify-content-center container-fluid  ">
        <img src="../img/logo-ITP.png" width="115" height="115">
        <!--img src="../img/itp-baner2.png " width="150"     height="30"-->
        <img src="../img/simulation2.jpg " width="561" height="115">
        <img src="../img/EstudianteLibros.jpg " width="115" height="115">
        <!--img src="../img/escudo-col.png" width="80"     height="80"-->
    </div>


    <div class="container d-flex justify-content-center  bg-dark alert">

        <div class=" btn-group mx-1">
            <button type="button" class="btn btn-success btn-xs " onclick="location.href='../index.php'">INICIO &nbsp; &nbsp; &nbsp; </button>
        </div>

        <div class="btn-group mx-1">
            <button type="button" class="btn btn-danger btn-xs dropdown-toggle" data-toggle="dropdown">MÓDULO A &nbsp; &nbsp; &nbsp; &nbsp; </button>
            <span class="caret"></span>
            <span class="sr-only">Desplegar menú</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../1_cuadrados_medios/index_cuadrados_medios.php'">Cuadrados medios</button>
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../2_productos_medios/index_productos_medios.php'">Productos medios</button>
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../3_multiplicador_constante/index_multiplicador_constante.php'">Multiplicador constante</button>
            </ul>
        </div>

        <div class="btn-group mx-1">

            <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-toggle="dropdown">MÓDULO B &nbsp; &nbsp; &nbsp; &nbsp; </button>
            <span class="caret"></span>
            <span class="sr-only">Desplegar menú</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../4_lineal/index_lineal.php'">Lineal</button>
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../5_congruencial_aditivo/index_congruencial_aditivo.php'">Congruencial aditivo</button>
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../6_congruencial_multiplicativo/index_congruencial_multiplicativo.php'">Congruencial multiplicativo</button>
            </ul>
        </div>

        <div class="btn-group mx-1">
            <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">MÓDULO C &nbsp; &nbsp; &nbsp; &nbsp; </button>
            <span class="caret"></span>
            <span class="sr-only">Desplegar menú</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../7_congruencial_cuadratico/index_congruencial_cuadratico.php'">Congruencial cuadrático</button>
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../8_bbshub/index_bbshub.php'">Blum, Blum y Shub</button>
            </ul>
        </div>

        <div class="btn-group mx-1">
            <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">MÓDULO D &nbsp; &nbsp; &nbsp; &nbsp; </button>
            <span class="caret"></span>
            <span class="sr-only">Desplegar menú</span>
            </button>
            <ul class="dropdown-menu" role="menu">
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../9_medias/index_medias.php'">Pruea de Medias</button>
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../10_varianza/index_varianza.php'">Pruevas de Varianza</button>
                <button type="button" class="btn btn-light btn-sm text-left" onclick="location.href='../11_chi_cuadrada/index_chi_cuadrada.php'">Prueba de Chi Cuadrada</button>
            </ul>
        </div>


    </div>