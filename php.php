<?php
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
        $errors[] = "Por favor, preencha o campo Nome.";
    }

    $Sobrenome = $_POST['Sobrenome'];
    if (empty($Sobrenome)) {
        $errors[] = "Por favor, preencha o campo Sobrenome.";
    }

    // Validar o email
    $email = $_POST['email'];
    if (empty($email)) {
        $errors[] = "Por favor, preencha o campo Email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Formato de email inválido.";
    }

    // Validar o telefone
    $telefone = $_POST['telefone'];
    if (empty($telefone)) {
        $errors[] = "Por favor, preencha o campo Telefone.";
    } elseif (!preg_match("/^\d{2}\ \d{5}\d{4}$/", $telefone)) {
        $errors[] = "Formato de telefone inválido. Use XX XXXXXXXXX.";
    }
}
if (empty($errors)) {

} else{
    foreach ($errors as $error) {
        echo $error . "<br>";
    }

} 
}
?>