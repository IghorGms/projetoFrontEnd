<?php
session_start();
ob_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar os valores dos campos do formulário
    $Nome = $_POST["Nome"];
    $Sobrenome = $_POST["Sobrenome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validar o nome e sobrenome
    $Nome = $_POST['Nome'];
    if (empty($Nome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Nome.</span>";
    }

    $Sobrenome = $_POST['Sobrenome'];
    if (empty($Sobrenome)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Sobrenome.</span>";
    }

    // Validar o email
    $email = $_POST['email'];
    if (empty($email)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Email.</span>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de email inválido.</span>";
    }

    // Validar o telefone
    $telefone = $_POST['telefone'];
    if (empty($telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Por favor, preencha o campo Telefone.</span>";
    } elseif (!preg_match("/^\d{2}\ \d{5}\d{4}$/", $telefone)) {
        $_SESSION['errors'][] = "<span style='color: red;'>Formato de telefone inválido. Use XX XXXXXXXXX.</span><br>";
    }
}
if (empty($_SESSION['errors'])) {
    // Redirecionar para a página de exibição dos dados
    header("Location: ConfirmarDados.php?Nome=$Nome&Sobrenome=$Sobrenome&email=$email&telefone=$telefone");
    exit; // Certifique-se de sair para evitar que o restante do código seja executado
} 

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contato.css">
<title> Formulário Padrão </title>
</head>
<body>
   
    <div class="nav-container">
        <nav>        
            <div class="icon-menu-top">
                <span> <a href="index.html"> <img src="media/icons/navIcon.png" height="100px"></a> 
            </div>            
            
            <div class="navbar-itens">
                <ul>
                    <li> <a href="index.html">Home</a> </li>
                    <li> <a href="fitness.html">Fitness</a> </li>
                    <li> <a href="soccer.html">Futebol</a> </li>
                    <li> <a href="tennis.html">Tenis</a> </li>
                    <li> <a href="contato.html">Contato</a> </li>
                </ul>
            </div>
                   
        </nav>
    </div>
    <header>
        <div class = "cabecalho">
            <h1> Deseja comprar algo? pode deixar! <br> nós entramos em contato com você! </h1>
    </header>
    <form action="contato.php" method="POST">
        
            Olá Cliente!         
            
                    <div class="input-padrao">
                        <?php
                            if (isset($_SESSION['errors'])) {
                            foreach ($_SESSION['errors'] as $error) {
                            echo '<div class="error-message">' . $error . '</div>';
                             }
                            unset($_SESSION['errors']); // Limpe os erros da sessão após exibi-los
                            }
                            ?>

                        <label for="nome">Primeiro, Como prefere ser chamado?*</label><br>
                        <input type="text" id="nome" class="input-global" name="Nome" placeholder="Nome">
                        
                        <label for="sobrenome"></label><br>
                        <input type="text" id="sobrenome" class="input-global" name="Sobrenome" placeholder="Sobrenome"><br>
                        
                        <br>Agora, me diz o teu e-mail!*
                        <label for="email"></label><br>
                        <input type="email" id="E-Mail" class="input-global" name="email" placeholder="seuemail@dominio.com"><br>
                        
                        <br>Me informa um telefone*
                        <label for="telefone"></label><br>
                        <input type="tel" id="Telefone" class="input-global" name="telefone" placeholder="XX XXXXXXXXX"><br>
                        
                        <br>Me diz tua data de nascimento (vai que a gente consegue um desconto), rsrs! 
                        <label for="datanascimento"></label><br>
                        <input type="date" id="data" class="input-global"><br>
                        
                        <div class="option-select">
                            Qual produto tu curtiu?<br>
                            
                            <select>
                                <optgroup label="pedido">
                                    <option>Anilhas de Crossfit</option>
                                    <option>Chuteira Puma</option>
                                    <option>Raquete Wilson</option>
                                </select>
                            </div>
                            <br><label for="opinion">Me diz quais horarios ou qual melhor dia pra a gente entrar em contato contigo!</label><br>
                            <textarea id="opinion" name="opinion" rows="15" cols="70"> ou se tu tiver algum questionamento extra, pode aproveitar aqui também!</textarea> <br>  
                            
                            <div class="botaozinho">
                                <br><button input id="botaozinho" class="botao-padrao"> Enviar </button>
                            </div>
                    </div>
                



</form>

    <footer>
        Desenvolvido por: <br>
        - Alice Lira
        - Ana Paula
        - Carlos Augusto
        - Ighor Gomes
        - Maximino Coelho 
        - Pedro Quintas 
    </footer>
</body>
</html>