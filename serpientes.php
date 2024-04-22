<?php
session_start();

// Procesamiento de datos del jugador 1
if(isset($_POST['nombre1'])){
    $_SESSION['jugador1'] = $_POST['nombre1'];
    $_SESSION['avanzar_jugador1'] = 0; // Inicializar acumulado del jugador 1
}

// Procesamiento de datos del jugador 2
if(isset($_POST['nombre2'])){
    $_SESSION['jugador2'] = $_POST['nombre2'];
    $_SESSION['avanzar_jugador2'] = 0; // Inicializar acumulado del jugador 2
}

// Procesamiento de datos del jugador 3
if(isset($_POST['nombre3'])){
    $_SESSION['jugador3'] = $_POST['nombre3'];
    $_SESSION['avanzar_jugador3'] = 0; // Inicializar acumulado del jugador 3
}

// Función para lanzar el dado
function lanzarDado() {
    return rand(1, 6);
}

// Función para mover la ficha del jugador
function moverFicha(&$acumulado) {
    $dado = lanzarDado();
    $mensaje = ''; // Inicializar mensaje vacío
    $acumulado += $dado;
    // Verificar si la ficha llega a alguna casilla especial y moverla
    switch ($acumulado) {
        case 59:
            $acumulado = 83;
            $mensaje = "¡Llegaste a la casilla 59 y te moviste a la casilla 83!";
            break;
        case 76:
            $acumulado = 55;
            $mensaje = "¡Llegaste a la casilla 76 y te moviste a la casilla 55!";
            break;
        case 51:
            $acumulado = 73;
            $mensaje = "¡Llegaste a la casilla 51 y te moviste a la casilla 73!";
            break;
        case 41:
            $acumulado = 19;
            $mensaje = "¡Llegaste a la casilla 41 y te moviste a la casilla 19!";
            break;
        case 18:
            $acumulado = 38;
            $mensaje = "¡Llegaste a la casilla 18 y te moviste a la casilla 38!";
            break;
        case 7:
            $acumulado = 13;
            $mensaje = "¡Llegaste a la casilla 7 y te moviste a la casilla 13!";
            break;
        case 34:
            $acumulado = 25;
            $mensaje = "¡Llegaste a la casilla 34 y te moviste a la casilla 25!";
            break;
        case 53:
            $acumulado = 29;
            $mensaje = "¡Llegaste a la casilla 7 y te moviste a la casilla 13!";
            break;
    }
    return array($dado, $mensaje); // Devolver el dado lanzado y el mensaje
}

// Procesamiento de los dados y movimiento de fichas para cada jugador
if(isset($_POST['dado_jugador1'])){
    list($_SESSION['dado_jugador1'], $mensaje_jugador1) = moverFicha($_SESSION['avanzar_jugador1']);
    $_SESSION['acumulado_jugador1'] += $_SESSION['dado_jugador1'];
    $_SESSION['dado_lanzado_jugador1'] = true;
    $_SESSION['total_tiradas_jugador1']++; // Nuevo contador de tiradas para el jugador 1
}

if(isset($_POST['dado_jugador2'])){
    list($_SESSION['dado_jugador2'], $mensaje_jugador2) = moverFicha($_SESSION['avanzar_jugador2']);
    $_SESSION['acumulado_jugador2'] += $_SESSION['dado_jugador2'];
    $_SESSION['dado_lanzado_jugador2'] = true;
    $_SESSION['total_tiradas_jugador2']++; // Nuevo contador de tiradas para el jugador 2
}

if(isset($_POST['dado_jugador3'])){
    list($_SESSION['dado_jugador3'], $mensaje_jugador3) = moverFicha($_SESSION['avanzar_jugador3']);
    $_SESSION['acumulado_jugador3'] += $_SESSION['dado_jugador3'];
    $_SESSION['dado_lanzado_jugador3'] = true;
    $_SESSION['total_tiradas_jugador3']++; // Nuevo contador de tiradas para el jugador 3
}
if(isset($_POST['reiniciar'])){
    // Reiniciar las tiradas y acumuladores para todos los jugadores
    unset($_SESSION['avanzar_jugador1']);
    unset($_SESSION['avanzar_jugador2']);
    unset($_SESSION['avanzar_jugador3']);
    unset($_SESSION['acumulado_jugador1']);
    unset($_SESSION['acumulado_jugador2']);
    unset($_SESSION['acumulado_jugador3']);
    unset($_SESSION['total_tiradas_jugador1']);
    unset($_SESSION['total_tiradas_jugador2']);
    unset($_SESSION['total_tiradas_jugador3']);
    
    // También puedes restablecer cualquier otra variable de sesión que necesites
}
// Verificar si algún jugador llega a la casilla 99
if ($_SESSION['avanzar_jugador1'] >= 99) {
    // Guardar el nombre y las tiradas del jugador
    $ganador = $_SESSION['jugador1'];
    $tiradas = $_SESSION['total_tiradas_jugador1'];
    // Redireccionar a la página de victoria
    header("Location: victoria.php?ganador=$ganador&tiradas=$tiradas");
    exit();
} elseif ($_SESSION['avanzar_jugador2'] >= 99) {
    // Guardar el nombre y las tiradas del jugador
    $ganador = $_SESSION['jugador2'];
    $tiradas = $_SESSION['total_tiradas_jugador2'];
    // Redireccionar a la página de victoria
    header("Location: victoria.php?ganador=$ganador&tiradas=$tiradas");
    exit();
} elseif ($_SESSION['avanzar_jugador3'] >= 99) {
    // Guardar el nombre y las tiradas del jugador
    $ganador = $_SESSION['jugador3'];
    $tiradas = $_SESSION['total_tiradas_jugador3'];
    // Redireccionar a la página de victoria
    header("Location: victoria.php?ganador=$ganador&tiradas=$tiradas");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego</title>
</head>
<style>
     body {
    background-image: url(./imagef.png);
    background-size: cover; 
    background-position: center; 
       }
    table, td,  tr{
        border: solid 4px black;
        border-collapse: collapse;
        font-family: 'Courier New', Courier, monospace;
        box-shadow: 0 0 5px red;
    }
    .table {
        margin-left: 35%;
        margin-top: -100%;
    }
    h3{
        text-align: center;
        font-size: 20px;
        font-family: 'Courier New', Courier, monospace;
    }
    
    /* Estilos para las imágenes */
    .imagen {
        width: 10%;
        height: 35%;
        position: absolute;
        top: 175px;
        left: 72%;
        transform: rotate(-30deg);
        z-index: 1;
    }
    .imagen1 {
        width: 10%;
        height: 45%;
        position: absolute;
        top: 90px;
        left: 40%;
        transform: rotate(20deg);
        z-index: 1;
    }
    .imagens {
        width: 5%;
        height: 20%;
        position: absolute;
        top: 90%;
        left: 68%;
        transform: rotate(22deg);
        z-index: 1;
    }
    .imagen2 {
        width: 10%;
        height: 30%;
        position: absolute;
        top: 62%;
        left: 56%;
        transform: rotate(30deg);
        z-index: 1;
    }
    .imagen3 {
        width: 10%;
        height: 30%;
        position: absolute;
        top: 25%;
        left: 55%;
        transform: rotate(20deg);
        z-index: 1;
    }
    .imagena {
        width: 10%;
        height: 30%;
        position: absolute;
        top: 52%;
        left: 70%;
        transform: rotate(20deg);
        z-index: 1;
    }
    .imagen4 {
        width: 10%;
        height: 30%;
        position: absolute;
        top: 62%;
        left: 35%;
        transform: rotate(20deg);
        z-index: 1;
    }
    .imageno {
        width: 15%;
        height: 30%;
        position: absolute;
        top: 68%;
        left: 40%;
        transform: rotate(20deg);
        z-index: 1;
    }
    .sum-box {
        margin-top: 20px;
        padding: 8px;
        border: 1px solid black;
        text-align: center;
        width: min-content;
        background-color: bisque;
        margin-left: 2mm;
        margin-bottom: 3mm;
        border-radius: 2mm;
        font-family: 'Courier New', Courier, monospace;
    }
    .formulario {
    background-color: lightcoral;
    width: 200px; 
    height: auto; 
    margin-left: 10px;
    font-family: 'Courier New', Courier, monospace;
    border-radius: 5px; 
    text-align: center;
    padding: 20px;
    box-sizing: border-box; 
}
.formulario input[type="text"],
.formulario input[type="number"],
.formulario input[type="submit"] {
    width: 50%;
    margin: 10px 0;
    padding: 8px;
    border-radius: 3px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
    h1{
        font-family: 'Courier New', Courier, monospace;
        color: aliceblue;
        text-shadow: 0 0 5px orange;
    }
</style>
<body>
   
     <!-- formulario dados y tiradas -->
    <!-- jugador1 -->
    <h1>BIENVENIDO <?php echo $_SESSION["jugador1"]; ?></h1>
<form action="#" method="post" class="formulario">
    <div>
        <h3>1er Jugador</h3>
        <label for="contador">TIRADAS</label>
        <input type="number" name="contador" class="input" value="<?php echo isset($_SESSION['total_tiradas_jugador1']) ? $_SESSION['total_tiradas_jugador1'] : 0; ?>" readonly >
    </div>
    <div>
        <label for="">DADO</label>
        <input type="number" name="dado_jugador1" class="input" value="<?php echo isset($_SESSION['dado_jugador1']) ? $_SESSION['dado_jugador1'] : ''; ?>" readonly>
        <button type="submit">Lanzar</button>
    </div>
    <!-- Suma del acumulado -->
    <div class="sum-box">
        <h2>Suma del acumulado: <?php echo isset($_SESSION['acumulado_jugador1']) ? $_SESSION['acumulado_jugador1'] : 0; ?></h2>
        <?php if(!empty($mensaje_jugador1)): ?>
            <p><?php echo $mensaje_jugador1; ?></p>
        <?php endif; ?>
    </div>
</form>

<!-- jugador2 -->
<h1>BIENVENIDO <?php echo $_SESSION["jugador2"]; ?></h1>
<form action="#" method="post" class="formulario">
    <div>
        <h3>2do Jugador</h3>
        <label for="contador">TIRADAS</label>
        <input type="number" name="contador" class="input" value="<?php echo isset($_SESSION['total_tiradas_jugador2']) ? $_SESSION['total_tiradas_jugador2'] : 0; ?>" readonly >
    </div>
    <div>
        <label for="">DADO</label>
        <input type="number" name="dado_jugador2" class="input" value="<?php echo isset($_SESSION['dado_jugador2']) ? $_SESSION['dado_jugador2'] : ''; ?>" readonly>
        <button type="submit">Lanzar</button>
    </div>
    <!-- Suma del acumulado -->
    <div class="sum-box">
        <h2>Suma del acumulado: <?php echo isset($_SESSION['acumulado_jugador2']) ? $_SESSION['acumulado_jugador2'] : 0; ?></h2>
        <?php if(!empty($mensaje_jugador2)): ?>
            <p><?php echo $mensaje_jugador2; ?></p>
        <?php endif; ?>
    </div>
</form>

<!-- jugador3 -->
<h1>BIENVENIDO <?php echo $_SESSION["jugador3"]; ?></h1>
<form action="#" method="post" class="formulario">
    <div>
        <h3>3er Jugador</h3>
        <label for="contador">TIRADAS</label>
        <input type="number" name="contador" class="input" value="<?php echo isset($_SESSION['total_tiradas_jugador3']) ? $_SESSION['total_tiradas_jugador3'] : 0; ?>" readonly >
    </div>
    <div>
        <label for="">DADO</label>
        <input type="number" name="dado_jugador3" class="input" value="<?php echo isset($_SESSION['dado_jugador3']) ? $_SESSION['dado_jugador3'] : ''; ?>" readonly>
        <button type="submit">Lanzar</button>
    </div>
    <!-- Suma del acumulado -->
    <div class="sum-box">
        <h2>Suma del acumulado: <?php echo isset($_SESSION['acumulado_jugador3']) ? $_SESSION['acumulado_jugador3'] : 0; ?></h2>
        <?php if(!empty($mensaje_jugador3)): ?>
            <p><?php echo $mensaje_jugador3; ?></p>
        <?php endif; ?>
    </div>
</form>

    <form action="#" method="post" class="formulario">
    <button type="submit" name="reiniciar">Reiniciar</button>
</form>
    <?php
    echo "</div>";
    // tabla
    echo "<div class='table' >";
    $fila_columnas = 10;
    $contador = 100;
    $colores = ["green", "white", "yellow", "red", "blue"]; 
    echo "<table>";
    for ($i = 0; $i < $fila_columnas; $i++) {
        $a = 9;
        echo "<tr>";
        for ($j = 0; $j < $fila_columnas; $j++) {
            // Definir colores
            $color = rand(0, count($colores) - 1);
            $color_elegido = $colores[$color];
    
            // Calcular el número de la casilla
            $contador2 = ($i % 2 != 0) ? $contador - ($a - $j) : $contador;
    
            // Verificar si el jugador 1 está en esta casilla
            $jugador1_en_casilla = ($_SESSION['avanzar_jugador1'] == $contador2);
            // Verificar si el jugador 2 está en esta casilla
            $jugador2_en_casilla = ($_SESSION['avanzar_jugador2'] == $contador2);
            // Verificar si el jugador 3 está en esta casilla
            $jugador3_en_casilla = ($_SESSION['avanzar_jugador3'] == $contador2);
    
            // Mostrar la casilla con el número y las fichas de los jugadores
            echo "<td style='width: 70px; height: 70px; background-color: $color_elegido; position: relative;'>";
    
            // Mostrar el número de la casilla
            echo "<h3 style='position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'>$contador2</h3>";
    
            // Mostrar ficha del jugador 1 si está en esta casilla
            if ($jugador1_en_casilla) {
                echo "<div style='width: 60px; height: 60px; border-radius: 50%; background-color: black; border: solid 2px white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'></div>";
            }
            // Mostrar ficha del jugador 2 si está en esta casilla
            if ($jugador2_en_casilla) {
                echo "<div style='width: 60px; height: 60px; border-radius: 50%; background-color: red; border: solid 2px white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'></div>";
            }
            // Mostrar ficha del jugador 3 si está en esta casilla
            if ($jugador3_en_casilla) {
                echo "<div style='width: 60px; height: 60px; border-radius: 50%; background-color: blue; border: solid 2px white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);'></div>";
            }
    
            echo "</td>";
    
            $a--;
            $contador--;
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";

    
    echo "</div>";

    ?>
    <!-- Imágenes -->
    <img src="./escalera3.webp" alt="" class="imagen">
    <img src="./esca.png" alt="" class="imagen1">
    <img src="./es.png" alt="" class="imagens">
    <img src="./image.png" alt="" class="imagen2">
    <img src="./snakeee.png" alt="" class="imagena">
    <img src="./ser.png" alt="" class="imagen3">
    <img src="./escalera3.webp" alt="" class="imageno">
    <img src="./snakeee.png" alt="" class="imagen4">

    
</body>
</html>
