<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $telefone = htmlspecialchars($_POST["telefone"]);
    $mensagem = htmlspecialchars($_POST["msg"]);

    // Endereço de e-mail para onde as mensagens serão enviadas
    $para = "arthur.resende.gomes02@gmail.com"; // Substitua pelo seu e-mail
    $assunto = "Novo contato de $nome";

    // Conteúdo do e-mail
    $conteudo = "Você recebeu uma nova mensagem do formulário:\n\n";
    $conteudo .= "Nome: $nome\n";
    $conteudo .= "E-mail: $email\n";
    $conteudo .= "Telefone: $telefone\n\n";
    $conteudo .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envia o e-mail
    if (mail($para, $assunto, $conteudo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar a mensagem. Por favor, tente novamente.";
    }
} else {
    echo "Método de requisição inválido.";
}
?>