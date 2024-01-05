<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoMind</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&family=Noto+Sans&display=swap');

        * {
            font-family: 'Indie Flower', cursive;
        }
        body {
            background-image: url('./imagens/init.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .botoes {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .botoes button {
            margin: 10px;
            padding: 15px 30px;
            font-size: 24px;
            width: 250px;
            height: 70px;
            background-color: #B48925;
            color: white;
            border-radius: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            transform: scale(1.02);
        }
    </style>
</head>
<body>
<div class="botoes">
        <button onclick="window.location.href='nivel.php'">Jogar</button>
    </div>
</body>
</html>