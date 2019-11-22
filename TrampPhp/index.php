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

</head>
<title>GPS</title>
<body>
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
            <form name="form" action="resultado.php" method="post">
                <tr>
                    <td></td>
                    <td>Informe a cidade local</td>
                </tr>
                <tr>
                    <td><h4>Iniciar de :</h4></td>
                    <td><select name="rota_de">
                            <option value="1"><h4>Araçariguama</option>
                            <option value="2">Araraquara</option>
                            <option value="3">Araras</option>
                            <option value="4">Barra Bonita</option>
                            <option value="5">Barueri</option>
                            <option value="6">Boa Esperança do Sul</option>
                            <option value="7">Botucatu</option>
                            <option value="8">Brotas</option>
                            <option value="9">Campinas</option>
                            <option value="10">Cordeirópolis</option>
                            <option value="11">Dois córregos</option>
                            <option value="12">Dourado</option>
                            <option value="13">Hortolândia</option>
                            <option value="14">Ibaté</option>
                            <option value="15">Itirapina</option>
                            <option value="16">Itu</option>
                            <option value="17">Jaboticabal</option>
                            <option value="18">Jaú</option>
                            <option value="19">Jundiaí</option>
                            <option value="20">Limeira</option>
                            <option value="21">matão</option>
                            <option value="22">Mineiros do tiete</option>
                            <option value="23">Osasco</option>
                            <option value="24">Paulinia</option>
                            <option value="25">Piracicaba</option>
                            <option value="26">pirassununga</option>
                            <option value="27">Porto Ferreira</option>
                            <option value="28">Ribeirão Bonito</option>
                            <option value="29">Ribeirão Preto</option>
                            <option value="30">Rio Claro</option>
                            <option value="31">Salto</option>
                            <option value="32">Santa Bárbara D'Oeste</option>
                            <option value="33">Santa Gertrudes</option>
                            <option value="34">São Carlos</option>
                            <option value="35">São Manuel</option>
                            <option value="36">São Paulo</option>
                            <option value="37">Sertãozinho</option>
                            <option value="38">Tiete</option>
                            <option value="39">Torrinha</h4></option>
                        </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Escolha uma cidade Destino</td>
                </tr>
                <tr>
                    <td><h4>Para :</h4></td>
                    <td><select name="rota_para">
                            <option value="1">Araçariguama</option>
                            <option value="2">Araraquara</option>
                            <option value="3">Araras</option>
                            <option value="4">Barra Bonita</option>
                            <option value="5">Barueri</option>
                            <option value="6">Boa Esperança do Sul</option>
                            <option value="7">Botucatu</option>
                            <option value="8">Brotas</option>
                            <option value="9">Campinas</option>
                            <option value="10">Cordeirópolis</option>
                            <option value="11">Dois córregos</option>
                            <option value="12">Dourado</option>
                            <option value="13">Hortolândia</option>
                            <option value="14">Ibaté</option>
                            <option value="15">Itirapina</option>
                            <option value="16">Itu</option>
                            <option value="17">Jaboticabal</option>
                            <option value="18">Jaú</option>
                            <option value="19">Jundiaí</option>
                            <option value="20">Limeira</option>
                            <option value="21">matão</option>
                            <option value="22">Mineiros do tiete</option>
                            <option value="23">Osasco</option>
                            <option value="24">Paulinia</option>
                            <option value="25">Piracicaba</option>
                            <option value="26">pirassununga</option>
                            <option value="27">Porto Ferreira</option>
                            <option value="28">Ribeirão Bonito</option>
                            <option value="29">Ribeirão Preto</option>
                            <option value="30">Rio Claro</option>
                            <option value="31">Salto</option>
                            <option value="32">Santa Bárbara D'Oeste</option>
                            <option value="33">Santa Gertrudes</option>
                            <option value="34">São Carlos</option>
                            <option value="35">São Manuel</option>
                            <option value="36">São Paulo</option>
                            <option value="37">Sertãozinho</option>
                            <option value="38">Tiete</option>
                            <option value="39">Torrinha</option>
                        </select></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type=submit value="procurar Melhor Rota"></td>
                </tr>
            </form>
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
</div>
<footer>
    <br>
    <br>
    <h2 align="center"><font color="#FCFBFB">TRABALHO 1 - MENOR CAMINHO EM GRAFOS</font></h2>
</footer>
</body>
</html>