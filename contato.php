<?php
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os valores dos campos do formulário
    $Nome = $_POST["Nome"];
    $Sobrenome = $_POST["Sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $datanascimento = $_POST["datanascimento"];
    $opinion = $_POST["opinion"];
    $result = $_POST["result"];
    $quantidade = $_POST["quantidade"];
    $pedido = $_POST["pedido"];


    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validar o nome e sobrenome
    if (empty($Nome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Nome.</span>";
    }

    $Sobrenome = $_POST['Sobrenome'];
    if (empty($Sobrenome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Sobrenome.</span>";
    }

    // Validar o email
    if (empty($email)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Email.</span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de email inválido.</span>";
    }

    // Validar o telefone
    if (empty($telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Telefone.</span>";
    } elseif (!preg_match("/^\d{2}\ \d{5}\d{4}$/", $telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de telefone inválido. Use XX XXXXXXXXX.</span><br>";
    }
    // Valida a data de nascimento
      if (empty($datanascimento)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Data de Nascimento.</span>";
    } else {
        // Calcular a idade com base na data de nascimento
        $data_nascimento = new DateTime($datanascimento);
        $data_atual = new DateTime();
        $idade = $data_atual->diff($data_nascimento)->y;

        // Definir o limite de idade (por exemplo, 18 anos)
        $limite_idade = 18;

        // Verificar se a idade é menor que o limite
        if ($idade < $limite_idade) {
            $_SESSION['errors'][] = "<span style='color: red;'>Você deve ter pelo menos $limite_idade anos para prosseguir.</span>";
        }
        // Valida o campo opinião
        if (empty($opinion)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Opnião.</span>";
    }

    }
}
if (empty($_SESSION['errors'])) {
    // Redirecionar para a página de exibição dos dados
    header("Location: ConfirmarDados.php?Nome=" . urlencode($Nome) . "&Sobrenome=" . urlencode($Sobrenome) . "&email=" . urlencode($email) . "&telefone=" . urlencode($telefone) . "&idade=" . urlencode($idade) . "&opinion=" . urlencode($opinion) . "&quantidade=" . urlencode($quantidade) . "&result=" . urlencode($result) . "&pedido=". urlencode($pedido));
exit;    
} 

}
?> 
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="contato.css">
        <link rel="shortcut icon" href="media/icons/navIcon.png" type="image/x-icon" />
        <script src="contato.js"></script>
        <title> Formulário Padrão </title>
    </head>

    <body>
    <form method="POST">
        <div class="nav-container">
            <nav>
                <div class="icon-menu-top">
                    <span> <a href="index.html"> <img src="media/icons/browserIcon.png" height="100px"></a>
                </div>

                <div class="navbar-itens">
                    <ul>
                        <li> <a href="index.html">Home</a> </li>
                        <li> <a href="fitness.html">Fitness</a> </li>
                        <li> <a href="soccer.html">Futebol</a> </li>
                        <li> <a href="tennis.html">Tenis</a> </li>
                        <li> <a href="contato.php">Contato</a> </li>
                    </ul>
                </div>

            </nav>
        </div>
        <header>
            <div class="cabecalho">
                <h1> Deseja comprar algo? pode deixar! <br> Nós entramos em contato com você! </h1>
        </header>

        <legend>Olá Cliente</legend>
        <div class="input-padrao">
        <?php
                            if (isset($_SESSION['errors'])) {
                            foreach ($_SESSION['errors'] as $error) {
                            echo '<div class="error-message">' . $error . '</div>';
                             }
                            unset($_SESSION['errors']); // Limpe os erros da sessão após exibi-los
                            }
                            ?>

            <fieldset>
                <div class="chamada">
                    Primeiro, me conta sobre você!
                </div>
            </fieldset>
            
            <label for="nome">Como prefere ser chamado?*</label><br>
            <input type="text" id="nome" class="input-global" name="Nome" placeholder="Nome" >

            <label for="sobrenome"></label><br>
            <input type="text" id="sobrenome" class="input-global" name="Sobrenome" placeholder="Sobrenome" ><br>

            <br>Agora, me diz o teu e-mail!*
            <label for="email"></label><br>
            <input type="email" id="email" class="input-global" name="email" placeholder="seuemail@dominio.com" ><br>

            <br>Me informa um telefone*
            <label for="telefone"></label><br>
            <input type="tel" id="telefone" class="input-global" name="telefone" placeholder="XX XXXXXXXXX" ><br>

            <br>Me diz tua data de nascimento (vai que a gente consegue um desconto), rsrs!
            <label for="datanascimento"></label><br>
            <input type="date" id="datadatanascimento" name="datanascimento" class="input-global">

            <fieldset>
                <div class="chamada">
                    Agora, precisamos saber qual produto tu se interessou!
                </div>
            </fieldset>

            <div class="option-select">
                Qual produto tu curtiu?
                <select name="pedido" id="pedido">
                    <optgroup label="pedido">
                        <option>Anilhas de Crossfit</option>
                        <option>15lb</option>
                        <option>25lb</option>
                        <option>35lb</option>
                        <option>45lb</option>
                        <option>Chuteira Puma</option>
                        <option>Raquete Wilson</option>
                </select><br>

                Quantidade:

                <select name="quantidade" id="quantidade">
                    <optgroup label="Quantidade">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </optgroup>
                </select><br>

                <br><form>
    Calcule seu frete:<br>
    Valor Total: <input type="number" id="b" /> +
    Frete: <input type="number" id="a"  /><br> Valor Compra + Frete = R$
    <output name="result" id="result"></output>
</form>

<script>
    // Captura os elementos de entrada e saída
    var aInput = document.getElementById('a');
    var bInput = document.getElementById('b');
    var resultOutput = document.getElementById('result');

    // Adiciona um ouvinte de evento para os campos de entrada
    aInput.addEventListener('input', atualizarResultado);
    bInput.addEventListener('input', atualizarResultado);

    // Função para calcular e atualizar o resultado
    function atualizarResultado() {
        var a = parseFloat(aInput.value) || 0;
        var b = parseFloat(bInput.value) || 0;
        var resultado = a + b;
        resultOutput.textContent = resultado.toFixed(2); // Formatando o resultado
    }

    // Chame a função inicialmente para definir o valor inicial
    atualizarResultado();
</script>

            </div>

            <br><label for="opinion">Me diz quais horarios ou qual melhor dia pra a gente entrar em contato contigo!</label><br>
            <textarea id="opinion" name="opinion" rows="15" cols="70"></textarea> <br>

            <div class="option-select">
                Por fim, por onde nos conheceu?<br>
                <select>
                    <datalist>
                        <option> Facebook </option>
                        <option> Twitter </option>
                        <option> Instagram </option>
                        <option> T.V </option>
                    </datalist>
                </select>
            </div>

            <div class="botaozinho">
                <br><button input id="botaozinho" class="botao-padrao"> Enviar </button>
            </div>
        </div>
    </form>
        <footer>
            <div class="development">
                Desenvolvido por: <br>
                - Ana Paula - Matricula: 01538280
                - Carlos Augusto - Matricula: 01532606
                - Ighor Gomes - Matricula: 24010714
                - Maximino Silva - Matricula: 01374898
                - Pedro Quintas - Matricula: 01535333
            </div>
        </footer>
    </body>

   

</html>