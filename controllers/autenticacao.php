<?php
include_once("conexao.php");

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = htmlspecialchars(filter_input(INPUT_POST, 'passwd'));

// Verificar se é um administrador
$query = "SELECT * FROM admin WHERE email = :email";
$stmt = $conn->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();

$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin ) {
    // Autenticação bem-sucedida para o administrador, armazenar o nome do administrador na sessão
    session_start();
    $_SESSION['nome'] = $admin['nome'];
    $_SESSION['imagem'] = $admin['imagem'];
    $_SESSION['email'] = $admin['email'];

    // Redirecionar para a página do administrador
    header("Location: ../html/adm/admin.php");
    exit();
} else {
    // Verificar se é um aluno
    $query = "SELECT * FROM alunos WHERE email = :email";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':email', $email);
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
        $_SESSION['semestre'] = $aluno['semestre'];
    
        // Consulta para obter o nome do curso do aluno
        $query_curso = "SELECT c.nome AS nome_curso
                        FROM curso c
                        INNER JOIN alunos a ON a.curso_id = c.id
                        WHERE a.id = :aluno_id";
        $stmt_curso = $conn->prepare($query_curso);
        $stmt_curso->bindParam(':aluno_id', $aluno['id']);
        $stmt_curso->execute();
        $curso = $stmt_curso->fetch(PDO::FETCH_ASSOC);
    
        if ($curso) {
            $_SESSION['curso'] = $curso['nome_curso'];
        } else {
            $_SESSION['curso'] = 'Curso desconhecido';
        }
    
        // Consulta para obter as disciplinas do aluno
        $query_disciplinas = "SELECT d.nome AS nome_disciplina, d.codigo, d.carga_horaria
                              FROM alunos a
                              INNER JOIN aluno_disciplinas ad ON a.id = ad.aluno_id
                              INNER JOIN disciplina d ON ad.disciplina_id = d.id
                              WHERE a.nome = :nome";
        $stmt_disciplinas = $conn->prepare($query_disciplinas);
        $stmt_disciplinas->bindParam(':nome', $aluno['nome']);
        $stmt_disciplinas->execute();
        $disciplinas = $stmt_disciplinas->fetchAll(PDO::FETCH_ASSOC);
    
        // Armazenar as disciplinas do aluno na sessão
        $_SESSION['disciplinas'] = $disciplinas;
    
        // Redirecionar para a página do aluno
        header("Location: ../html/user/user.php");
        exit();
    }
     else {
        // Autenticação falhou, redirecionar para uma página de erro ou exibir uma mensagem de erro
        header("Location: ../html/login.php?err=Email ou senha errados!");
        exit();
    }
}
?>
