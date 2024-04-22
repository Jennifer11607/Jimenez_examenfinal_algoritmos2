
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <style>
       body {
    background-image: url(./imagef.png);
    background-size: cover; 
    background-position: center; 
       }
.contenido{
    background-color: lightgray;
    font-family: 'Courier New', Courier, monospace;
    display: grid;
    align-items: center;
    justify-content: center;
    margin-top: 12%;
    text-align: center;
    width: 300px;
    margin-left: 18cm;
    border-radius: 2mm;
}
h1{
    font-family: 'Courier New', Courier, monospace;
    text-align: center;
    font-size: 300%;
    color: white;
    text-shadow: 0 0 5px blue;
}
.input{
    width: 250px;
    border-radius: 2mm;
    text-align: center;
}
.button{
    width: 100px;
    border-radius: 2mm;
    margin-bottom: 2mm;
    margin-top: 2mm;
}
    </style>
</head>
<body>
    <h1>ESTE ES EL JUEGO DE SERPIENTES Y ESCALERAS</h1>
<div class="contenido">
<h2>Bienvenidos</h2>
<form action="serpientes.php" method="post" class="formulario">
        <label for="name">Ingrese 1er Jugador</label>
        <input type="text" name="nombre1" placeholder="XXX" class="input" required>
        <label for="name">Ingrese 2do Jugador</label>
        <input type="text" name="nombre2" placeholder="XXX" class="input"  required>
        <label for="name">Ingrese 3er Jugador</label>
        <input type="text" name="nombre3" placeholder="XXX" class="input" required>
        <button type="submit" class="button">INICIAR JUEGO</button>
    </form>
</div>
</body>
</html>