<!-- 
Alex Pereira Corte GU3042014
Otávio Augusto Azevedo Marçal GU304226X
Tipo de jogo: Forca
Tema: Meio Ambiente
 -->
<?php
session_start();

// Inicializar pontuação e classe do jogador
if (!isset($_SESSION['pontuacao'])) {
    $_SESSION['pontuacao'] = 0;
    $_SESSION['classe'] = 'Bronze';
} else{ //Verificar qual a pontuação do jogador e definir sua classe
    if(400 > $_SESSION['pontuacao'] && $_SESSION['pontuacao'] >= 200){
        $_SESSION['classe'] = 'Prata';
    } elseif(600 > $_SESSION['pontuacao'] && $_SESSION['pontuacao'] >= 400){
        $_SESSION['classe'] = 'Ouro';
    } elseif(800 > $_SESSION['pontuacao'] && $_SESSION['pontuacao'] >= 600){
        $_SESSION['classe'] = 'Diamante';
    } elseif($_SESSION['pontuacao'] == 1000){
        //redirecionar para a página de vencedor caso a pontuação máxima seja alcançada
        session_destroy();
        ?>
            <script>
                window.location.href="cp.php";
            </script>
        <?php
    }
}

// Receber o número de tentativas do parâmetro na URL
if(!isset($_SESSION['tentativas'])){
    if($_GET['nivel'] === "facil"){
        $_SESSION['tentativas'] = 10;
        $_SESSION['nivel'] = "facil";
    } elseif($_GET['nivel'] === "medio"){
        $_SESSION['tentativas'] = 7;
        $_SESSION['nivel'] = "medio";
    } elseif($_GET['nivel'] === "dificil"){
        $_SESSION['tentativas'] = 5;
        $_SESSION['nivel'] = "dificil";
    }
}

if(!isset($_SESSION['palavras'])){
    $_SESSION['palavras'] = array( "reciclagem", "sustentabilidade", "ecologia", "biodiversidade", "conservacao", "poluicao", "sustentavel", "desmatamento", "preservacao", "clima", "extincao", "residuos", "florestas", "oceanos", "agroecologia", "marinho", "compostagem", "reflorestamento", "erosao", "desperdicio", "petroleo", "saneamento", "biodegradavel", "fauna", "flora", "ecossistema", "recursos", "fotossintese");
}

// Inicializar a palavra e a palavra oculta apenas uma vez
if (!isset($_SESSION['palavra']) || $_SESSION['tentativas'] <= 0) {
    $_SESSION['palavra'] = $_SESSION['palavras'][array_rand($_SESSION['palavras'])];
    $_SESSION['palavraOculta'] = str_repeat("_ ", strlen($_SESSION['palavra']));
    $posicao = array_search($_SESSION['palavra'], $_SESSION['palavras']);
    if($posicao != false){
        unset($_SESSION['palavras'][$posicao]);
    }
}

// Verificar se uma letra foi enviada pelo formulário
if (isset($_POST['letra']) && !$_SESSION['reset']) {
    $letra = $_POST['letra'];

    // Verificar se a letra está na palavra
    if (strpos($_SESSION['palavra'], $letra) !== false) {
        // Substituir os underscores pela letra correta
        for ($i = 0; $i < strlen($_SESSION['palavra']); $i++) {
            if ($_SESSION['palavra'][$i] == $letra) {
                $_SESSION['palavraOculta'][$i * 2] = $letra;
            }
        }
    } else {
            
        if(isset($_SESSION['letrasEnviadas'])){
            if(!in_array($letra, $_SESSION['letrasEnviadas'])){
                $_SESSION['letrasEnviadas'][] = $letra; 
                // Se a letra não estiver na palavra, decrementar o número de tentativas
                $_SESSION['tentativas']--;    
            }
        } else {
            $_SESSION['letrasEnviadas'] = array($letra);
            $_SESSION['tentativas']--;    
        }
        

        // Se o jogador perder, redirecionar para a página de game over
        if ($_SESSION['tentativas'] <= 0) {
            header("Location: go.php?palavra=" . $_SESSION['palavra']);
            session_destroy();
            exit();
            ?>
            <script>
                window.location.href="go.php"
            </script>
            <?php
        }
    }

    //Alterar a opacidade da árvore de acordo com a quantidade de tentativas disponíveis
    if($_SESSION['nivel'] === "facil"){
        if($_SESSION['tentativas'] > 0  && $_SESSION['tentativas'] < 4){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.3";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        } elseif($_SESSION['tentativas'] > 3 && $_SESSION['tentativas'] < 6){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.5";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        } elseif($_SESSION['tentativas'] > 5 && $_SESSION['tentativas'] < 8){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.7";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        }
    } elseif($_SESSION['nivel'] === "medio"){
        if($_SESSION['tentativas'] > 3 && $_SESSION['tentativas'] < 6){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.7";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        } elseif($_SESSION['tentativas'] > 1 && $_SESSION['tentativas'] < 4){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.5";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        } elseif($_SESSION['tentativas'] == 1){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.3";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        }
    } elseif($_SESSION['nivel'] === "dificil"){
        if($_SESSION['tentativas'] == 4){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.7";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        } elseif($_SESSION['tentativas'] === 3){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.5";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        } elseif($_SESSION['tentativas'] > 0 && $_SESSION['tentativas'] < 3){
            echo '<script>
            document.addEventListener(\'DOMContentLoaded\', function() {
                var imagem = document.querySelector(".arvore-boa");
                if (imagem) {
                    imagem.style.opacity = "0.3";
                } else {
                    console.error("Elemento não encontrado.");
                }
            });
            </script>';
        }
    }
}
$_SESSION['reset'] = false;
// Verificar se o jogo foi ganho
$jogoGanho = strpos($_SESSION['palavraOculta'], "_") === false;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Forca</title>
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

        .palavra {
            position: absolute;
            bottom: 50px;
            right: 250px;
            font-size: 50px;
            color: rgb(139, 69, 19);
        }

        .digite {
            font-size: 38px;
            color: rgb(139, 69, 19);
        }

        .formLetra {
            position: absolute;
            top: 90px;
            right: 210px;
        }

        .letra {
            height: 35px;
            width: 32px;
            border: 2px solid rgb(139, 69, 19);
            border-radius: 5px;
            color: rgb(139, 69, 19);
            font-size: 20px;
            padding-left: 20px
        }

        .btn_Verificar {
            color: green;
            background-color: white;
            border: 2px solid green;
            height: 40px;
            border-radius: 5px; 
            cursor: pointer;
        }

        .btn_Verificar:hover {
            color: white;
            background-color: green;
            border: 2px solid green;
        } 

        .pontuacao {
            position: absolute;
            top: 50px;
            left: 150px;
            color: rgb(139, 69, 19);
            font-weight: 700;
            font-size: 30px;
        }
        
        .tentativas {
            position: absolute;
            top: 100px;
            left: 150px;
            color: rgb(139, 69, 19);
            font-weight: 700;
            font-size: 30px;
        }
        
        .arvore-boa, .arvore-ruim {
            position: absolute;
            left: 140px;
            bottom: 0;
        }

        .arvore-boa {
            z-index: 1;
        }
        
        .nuvem {
            display: flex;
            align-items: center;
            justify-content: center;
            position: absolute;
            right: 180px;
            bottom: 150px
        }
        .letras{
            display: flex;
            position: absolute;
            flex-wrap: wrap;
            gap: 10px;
        }
        p{
            font-size: 40px;
            color: rgb(139, 69, 19);
        }
        </style>
</head>
<body>
    
    <div class="arvores">
        <img src="imagens/arvore-boa.png" alt="arvore boa" height="500px" class="arvore-boa">
        <img src="imagens/arvore-ruim.webp" alt="arvore ruim" class="arvore-ruim" height="450px">
    </div>

    <?php
    // Exibir a palavra oculta
    echo "<p class='palavra'>{$_SESSION['palavraOculta']}</p>";

    // Exibir pontuação e classe do jogador
    echo "<p class='pontuacao'>Pontuação: {$_SESSION['pontuacao']} - Classe: {$_SESSION['classe']}</p>";

    // Exibir tentativas restantes
    echo "<p class='tentativas'>Tentativas restantes: {$_SESSION['tentativas']}</p>";
    
    //Exibir a nuvem
    echo '<div class="nuvem">
    <img src=\'imagens/nuvem.webp\' alt=\'nuvem\' height=\'500px\'>
    <div class=\'letras\'>';

    if(isset($_SESSION['letrasEnviadas'])) {
        foreach($_SESSION['letrasEnviadas'] as $c){
            echo "<p>$c</p>";
        }
    }
    
    echo '</div>
    </div>';

    // Exibir o formulário apenas se o jogo não foi ganho ou perdido
    if (!$jogoGanho && $_SESSION['tentativas'] > 0) {
        ?>
        <form method="post" class="formLetra">
            <label for="letra" class="digite">Digite uma letra: </label>
            <input  class="letra" type="text" id="letra" name="letra" maxlength="1" required>
            <button  class="btn_Verificar" type="submit">Verificar</button>
        </form>
        <?php
    } elseif ($jogoGanho && $_SESSION['tentativas']) {
        unset($_SESSION['tentativas']);
        unset($_SESSION['palavra']);
        unset($_SESSION['palavraOculta']);
        unset($_SESSION['letrasEnviadas']);
        $_SESSION['reset'] = true;
        $_SESSION['pontuacao'] += 100;
        ?>
        <script>
        
        window.location.reload();
        </script>
        <?php
    } else {
        echo "Jogo perdido";
    }
    ?>
</body>
</html>
