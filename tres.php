<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    function sanear($cadena){
        if(isset($cadena)){
            $variable = htmlspecialchars(trim(strip_tags($cadena)));
        }else{
            $variable = "";
        }
        return $variable;
    }

    
    if(isset($_REQUEST["enviar"])){
        $texto = $_REQUEST["texto"];
        $sanearTexto = sanear($texto);
        if($sanearTexto == ""){
            echo("<p style='color: red'>No ha introducido na</p>");
        }else{
            echo("<p>Texto a buscar: $texto</p>");
        }

        if(isset($_REQUEST["opciones"])){
            $opciones = $_REQUEST["opciones"];
            foreach ($opciones as $indice => $valor) {
                $opciones[$indice] = sanear($valor);
                echo("<p>Buscar en: $valor</p>");
            }
        }else{
            echo("<p style='color: red'>No has seleccionado ninguna opcion</p>");
        }

        if(isset($_REQUEST["genero"])){
            $genero = $_REQUEST["genero"];
            foreach ($genero as $indice => $valor) {
                $genero[$indice] = sanear($valor);
                echo("<p>Genero: $valor</p>");
            }
        }

        echo("<p>[<a href='tres.php'>Nueva Busqueda</a>]</p>");

}else{
    ?>
    <form action="tres.php" method="post">
    <label for="te">Texto a buscar:</label>
    <input type="text" name="texto" id="te"><br>
    Buscar en:
    <input type="radio" name="opciones[]" id="ti" value="titulo">
    <label for="ti">Titulos de cancion</label>
    <input type="radio" name="opciones[]" id="no" value="nombre">
    <label for="no">Nombres de album</label>
    <input type="radio" name="opciones[]" id="am" value="ambos">
    <label for="am">Ambos campos</label><br>
    <label for="ge">Genero musical:</label>
    <select name="genero[]" id="ge">
        <option value="todos">Todos</option>
        <option value="acustica">Acustica</option>
        <option value="banda sonora">Banda sonora</option>
        <option value="electronica">Blues</option>
        <option value="folk">Folk</option>
        <option value="jazz">Jazz</option>
        <option value="new age">New age</option>
        <option value="pop">Pop</option>
        <option value="rock">Rock</option>
    </select>
    <input type="submit" value="Buscar" name="enviar">   
    </form>
    <?php
    ;}
    ?>
</body>
</html>