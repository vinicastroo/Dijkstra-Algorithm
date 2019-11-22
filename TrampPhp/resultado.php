<!--
DISCIPLINA: GRAFOS E AUTÔMATOS
-->
<!doctype html>
<html lang="pt-br">

<head>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fjalla+One|Archivo+Narrow|Oswald:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <?php

    include("Dijkstra.php");
    include("nome.php");


    // I é a distância infinita.
    define('I',1000);

    // Tamanho da matriz
    $matrixWidth = 50;

    // $matriz é uma matriz no seguinte formato: (rota 1, rota 2, distância de aresta)
    $matriz = array(

        array("1", "5", 26,),
        array("1", "16", 51),
        array("2", "6", 35),
        array("2", "14", 29),
        array("2", "21", 33),
        array("3", "20", 25),
        array("3", "26", 24),
        array("4", "18", 25),
        array("4", "35", 35),
        array("5", "1", 26),
        array("5", "23", 12),
        array("6", "2", 35),
        array("6", "12", 27),
        array("6", "18", 42),
        array("7", "35", 26),
        array("7", "38", 95),
        array("8", "15", 35),
        array("8", "18", 56),
        array("8", "39", 21),
        array("9", "13", 20),
        array("9", "19", 38),
        array("9", "24", 23),
        array("9", "31", 42),
        array("10", "20", 18),
        array("10", "33", 10),
        array("11", "22", 12),
        array("11", "33", 10),
        array("12", "6", 27),
        array("12", "28", 19),
        array("13", "9", 20),
        array("13", "32", 34),
        array("14", "2", 29),
        array("14", "34", 15),
        array("15", "8", 35),
        array("15", "26", 56),
        array("15", "30", 42),
        array("15", "34", 36),
        array("16", "1", 51),
        array("16", "19", 48),
        array("16", "31", 59),
        array("16", "38", 57),
        array("17", "21", 45),
        array("17", "37", 41),
        array("18", "4", 25),
        array("18", "6", 42),
        array("18", "8", 56),
        array("18", "22", 20),
        array("19", "9", 38),
        array("19", "16", 48),
        array("19", "36", 59),
        array("20", "3", 25),
        array("20", "10", 18),
        array("20", "24", 45),
        array("20", "32", 24),
        array("21", "2", 33),
        array("21", "17", 45),
        array("22", "11", 12),
        array("22", "18", 20),
        array("23", "5", 12),
        array("23", "36", 23),
        array("24", "9", 23),
        array("24", "20", 45),
        array("25", "30", 40),
        array("25", "31", 70),
        array("25", "39", 87),
        array("26", "3", 44),
        array("26", "15", 56),
        array("26", "27", 24),
        array("27", "26", 24),
        array("27", "29", 88),
        array("27", "34", 57),
        array("28", "12", 19),
        array("28", "34", 51),
        array("29", "2", 89),
        array("29", "27", 88),
        array("29", "34", 101),
        array("29", "37", 21),
        array("30", "15", 42),
        array("30", "25", 40),
        array("30", "33", 8),
        array("31", "9", 42),
        array("31", "16", 59),
        array("31", "25", 70),
        array("32", "13", 34),
        array("32", "20", 34),
        array("33", "10", 10),
        array("33", "30", 8),
        array("34", "14", 15),
        array("34", "15", 36),
        array("34", "27", 57),
        array("34", "28", 51),
        array("34", "29", 101),
        array("35", "4", 35),
        array("35", "7", 26),
        array("36", "19", 59),
        array("36", "23", 23),
        array("37", "17", 41),
        array("37", "29", 21),
        array("38", "7", 95),
        array("38", "16", 57),
        array("39", "8", 21),
        array("39", "11", 29),
        array("39", "25", 87),

    );

    $nossoMapa = array();

    // Leia a $matriz e empurrá-los para o mapa
    for ($i=0,$m=count($matriz); $i<$m; $i++) {
        $x = $matriz[$i][0];
        $y = $matriz[$i][1];
        $c = $matriz[$i][2];
        $nossoMapa[$x][$y] = $c;
        $nossoMapa[$y][$x] = $c;
    }

    // distância de um nó para si é sempre zero
    for ($i=0; $i < $matrixWidth; $i++) {
        for ($k=0; $k < $matrixWidth; $k++) {
            if ($i == $k) $nossoMapa[$i][$k] = 0;
        }
    }


    // Inicializa o algoritmo
    $dijkstra = new Dijkstra($nossoMapa, I,$matrixWidth);

    // $dijkstra->findShortestPath; para encontrar único caminho...
    $rota_de = $_POST['rota_de'];
    $rota_para = $_POST['rota_para'];

    $dijkstra->EncontrarCaminhoCurto($rota_de, $rota_para);

    //retorno das variaveis depois do algoritmo
    $array2 = $dijkstra -> PuxarResultado((int) $rota_para);
    $qtd_cidade = $array2["dados"]["caminho"];
    $array3 = $array2["dados"]["lista"];
    $lista = explode(" ", $array3);
    ?>
</head>
<title>GPS</title>
<body onLoad="main ();">
<header><div class="header">
        <section><br/>
            <h1 align="center">Trabalho Grafo</h1>
        </section>
    </div></header>
<div class="corpo_branco">
    <br>
    <br>
    <br>
    <br>
</div>
<div class="corpo">
    <aside>
        <h3>Sistema GPS</h3>
        <ol>
            <li>Cidade Origem.</li>
            <li>Cidade a ser deslocado.</li>
            <li>OBSERVAÇÕES:</li>
            <li>Sistema feito em PHP</li>
            <li>Sistema com Lista Adjacente</li>
            <li>Sistema com algoritmo Dijkstra</li>
        </ol>
    </aside>
    <div class="tabela" align="center">
        <h2 align="center">GPS</h2>

        <table>
            <tr>
                <td><h5>Caminho mais curto: </h5></td>
                <td><b>a partir da Cidade <h4><?PHP echo nome($rota_de) ?></h4> para <h4><?PHP echo nome($rota_para) ?></h4></b></td>
            </tr>
            <tr>
                <td><h5>Lista Adjacente: </h5></td>
                <td><b><?PHP for($i =0; $i < $qtd_cidade; $i++){ echo ("  =>  ".nome($lista[$i])); } ?></b></td>
            </tr>
            <tr>
                <td><h5>KM TOTAL: </h5></td>
                <td><b><?PHP echo $array2["dados"]["km"] ?></b></td>
            </tr>
            <tr>
                <td><h5>Cidades percorridas: </h5></td>
                <td><b><?PHP echo $array2["dados"]["caminho"] ?></b></td>
            </tr>
            <tr>
                <td></td>
                <td><button><a href="index.php"><h4>voltar</h4></a></button></td>
            </tr>
        </table>

    </div>
</div>
<div class="corpo_branco">
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<footer>
    <br>
    <br>
    <h2 align="center"><font color="#FCFBFB">TRABALHO 1 - MENOR CAMINHO EM GRAFOS</font></h2>
</body>
</html>