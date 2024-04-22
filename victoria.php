<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Victoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(./imagef.png);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
        }

        h1 {
            color: #2c3e50;
            font-family: 'Courier New', Courier, monospace;
        }

        p {
            color: #34495e;
            margin-bottom: 20px;
            font-family: 'Courier New', Courier, monospace;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-family: 'Courier New', Courier, monospace;
        }

        a:hover {
            text-decoration: underline;
            font-family: 'Courier New', Courier, monospace;
        }

        .message {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <h1>Felicidades, <?php echo $_GET['ganador']; ?>!</h1>
            <p>Ganaste en <?php echo $_GET['tiradas']; ?> tiradas.</p>
            <p>¿Quieres volver a jugar?</p>
            <a href="inicio.php">Volver a jugar</a>
        </div>
    </div>
</body>
</html>
