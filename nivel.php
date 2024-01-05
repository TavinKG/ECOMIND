<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha o Nível de Dificuldade</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&family=Noto+Sans&display=swap');

        * {
            font-family: 'Indie Flower', cursive;
        }
        body {
            background-image: url('imagens/nivel.jpg');
            background-size: cover;
            position: relative;
            background-repeat: no-repeat;
            background-position: center center;
            height: 100vh;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .botao-seta {
            height: 200px;
            position: absolute;
            right: 300px;
            bottom: 40vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 60px
        }

        .botao {
            font-size: 40px;
            color: rgb(139, 69, 19);
            font-weight: 700;
            cursor: pointer;
            border: 3px solid rgb(139, 69, 19);
            background: rgb(75, 243, 244);
            padding: 30px 50px;
            border-radius: 5px;
        }

        .botao:hover {
            background: rgb(75, 243, 100);
        }

    </style>
</head>
<body>
    <div>
        <div class="botao-seta">
            <div class="botao"  onclick="escolherDificuldade('facil')">FÁCIL</div>
            <div class="botao"  onclick="escolherDificuldade('medio')">MÉDIO</div>
            <div class="botao"  onclick="escolherDificuldade('dificil')">DIFÍCIL</div>
        </div>
    </div>
    

    <script>
        function escolherDificuldade(nivel) {
            
            // Redirecionar para a página do jogo da forca com o número de tentativas definido
            window.location.href = 'index.php?nivel=' + nivel;
        }
    </script>
</body>
</html>