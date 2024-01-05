<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Over</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&family=Noto+Sans&display=swap');

        * {
            font-family: 'Indie Flower', cursive;
        }

        body {
            background: url('imagens/fundo-vazio.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .arvore-boa {
            position: absolute;
            left: 140px;
            bottom: 0;
        }

        h1 {
            color: rgb(139, 69, 19);
            font-weight: 700;
            font-size: 30px;  
        }

        button {
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
    <h1>Parabéns!!! Você atingiu 1000 pontos e se tornou campeão</h1>
    <div class="arvore">
        <img src="imagens/arvore-boa.png" alt="arvore boa" class="arvore-boa" height="450px">
    </div>
    <button onclick="window.location.href='nivel.php'">Jogar novamente</button>
    <button onclick="window.location.href='init.php'">Menu Principal</button>
</body>
</html>