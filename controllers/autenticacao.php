<?php
include_once("conexao.php");

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars(filter_input(INPUT_POST, 'password'));

// Verificar se é um administrador
$query = "SELECT * FROM admin WHERE email = :email AND senha = :password";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', $password);
$stmt->execute();

$adm = $stmt->fetch(PDO::FETCH_ASSOC);

if ($adm) {
    // Autenticação bem-sucedida para o administrador, armazenar o nome do administrador na sessão
    session_start();
    $_SESSION['nome'] = $adm['nome'];
    $_SESSION['imagem'] = $adm['imagem'];
    $_SESSION['email'] = $adm['email'];

    // Redirecionar para a página do administrador
    header("Location: ../html/adm/admin.php");
    exit();
} else {
    // Verificar se é um aluno
    $query = "SELECT * FROM alunos WHERE email = :email AND senha = :password";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($aluno) {
        // Autenticação bem-sucedida para o aluno, armazenar os dados do aluno na sessão
        session_start();
        $_SESSION['nome'] = $aluno['nome'];
        $_SESSION['imagem'] = $aluno['imagem'];
        $_SESSION['matricula'] = $aluno['matricula'];
        $_SESSION['email'] = $aluno['email'];
        $_SESSION['cpf'] = $aluno['cpf'];
        $_SESSION['curso'] = $aluno['curso'];
        $_SESSION['semestre'] = $aluno['semestre'];

        // Redirecionar para a página do aluno
        header("Location: ../html/user/user.php");
        exit();
    } else {
        // Autenticação falhou, redirecionar para uma página de erro ou exibir uma mensagem de erro
        header("Location: erro_autenticacao.php");
        exit();
    }
}
?>
